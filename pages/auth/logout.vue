<template lang="">
    <div>
        User Logout
    </div>
</template>
<script setup>
    import { onMounted } from 'vue';
    import { useRouter } from 'vue-router';

    const router = useRouter();

    const userLogout = async () => {
        try {
            const { response } = await useNuxtApp().$api.post('/logout', {
            headers: { Authorization: `Bearer ${localStorage.getItem('token')}` },
            });
            localStorage.removeItem("token");
            console.log(response);
            router.push('/');
        } catch (error) {
            console.error('Error logging out:', error.response.data);
        }
    }

    onMounted(userLogout);
</script>
<style lang="">
    
</style>