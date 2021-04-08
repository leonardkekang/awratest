<template>
  <b-container>
    <b-row>
      <b-col sm="4" offset="4">
        <b-form @submit.prevent="login">
          <b-form-group
            id="input-group-1"
            label="Email address:"
            label-for="input-email"
            label-align="left"
            class="pb-1"
            ><b-form-input
              id="input-email"
              v-model="email"
              type="email"
              placeholder="Enter Email"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group
            id="input-group-2"
            label="Your Password:"
            label-for="input-password"
            label-align="left"
            class="pb-3"
            ><b-form-input
              id="input-password"
              v-model="password"
              placeholder="Enter Password"
              type="password"
              required
            ></b-form-input>
          </b-form-group>

          <b-button type="submit" block variant="primary">Login</b-button>
        </b-form>
        <hr />
        No Account yet?
        <router-link to="/register">Register Here</router-link>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login: function () {
      let email = this.email;
      let password = this.password;
      this.$store
        .dispatch("login", { email, password })
        .then(() => this.$router.push("/"))
        .catch((err) => console.log(err));
    },
  },
};
</script>
