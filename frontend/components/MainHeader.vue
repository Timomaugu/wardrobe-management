<template lang="">
  <div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow" style="background-color: #e3f2fd">
      <div class="container">
        <NuxtLink class="navbar-brand" to="/">WARDROBE</NuxtLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <form class="search-input d-flex" role="search">
            <select class="form-select" @change="handleSelectChange">
              <option selected>Category</option>
              <option value="tops">Tops</option>
              <option value="bottoms">Bottoms</option>
              <option value="shoes">Shoes</option>
              <option value="accessories">Accessories</option>
          </select>
          <input class="form-control me-2" placeholder="Search" aria-label="Search" @change="handleInputChange">
            <NuxtLink class="btn btn-outline-success" :to="`/search?cat=${selectedCat.value}&q=${query}`">Search</NuxtLink>
        </form>


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

  const selectedCat = ref({
    category: '',
  });
  const handleSelectChange = async (event) => {
    selectedCat.value = event.target.value;
    console.log("Selected option changed:", selectedCat.value);
  }

  const handleInputChange = async (event) => {
    selectedCat.value = event.target.value;
    console.log("Selected option changed:", selectedCat.value);
  }
</script>

<style>

</style>