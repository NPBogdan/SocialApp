<template>
    <div class="h-10 w-10 relative">
        <svg viewBox="0 0 120 120" class="transform -rotate-90">
            <circle
            cx="60"
            cy="60"
            fill="none"
            stroke-width="8"
            class="stroke-current text-gray-700"
            :r="raza"/>

            <circle
                cx="60"
                cy="60"
                fill="none"
                stroke-width="8"
                class="stroke-current text-blue-300"
                :r="raza"
                :stroke-dasharray="dash"
                :stroke-dashoffset="offset"
            />
        </svg>
    </div>
</template>

<script>
export default {
    name: "AppBlastCompuneLimit",
    data(){
        return {
            raza : 30
        }
    },
    computed:{
        dash(){
            return 2 * Math.PI * this.raza
        },
        offset(){
            let circ = this.dash
            let progress = 90 / 100

            return circ * (1 - progress)
        }
    }
}
</script>

<style scoped>

</style>
