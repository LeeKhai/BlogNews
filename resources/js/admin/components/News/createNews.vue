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
        <router-link :to="{ name: 'create.news'}" style="text-decoration: none;">Create News</router-link>
      </span>
    </div>
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create News</h1>
            </div>
            <form class="user" v-on:submit="saveForm()">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>Name :</label>
                  <input
                    type="text"
                    class="form-control form-control-user"
                    placeholder="Name"
                    v-model="news.name"
                  >
                </div>
              </div>
              <div class="form-group">
                <label>Description :</label>
                <input
                  type="text"
                  class="form-control form-control-user"
                  placeholder="Description"
                  v-model="news.description"
                >
              </div>
              <div class="form-group">
                <label>Slug :</label>
                <input
                  type="text"
                  class="form-control form-control-user"
                  placeholder="input Slug News"
                  v-model="news.slug"
                >
              </div>
              <div style="margin-bottom:30px;">
                <label>Content :</label>
                <ckeditor :editor="editor" v-model="news.content" :config="editorConfig"></ckeditor>
              </div>
              <div v-if="news.picture">
                <img :src="news.picture" class="img-responsive" height="105" width="115">
              </div>
              <input type="file" v-on:change="onImageChange">
              <div>
                <label>Category :</label>
                <select
                  id="selectCate"
                  name="sltParent"
                  v-model="news.category_id"
                  style="width:400px;"
                ></select>
              </div>
              <div>
                <label>Tags :</label>
                <v-select :options="tags" multiple taggable label="name" v-model="news.tags"></v-select>  
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
      news: {
        name: "",
        content: "",
        description: "",
        category_id: "",
        picture: "",
        slug: "",
        tags:[],
      },
      tags:[],
    };
  },
  mounted() {
    this.getCategories();
    this.getTags();
  },
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var newNews = app.news;
      axios
        .post("/api/v1/news", newNews)
        .then(function(response) {
          app.$router.push({ path: "/news" });
        })
        .catch(function(response) {
          alert("Could not create your News");
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
        vm.news.picture = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    getCategories() {
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
    getTags(){
      var app = this;
      axios
        .get("/api/v1/tags")
        .then(function(response) {
          app.tags = response.data;
        })
        .catch(function(response) {
          console.log("Could not load Tags");
        });
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