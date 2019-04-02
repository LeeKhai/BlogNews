<template>
  <div class="card shadow mb-4">
    <div class="button-create form-group">
      <button class="btn btn-primary" style="margin-left:1300px">
        <router-link :to="{ name: 'create.user'}">
          <span style="color:white">+ Create new User</span>
        </router-link>
      </button>
    </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Table Users</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in list_users">
              <th>{{ user.id }}</th>
              <th>{{ user.name }}</th>
              <th>{{ user.email }}</th>
              <th>
                <button class="btn btn-success">
                  <router-link :to="{ name: 'edit.user', params: {id: user.id}}">
                    <span style="color:white">Edit</span>
                  </router-link>
                </button>
                <button class="btn btn-danger" v-on:click="deleteEntry(user.id, index)">Delete</button>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      list_users: []
    };
  },
  mounted() {
    var app = this;
    axios
      .get("/api/v1/users")
      .then(function(resp) {
        app.list_users = resp.data;
      })
      .catch(function(resp) {
        console.log(resp);
        alert("Could not load Users");
      });
  },
  methods: {
    deleteEntry(id, index) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        axios
          .delete("/api/v1/users/" + id)
          .then(function(resp) {
            app.list_users.splice(index, 1);
          })
          .catch(function(resp) {
            alert("Could not delete User");
          });
      }
    }
  }
};
</script>