<template lang="">
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h4>Add Item
                    <NuxtLink class="btn btn-danger float-end" to="/"><< Back</NuxtLink>
                </h4>
            </div>

            <div class="card-body">
                <form @submit.prevent="addItem">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" v-model="name" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select class="form-select" v-model="category" required>
                            <option value="tops">Tops</option>
                            <option value="bottoms">Bottoms</option>
                            <option value="shoes">Shoes</option>
                            <option value="accessories">Accessories</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="desc">Description</label>
                        <input type="text" v-model="description" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="url">Image Url</label>
                        <input type="text" v-model="image_url" class="form-control" placeholder="http://imageurl/"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save Item</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>
<script setup>
    import { ref } from 'vue';
    import { useRouter } from 'vue-router';

    const name = ref('');
    const category = ref('');
    const description = ref('');
    const image_url = ref('');
    const router = useRouter();

    const addItem = async () => {
    try {
        const response  = await useNuxtApp().$api.post('/wardrobe-items', { name: name.value, category: category.value, description: description.value, image_url: image_url.value }, {
        headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
        });
        console.log(response.data);
        router.push('/');
    } catch (error) {
        console.error('Error adding wardrobe item:', error.response.data);
    }
    };
</script>
<style lang="">
    
</style>