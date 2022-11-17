<template>
    <div class="p-4 flex-grow">
        <app-blast v-if="resolvedBlast" :blast="resolvedBlast" class="!border-0"/>
    </div>
</template>

<script>
import AppBlastUsername from "@/Pages/Blasts/AppBlastUsername.vue";
import AppBlast from "@/Pages/Blasts/AppBlast.vue"
import {mapGetters} from "vuex";

export default {
    name: "AppNotificationBlastReplied",
    components: {AppBlastUsername, AppBlast},
    props: {
        notification: {
            type: Object,
            required: true
        },
    },
    computed: {
        ...mapGetters({
            blast: 'notifications/blast'
        }),
        resolvedBlast() {
            return this.blast(this.notification.data.blast.id)
        }
    }
}
</script>

<style scoped>

</style>
