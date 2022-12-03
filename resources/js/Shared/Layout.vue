<template>
    <header>
        <SearchBar />
        <Genres></Genres>
    </header>
    <slot />
</template>

<script setup>
import SearchBar from './SearchBar/SearchBar.vue'
import Genres from './Genres/Genres.vue'
</script>
