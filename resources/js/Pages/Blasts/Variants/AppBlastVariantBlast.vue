<template>
    <div class="flex w-full">
        <div class="mr-3">
            <img :src="blast.user.avatar" class="w-12 rounded-full">
        </div>

        <div class="flex-grow">
            <app-blast-username
                :user="blast.user"
            />
            <p class="text-gray-300 whitespace-pre-wrap">
                {{ blast.body }}
            </p>
            {{blast.likes_count}}
            <app-blast-action-group
            :blast="blast"/>
        </div>
    </div>
</template>

<script>
import AppBlastUsername from "@/Pages/Blasts/AppBlastUsername.vue";
import AppBlastActionGroup from "@/Pages/Blasts/Actiuni/AppBlastActionGroup.vue"
export default {
    components: {AppBlastUsername,AppBlastActionGroup},
    props: {
        blast: {
            required: true,
            type: Object
        }
    }
}
</script>
