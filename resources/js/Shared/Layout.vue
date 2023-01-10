<script setup>
import { computed } from 'vue'
import { usePage, Link } from '@inertiajs/inertia-vue3'

import SearchBar from './SearchBar/SearchBar.vue'
import Genres from './Genres/Genres.vue'

// export default {
//   setup() {
    const user = computed(() => usePage().props.value.user)
    const username = computed(() => usePage().props.value.session)
//     return { user }
//   },
// }
</script>
<template>
    <header class="">
        <div class="header__top relative flex justify-between items-center px-12 py-4">
            <Link href="/" class="w-48 h-16 py-2 pr-4">
                <img src="./../../../public/logo-invert.png" alt="home" class="h-full">
            </Link>
            <SearchBar/>
            <div v-if="user.username" class="flex flex-col relative p-2 bg-customElementDark rounded-md">
                <label for="userOptions" class="flex items-center cursor-pointer">
                    <img :src="user.profilePicture" alt="profilePicture" class="h-12 rounded-full">
                    <span class="text-customGreen w-32">
                        {{ user.username }}
                    </span>
                </label>
                <input type="checkbox" id="userOptions" class="hidden">
                <div class="absolute w-full left-0 flex flex-col top-14 px-2 pb-2 rounded-b-lg bg-customElementDark z-50">
                    <Link href="/myaccount" class="py-2 text-white text-center">My accont</Link>
                    <Link href="/logout" class="py-2 text-white text-center">Logout</Link>
                </div>
            </div>
            <div v-else class="logs w-48 h-16 py-2 pl-4 flex justify-between items-center gap-4">
                <Link href="/login" class="text-white text-center justify-between items-center">Login</Link>
                <Link href="/register" class="text-white text-center justify-between items-center border-white border-solid border-2 rounded-lg py-0.5 px-6">Register</Link>
            </div>
        </div>
        <Genres/>
    </header>
    <slot />
</template>

<style lang="scss" scoped>
.header__top::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0px;
    width: 100%;
    height: 4px;
    background-color: #42d392;
}
input#userOptions {
    transform: translateX(-100px);
    & + div {
        max-height: 0px;
        overflow: hidden;
        transition: all 0.5s ease-in-out;
    }
    &:checked + div {
        max-height: 80px;
    }
}

.logs {

    & > a {
        
        &:nth-child(1) {
            position: relative;
            &::before {
                content: '';
                position: absolute;
                height: 2px;
                width: 100%;
                left: 0%;
                bottom: -4px;
                background: #42d392;
                transition: 0.5s ease-in-out;
                transform: scaleX(0);
            }
            &:hover::before {
                transform: scaleX(1);
            }
        }
        &:nth-child(2) {
            transition: 0.5s ease-in-out;

            &:hover {
                background-color: #42d392;
                border-color: #42d392;
            }
        }
    }
}
</style>