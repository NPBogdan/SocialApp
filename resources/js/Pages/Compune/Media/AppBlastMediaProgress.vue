<template>
    <div class="w-full h-1 bg-gray-500">
        <div class="h-1  bg-blue-200" :style="`width:${progress}%;`"></div>
    </div>
</template>

<script>
export default {
    name: "AppBlastMediaProgress",
    props: {
        progress: {
            type: Number,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
