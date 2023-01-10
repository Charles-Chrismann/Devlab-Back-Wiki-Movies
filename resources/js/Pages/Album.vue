<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import Layout from '../Shared/Layout.vue'
defineProps(['movies', 'albumInfos', 'errors', 'owner'])
</script>

<template>
    <Layout>
        <div class="py-12">
            <Link v-if="owner" :href="route('sendInvPage')" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-700 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Invite</Link>

            <Link v-if="owner" :href="route('albumeditpage',albumInfos.id)" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-700 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Edit</Link>
            <h1 class="mt-5 pb-8 text-customGreen text-2xl text-center">Album : {{ albumInfos.name }}</h1>
                <p class="text-white text-xl text-center" v-if="!movies.length">Nothing Here ...</p>
                <div class="flex justify-evenly flex-wrap px-12 mygap">
                    <!-- <div v-for="movie in movies" class="flex flex-col flex items-center text-center bg-customElementDark"> -->
                        <Link v-for="movie in movies" :href="route('singlemovie',movie.id)" class="flex flex-col items-center text-center bg-customElementDark p-5">
                            <img class="lg:w-36 2xl:w-48" :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="">
                            <p class="text-white text-center w-48">{{ movie.title }}</p>
                            <div class="flex justify-between">
                                <Link v-if="owner" :href="route('removie',{albumID : albumInfos.id , movieID: movie.id})" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <font-awesome-icon icon="fa-regular fa-trash-can" />
                                </Link>
                            </div>
                        </Link>
                    <!-- </div> -->
                </div>
        </div>
    </Layout>
</template>

<style>

.mygap{
    gap: 40px;
}

.imgSize{
    max-width: 150px;
    height: auto;
}

</style>
