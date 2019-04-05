<template>
  <div class="card shadow mb-4">
    <div class="url">
      <span><router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link></span>
      <span><router-link :to="{ name: 'table.news'}" style="text-decoration: none;">News</router-link></span>
    </div>
    <div class="button-create form-group">
      <button class="btn btn-primary" style="margin-left:1300px">
        <router-link :to="{ name: 'create.news'}">
          <span style="color:white">+ Create News</span>
        </router-link>
      </button>
    </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Table News</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(news, index) in list_news">
              <th>{{ news.id }}</th>
              <th>{{ news.name }}</th>
              <th>{{ news.description }}</th>
              <th>{{ news.category_id }}</th>
              <th>
                <button class="btn btn-success">
                  <router-link :to="{ name: 'edit.news', params: {id: news.id}}">
                    <span style="color:white">Edit</span>
                  </router-link>
                </button>
                <button class="btn btn-danger" v-on:click="deleteEntry(news.id, index)">Delete</button>
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
      list_news: []
    };
  },
  mounted() {
    var app = this;
    axios
      .get("/api/v1/news")
      .then(function(response) {
        app.list_news = response.data;
      })
      .catch(function(response) {
        alert("Could not load News");
      });
  },
  methods: {
    deleteEntry(id, index) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        axios
          .delete("/api/v1/news/" + id)
          .then(function(response) {
            app.list_news.splice(index, 1);
          })
          .catch(function(response) {
            alert("Could not delete User");
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