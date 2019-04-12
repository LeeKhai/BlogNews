<template>
  <div class="card shadow mb-4">
    <div class="url">
      <span>
        <router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home</router-link>
      </span>
    </div>
    <div class="button-create form-group">
      <button class="btn btn-primary" style="margin-left:1300px">
        <router-link :to="{ name: 'create.user'}">
          <span style="color:white">+ Create new User</span>
        </router-link>
      </button>
    </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Users</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Avatar</th>
              <th>Email</th>
              <th>Role</th>
              <th v-if="checkIsAdmin">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in list_users">
              <th>
                <router-link :to="{ name: 'profile.user', params: {id: user.id}}">{{ user.id }}</router-link>
              </th>
              <th>
                <router-link :to="{ name: 'profile.user', params: {id: user.id}}">{{ user.name }}</router-link>
              </th>
              <th>
                <img
                  v-bind:src="pathImage(user.picture)"
                  class="img-profile rounded-circle"
                  style="with:70px; height:70px; margin-left:50px;"
                >
              </th>
              <th>{{ user.email }}</th>
              <td>
                <span v-for="role in user.roles">{{ role.name }},</span>
              </td>
              <th v-if="checkIsAdmin">
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
      currentUser: {},
      list_users: []
    };
  },
  created() {
    this.getCurrentUser();
  },
  mounted() {
    var app = this;
    axios
      .get("/api/v1/users")
      .then(function(response) {
        app.list_users = response.data;
      })
      .catch(function(response) {
        console.log(response);
        alert("Could not load Users");
      });
  },
  computed: {
    checkIsAdmin() {
      if (this.currentUser.roles) {
        let check = false;
        this.currentUser.roles.forEach(role => {
          if (role.slug === "admin") {
            check = true;
          }
        });
        return check;
      }
    }
  },
  methods: {
    deleteEntry(id, index) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        axios
          .delete("/api/v1/users/" + id)
          .then(function(response) {
            app.list_users.splice(index, 1);
          })
          .catch(function(response) {
            alert("Could not delete User");
          });
      }
    },
    getCurrentUser() {
      axios
        .get("/getCurrentUser")
        .then(response => {
          this.currentUser = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    pathImage(filename) {
      return "/avatars/" + filename;
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