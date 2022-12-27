<script setup>

import { onMounted, ref, reactive } from 'vue';
import Layout from '../Shared/Layout.vue';
defineProps(['userDatas', 'albums', 'liked'])
let isPersonal = ref(true);
</script>

<template>
    <Layout>
        <div class="">

        </div>
        <div class="albums overflow-hidden">
            <div class="types w-full flex justify-between" :class="reactive({'isPersonal': !isPersonal})">
                <p class="w-1/2 text-center" :class="reactive({'text-customGreen': isPersonal})" @click="isPersonal = true">Personal Albums</p>
                <p class="w-1/2 text-center" :class="reactive({'text-customGreen': !isPersonal})" @click="isPersonal = false">Liked Albums</p>
            </div>
            <div class="albums__list flex w-full">
                <div class="albums_personals w-full">
                    <div v-for="album in albums">
                        {{ album.name }}
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
    .types.isPersonal {
        & ~ .albums__list {
            transform: translateX(-100%);
        }
    }
    .albums__list {
        transition: all ease-in-out 0.5s;
    }
}
</style>
