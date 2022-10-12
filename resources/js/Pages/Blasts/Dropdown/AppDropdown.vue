<template>
    <div v-click-outside="close" class="relative">
        <div @click.prevent="open = !open">
            <slot name="trigger"/>
        </div>

        <div v-show="open" class="absolute bg-gray-900 z-50 rounded-lg w-56 overflow-hidden shadow-light">
            <slot/>
        </div>
    </div>
</template>

<script>

export default {
    name: "AppDropdown",
    data(){
        return {
            open:true
        }
    },
    methods:{
        close(){
            this.open = false
        }
    },

}
</script>
