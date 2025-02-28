<template lang="">
  <div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow" style="background-color: #e3f2fd">
      <div class="container">
        <NuxtLink class="navbar-brand" to="/">WARDROBE</NuxtLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="d-flex">
            <select v-model="category" class="form-select">
              <option value="">Category</option>
              <option value="tops">Tops</option>
              <option value="bottoms">Bottoms</option>
              <option value="shoes">Shoes</option>
              <option value="accessories">Accessories</option>
          </select>
          <input v-model="search" class="form-control me-2" placeholder="Search" aria-label="Search">
            <!-- <NuxtLink class="btn btn-outline-success" :to="`/search?cat=${category}&q=${query}`">Search</NuxtLink> -->
            <button class="btn btn-outline-success" @click="searchFilter">Search</button>
        </div>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <NuxtLink class="nav-link active" aria-current="page" to="/">Home</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/auth/register">Register</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/auth/login">Login</NuxtLink>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</template>

<script setup>
  import { ref } from 'vue';
  import { useRouter } from 'vue-router';

  const router = useRouter();

  var category = ref("");
  var search = ref('');

  const searchFilter = async () => {
    router.push(`/search?cat=${category.value}&q=${search.value}`);
    category.value = '';
    search.value = '';
  }

</script>

<style>

</style>