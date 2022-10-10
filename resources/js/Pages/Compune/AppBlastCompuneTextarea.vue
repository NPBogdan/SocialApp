<template>
    <textarea
        class="bg-gray-900 w-full outline-none resize-none text-lg mb-2"
        placeholder="Care este treaba?"
        autofocus
        @input="$emit('update:modelValue', $event.target.value); resize($event)"
        :value="modelValue"
    ></textarea>
</template>

<script>
export default {
    props:{
      modelValue:{
          required:false
      }
    },
    methods:{
        resize(e){
            e.target.style.height = 'auto';
            e.target.style.height = `${e.target.scrollHeight}px`;
        }
    }
}
</script>

<style scoped>

</style>
