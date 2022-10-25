<template>
    <a href="#" class="flex items-center text-base">
        <BeakerIcon
            class="h-6 w-6 text-gray-500"
            :class="{'text-green-600':reblasted}"
        />
        <span
            class="text-gray-600"
            :class="{'text-green-600':reblasted}"
        >{{ blast.reblasts_count }}
        </span>
    </a>
</template>

<script>
import {BeakerIcon} from '@heroicons/vue/24/solid'
import {mapGetters} from 'vuex'
export default  {
    name: "AppBlastReblastActionButton",
    components: {BeakerIcon},
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
    }
}
</script>
