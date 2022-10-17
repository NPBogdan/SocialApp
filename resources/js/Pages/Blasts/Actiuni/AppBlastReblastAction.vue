<template>
    <div>
<!--    Daca nu l-ai distribuit ,il distribui-->
        <app-dropdown v-if="!reblasted">
            <template #trigger>
                <app-blast-reblast-action-button
                    :blast="blast"
                />
            </template>
            <app-dropdown-item @click.prevent="reblastOrUnreblast">
                Reblast
            </app-dropdown-item>
            <app-dropdown-item>
                Citeaza un blast
            </app-dropdown-item>
        </app-dropdown>
<!--    Altfel,elimina distribuirea -->
        <app-blast-reblast-action-button
            v-else
            :blast="blast"
            @click.prevent="reblastOrUnreblast"
        />
    </div>
</template>

<script>
import AppDropdown from "@/Pages/Blasts/Dropdown/AppDropdown.vue";
import AppDropdownItem from "@/Pages/Blasts/Dropdown/AppDropdownItem.vue";
import {BeakerIcon} from '@heroicons/vue/24/solid'
import {mapGetters,mapActions} from 'vuex'
import AppBlastReblastActionButton from "@/Pages/Blasts/Actiuni/AppBlastReblastActionButton.vue";

export default {
    name: "AppBlastReblastAction",
    components: {AppBlastReblastActionButton, AppDropdownItem, AppDropdown, BeakerIcon},
    props: {
        blast: {
            required: true,
            type: Object
        }
    },
    computed: {
        ...mapGetters({
            reblasts: 'reblasts/reblasts'
        }),
        reblasted() {
            return this.reblasts.includes(this.blast.id);
        }
    },
    methods:{
        ...mapActions({
            reblastBlast:'reblasts/reblastBlast',
            unreblastBlast:'reblasts/unreblastBlast',
        }),
        reblastOrUnreblast(){
            if(this.reblasted){
                this.unreblastBlast(this.blast)
                return
            }
            this.reblastBlast(this.blast)
        }
    }
}
</script>
