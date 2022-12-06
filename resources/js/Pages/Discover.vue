<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import Layout from './../Shared/Layout.vue';
defineProps(['movies'])
</script>

<template>
    <Layout>
        <div>
            <form method="post">
                <p>Filtrer par :</p>
                <div>
                    <input type="radio" name="sort_by" value="original_title" id="sort_by_original_title">
                    <label for="sort_by_original_title">Title</label>
                </div>
                <div>
                    <input type="radio" name="sort_by" value="vote_average" id="sort_by_vote_average">
                    <label for="sort_by_vote_average">Note</label>
                </div>
                <div>
                    <input type="radio" name="sort_by" value="vote_popularity" id="sort_by_vote_popularity">
                    <label for="sort_by_vote_popularity">Popularity</label>
                </div>
                <div>
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

<style scoped>

</style>
