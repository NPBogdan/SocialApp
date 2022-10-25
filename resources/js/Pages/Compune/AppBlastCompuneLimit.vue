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
                :class="{
                    '!text-red-300' : procentajPesteLimita
                }"
            />
        </svg>
    </div>
</template>

<script>
export default {
    name: "AppBlastCompuneLimit",
    props:{
      body:{
          required:true,
          type:String
      }
    },
    data(){
        return {
            raza : 30
        }
    },
    computed:{
        dash(){
            return 2 * Math.PI * this.raza
        },
        procentaj(){
            return Math.round((this.body.length * 100) / 280 )//280 de caractere limita
        },
        afiseazaProcentaj(){
            return this.procentaj <= 100 ? this.procentaj : 100 // In caza ca sunt mai mult de 100 de caractere trebuie o limita pentru ca cercul sa nu treaca de limita
        },
        procentajPesteLimita(){
          return this.procentaj > 100
        },
        offset(){
            let circ = this.dash
            let progress = this.afiseazaProcentaj / 100

            return circ * (1 - progress)
        }
    }
}
</script>

<style scoped>

</style>
