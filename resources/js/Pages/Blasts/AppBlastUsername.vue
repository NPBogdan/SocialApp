<template>
    <span class="text-gray-300 font-bold">{{ user.name }}
        <span class="text-gray-600 font-normal">@{{ user.username }}</span>
    </span>
</template>

<script>
export default {
    name:'AppBlastUsername',
    props:{
        user: {
            required: true,
            type: Object
        }
    }
}
</script>

