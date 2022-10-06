<template>
    <div class="w-full inline-block p-4 border-b border-gray-800 hover:bg-gray-800">
        <component
            :is="`app-blast-variant-${blast.type}`"
            :blast="blast"
        />
    </div>
</template>

<script>
    export default {
        props: {
            blast: {
                required: true,
                type: Object
            }
        }
    }
</script>
