<template>
    <form class="flex" @submit.prevent="submit">
        <img :src="$user.avatar" class="w-12 h-12 mr-3 rounded-full" alt="User avatar">

        <div class="flex-grow">
            <app-blast-compune-textarea
                v-model="form.body"
                placeholder="Scrie aici..."
            />
            <div class="flex justify-between">
                <ul class="flex items-center">

                </ul>
                <div class="flex items-center justify-end">
                    <app-blast-compune-limit
                        :body="form.body"
                        class="mr-2"
                    />
                    <button
                        type="submit"
                        class="bg-red-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none">
                        Reblast
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
import {mapActions} from "vuex";

export default {
    name: 'AppBlastReblastCompune',
    components: {
        AppBlastMediaProgress,
        AppBlastCompuneTextarea,
        AppBlastCompuneLimit,
        AppBlastCompuneMediaButton,
        AppBlastImagePreview,
        AppBlastVideoPreview
    },
    props: {
        blast: {
            type: Object,
            required: true
        }
    },
    mixins: [
        compose
    ],
    methods: {
        async post() {
            await this.citareBlast({
                blast: this.blast,
                data: this.form
            })

            this.$emit('success')
        },
        ...mapActions({
            citareBlast: 'cronologie/citareBlast'
        })
    },
    emits: ['success']
}
</script>
