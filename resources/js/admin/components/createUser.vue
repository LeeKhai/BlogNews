<template>
  <div class="card o-hidden border-0 shadow-lg my-5" style="with:500px">
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
                  <input
                    type="text"
                    class="form-control form-control-user"
                    id="exampleFirstName"
                    placeholder="Name"
                    v-model="user.name"
                  >
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
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
                <input
                  type="email"
                  class="form-control form-control-user"
                  id="exampleInputEmail"
                  placeholder="Email Address"
                  v-model="user.email"
                >
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
      user: {
        name: "",
        email: "",
        password: ""
      }
    };
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
          alert("Could not create your company");
        });
    }
  }
};
</script>
