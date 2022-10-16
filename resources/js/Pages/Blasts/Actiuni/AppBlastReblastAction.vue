<template>
    <app-dropdown>
        <template #trigger>
            <a href="#" class="flex items-center text-base">
                <BeakerIcon class="h-6 w-6 text-gray-500"
                            :class="{'text-green-600':reblasted}"
                />
                <span
                    class="text-gray-600"
                    :class="{'text-green-600':reblasted}"
                >
                    {{ blast.reblasts_count }} {{ reblasted }}
                </span>
            </a>
        </template>
        <app-dropdown-item>
            Reblast
        </app-dropdown-item>
        <app-dropdown-item>
            Citeaza un blast
        </app-dropdown-item>
    </app-dropdown>
</template>

<script>
import AppDropdown from "@/Pages/Blasts/Dropdown/AppDropdown.vue";
import AppDropdownItem from "@/Pages/Blasts/Dropdown/AppDropdownItem.vue";
import {BeakerIcon} from '@heroicons/vue/24/solid'
import {mapGetters} from 'vuex'

export default {
    name: "AppBlastReblastAction",
    components: {AppDropdownItem, AppDropdown, BeakerIcon},
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
