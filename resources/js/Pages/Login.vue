<script>
import {useForm} from "@inertiajs/inertia-vue3"

export default {
    props:{
        errors: Object,
        res: String,
    },
    setup(){
        const loginForm = useForm({
            email: '',
            password: ''
        })

        return {loginForm}
    }
}
</script>
<template>
    <div class="w-full min-h-screen grid place-items-center">
        <div class="form__container bg-customElementDark w-full sm:w-6/12 p-8 rounded-lg">
            <h1 class="pb-8 text-customGreen text-2xl text-center">Login</h1>
            <form class="w-full flex flex-col items-center" @submit.prevent="loginForm.post(route('connection'))">
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="email">Email Adress</label>
                    <input v-model="loginForm.email" type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="password">Password</label>
                    <input  v-model="loginForm.password" type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <input class="w-full sm:w-fit text-white bg-customGreen py-4 mt-8 px-16" type="submit" value="Login">
            </form>
        </div>
        <div v-if="res" class="w-full bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
            <p class="text-sm">{{ res }}</p>
            <div v-for="(v) in errors">
                <p class="text-sm">
                    {{ v }}
                </p>
            </div>
        </div>
    </div>


</template>


