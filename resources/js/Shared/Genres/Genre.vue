<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps(['genre'])
</script>

<template>
    <li class="grid place-items-center pr-4 h-6">
        <Link :href="'/genres/' + genre.id">{{ genre.name }}</Link>
    </li>
</template>


