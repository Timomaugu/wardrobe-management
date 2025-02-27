<template>
  <div class="mt-5 container d-flex justify-content-center">
        <div class="card col-md-8">
            <div class="card-header">
                <h2>Login</h2>
            </div>

            <div class="card-body">
                <form @submit.prevent="login">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input v-model="email" type="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input v-model="password" type="password" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
definePageMeta({
    middleware: 'auth'
});

import { useRouter } from 'vue-router';

const email = ref('');
const password = ref('');
const router = useRouter();

const login = async () => {
  try {
    const { data } = await useNuxtApp().$api.post('/login', { email: email.value, password: password.value });
    localStorage.setItem('token', data.token);
    router.push('/');
  } catch (error) {
    console.error('Login failed:', error.response.data);
  }
};
</script>
