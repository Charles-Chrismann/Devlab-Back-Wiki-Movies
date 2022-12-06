<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import Layout from './../Shared/Layout.vue';
defineProps(['movies'])
</script>

<template>
    <Layout>
        <div class="AdvancedFilters bg-customElementDark rounded-lg mx-4">
            <form method="get">
                <p class="text-white">Filter by :</p>
                <div class="radiosContainer">
                    <input type="radio" name="sort_by" value="original_title" id="sort_by_original_title">
                    <label for="sort_by_original_title">Title</label>
                    <input type="radio" name="sort_by" value="vote_average" id="sort_by_vote_average">
                    <label for="sort_by_vote_average">Note</label>
                    <input type="radio" name="sort_by" value="vote_popularity" id="sort_by_vote_popularity">
                    <label for="sort_by_vote_popularity">Popularity</label>
                </div>
                <div class="radiosContainer">
                    <input type="radio" name="order_by" value="asc" id="sort_by_asc">
                    <label for="sort_by_asc">Asc</label>
                    <input type="radio" name="order_by" value="desc" id="sort_by_desc" checked>
                    <label for="sort_by_desc">Desc</label>
                </div>
                <div>
                    <input type="checkbox" name="include_watched" checked>
                    <label for="include_watched">Include Watched Movies</label>
                </div>
                <div>
                    <input type="checkbox" name="include_adult" id="include_adult" checked>
                    <label for="include_adult">Include Adult Content</label>
                </div>

                <input type="submit" value="GOOOOO">
            </form>
        </div>
        <div v-for="movie in movies.results">
            {{ movie.title }}
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
                    color: #ffffff;
                    background: #1a1a1a;
                }
            }
        }
    }
</style>
