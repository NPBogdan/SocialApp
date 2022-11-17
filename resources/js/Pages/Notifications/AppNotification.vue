<template>
    <div class="flex w-full border-b border-gray-700">
        <component
            :is="`AppNotification${notification.type}`"
            :notification="notification"
        />
    </div>
</template>

<script>
import AppNotificationBlastLiked from "@/Pages/Notifications/Variants/AppNotificationBlastLiked.vue";

export default {
    name: "AppNotification",
    components: {
        AppNotificationBlastLiked
    },
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
