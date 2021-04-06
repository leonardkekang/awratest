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
                        ><b-form-input
                            id="input-password"
                            v-model="password"
                            placeholder="Enter Password"
                            type="password"
                            required
                        ></b-form-input>
                    </b-form-group>

                    <b-button type="submit" variant="primary">Login</b-button>
                </b-form>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
import { AUTH_REQUEST } from '../store/actions/auth';

export default {
    name: 'Login',
    data() {
        return {
            email: '',
            password: '',
        };
    },
    methods: {
        login: function () {
            const { email, password } = this;
            this.$store.dispatch(AUTH_REQUEST, { email, password }).then(() => {
                this.$router.push('/');
            });
        },
    },
};
</script>
