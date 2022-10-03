<template>
    <div>
        <div class="border-b-8 border-gray-800 p-4 w-full">
            <app-blast-compune/>
        </div>
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
import AppBlastCompune from "@/Pages/Compune/AppBlastCompune.vue";

export default {
    components: {AppBlast,AppBlastCompune},
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
        loadBlasts() {
            this.getBlasts(this.urlWithPage).then((response) => {

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

        Echo.private(`cronologie.${this.$user.id}`)
            .listen('.BlastWasCreated',(e) =>{
                console.log(e);
            })
    }
}
</script>
