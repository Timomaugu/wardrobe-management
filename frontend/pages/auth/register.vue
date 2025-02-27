<template>
  <div class="mt-5 container d-flex justify-content-center">
    <div class="card col-md-8">
      <div class="card-header">
        <h2>Register</h2>
      </div>

      <div class="card-body">
        <form @submit.prevent="register">
          <div class="mb-3">
            <label for="name">Name</label>
            <input v-model="name" type="text" class="form-control" />
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input v-model="email" type="email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="password">Password</label>
            <input v-model="password" type="password" class="form-control" />
          </div>
          <div class="mb-3">
            <label for="cpassword">Confirm Password</label>
            <input v-model="password_confirmation" type="password" class="form-control" />
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary float-end">Register</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</template>

<script>
definePageMeta({
  middleware: 'auth'
});

import { ref } from 'vue';
import { useRouter } from 'vue-router';

const name = ref('');
const email = ref('');
const password = ref('');
const password_confirmation = ref('');
const router = useRouter();

const register = async () => {
  try {
    const { response } = await useNuxtApp().$api.post('/register', { name: name.value, email: email.value, password: password.value, password_confirmation: password_confirmation.value });
    localStorage.setItem('token', response.data.token);
    console.log(response.data);
    router.push('/');
  } catch (error) {
    console.error('Registration failed:', error.response.data);
  }
}


</script>
