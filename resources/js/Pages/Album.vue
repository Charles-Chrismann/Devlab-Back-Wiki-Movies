<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import Layout from '../Shared/Layout.vue'
defineProps(['movies', 'albumInfos', 'errors', 'owner'])
</script>

<template>
    <Layout>
        <div class="">
            <Link v-if="owner" :href="route('sendInvPage')" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-700 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Invite</Link>

            <Link v-if="owner" :href="route('albumeditpage',albumInfos.id)" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-700 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Edit</Link>
            <h1 class="mt-5 pb-8 text-customGreen text-2xl text-center">Album : {{ albumInfos.name }}</h1>
                <p class="text-white text-xl text-center" v-if="!movies.length">Nothing Here ...</p>
                <div class="flex flex-wrap mygap">
                    <div v-for="movie in movies" class="flex flex-col flex items-center text-center">
                        <Link :href="route('singlemovie',movie.id)" class="flex flex-col flex items-center text-center">
                            <p class="text-white">{{ movie.title }}</p>
                            <img class="h-34 imgSize" :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="">
                        </Link>
                        <Link v-if="owner" :href="route('removie',{albumID : albumInfos.id , movieID: movie.id})" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">remove </Link>
                    </div>
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
