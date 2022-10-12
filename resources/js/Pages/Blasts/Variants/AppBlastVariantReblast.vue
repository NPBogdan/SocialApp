<template>
    <div>
        <div class="text-gray-600 font-medium text-xs flex items-center mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current text-gray-600 w-3 mr-2">
                <path
                      d="M5.41 16H18a2 2 0 0 0 2-2 1 1 0 0 1 2 0 4 4 0 0 1-4 4H5.41l2.3 2.3a1 1 0 0 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 1 1 1.42 1.4L5.4 16zM6 8a2 2 0 0 0-2 2 1 1 0 0 1-2 0 4 4 0 0 1 4-4h12.59l-2.3-2.3a1 1 0 1 1 1.42-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.42-1.4L18.6 8H6z"/>
            </svg>

            <span>{{ blast.user.name }} reply</span>
        </div>

        <component
            :is="`app-blast-variant-${blast.original_blast.type}`"
            :blast="blast.original_blast"
        />
    </div>
</template>

<script>
import AppBlastVariantBlast from "@/Pages/Blasts/Variants/AppBlastVariantBlast.vue";
import AppBlastActionGroup from "@/Pages/Blasts/Actiuni/AppBlastActionGroup.vue";
export default {
    components:{
        AppBlastVariantBlast,AppBlastActionGroup
    },
    props: {
        blast: {
            required: true,
            type: Object
        }
    }
}
</script>

