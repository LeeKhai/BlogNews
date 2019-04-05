<template>
   <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="url">
      <span><router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link></span>
      <span><router-link :to="{ name: 'table.categories'}" style="text-decoration: none;">Categories >></router-link></span>
      <span><router-link :to="{ name: 'create.category'}" style="text-decoration: none;">Create Category</router-link></span>
    </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create Category</h1>
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
                <select id="selectCate" name="sltParent" v-model="category.parent_id">
                  <option value="0" selected>Choose Category Default</option>
                </select>
              </div>
              <button class="btn btn-primary btn-user btn-block" style="submit">Create</button>
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
    var app = this;
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
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var newCategory = app.category;
      axios
        .post("/api/v1/categories", newCategory)
        .then(function(response) {
          app.$router.push({ path: "/categories" });
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
          app.getSelectCategory(item.id, str+"--");
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