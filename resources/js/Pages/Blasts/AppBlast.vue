<template>
    <div class="w-full inline-block p-4 border-b border-gray-800 hover:bg-gray-800">
        <component
            :is="`app-blast-variant-${blast.type}`"
            :blast="blast"
        />
    </div>
</template>

<script>
import AppBlastUsername from "@/Pages/Blasts/AppBlastUsername.vue";
import AppBlastVariantReblast from "@/Pages/Blasts/Variants/AppBlastVariantReblast.vue";
import AppBlastVariantBlast from "@/Pages/Blasts/Variants/AppBlastVariantBlast.vue";
import AppBlastVariantCitat from "@/Pages/Blasts/Variants/AppBlastVariantCitat.vue";

export default {
    components:{AppBlastUsername,AppBlastVariantReblast,AppBlastVariantBlast,AppBlastVariantCitat},
    props: {
        blast: {
            required: true,
            type: Object
        }
    }
}
</script>

<style scoped>

</style>
