<script setup>
import Layout from "./../Shared/Layout.vue";

defineProps({
    res : String,
})
</script>

<template>
    <Layout>
        <h1 class="text-white">OK TEST {{ res }}</h1>
    </Layout>
</template>
