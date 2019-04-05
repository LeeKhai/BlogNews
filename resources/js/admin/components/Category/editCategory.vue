<template>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="url">
      <span><router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link></span>
      <span><router-link :to="{ name: 'table.categories'}" style="text-decoration: none;">Categories >></router-link></span>
      <span><router-link :to="{ name: 'edit.category'}" style="text-decoration: none;">Edit Category</router-link></span>
    </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Edit Category</h1>
            </div>
            <form class="user" v-on:submit="saveForm()">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input
                    type="text"
                    class="form-control form-control-user"
                    id="exampleFirstName"
                    placeholder="Name Category"
                    v-model="category.name"
                  >
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input
                    type="text"
                    class="form-control form-control-user"
                    id="exampleInputPassword"
                    placeholder="Description"
                    v-model="category.description"
                  >
                </div>
                 <select id="selectCate" name="sltParent" v-model="category.id_parent">
                  <option value="0">Choose Category Default</option>
                </select>
              </div>
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
      category: {
        name: "",
        description: "",
        id_parent: ""
      },
      list_categories: [],
    };
  },
  mounted() {
    let app = this;
    let id = app.$route.params.id;
    app.categoryId = id;
    axios
      .get("/api/v1/categories/" + id)
      .then(function(response) {
        app.category = response.data;
      })
      .catch(function() {
        alert("Could not load your Category");
      });
    axios
      .get("/api/v1/categories")
      .then(function(response) {
        app.list_categories = response.data;  
        app.getSelectCategory('0',"");     
      })
      .catch(function(response) {
        console.log("Could not load Categories");
      });  
  },
  created() {},
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var updateCategory = app.category;
      axios
        .patch("/api/v1/categories/" + app.categoryId, updateCategory)
        .then(function(response) {
          app.$router.replace("/categories");
        })
        .catch(function(response) {
          alert("Could not create your Category");
        });
    },
    getSelectCategory(parent, str){
      var app = this;
      var x = document.getElementById("selectCate");
      var option;
      app.list_categories.forEach(function(item){
        if(item.parent_id == parent){
          option = document.createElement("option");
          option.text = str + item.name;
          option.value = item.id;
          x.add(option);
          app.getSelectCategory(item.id,str+"--");
        }
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
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
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
