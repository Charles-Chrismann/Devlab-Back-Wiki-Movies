<script setup>
import Genre from './Genre.vue'

const genres = [
    {
        "id": 28,
        "name": "Action"
    },
    {
        "id": 12,
        "name": "Adventure"
    },
    {
        "id": 16,
        "name": "Animation"
    },
    {
        "id": 35,
        "name": "Comedy"
    },
    {
        "id": 80,
        "name": "Crime"
    },
    {
        "id": 99,
        "name": "Documentary"
    },
    {
        "id": 18,
        "name": "Drama"
    },
    {
        "id": 10751,
        "name": "Family"
    },
    {
        "id": 14,
        "name": "Fantasy"
    },
    {
        "id": 36,
        "name": "History"
    },
    {
        "id": 27,
        "name": "Horror"
    },
    {
        "id": 10402,
        "name": "Music"
    },
    {
        "id": 9648,
        "name": "Mystery"
    },
    {
        "id": 10749,
        "name": "Romance"
    },
    {
        "id": 878,
        "name": "Science Fiction"
    },
    {
        "id": 10770,
        "name": "TV Movie"
    },
    {
        "id": 53,
        "name": "Thriller"
    },
    {
        "id": 10752,
        "name": "War"
    },
    {
        "id": 37,
        "name": "Western"
    }
]
</script>

<template>
   <div class="flex">
       <input id="toggleGenres" type="checkbox">
        <ul class="flex flex-wrap bg-white">
            <Genre v-for="genre of genres" :genre="genre" />
        </ul>
        <label for="toggleGenres" class="bg-customGreen px-4">
            <font-awesome-icon icon="fa-solid fa-angles-left" />
        </label>
   </div>
</template>

<style lang="scss" scoped>
input#toggleGenres {
    display: none;
    & + ul {
        transition: all 0.5s ease-in-out;
        max-height: 24px;
        overflow: hidden;
    }
    &:checked + ul {
        max-height: fit-content;
    }
    & + ul + label {
        display: grid;
        place-items: center;
        
        & > svg {
            transition: all 0.5s ease-in-out;
            transform: rotate(-90deg);
        }
    }
    &:checked + ul + label {
        & > svg {
            transform: rotate(0deg);
        }
    }
}
</style>
