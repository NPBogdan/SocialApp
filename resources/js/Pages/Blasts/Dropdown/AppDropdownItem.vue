<template>
    <a href="#" class="block py-3 px-4 text-gray-600 hover:bg-gray-200" @click.prevent="handleClick">
       <slot/>
    </a>
</template>

<script>
export default {
    name: "AppDropdownItem",
    methods:{
        handleClick(e){
            this.$emit('click',e)
            this.$parent.close()
        }
    },
}
</script>

