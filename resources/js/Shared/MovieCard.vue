<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps(['movie'])
</script>

<template>
    <div>
        <Link :href="/movie/ + movie.id">{{ movie.title }}</Link>

    </div>
</template>


