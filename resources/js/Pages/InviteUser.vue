<script setup>
import {Link, useForm} from "@inertiajs/inertia-vue3";
defineProps(['errors', 'albums', 'res'])
let inviteForm = useForm({'name':'','album' : ''})

</script>

<template>
    <div class="w-full min-h-screen grid place-items-center">
        <div class="form__container bg-customElementDark w-full sm:w-6/12 p-8 rounded-lg">
            <h1 class="pb-8 text-customGreen text-2xl text-center">Invite user</h1>
            <form @submit.prevent="inviteForm.post(route('sendInv'))" class="w-full flex flex-col items-center">
                <div class="flex flex-col items-center mb-10">
                    <label class="text-customGreen mb-1" for="name">Name</label>
                    <input v-model="inviteForm.name" type="text" name="name" placeholder="Name" required>
                    <p class="text-red-600 font-bold">{{ errors.name }}</p>
                </div>
                <div class="flex flex-col items-center mr-4">
                    <label class="text-customGreen mb-1" for="album">Album</label>
                    <select v-model="inviteForm.album" name="album">
                        <option disabled value="">Please select an album</option>
                        <option v-for="album in albums" :value="album.id">
                            {{ album.name }}
                        </option>
                    </select>
                </div>
                <p class="text-red-600 font-bold"> {{ res }} {{ errors.album }}</p>
                <div class="flex items-center mr-4 gap-16 ">
                    <input class="w-full sm:w-fit text-white bg-customGreen py-4 mt-8 px-16 cursor-pointer" type="submit" value="Add movie">
                    <Link :href="route('myprofile')" class="w-full sm:w-fit text-white bg-red-500 py-4 mt-8 px-16 cursor-pointer">Cancel</Link>
                </div>
            </form>
        </div>
    </div>
</template>

