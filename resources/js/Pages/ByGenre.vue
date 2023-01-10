<script setup>
import {onMounted, ref} from "vue";
import {Link} from "@inertiajs/inertia-vue3";
import axios from "axios";

import Layout from './../Shared/Layout.vue'
import MovieCard from './../Shared/MovieCard.vue'
import MovieCardResult from './../Shared/MovieCardResult.vue';

let props = defineProps(['movies', 'currentUrl'])

// const props = defineProps(['movies'])
let movies = ref(null)
// console.log(props.movies.object)

const SearchForm = ref(null)

async function cancelSubmit(e) {
    e.preventDefault();
    movies.value = await queryAndUpdate()
}

async function queryAndUpdate() {
    let formData = new FormData(SearchForm.value)
    console.log(formData)
    let uri = `http://localhost:8000/api/discover/${props.currentUrl.split('/')[2]}?`
    for (const [key, value] of formData) {
        uri += `${key}=${value}&`;
    }
    let movies
    await axios.get(uri).then(resp => {
        movies = resp.data
        console.log(movies)
    })
    console.log("ttt", movies)
    return movies
}

onMounted(async () => {
    movies.value = await queryAndUpdate()
    console.log(props.currentUrl.split('/'))
})

</script>

<template>
    <Layout>
        <div class="px-12 py-8">
            <div class="AdvancedFilters bg-customElementDark rounded-lg p-4 mb-8">
                <form method="get" ref="SearchForm" @submit="cancelSubmit($event)">
                    <p class="text-white">Filter by :</p>
                    <div class="radiosContainer mb-4">
                        <input type="radio" name="sort_by" value="popularity" id="sort_by_popularity" checked>
                        <label for="sort_by_popularity">Popularity</label>
                        <input type="radio" name="sort_by" value="original_title" id="sort_by_original_title">
                        <label for="sort_by_original_title">Title</label>
                        <input type="radio" name="sort_by" value="vote_average" id="sort_by_vote_average">
                        <label for="sort_by_vote_average">Note</label>
                    </div>
                    <div class="radiosContainer mb-8">
                        <input type="radio" name="order_by" value="desc" id="sort_by_desc" checked>
                        <label for="sort_by_desc">Desc</label>
                        <input type="radio" name="order_by" value="asc" id="sort_by_asc">
                        <label for="sort_by_asc">Asc</label>
                    </div>
                    <div class="mb-8">
                        <!-- <div class="flex items-center mb-4">
                            <input class="mr-2" type="checkbox" name="include_watched" id="include_watched" checked>
                            <label for="include_watched">Include Watched Movies</label>
                        </div> -->
                        <div class="flex items-center">
                            <input class="mr-2" type="checkbox" name="include_adult" id="include_adult" checked>
                            <label for="include_adult">Include Adult Content</label>
                        </div>
    
                    </div>
                    <div class="flex justify-end">
                        <input type="submit" value="GOOOOO" class="py-2 px-8 bg-customGreen">
                    </div>
                </form>
            </div>
            <div v-if="movies" class="flex flex-wrap justify-between">
                <MovieCard v-for="movie of movies.results" :movie="movie" />
            </div>
            <Link v-if="movies" :href="currentUrl + '?page=' + (parseInt(movies.page) + 1)">Next</Link>
        </div>
    </Layout>
</template>
<style scoped lang="scss">
    .AdvancedFilters {
        user-select: none;
        .radiosContainer {
            width: fit-content;
            border: solid 1px #363636;
            border-radius: 0.5rem;
            overflow: hidden;
            input[type="radio"] {
                display: none;

                & + label {
                    cursor: pointer;
                    color: rgba(235, 235, 235, 0.38);
                    padding: 0.5rem 2rem;
                    display: inline-block;
                }
                &:checked + label {
                    color: #42d392;
                    background: #1a1a1a;
                }
            }
        }

        input[type="checkbox"] {
            outline: none;
            border: none;
            box-shadow: none;

            background: transparent;
            display: flex;
            align-items: center;
            position: relative;
            width: 4rem;
            height: 2rem;

            &::before {
                content: '';
                display: block;
                position: absolute;
                width: 100%;
                height: 100%;
                background: transparent;
                border: solid 2px #363636;
                border-radius: 9999px;
                transition: all 0.5s;
            }
            &:checked::before{
                background: #42d392;
            }

            &::after {
                content: '';
                display: block;
                position: absolute;
                height: 80%;
                aspect-ratio: 1 / 1;
                border: solid 2px #363636;
                border-radius: 9999px;
                margin: 4px;
                transition: all 0.5s;
                transform: translate(0px);
                background: #1a1a1a;
            }
            &:checked::after{
                transform: translate(30px);
            }

            &:focus {
                outline: none;
                border: none;
                box-shadow: none;
            }
        }
    }
</style>

