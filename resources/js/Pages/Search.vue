<script setup>
const props = defineProps(['movies'])
console.log(props)
</script>

<template>
    <div v-for="movie in movies.results">
        {{ movie.title }}
    </div>
</template>

<style scoped>

</style>
