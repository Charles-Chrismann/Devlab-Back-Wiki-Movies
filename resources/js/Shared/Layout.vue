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
        <div class="header__top relative flex justify-between items-center px-8 py-4">
            <Link href="/">
                <img src="" alt="home">
            </Link>
            <SearchBar/>
            <div class="flex flex-col relative p-2 bg-customElementDark rounded-md">
                <label for="userOptions" class="flex items-center cursor-pointer">
                    <img :src="user.profilePicture" alt="profilePicture" class="h-12 rounded-full">
                    <span class="text-customGreen w-32">
                        {{ user.username }}
                    </span>
                </label>
                <input type="checkbox" id="userOptions" class="hidden">
                <div class="absolute w-full left-0 flex flex-col top-14 px-2 pb-2 rounded-b-lg bg-customElementDark">
                    <Link href="/myaccount" class="py-2 text-white text-center">My accont</Link>
                    <Link href="/logout" class="py-2 text-white text-center">Logout</Link>
                </div>
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
</style>