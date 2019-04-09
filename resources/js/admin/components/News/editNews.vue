<template>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="url">
      <span>
        <router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link>
      </span>
      <span>
        <router-link :to="{ name: 'table.news'}" style="text-decoration: none;">News >></router-link>
      </span>
      <span>
        <router-link :to="{ name: 'edit.news'}" style="text-decoration: none;">Edit News</router-link>
      </span>
    </div>
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Edit News</h1>
            </div>
            <form class="user" v-on:submit="saveForm()">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input
                    type="text"
                    class="form-control form-control-user"
                    placeholder="Name"
                    v-model="news.name"
                  >
                </div>
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control form-control-user"
                  placeholder="Description"
                  v-model="news.description"
                >
              </div>
              <div class="form-group">
                <ckeditor :editor="editor" v-model="news.content" :config="editorConfig"></ckeditor>
              </div>
              <div style="width:100px; height:120px;" v-if="news.picture">
                <label>Picture Old :</label>
                <img
                  v-bind:src="pathImage(news.picture)"
                  class="img-responsive"
                  height="90"
                  width="115"
                >
              </div>
              <div style="width:100px; height:120px;" v-if="pictureNews!=''">
                <label>Picture New :</label>
                <img :src="pictureNews" class="img-responsive" height="85" width="115">
              </div>
              <div style="width:400px;">
                <input type="file" v-on:change="onImageChange" id="picture" class="form-control">
              </div>
              <div>
                <select
                  id="selectCate"
                  name="sltParent"
                  v-model="news.category_id"
                  style="width:400px;"
                ></select>
              </div>
              <div style="margin-top:25px; margin-left:300px;width:300px;">
                <button class="btn btn-primary btn-user btn-block" style="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  data() {
    return {
      editor: ClassicEditor,
      editorConfig: {},
      pictureNews: "",
      news: {
        name: "",
        content: "",
        description: "",
        category_id: "",
        user_id: "",
        picture: ""
      }
    };
  },
  mounted() {
    let app = this;
    let id = app.$route.params.id;
    app.newsId = id;
    axios
      .get("/api/v1/news/" + id)
      .then(function(response) {
        app.news = response.data;
        app.getCate();
      })
      .catch(function() {
        alert("Could not load your company");
      });
  },
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var updateNews = app.news;
      updateNews.picture = app.pictureNews;
      axios
        .patch("/api/v1/news/" + app.newsId, updateNews)
        .then(function(response) {
          app.$router.replace("/news");
        })
        .catch(function(response) {
          alert("Could not create your User");
        });
    },
    getCate() {
      var app = this;
      axios
        .get("/api/v1/categories")
        .then(function(response) {
          app.list_categories = response.data;
          app.getSelectCategory("0", "");
        })
        .catch(function(response) {
          console.log("Could not load Categories");
        });
    },
    getSelectCategory(parent, str) {
      var app = this;
      var x = document.getElementById("selectCate");
      var option;
      app.list_categories.forEach(function(item) {
        if (item.parent_id == parent) {
          option = document.createElement("option");
          option.text = str + item.name;
          option.value = item.id;
          x.add(option);
          app.getSelectCategory(item.id, str + "--");
        }
      });
    },
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.pictureNews = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    pathImage(filename) {
      return "/images/" + filename;
    }
  }
};
</script>

<style scoped>
.url {
  color: blue;
  font-size: 25px;
  font-weight: bold;
  margin-left: 10px;
  margin-top: 10px;
}
#selectCate {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #6e707e;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #d1d3e2;
  border-radius: 12px;
  margin-top: 15px;
}
</style>