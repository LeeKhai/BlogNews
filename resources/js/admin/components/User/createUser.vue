<template>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="url">
      <span>
        <router-link :to="{ name: 'table.users'}" style="text-decoration: none;">Home >></router-link>
      </span>
      <span>
        <router-link :to="{ name: 'create.user'}" style="text-decoration: none;">Create User</router-link>
      </span>
    </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create User</h1>
            </div>
            <form class="user" v-on:submit="saveForm()">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>User Name :</label>
                  <input
                    type="text"
                    class="form-control form-control-user"
                    id="exampleFirstName"
                    placeholder="Name"
                    v-model="user.name"
                  >
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>Password :</label>
                  <input
                    type="password"
                    class="form-control form-control-user"
                    id="exampleInputPassword"
                    placeholder="Password"
                    v-model="user.password"
                  >
                </div>
              </div>
              <div class="form-group">
                <label>Email :</label>
                <input
                  type="email"
                  class="form-control form-control-user"
                  id="exampleInputEmail"
                  placeholder="Email Address"
                  v-model="user.email"
                >
              </div>
              <div>
                <label>Roles :</label>
                <v-select :options="roles" multiple label="name" v-model="user.roles" ></v-select>
              </div>
              <div v-if="user.picture">
                <label>Avatar:</label>
                <img :src="user.picture" class="img-responsive" height="105" width="115">
              </div>
              <div style="width:400px;">
                <input type="file" v-on:change="onImageChange">
              </div>
              <div style="margin-top:25px; margin-left:300px;width:300px;">
                <button class="btn btn-primary btn-user btn-block" style="submit">Create</button>
              </div>
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
      user: {
        name: "",
        email: "",
        password: "",
        picture: "",
        roles: [],
      },
      roles: [],
    };
  },
  mounted() {
    var app = this;
    axios
      .get("/api/v1/roles")
      .then(function(response) {
        app.roles = response.data;
      })
      .catch(function(response) {
        console.log("Could not load Role");
      });
  },
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var newUser = app.user;
      axios
        .post("/api/v1/users", newUser)
        .then(function(resp) {
          app.$router.push({ path: "/" });
        })
        .catch(function(resp) {
          console.log(resp);
          alert("Could not create your User");
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
        vm.user.picture = e.target.result;
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

