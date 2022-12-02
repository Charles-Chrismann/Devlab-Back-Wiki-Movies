<script setup>
import axios from 'axios';

import {ref} from "vue";
import Result from "./Result";
const searchbar = ref();
// const ResultsList

async function search(){
    console.log(searchbar.value.value)
    axios.get(`/api/search/${searchbar.value.value}`)
        .then(function (response) {
            // handle success
            console.log(response.data);
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
        <Result v-for="" />
    </ul>
</template>

<style scoped>

</style>
