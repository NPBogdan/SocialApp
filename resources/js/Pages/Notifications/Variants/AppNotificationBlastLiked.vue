<template>
    <div class="p-4 flex-grow">
        <div class="text-gray-300 mb-4">
            <app-blast-username :user="notification.data.user"/> ti-a trimis un like la postare
        </div>
        <p class="text-gray-500">
            {{notification.data.blast.body }}
        </p>
    </div>
</template>

<script>
import AppBlastUsername from "@/Pages/Blasts/AppBlastUsername.vue";
export default {
    name: "AppNotificationBlastLiked",
    components: {AppBlastUsername},
    props: {
        notification: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
