<template>
    <div class="flex w-full">
        <img :src="blast.user.avatar" class="w-12 h-12 mr-3 rounded-full">
        <div class="flex-grow">
            <app-blast-username
                :user="blast.user"
            />
            <p class="text-gray-300 whitespace-pre-wrap">
                {{ blast.body }}
            </p>

            <div class="flex flex-wrap mb-4 mt-4" v-if="images.length">
                <div class="w-6/12 flex-grow"
                     v-for="(image,index) in images"
                     :key="index">
                    <img :src="image.url" alt="Imagine" class="rounded-lg">
                </div>
            </div>

            <div v-if="video">
                <video :src="video.url" controls class="rounded-lg"></video>
            </div>
            <app-blast-action-group
                :blast="blast"
            />
        </div>
    </div>
</template>

<script>
import AppBlastUsername from "@/Pages/Blasts/AppBlastUsername.vue";
import AppBlastActionGroup from "@/Pages/Blasts/Actiuni/AppBlastActionGroup.vue"

export default {
    components: {AppBlastUsername, AppBlastActionGroup},
    props: {
        blast: {
            required: true,
            type: Object
        }
    },
    computed: {
        images() {
            return this.blast.media.data.filter(media => media.type === 'image')
        },
        video() {
            return this.blast.media.data.filter(media => media.type === 'video')[0]
        },
    }
}
</script>
