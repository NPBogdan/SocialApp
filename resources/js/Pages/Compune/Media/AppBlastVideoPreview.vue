<template>
    <div class="mb-4 relative">
        <video
            :src="generateVideoPreview(video)"
            controls
            preload
            class="rounded-lg">
        </video>

        <a
            href="#"
            class="bg-gray-900 w-8 h-8 rounded-full absolute top-0 right-0 mt-3 mr-3 flex items-center justify-center"
            @click="$emit('removed',video)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 class="fill-current text-gray-300">
                <path
                    d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
            </svg>

        </a>
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
