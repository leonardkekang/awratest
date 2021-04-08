<template>
  <b-container>
    <h2>Register</h2>
    <b-row>
      <b-col sm="4" offset="4">
        <hr />
        <b-form @submit.prevent="register">
          <b-form-group
            id="input-group-1"
            label="Full Name:"
            label-for="input-name"
            label-align="left"
            class="pb-1"
            ><b-form-input
              id="input-name"
              v-model="name"
              type="text"
              placeholder="Enter your full name"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group
            id="input-group-2"
            label="Email Address:"
            label-for="input-email"
            label-align="left"
            class="pb-1"
            ><b-form-input
              id="input-email"
              v-model="email"
              placeholder="Enter your email"
              type="email"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group
            id="input-group-3"
            label="Password:"
            label-for="input-password"
            label-align="left"
            class="pb-1"
            ><b-form-input
              id="input-password"
              v-model="password"
              type="password"
              placeholder="Enter your password"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group
            id="input-group-4"
            label="Password Confirmation:"
            label-for="input-password-confirm"
            label-align="left"
            class="pb-3"
            ><b-form-input
              id="input-password-confirm"
              v-model="password_confirmation"
              placeholder="Confirm your password"
              type="password"
              required
            ></b-form-input>
          </b-form-group>

          <b-button type="submit" block variant="primary">Register</b-button>
        </b-form>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
    };
  },
  methods: {
    register: function () {
      let data = {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation,
      };
      this.$store
        .dispatch("register", data)
        .then(() => this.$router.push("/"))
        .catch((err) => console.log(err));
    },
  },
};
</script>
