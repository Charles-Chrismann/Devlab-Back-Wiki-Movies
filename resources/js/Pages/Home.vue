<script setup>
import Layout from "../Shared/Layout.vue";
import MovieCard from "../Shared/MovieCard.vue";
import {onMounted} from "vue";

const props = defineProps(['moviesByGenre'])

onMounted(() => {
    console.log(props.moviesByGenre)
})

function scroll(e, direction) {
    let container = e.target.parentElement.classList.contains('fa-chevron-left') ? e.target.parentElement.parentElement : e.target.parentElement
    e.target.parentElement.lastElementChild.scrollBy({
        top: 0,
        left: container.clientWidth * direction,
        behavior: 'smooth'
    })
}

</script>

<template>
    <Layout>
        <div v-for="movies of moviesByGenre" class="px-12 pt-8 relative">
            <font-awesome-icon icon="fa-solid fa-chevron-left" @click="scroll($event, -1)"/>
            <font-awesome-icon icon="fa-solid fa-chevron-left" @click="scroll($event, 1)"/>
            <h2 class="mb-2 text-white text-2xl font-semibold">{{ movies.name }}</h2>
            <div class="cards__container flex overflow-x-auto">
                <MovieCard  v-for="movie of movies.movies" :movie="movie"/>
            </div>
        </div>
    </Layout>
</template>

<style lang="scss" scoped>
.fa-chevron-left {
    font-size: 1.8rem;
    position: absolute;
    top: 50%;
    translate: -75% -50%;
    padding: 1rem 0.5rem;
    background: #242424;
    transition: transform 0.5s;

    &:nth-of-type(2) {
        right: 0;
        rotate: 180deg;
    }

    &:hover {
        color: #42d392;
        transform: translateX(-4px) scale(1.1);
    }
}

.cards__container {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */

    &::-webkit-scrollbar {
        display: none;
    }
}
</style>