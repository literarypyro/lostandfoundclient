<template>
<button @click="registerAccount">Click here to Sign Up</button>

    <form @submit.prevent="loginUser">
    
    <div>
    
    <div>
        <label>Username</label>
        <input type="text" v-model="username" name="username" />
    </div>
    <div>
        <label>Password</label>
        <input type="password" v-model="password" name="password"/>
    </div>
    <button type="submit">Log In
    </button>

    </div>
    </form>

</template>
<script>
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';

export default {
  data() {
    return {
      username: '',
      password: '',
      reqId: ''
    };
  },
  methods: {

      registerAccount() {
            Inertia.visit("/registerUser");


        },

    async loginUser() {
      try {
        const response = await axios.post('/login', {
          username: this.username,
          password: this.password,
        });

        // Assuming the response contains the user ID (e.g., response.data.userid)
        const userId = response.data.userid;

        if (userId) {
          // Use Inertia's visit method to navigate to /requests/:userId
//          Inertia.visit(`/requests/${userId}`);

            Inertia.visit(`/dashboard/${userId}`,['requestId',userId]);
        } else {
          console.error('User ID not found in response');
        }
      } catch (error) {
        console.error('Login failed:', error);
      }
    }
  }
};
</script>
<style>




</style>