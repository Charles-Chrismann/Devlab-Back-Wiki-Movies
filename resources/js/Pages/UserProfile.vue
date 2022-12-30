<script setup>

import { onMounted, ref, reactive } from 'vue';
import { Link } from "@inertiajs/inertia-vue3";
import Layout from '../Shared/Layout.vue';
defineProps(['userDatas', 'albums', 'liked', 'logLiked', 'log'])
let isPersonal = ref(true);
let createAlbumForm = ref(null)

function showOptions(ref) {
    console.log(document.querySelectorAll("[class*='options']"))
    document.querySelectorAll("[class*='options']").forEach(item => {item.classList.remove("block"); item.classList.add("hidden");})
    document.querySelector(ref).classList.remove("hidden")
}

function displayCreateAlbumForm(display) {
    if(display) {
        createAlbumForm.value.classList.remove("hidden")
    } else {
        createAlbumForm.value.classList.add("hidden")
    }
}
</script>

<template>
    <Layout>
        <div ref="createAlbumForm" class="fixed w-full h-screen inset-0 z-50 grid place-items-center hidden">
            <div class="w-full h-full bg-black opacity-25 absolute" @click="displayCreateAlbumForm(false)"></div>
            <div class="bg-customElementDark w-full sm:w-6/12 p-8 rounded-lg absolute">
                <h2 class="mb-8 text-customGreen text-2xl text-center">Create new album</h2>
                <form method="post" action="" class="w-full flex flex-col items-center">
                    <div class="w-full flex flex-col mb-4">
                        <label class="text-customGreen mb-1" for="name">Album name</label>
                        <input type="text" name="name" placeholder="name" id="name">
                    </div>
                    <div class="w-full flex flex-row mb-4 items-center justify-between gap-4">
                        <label style="height: fit-content;" class="text-customGreen" for="isPrivate">Make private</label>
                        <input type="checkbox" name="isPrivate" id="isPrivate">
                    </div>
                    <input class="w-full sm:w-fit text-white bg-customGreen py-4 px-16 cursor-pointer mt-8" type="submit" value="Create Album">
                </form>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center py-4">
            <img :src=userDatas.pp_url alt="profile picture" class="h-32 w-32 rounded-full mb-4">
            <h1 class="text-white mb-4">{{ userDatas.username }}</h1>
            <button class="bg-customGreen text-white py-3 px-12 rounded-md" @click="displayCreateAlbumForm(true)">Create Album</button>
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
                        <div v-if="log">
                            <Link v-if="logLiked.includes(album.AlbumID)" :href ="route('unlike', album.AlbumID)" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Unlike</Link>
                            <Link v-else :href="route('like',album.AlbumID)" class="focus:outline-none text-white bg-customGreen hover:bg-green-700 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Like</Link>
                        </div>
<!--                        <span class="z-10 cursor-pointer" @click="showOptions(`.optionsPersonal-${index}`)">. . .</span>-->
<!--                        <Link class="absolute inset-0" :href="'/username/albumName'">ffff</Link>-->
<!--                        <div :class="'optionsPersonal-' + index">ttt</div>-->
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

input[type="checkbox"] {
            outline: none;
            border: none;
            box-shadow: none;

            background: transparent;
            display: flex;
            align-items: center;
            position: relative;
            width: 4rem;
            height: 2rem;

            &::before {
                content: '';
                display: block;
                position: absolute;
                width: 100%;
                height: 100%;
                background: transparent;
                border: solid 2px #363636;
                border-radius: 9999px;
                transition: all 0.5s;
            }
            &:checked::before{
                background: #42d392;
            }

            &::after {
                content: '';
                display: block;
                position: absolute;
                height: 80%;
                aspect-ratio: 1 / 1;
                border: solid 2px #363636;
                border-radius: 9999px;
                margin: 4px;
                transition: all 0.5s;
                transform: translate(0px);
                background: #1a1a1a;
            }
            &:checked::after{
                transform: translate(30px);
            }

            &:focus {
                outline: none;
                border: none;
                box-shadow: none;
                background: none;
            }
        }
</style>
