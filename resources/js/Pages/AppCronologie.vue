<template>
        <div>
            <app-blast
            v-for="blast in blasts"
            :key="blast.id"
            :blast="blast"
            />
        </div>
</template>

<script>
import {mapActions,mapGetters} from 'vuex'
import AppBlast from "@/Pages/Blasts/AppBlast.vue";

export default {
    components: {AppBlast},
    computed: {
        ...mapGetters({
            blasts:'cronologie/blasts'
        }),
        count() {
            return this.$store.state.count
        },
    },
    methods: {
        ...mapActions({
            getBlasts: 'cronologie/getBlasts'
        })
    },
    mounted() {
        this.getBlasts()
    }
}
</script>
