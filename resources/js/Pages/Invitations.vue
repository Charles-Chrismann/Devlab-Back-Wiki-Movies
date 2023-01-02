<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import Layout from '../Shared/Layout.vue'
defineProps(['invitations'])
</script>

<template>
    <Layout>
        <h1>Invitations</h1>
        <div class="">
            <h2 v-if=" !invitations.length">Nothing here ...</h2>
            <div v-for="inv in invitations">
                <Link :href="route('userProfile', inv.ownerName)">{{ inv.ownerName }}</Link>
                <p>invited you to join: </p>
                <Link :href="route('albumpage', inv.albumID)">{{ inv.albumName }}</Link>
                <div class="">
                    <Link :href="route('acceptInv', {guestID:inv.guestID, ownerID:inv.ownerID, albumID:inv.albumID})">Accept</Link>
                    <Link :href="route('declineInv', {guestID:inv.guestID, ownerID:inv.ownerID, albumID:inv.albumID})">Decline</Link>
                </div>
            </div>
        </div>
    </Layout>
</template>
