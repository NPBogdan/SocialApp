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
        </div>

        <AppBlastVariantBlast
            class="border border-gray-700 rounded-lg mt-4"
            :blast="blast.original_blast"
        />

        <app-blast-action-group />
    </div>
</template>

<script>
import AppBlastUsername from "@/Pages/Blasts/AppBlastUsername.vue";
import AppBlastVariantBlast from "@/Pages/Blasts/Variants/AppBlastVariantBlast.vue";
import AppBlastActionGroup from "@/Pages/Blasts/Actiuni/AppBlastActionGroup.vue";

export default {
    components: {AppBlastActionGroup, AppBlastVariantBlast, AppBlastUsername},
    props: {
        blast: {
            required: true,
            type: Object
        }
    }
}
</script>
