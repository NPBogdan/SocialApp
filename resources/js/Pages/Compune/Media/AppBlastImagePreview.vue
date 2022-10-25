<template>
    <div class="flex flex-wrap mb-4">
        <div
        v-for="(image,index) in images"
        :key="index"
        class="w-6/12 flex-grow relative"
        >
            <img :src="generateImagePreview(image)" alt="" class="rounded-lg">
            <a
                href="#"
                class="bg-gray-900 w-8 h-8 rounded-full absolute top-0 right-0 mt-3 mr-3 flex items-center justify-center"
                @click="$emit('removed',image)"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     class="fill-current text-gray-300">
                    <path
                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                </svg>

            </a>

        </div>
    </div>
</template>

<script>
export default {
    name: "AppBlastImagePreview",
    props: {
        images: {
            required: false,
            type: Array
        }
    },
    methods:{
        generateImagePreview(image){
            return URL.createObjectURL(image)
        }
    }
}
</script>

<style scoped>

</style>
