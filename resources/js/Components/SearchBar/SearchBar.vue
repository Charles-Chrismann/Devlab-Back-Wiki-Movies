<script setup>
import axios from 'axios';

import {ref} from "vue";
import Result from "./Result.vue";
const searchbar = ref();
const results = ref([]);
console.log(results.value)
async function search(){
    console.log(searchbar.value.value)
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

</script>

<template>
    <input type="text" @input="search" ref="searchbar">
    <ul>
        <Result v-for="result in results" :film="result"/>
    </ul>
</template>

<style scoped>

</style>
