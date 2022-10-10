<template>
    <ul class="flex mt-4">
        <li class="w-3/12">
            <app-blast-reply-action/>
        </li>
        <li class="w-3/12">
            <app-blast-reblast-action/>
        </li>
        <li class="w-3/12">
            <app-blast-like-action/>
        </li>
    </ul>
</template>

<script>
import AppBlastReplyAction from "@/Pages/Blasts/Actiuni/AppBlastReplyAction.vue";
import AppBlastReblastAction from "@/Pages/Blasts/Actiuni/AppBlastReblastAction.vue";
import AppBlastLikeAction from "@/Pages/Blasts/Actiuni/AppBlastLikeAction.vue";

export default {
    name: "AppBlastActionGroup",
    components: {AppBlastReblastAction, AppBlastLikeAction, AppBlastReplyAction}
}
</script>

<style scoped>

</style>
