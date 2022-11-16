<template>
    <Head title="Dashboard"/>
    <BreezeAuthenticatedLayout>
        <div class="flex">
            <div class="w-3/12">nav</div>
            <div class="w-7/12 border border-gray-800 border-t-0 border-b-0">
                Notifications
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import AppCronologie from "@/Pages/Cronolgie/AppCronologie.vue";
import {Head} from '@inertiajs/inertia-vue3';

export default {
    name:'Index',
    components:{AppCronologie,Head,BreezeAuthenticatedLayout}
}
</script>

<style scoped>

</style>
