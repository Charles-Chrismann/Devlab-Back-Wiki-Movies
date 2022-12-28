<script setup>

import { onMounted, ref, reactive } from 'vue';
import {Link, useForm} from "@inertiajs/inertia-vue3";
import Layout from '../Shared/Layout.vue';
import {Inertia} from "@inertiajs/inertia";
defineProps(['userDatas', 'albums', 'liked', 'errors'])
let isPersonal = ref(true);

function showOptions(ref) {
    console.log(document.querySelectorAll("[class*='options']"))
    document.querySelectorAll("[class*='options']").forEach(item => {item.classList.remove("block"); item.classList.add("hidden");})
    document.querySelector(ref).classList.remove("hidden")
}

function destroy(album){
    if(confirm('Are you sure ?')){
        Inertia.delete(route('albumDelete', album))
    }
}

</script>

<template>
    <Layout>
        <div class="">
            <h1 class="text-white">{{ userDatas.username }}</h1>
            <img :src=userDatas.pp_url alt="profile picture" class="h-32 w-32 rounded-full">
        </div>
        <button @click="Inertia.get(route('new-album'))" class="w-full sm:w-fit text-white bg-customGreen py-4 mt-8 px-16 cursor-pointer">New album</button>
        <div v-if="$page.props.flash.message" class="text-blue-500 mb-4 text-center">
            {{ $page.props.flash.message }}
        </div>
        <div class="albums overflow-hidden">
            <div class="types w-full flex justify-between relative cursor-pointer" :class="reactive({'isPersonal': !isPersonal})">
                <p class="w-1/2 text-center py-4" :class="reactive({'text-customGreen': isPersonal, 'text-white': !isPersonal})" @click="isPersonal = true">Personal Albums</p>
                <p class="w-1/2 text-center py-4" :class="reactive({'text-customGreen': !isPersonal, 'text-white': isPersonal})" @click="isPersonal = false">Liked Albums</p>
            </div>
            <div class="albums__list flex">
                <div class="albums_personals w-full">
                    <div v-for="album, index in albums" class="w-full text-white flex justify-between px-8 py-4 relative">
                        <button @click ="destroy(album.AlbumID)" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</button>
                        <span v-if=" album.isPrivate === 0 " >Public</span>
                        <span v-else>Private</span>
                        <span>{{ album.name }}</span>
                    </div>
                </div>
                <div class="albums_liked w-full translate-x-full">
                    <div v-for="album in liked">
                        {{ album.name }}
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style lang="scss" scoped>
.albums {

    .types::after {
        content: '';
        display: block;
        width: 50%;
        position: absolute;
        height: 4px;
        background-color: #42d392;
        bottom: 0;
        transition: all ease-in-out 0.5s;
    }
    .types.isPersonal {
        &::after {
            transform: translateX(100%);
        }
        & ~ .albums__list {
            transform: translateX(-100%);
        }
    }
    .albums__list {
        width: 200%;
        transition: all ease-in-out 0.5s;
    }
}
</style>
