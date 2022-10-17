<template>
    <form class="flex" @submit.prevent="submit">
        <div class="mr-3">
            <img :src="$user.avatar" class="w-12 rounded-full">
        </div>
        <div class="flex-grow">
            <app-blast-compune-textarea
                v-model="form.body"
            />
            <div class="flex justify-between">
                <div>
                    Actions
                </div>
                <div>
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

export default {
    components: {AppBlastCompuneTextarea},
    data() {
        return {
            form: {
                body: ''
            }
        }
    },
    methods: {
        async submit() {
            await axios.post('/api/blasts', this.form)
            this.form.body = ''
        }
    },
}
</script>

<style scoped>

</style>
