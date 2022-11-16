<template>
    <form class="flex" @submit.prevent="submit">
        <img :src="$user.avatar" class="w-12 h-12 mr-3 rounded-full" alt="User avatar">

        <div class="flex-grow">
            <app-blast-compune-textarea
                v-model="form.body"
                placeholder="Lasă un comentariu..."
            />
            <span class="text-gray-600"> {{ media }}</span>

            <app-blast-media-progress class="mb-4" :progress="media.progress" v-if="media.progress"/>

            <app-blast-image-preview
                :images="media.images"
                v-if="media.images.length"
                @removed="removeImage"
            />

            <app-blast-video-preview
                :video="media.videos"
                v-if="media.videos"
                @removed="removeVideo"
            />


            <div class="flex justify-between">
                <ul class="flex items-center">
                    <li class="mr-4">
                        <app-blast-compune-media-button
                            id="media-compune"
                            @selected="manageMediaSelected"
                        />
                    </li>
                </ul>

                <div class="flex items-center justify-end">
                    <app-blast-compune-limit
                        :body="form.body"
                        class="mr-2"
                    />
                    <button
                        type="submit"
                        class="bg-red-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none">
                        Trimite
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>

import AppBlastMediaProgress from "@/Pages/Compune/Media/AppBlastMediaProgress.vue";
import AppBlastCompuneTextarea from "@/Pages/Compune/AppBlastCompuneTextarea.vue";
import AppBlastCompuneLimit from "@/Pages/Compune/AppBlastCompuneLimit.vue";
import AppBlastCompuneMediaButton from "@/Pages/Compune/Media/AppBlastCompuneMediaButton.vue";
import AppBlastImagePreview from "@/Pages/Compune/Media/AppBlastImagePreview.vue";
import AppBlastVideoPreview from "@/Pages/Compune/Media/AppBlastVideoPreview.vue";
import compose from '../../Mixins/compose.js'

export default {
    name:'AppBlastReplyCompune',
    props:{
        blast:{
            type:Object,
            required:true
        }
    },
    components: {
        AppBlastMediaProgress,
        AppBlastCompuneTextarea,
        AppBlastCompuneLimit,
        AppBlastCompuneMediaButton,
        AppBlastImagePreview,
        AppBlastVideoPreview
    },
    mixins: [
        compose
    ],
    methods:{
        async post(){
            console.log('Merge')
        }
    }
}
</script>
