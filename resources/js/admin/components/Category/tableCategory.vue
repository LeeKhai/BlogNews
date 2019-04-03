<template>
  <div class="card shadow mb-4"> 
    <div class="url">
      <span><router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link></span>
      <span><router-link :to="{ name: 'table.categories'}" style="text-decoration: none;">Categories</router-link></span>
    </div>
    <div class="button-create form-group">   
      <button class="btn btn-primary" style="margin-left:1300px">
        <router-link :to="{ name: 'create.category'}">
          <span style="color:white">+ Create new Category</span>
        </router-link>         
      </button>
    </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Table Categories</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(cate, index) in list_categories">
              <th>{{ cate.id }}</th>
              <th>{{ cate.name }}</th>
              <th>{{ cate.description }}</th>
              <th>
                <button class="btn btn-success">
                  <router-link :to="{ name: 'edit.category', params: {id: cate.id}}">
                    <span style="color:white">Edit</span>
                  </router-link>
                </button>
                <button class="btn btn-danger" v-on:click="deleteEntry(cate.id, index)">Delete</button>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      list_categories: []
    };
  },
  mounted() {
    var app = this;
    axios
      .get("/api/v1/categories")
      .then(function(response) {
        app.list_categories = response.data;
      })
      .catch(function(response) {
        console.log(response);
        alert("Could not load Categories");
      });
  },
  methods: {
   deleteEntry(id, index) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        axios
          .delete("/api/v1/categories/" + id)
          .then(function(response) {
            app.list_categories.splice(index, 1);
          })
          .catch(function(response) {
            alert("Could not delete Category");
          });
      }
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
</style>