<template>
    <div v-click-out-side="close" class="relative">
        <div @click.prevent="open = !open">
            <slot name="trigger"/>
        </div>

        <div v-show="open" class="absolute bg-gray-900 z-50 rounded-lg w-56 overflow-hidden shadow-light">
            <slot/>
        </div>
    </div>
</template>

<script>
import clickOutSide from "@mahdikhashan/vue3-click-outside";

export default {
    name: "AppDropdown",
    directives: {
        clickOutSide,
    },
    data() {
        return {
            open: false
        }
    },
    methods: {
        close() {
            this.open = false
        }
    },

}
</script>
