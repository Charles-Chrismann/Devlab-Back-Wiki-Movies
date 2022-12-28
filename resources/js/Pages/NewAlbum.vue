<script setup>
import {Link, useForm} from "@inertiajs/inertia-vue3";
defineProps(['errors'])
let albumForm = useForm({'name':'', 'isPrivate' : 0})

</script>

<template>
    <div class="w-full min-h-screen grid place-items-center">
        <div class="form__container bg-customElementDark w-full sm:w-6/12 p-8 rounded-lg">
            <p class="pb-8 text-customGreen text-2xl text-center">Create Album</p>
            <form @submit.prevent="albumForm.post(route('albumCreate'))" class="w-full flex flex-col items-center">
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="name">Name</label>
                    <input v-model="albumForm.name" type="text" name="name" id="name" placeholder="Name" required>
                    <p class="text-sm text-red-600">{{ errors.name }}</p>
                </div>
                <div class="flex items-center mr-4">
                    <input v-model="albumForm.isPrivate" class="w-4 h-4 text-customGreen bg-gray-100 rounded border-gray-300 focus:ring-customGreen dark:focus:ring-customGreen dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" id="checkbox">
                    <label class="text-customGreen ml-2 " for="checkbox">Private</label>
                </div>
                <div class="flex items-center mr-4 gap-16 ">
                    <input class="w-full sm:w-fit text-white bg-customGreen py-4 mt-8 px-16 cursor-pointer" type="submit" value="Create Album">
                    <Link :href="route('myprofile')" class="w-full sm:w-fit text-white bg-red-500 py-4 mt-8 px-16 cursor-pointer">Cancel</Link>
                </div>
            </form>
        </div>
    </div>
</template>

