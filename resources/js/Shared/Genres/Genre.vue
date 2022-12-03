<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps(['genre'])
</script>

<template>
    <div class="inline-block pr-4">
        <Link :href="'/genres/' + genre.id">{{ genre.name }}</Link>
    </div>
</template>


