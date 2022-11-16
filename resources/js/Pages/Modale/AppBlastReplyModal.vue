<template>
    <vue-final-modal
        v-slot="{ params, close }"
        v-bind="$attrs"
        classes="flex justify-center items-center"
        content-class="relative flex flex-col max-h-full mx-4 p-4 border dark:border-gray-800 rounded bg-white dark:bg-gray-900"
    >
        <component
            v-if="blast"
            :is="`app-blast-variant-${blast.type}`"
            :blast="blast"
            class="p-4 mb-4"
        />

        <app-blast-reply-compune
            @success="$emit('success',close)"
            :blast="blast"/>

    </vue-final-modal>
</template>

<script>
import AppBlastVariantReblast from "@/Pages/Blasts/Variants/AppBlastVariantReblast.vue";
import AppBlastVariantBlast from "@/Pages/Blasts/Variants/AppBlastVariantBlast.vue";
import AppBlastVariantCitat from "@/Pages/Blasts/Variants/AppBlastVariantCitat.vue";
import AppBlastReplyCompune from "@/Pages/Compune/AppBlastReplyCompune.vue";

export default {
    name: 'AppBlastReplyModal',
    components: {
        AppBlastReplyCompune,
        AppBlastVariantReblast,
        AppBlastVariantBlast,
        AppBlastVariantCitat
    },
    props: {
        blast: {
            type: Object,
            required: true,
            default: {}
        }
    }
}
</script>
