<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import Layout from '../Shared/Layout.vue'
defineProps(['invitations','owners','albums'])
</script>

<template>
    <Layout>
        <h1>Invitations</h1>
        <div class="">
            <h2 v-if=" !invitations.length">Nothing here ...</h2>
            <div v-for="(inv, i) in invitations">
                <Link :href="route('userProfile', owners[i].name.username)">{{ owners[i].name.username }}</Link>
                <p>invited you to join: </p>
                <Link :href="route('albumpage', inv.album_id)">{{ albums[i].name.name }}</Link>
                <div class="">
                    <Link :href="route('acceptInv', {guestID:inv.guest_id, ownerID:inv.owner_id, albumID:inv.album_id})">Accept</Link>
                    <Link :href="route('declineInv', {guestID:inv.guest_id, ownerID:inv.owner_id, albumID:inv.album_id})">Decline</Link>
                </div>
            </div>
        </div>
    </Layout>
</template>


<!--<Link v-if="owner" :href="route('albumeditpage',albumInfos.id)" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-700 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Edit</Link>-->
<!--<h1 class="mt-5 pb-8 text-customGreen text-2xl text-center">Album : {{ albumInfos.name }}</h1>-->
<!--<p class="text-white text-xl text-center" v-if="!movies.length">Nothing Here ...</p>-->
<!--<div class="flex flex-wrap mygap">-->
<!--<div v-for="movie in movies" class="flex flex-col flex items-center text-center">-->
<!--    <Link :href="route('singlemovie',movie.id)" class="flex flex-col flex items-center text-center">-->
<!--        <p class="text-white">{{ movie.title }}</p>-->
<!--        <img class="h-34 imgSize" :src="'https://image.tmdb.org/t/p/original' + movie.poster_path" alt="">-->
<!--    </Link>-->
<!--    <Link v-if="owner" :href="route('removie',{albumID : albumInfos.id , movieID: movie.id})" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">remove </Link>-->
<!--</div>-->
<!--</div>-->
