<script setup>
import {Link, useForm} from "@inertiajs/inertia-vue3";
defineProps(['errors', 'albums', 'film', 'res'])
let movieForm = useForm({'album' : ''})

</script>

<template>
    <div class="w-full min-h-screen grid place-items-center">
        <div class="form__container bg-customElementDark w-full sm:w-6/12 p-8 rounded-lg">
            <h1 class="pb-8 text-customGreen text-2xl text-center">Add movie to your album</h1>
            <form @submit.prevent="movieForm.post(route('addmovie', film.id))" class="w-full flex flex-col items-center">
                <div class="flex flex-col items-center mb-10">
                    <h2 class="text-white text-2xl text-center mb-4" >{{ film.title }}</h2>
                    <img class="h-32" :src="'https://image.tmdb.org/t/p/original' + film.poster_path" alt="">
                </div>
                <div class="flex flex-col items-center mr-4">
                    <label class="text-customGreen mb-1" for="album">Album</label>
                    <select v-model="movieForm.album" name="album">
                        <option disabled value="">Please select an album</option>
                        <option v-for="album in albums" :value="album.AlbumID">
                            {{ album.name }}
                        </option>
                    </select>
                </div>
                <p class="text-red-600 font-bold"> {{ res }} {{ errors.album }}</p>
                <div class="flex items-center mr-4 gap-16 ">
                    <input class="w-full sm:w-fit text-white bg-customGreen py-4 mt-8 px-16 cursor-pointer" type="submit" value="Add movie">
                    <Link :href="route('myprofile')" class="w-full sm:w-fit text-white bg-red-500 py-4 mt-8 px-16 cursor-pointer">Cancel</Link>
                </div>
            </form>
        </div>
    </div>
</template>

