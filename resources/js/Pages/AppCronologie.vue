<template>
    <div>
        <app-blast
            v-for="blast in blasts"
            :key="blast.id"
            :blast="blast"
        />
    </div>

    <div
        v-if="blasts.length"
        v-observe-visibility="scrollBottomCronologie">

    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
import AppBlast from "@/Pages/Blasts/AppBlast.vue";

export default {
    components: {AppBlast},
    data: function () {
        return {
            page: 1,
            lastPage: 1
        }
    },
    computed: {
        ...mapGetters({
            blasts: 'cronologie/blasts'
        }),
        urlWithPage() {
            return `api/cronologie?page=${this.page}`
        }
    },
    methods: {
        ...mapActions({
            getBlasts: 'cronologie/getBlasts'
        }),
        loadBlasts(){
            this.getBlasts(this.urlWithPage).then((response) => {
                console.log(response);
                this.lastPage = response.data.meta.last_page
            }).catch(function (error) {
                console.log(error)
            })
        },
        scrollBottomCronologie(isVisible) {
            if (!isVisible) {
                return
            }
            if (this.lastPage === this.page) {
                return
            }
            this.page++

            this.loadBlasts();
        }
    },
    mounted() {
        this.loadBlasts()
    }
}
</script>
