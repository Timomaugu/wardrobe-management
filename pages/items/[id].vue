<template>
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Item
                    <NuxtLink class="btn btn-danger float-end" to="/"><< Back</NuxtLink>
                </h4>
            </div>

            <div class="card-body">
                <form @submit.prevent="updateItem(item.id)">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" v-model="item.name" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select class="form-select" v-model="item.category" required>
                            <option value="tops">Tops</option>
                            <option value="bottoms">Bottoms</option>
                            <option value="shoes">Shoes</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="desc">Description</label>
                        <input type="text" v-model="item.description" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="url">Image Url</label>
                        <input type="text" v-model="item.image_url" class="form-control" placeholder="http://imageurl/"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Item</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>
<script setup>

    import { ref } from 'vue';
    import { useRouter, useRoute } from 'vue-router';

    const router = useRouter();
    const route = useRoute();
    
    const item = ref({
        name: '',
        category: '',
        description: '',
        image_url: '',
    });

    const name = ref('');
    const category = ref('');
    const description = ref('');
    const image_url = ref('');
    
    const fetchItem = async (itemId) => {
        
        try {
            const { data } = await useNuxtApp().$api.get(`/wardrobe-items/${itemId}`, {
            headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
            });
            item.value = data;
            //console.log(data);
        } catch (error) {
            console.error('Error fetching wardrobe:', error.response.data);
        }
    };

    const updateItem = async (itemId) => {
        try {
            const { response } = await useNuxtApp().$api.put(`/wardrobe-items/${itemId}`, item.value, {
            headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
            });
            //console.log(response.data);
            router.push('/');
        } catch (error) {
            console.error('Error updating wardrobe item:', error.response.data);
        }
    };

    fetchItem(route.params.id);
    
</script>
<style lang="">
    
</style>