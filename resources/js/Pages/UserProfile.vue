<script setup>

import { onMounted, ref, reactive } from 'vue';
import { Link } from "@inertiajs/inertia-vue3";
import Layout from '../Shared/Layout.vue';
defineProps(['userDatas', 'albums', 'liked'])
let isPersonal = ref(true);

function showOptions(ref) {
    console.log(document.querySelectorAll("[class*='options']"))
    document.querySelectorAll("[class*='options']").forEach(item => {item.classList.remove("block"); item.classList.add("hidden");})
    document.querySelector(ref).classList.remove("hidden")
}
</script>

<template>
    <Layout>
        <div class="">
            <h1 class="text-white">{{ userDatas.username }}</h1>
            <img :src=userDatas.pp_url alt="profile picture" class="h-32 w-32 rounded-full">
        </div>
        <div class="albums overflow-hidden">
            <div class="types w-full flex justify-between relative cursor-pointer" :class="reactive({'isPersonal': !isPersonal})">
                <p class="w-1/2 text-center py-4" :class="reactive({'text-customGreen': isPersonal, 'text-white': !isPersonal})" @click="isPersonal = true">Personal Albums</p>
                <p class="w-1/2 text-center py-4" :class="reactive({'text-customGreen': !isPersonal, 'text-white': isPersonal})" @click="isPersonal = false">Liked Albums</p>
            </div>
            <div class="albums__list flex">
                <div class="albums_personals w-full">
                    <div v-for="album, index in albums" class="w-full text-white flex justify-between px-8 py-4 relative">
                        <span>Visibilté</span>
                        <span>{{ album.name }}</span>
                        <span class="z-10 cursor-pointer" @click="showOptions(`.optionsPersonal-${index}`)">. . .</span>
                        <Link class="absolute inset-0" :href="'/username/albumName'">ffff</Link>
                        <div :class="'optionsPersonal-' + index">ttt</div>
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
