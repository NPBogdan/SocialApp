<template>
    <vue-final-modal
        v-slot="{ params, close }"
        v-bind="$attrs"
        classes="flex justify-center items-center"
        content-class="relative flex flex-col max-h-full mx-4 p-4 border dark:border-gray-800 rounded bg-white dark:bg-gray-900"
    >
        <app-blast-reblast-compune
            :blast="blast"
            @success="$emit('success',close)"
        />

        <component
            :is="`app-blast-variant-${blast.type}`"
            :blast="blast"
            v-if="blast"
            class="border border-gray-500 rounded-lg mt-4 p-4"
        />
    </vue-final-modal>
</template>

<script>

import AppBlastVariantReblast from "@/Pages/Blasts/Variants/AppBlastVariantReblast.vue";
import AppBlastVariantBlast from "@/Pages/Blasts/Variants/AppBlastVariantBlast.vue";
import AppBlastVariantCitat from "@/Pages/Blasts/Variants/AppBlastVariantCitat.vue";
import AppBlastReblastCompune from "@/Pages/Compune/AppBlastReblastCompune.vue";

export default {
    components: {
        AppBlastReblastCompune,
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
    },
    emits: ['confirm', 'cancel']
}
</script>
