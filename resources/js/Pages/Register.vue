<script setup>

</script>

<template>
    <div class="w-full min-h-screen grid place-items-center">
        <div class="form__container bg-customElementDark w-full sm:w-6/12 p-8 rounded-lg">
            <h1 class="pb-8 text-customGreen text-2xl text-center">Register</h1>
            <form method="post">
                <input type="text" placeholder="Username">
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="email">Email Adress</label>
                    <input type="email" name="email" placeholder="Email" id="email">
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label class="text-customGreen mb-1" for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password">
                </div>
                <input type="password" placeholder="Password">
                <input type="password" placeholder="Password">
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</template>
