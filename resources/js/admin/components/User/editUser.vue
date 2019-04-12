<template>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="url">
      <span>
        <router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link>
      </span>
      <span>
        <router-link :to="{ name: 'edit.user'}" style="text-decoration: none;">Edit User</router-link>
      </span>
    </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Edit User</h1>
            </div>
            <form class="user" v-on:submit="saveForm()">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
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
                <input
                  type="email"
                  class="form-control form-control-user"
                  id="exampleInputEmail"
                  placeholder="Email Address"
                  v-model="user.email"
                >
              </div>
              <label>Role:</label>
              <select id="selectRole" v-model="user.role"></select>
              <div style="width:100px; height:120px;margin-bottom:25px;" v-if="user.picture">
                <label>Avatar Old :</label>
                <img
                  v-bind:src="pathImage(user.picture)"
                  class="img-profile rounded-circle"
                  style="with:100px; height:100px; margin-left:50px; "
                >
              </div>
              <div style="width:100px; height:120px;margin-bottom:25px;" v-if="pictureNews!=''">
                <label>Avatar New :</label>
                <img
                  :src="pictureNews"
                  class="img-profile rounded-circle"
                  style="with:100px; height:100px; margin-left:50px;"
                  height="85"
                  width="115"
                >
              </div>
              <div style="width:400px;">
                <input type="file" v-on:change="onImageChange" id="picture" class="form-control">
              </div>
              <div style="margin-top:25px; margin-left:300px;width:300px;">
                <button class="btn btn-primary btn-user btn-block" style="submit">Edit</button>
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
      user: {
        name: "",
        email: "",
        password: "",
        picture: "",
        role: ""
      }
    };
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
  created() {},
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var updateUser = app.user;
      updateUser.picture = app.pictureNews;
      axios
        .patch("/api/v1/users/" + app.userId, updateUser)
        .then(function(response) {
          if (response.result == "error") {
            alert("You can't edit User");
          } else {
            app.$router.replace("/");
          }
        })
        .catch(function(response) {
          console.log(response);
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
    getRoles() {
      var app = this;
      axios
        .get("/api/v1/roles")
        .then(function(response) {
          app.list_role = response.data;
          app.getSelectRole();
        })
        .catch(function(response) {
          console.log("Could not load Role");
        });
    },
    getSelectRole() {
      var app = this;
      var x = document.getElementById("selectRole");
      var option;
      app.list_role.forEach(function(item) {
        option = document.createElement("option");
        option.text = item.name;
        option.value = item.id;
        x.add(option);
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
#selectRole {
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