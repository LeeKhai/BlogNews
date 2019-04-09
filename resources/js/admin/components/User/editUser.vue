<template>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="url">
      <span><router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link></span>
      <span><router-link :to="{ name: 'edit.user'}" style="text-decoration: none;">Edit User</router-link></span>
    </div>
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
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
              <button class="btn btn-primary btn-user btn-block" style="submit">Submit</button>
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
      user: {
        name: "",
        email: ""
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
      axios
        .patch("/api/v1/users/" + app.userId, updateUser)
        .then(function(resp) {
          app.$router.replace("/");
        })
        .catch(function(resp) {
          console.log(resp);
          alert("Could not create your User");
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
</style>