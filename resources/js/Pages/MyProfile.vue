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
        <div class="sm:px-12">
            <div class="flex flex-col items-center py-12">
                <img :src=userDatas.pp_url alt="profile picture" class="h-32 w-32 rounded-full mb-4">
                <h1 class="text-white mb-6">{{ userDatas.username }}</h1>
                <div class="w-full px-12 flex items-center justify-center flex-col sm:flex-row gap-4">
                    <Link href="/new-album" class="w-full sm:w-fit text-white text-center bg-customGreen py-4 px-16 cursor-pointer">New album</Link>
                    <Link :href="route('invPage')" class="w-full sm:w-fit text-white text-center bg-customGreen py-4 px-16 cursor-pointer">Invitations</Link>
                </div>
            </div>
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
                        <div v-for="album, index in albums" class="w-full text-white flex justify-between items-center px-8 sm:px-0 h-16 relative">
                            <Link :href="route('albumpage',album.AlbumID)" class="itemMovie absolute inset-0"></Link>
                            <Link :href="route('albumpage',album.AlbumID)" class="itemMovie__title text-white hover:text-customGreen z-10 absolute right-2/4 translate-x-1/2">{{ album.name }}</Link>
                            <span v-if=" album.isPrivate === 0"  class="z-10">Public</span>
                            <span v-else  class="z-10">Private</span>
                            
                            
                            <div class="z-10 flex gap-1">
                                <button v-if="album.isDefault === 0" @click ="destroy(album.AlbumID)" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</button>
                                <Link v-if="album.isDefault === 0" :href="route('albumeditpage',album.AlbumID)" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-700 rounded-lg text-sm px-5 py-2.5">Edit</Link>
                            </div>
                            
                        </div>
                    </div>
                    <div class="albums_liked w-full translate-x-full">
                        <div v-for="album in liked" class="w-full text-white flex justify-between items-center px-8 sm:px-0 h-16 relative">
                            <Link :href="route('albumpage',album.AlbumID)" class="itemMovie absolute inset-0"></Link>
                            <Link class="text-white hover:text-customGreen itemMovie__title z-10" :href="route('albumpage',album.AlbumID)">{{ album.name }}</Link>
                            <Link :href ="route('unlike', album.AlbumID)" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 z-10">Unlike</Link>
    
                        </div>
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
.itemMovie {

    &:hover + .itemMovie__title {
        color: #42d392;
    }
}
</style>
