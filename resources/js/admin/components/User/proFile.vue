<template>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="url">
      <span>
        <router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link>
      </span>
      <span>
        <router-link :to="{ name: 'profile.user'}" style="text-decoration: none;">Profile</router-link>
      </span>
    </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Profile</h1>
            </div>
            <div style="width:100px; height:120px;" v-if="user.picture">
              <img
                v-bind:src="pathImage(user.picture)"
                class="img-profile rounded-circle"
                style="with:100px; height:100px; margin-left:50px;"
              >
            </div>
            <form class="user" v-on:submit="saveForm()">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>User name:</label>
                  <input
                    type="text"
                    class="form-control form-control-user"
                    id="exampleFirstName"
                    placeholder="Name"
                    v-model="user.name"
                  >
                </div>
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input
                  type="email"
                  class="form-control form-control-user"
                  id="exampleInputEmail"
                  placeholder="Email Address"
                  v-model="user.email"
                >
              </div>

              <div style="width:100px; height:120px; margin-bottom:25px;" v-if="pictureNews!=''">
                <label>Avatar New :</label>
                <img
                  :src="pictureNews"
                  class="img-profile rounded-circle"
                  style="with:100px; height:100px; margin-left:50px;"
                >
              </div>
              <div style="width:400px;">
                <input type="file" v-on:change="onImageChange" id="picture" class="form-control">
              </div>
              <div style="margin-top:25px; margin-left:300px;width:300px;" v-if="checkIsPermission">
                <button class="btn btn-primary btn-user btn-block" style="submit">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      list_role: [],
      pictureNews: "",
      currentUser: {},
      user: {
        name: "",
        email: "",
        password: "",
        picture: ""
      }
    };
  },
  created() {
    this.getCurrentUser();
  },
  mounted() {
    let app = this;
    let id = app.$route.params.id;
    app.userId = id;
    axios
      .get("/api/v1/users/" + id)
      .then(function(resp) {
        app.user = resp.data;
        app.getRoles();
      })
      .catch(function() {
        alert("Could not load your User");
      });
  },
  computed: {
    checkIsPermission() {
      let check = false;
      let app = this;
      let id = app.$route.params.id;
      if (this.currentUser.id == id) {
        return check = true;
      }
      return check;
    }
  },
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var updateUser = app.user;
      updateUser.picture = app.pictureNews;
      axios
        .patch("/api/v1/users/" + app.userId, updateUser)
        .then(function(resp) {
          app.$router.replace("/");
        })
        .catch(function(resp) {
          console.log(resp);
          alert("Could not edit your User");
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
    getRoles() {
      var app = this;
      axios
        .get("/api/v1/roles")
        .then(function(response) {
          app.list_role = response.data;
        })
        .catch(function(response) {
          console.log("Could not load Role");
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