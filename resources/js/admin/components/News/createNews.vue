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
            <form class="user" enctype="multipart/form-data" v-on:submit="saveForm()">
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
                <input
                  type="text"
                  class="form-control form-control-user"
                  placeholder="Content"
                  v-model="news.content"
                >
              </div>
              <input type="text" value="1" style="display:hidden" v-model="news.user_id">
              <input type="text" value="" style="display:hidden" v-model="news.picture">
              <div class="card-body">
                <div class="row">
                  <!-- <div class="col-md-3" v-if="image">
                    <img :src="image" class="img-responsive" height="70" width="90">
                  </div> -->
                  <div class="col-md-6">
                    <input type="file" v-on:change="onImageChange" class="form-control" >
                  </div>
                </div>
              </div>
              <select id="selectCate" name="sltParent" v-model="news.category_id"></select>
              <button class="btn btn-primary btn-user btn-block" style="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      news: {
        name: "",
        content: "",
        description: "",
        category_id: "",
        user_id: "",
        picture: "",
      }
    };
  },
  mounted() {
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
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      // app.news.picture = this.picture;
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
        vm.picture = e.target.result;
      };
      reader.readAsDataURL(file);
    },
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