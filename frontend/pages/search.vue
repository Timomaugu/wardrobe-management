<template>
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h2>Filtered List
                  <NuxtLink class="btn btn-danger float-end" to="/"><< Back</NuxtLink>
                </h2>
            </div>

            <div class="card-body">
              <div v-if="isLoading">
                <Loading title="Loading"/>
              </div>
                <div v-else>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in items" :key="index">
                        <td>{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.category }}</td>
                        <td>{{ item.description }}</td>
                        <td>{{ item.image_url }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>
                          <NuxtLink :to="`/items/${item.id}`" class="btn btn-success btn-sm mx-2">Edit</NuxtLink>
                          <button type="button" class="btn btn-danger btn-sm mx-2" @click="$event => deleteItem($event, item.id)">Delete</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();

const items = ref([]);
var isLoading = false;

useHead({
  title: 'Filter Items'
});

const fetchItems = async () => {
  
  try {
    isLoading = false;
    const response = await useNuxtApp().$api.post('/filter/items', {category: route.query.cat, search: route.query.q}, {
      headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
    });
    items.value = response.data;
    //console.log(response.data);
  } catch (error) {
    console.error('Error fetching wardrobe:', error.response.data);
  }
};

const deleteItem = async (event, itemId) => {
  if (confirm('Are you sure, you want to delete this record ?')) {
    event.target.innerText = "Deleting";
    try {
      await useNuxtApp().$api.delete(`/wardrobe-items/${itemId}`, {
        headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
      });
      items.value = items.value.filter(item => item.id !== itemId);
      event.target.innerText = "Deleted";
      this.fetchItems();

    } catch (error) {
      console.error('Error deleting clothing:', error.response.data);
    }
  }
    
};

onMounted(fetchItems);
</script>

<style>
    
</style>