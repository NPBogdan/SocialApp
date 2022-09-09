<template>
    <div class="w-full inline-block p-4 border-b-gray-800 hover:bg-gray-800">
        <div class="flex w-full">
            <div class="mr-3">
                <img :src="blast.user.avatar" class="w-12 rounded-full">
            </div>

            <div>
                <app-blast-username
                    :user="blast.user"
                />
                <p class="text-gray-300 whitespace-pre-wrap">
                    {{ blast.body }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>

import AppBlastUsername from "@/Pages/Blasts/AppBlastUsername.vue";

const props = defineProps({
    blast: {
        required: true,
        type: Object
    }
})
</script>

<style scoped>

</style>
