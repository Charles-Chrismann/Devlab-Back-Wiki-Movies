<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import Layout from '../Shared/Layout.vue'
defineProps(['invitations'])
</script>

<template>
    <Layout>
        <div class="px-12 pt-6">
            <h1 class="text-2xl text-center text-white mb-4">Invitations</h1>
            <div class="">
                <h2 v-if=" !invitations.length">Nothing here ...</h2>
                <div v-for="inv in invitations" class="flex justify-between items-center">
                    <p class="text-white"><Link :href="route('userProfile', inv.ownerName)" class="text-customGreen">{{ inv.ownerName }}</Link> invited you to join: <Link :href="route('albumpage', inv.albumID)" class="text-customGreen">{{ inv.albumName }}</Link></p>
                    <div class="flex gap-4">
                        <Link  class="text-customGreen" :href="route('acceptInv', {ownerID:inv.ownerID, albumID:inv.albumID})">Accept</Link>
                        <Link class="text-red-600" :href="route('declineInv', {ownerID:inv.ownerID, albumID:inv.albumID})">Decline</Link>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
