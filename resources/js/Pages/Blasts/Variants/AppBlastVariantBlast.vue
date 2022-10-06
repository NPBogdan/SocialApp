<template>
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
</template>

<script>
import AppBlastUsername from "@/Pages/Blasts/AppBlastUsername.vue";

export default {
    components: {AppBlastUsername},
    props: {
        blast: {
            required: true,
            type: Object
        }
    }
}
</script>
