<template>
    <a href="#" class="flex items-center text-base"
       @click.prevent="$vfm.show({component:AppBlastReplyModal,bind:{blast:this.blast}})"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
             class="fill-current text-gray-600 w-5 mr-2">
            <path class="heroicon-ui"
                  d="M2 15V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v15a1 1 0 0 1-1.7.7L16.58 17H4a2 2 0 0 1-2-2zM20 5H4v10h13a1 1 0 0 1 .7.3l2.3 2.29V5z"/>
        </svg>

        <span class="text-gray-600">{{ blast.replies_count }}</span>
    </a>
</template>

<script>

import AppBlastReplyModal from "../../Modale/AppBlastReplyModal.vue";

export default {
    name: "AppBlastReplyAction",
    props: {
        blast: {
            type: Object,
            required: true
        }
    },
    // methods:{
    //     dynamicReply() {
    //         this.$vfm.show({
    //             component: 'AppBlastReplyModal',
    //             bind: {
    //                 blast: this.blast
    //             },
    //             on:{
    //                 success(close) {
    //                     console.log('success')
    //                     close()
    //                 },
    //             }
    //         })
    //     }
    // },
    data() {
        return {
            AppBlastReplyModal
        }
    }
}
</script>
