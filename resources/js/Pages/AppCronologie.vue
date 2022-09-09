<template>
    <div>
        <AppBlast
        v-for="blast in blasts.blasts"
        :key="blast.id"
        :blast="blast"
        />
    </div>
</template>

<script setup>
import {onMounted} from 'vue';
import {reactive} from "vue";
import axios from 'axios';
import AppBlast from "@/Pages/Blasts/AppBlast.vue";

const blasts = reactive({
    blasts: []
})

const getBlasts = async () => {
    let response = await axios.get('/api/cronologie');

    blasts.blasts = response.data.data;
}

onMounted(() => {
    getBlasts()
    console.log(blasts);
})
</script>
