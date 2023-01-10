<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import axios from 'axios';

import {ref, onMounted } from "vue";
import Result from "./Result.vue";
const searchbar = ref();
const submit = ref(null);
let submitEl;
const results = ref([]);
const LinkHref = ref();
console.log(results.value)
async function search(){
    console.log(searchbar.value.value)
    LinkHref.value = `/search/${searchbar.value.value}`
    if(!searchbar.value.value || searchbar.value.value === '') {
        results.value = []
        return
    }
    axios.get(`/api/search/${searchbar.value.value}`)
        .then(function (response) {
            // handle success
            console.log(response.data);
            results.value = response.data
            console.log(results.value)
            if(!searchbar.value.value || searchbar.value.value === '') results.value = []
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .finally(function () {
            // always executed
        });
}

function navigateToSearchPage(submitEl) {
    console.log(submitEl.target)
    submitEl.target.submit()
}

onMounted(() => {
    submitEl = submit.$el;
});

</script>

<template>
    <div>
        <form :action="LinkHref" method="get" @submit.prevent="navigateToSearchPage">
            <input type="text" @input="search" ref="searchbar">
            <!-- <Link :href="LinkHref" ref="submit">Rechercher</Link> -->
        </form>
    
        <ul class="absolute bg-white">
            <Result v-for="result in results" :film="result"/>
        </ul>
    </div>
</template>

<style scoped>

</style>
