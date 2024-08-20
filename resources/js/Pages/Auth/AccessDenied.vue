<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>

    <AppLayout title="Access Denied">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Unauthorized Access
            </h2>
        </template>

        <div class="flex w-full h-full">
            <div class="m-auto">
                <h1 class="font-bold dark:text-rose-300 text-7xl justify-self-center">Access Denied</h1>
            </div>
        </div>

    </AppLayout>

</template>

<style scoped>

</style>
