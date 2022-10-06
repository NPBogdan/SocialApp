<template>
    <form class="flex" @submit.prevent="submit">
        <div class="mr-3">
            <img :src="$user.avatar" class="w-12 rounded-full">
        </div>
        <div class="flex-grow">
            <textarea
                class="bg-gray-900 w-full outline-none text-lg resize-none mb-2"
                placeholder="Care este treaba?"
                autofocus
                v-model="form.body">
            </textarea>

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

export default{
    data(){
        return{
            form:{
                body:''
            }
        }
    },
    methods:{
        async submit(){
            await axios.post('/api/blasts',this.form)
        }
    }
}
</script>

<style scoped>

</style>
