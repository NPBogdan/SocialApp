<template>
    <div class="mb-4">
        <video
            :src="generateVideoPreview(video)"
            controls
            preload
            class="rounded-lg">
        </video>
    </div>
</template>

<script>
export default {
    name: "AppBlastVideoPreview",
    props: {
        video: {
            required: true,
            type: File
        }
    },
    methods: {
        generateVideoPreview(video) {
            return URL.createObjectURL(video)
        }
    }
}
</script>

<style scoped>

</style>
