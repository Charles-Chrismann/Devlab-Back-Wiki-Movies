<script setup>

</script>

<template>
    <form v-csrf-token :action="route('connection')" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Register">
    </form>
</template>
