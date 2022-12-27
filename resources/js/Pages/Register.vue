<script>
import {useForm} from "@inertiajs/inertia-vue3"

export default {
    props:{
        errors: Object,
        res: String
    },
    setup(){
        const registerForm = useForm({
            username: '',
            email: '',
            password_confirmation: '',
            password: ''
        })

        return {registerForm}
    }
}
</script>

<template>
    <div class="w-full min-h-screen grid place-items-center">
        <div class="form__container bg-customElementDark w-full sm:w-6/12 p-8 rounded-lg">
            <h1 class="pb-8 text-customGreen text-2xl text-center">Register</h1>
            <form class="w-full flex flex-col items-center mb-10" @submit.prevent="registerForm.post(route('register.post'))">
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="username">Username</label>
                    <input v-model="registerForm.username" type="text" name="username" placeholder="Username" id="username">
                        <p class="text-sm text-red-600 ">
                            {{ errors.username }}
                        </p>
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="email">Email Adress</label>
                    <input v-model="registerForm.email" type="email" name="email" placeholder="Email" id="email">
                    <p class="text-sm text-red-600 ">
                        {{ errors.email }}
                    </p>
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="password">Password</label>
                    <input v-model="registerForm.password" type="password" name="password" placeholder="Password" id="password">
                    <p class="text-sm text-red-600 ">
                        {{ errors.password }}
                    </p>
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="confirmPassword">Confirm Password</label>
                    <input v-model="registerForm.password_confirmation" type="password" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword">
                    <p class="text-sm text-red-600 ">
                        {{ errors.password_confirmation }}
                    </p>
                </div>
                <input class="w-full sm:w-fit text-white bg-customGreen py-4 mt-8 px-16 cursor-pointer " type="submit" value="Register">
            </form>
        </div>
    </div>
</template>
