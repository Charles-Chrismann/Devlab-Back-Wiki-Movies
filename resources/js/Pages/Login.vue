<script>
import {useForm} from "@inertiajs/inertia-vue3"

export default {
    props:{
        errors: Object,
        res: String
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
    <form @submit.prevent="loginForm.post(route('connection'))">
        <input v-model="loginForm.email" type="email" name="email" placeholder="Email" required>
        <input  v-model="loginForm.password" type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Register" class=" text-white ">
    </form>


    <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
        <p class="text-sm">{{ res }}</p>
        <div v-for="(v) in errors">
            <p class="text-sm">
                {{ v }}
            </p>
        </div>
    </div>

</template>


