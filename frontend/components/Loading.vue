<template>
    <div>
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden"></span>
        </div>&nbsp;{{ title }}...
    </div>
</template>
<script>
export default {
    name: 'Loading',
    props: {
        title: String
    }
}
</script>
<style lang="">
    
</style>