<script setup>
import {ref} from "vue";
import Layout from './../Shared/Layout.vue';
import MovieCardResult from './../Shared/MovieCardResult.vue';
import axios from "axios";
const props = defineProps(['movies'])
console.log(props.movies.object)

const SearchForm = ref(null)

function cancelSubmit(e) {
    e.preventDefault();
}

function queryAndUpdate() {
    let formData = new FormData(SearchForm.value)
    console.log(formData)
    let uri = "http://localhost:8000/api/discover?"
    for (const [key, value] of formData) {
        uri += `${key}=${value}&`;
    }
    axios.get(uri).then(resp => {
        console.log(resp.data.results)
    })

}
</script>

<template>
    <Layout>
        <div class="AdvancedFilters bg-customElementDark rounded-lg mx-4 p-4">
            <form method="get" ref="SearchForm">
                <p class="text-white">Filter by :</p>
                <div class="radiosContainer mb-4">
                    <input type="radio" name="sort_by" value="vote_popularity" id="sort_by_vote_popularity" checked>
                    <label for="sort_by_vote_popularity">Popularity</label>
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
                    <div class="flex items-center mb-4">
                        <input class="mr-2" type="checkbox" name="include_watched" checked>
                        <label for="include_watched">Include Watched Movies</label>
                    </div>
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
        <div v-for="movie in movies.results">
            <MovieCardResult :movie="movie" />
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
