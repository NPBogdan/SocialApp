<template>
    <form class="flex" @submit.prevent="submit">
        <div class="mr-3">
            <img :src="$user.avatar" class="w-12 rounded-full">
        </div>
        <div class="flex-grow">
            <app-blast-compune-textarea
                v-model="form.body"
            />
            <span class="text-gray-600"> {{media}}</span>
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
                        Blast
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import axios from 'axios'
import AppBlastCompuneTextarea from "@/Pages/Compune/AppBlastCompuneTextarea.vue";
import AppBlastCompuneLimit from "@/Pages/Compune/AppBlastCompuneLimit.vue";
import AppBlastCompuneMediaButton from "@/Pages/Compune/Media/AppBlastCompuneMediaButton.vue"

export default {
    components: {AppBlastCompuneTextarea, AppBlastCompuneLimit, AppBlastCompuneMediaButton},
    data() {
        return {
            form: {
                body: '',
                media: []
            },
            media: {
                images: [],
                videos: null
            },
            mediaTypes : {}
        }
    },
    methods: {
        async submit() {
            await axios.post('/api/blasts', this.form)
            this.form.body = ''
        },

        manageMediaSelected(files) {
            Array.from(files).slice(0, 4).forEach((file) => {
                if(this.mediaTypes.image.includes(file.type)){
                    this.media.images.push(file)
                }

                if(this.mediaTypes.video.includes(file.type)){
                    this.media.videos = file
                }

                /*Daca sunt urcate imagini impreuna cu videoclipuri atunci vom sterge imaginile
                deoarece noi putem sa urcam doar unul dintre cele doua tipuri de media */
                if(this.media.videos){
                    this.media.images = []
                }
            })
        },

        //Luam tipurile de media pe care le putem urca
        async getMediaTypes (){
            let response = await axios.get('/api/media/types')

            this.mediaTypes = response.data.data
        }
    },
    mounted() {
        this.getMediaTypes()
    }
}
</script>

<style scoped>

</style>
