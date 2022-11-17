<template>
    <Head title="Dashboard"/>
    <BreezeAuthenticatedLayout>
        <div class="flex">
            <div class="w-3/12">nav</div>
            <div class="w-7/12 border border-gray-800 border-t-0 border-b-0">
                <app-notification
                    v-for="notification in notifications"
                    :key="notification.id"
                    :notification="notification"
                />
                <div
                    v-if="notifications.length"
                    v-observe-visibility="scrollBottomNotifications">
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import AppNotification from "@/Pages/Notifications/AppNotification.vue";
import {Head} from '@inertiajs/inertia-vue3';
import {mapActions, mapGetters} from "vuex";

export default {
    name: 'Index',
    components: {AppNotification, Head, BreezeAuthenticatedLayout},
    data() {
        return {
            page: 1,
            lastPage: 1
        }
    },
    computed: {
        ...mapGetters({
            notifications: 'notifications/notifications'
        }),
        urlWithPage() {
            return `api/notifications?page=${this.page}`
        }
    },
    methods: {
        ...mapActions({
            getNotifications: 'notifications/getNotifications'
        }),
        loadNotifications() {
            this.getNotifications(this.urlWithPage).then((response) => {
                this.lastPage = response.data.meta.last_page
            }).catch(function (error) {
                console.log(error)
            })
        },
        scrollBottomNotifications(isVisible) {
            if (!isVisible) {
                return
            }
            if (this.lastPage === this.page) {
                return
            }
            this.page++

            this.loadNotifications();
        }
    },
    mounted() {
        this.loadNotifications();
    }
}
</script>

<style scoped>

</style>
