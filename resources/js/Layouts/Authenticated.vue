<template>
    <div>
        <div class="container mx-auto">
            <slot/>
        </div>
    </div>
    <modals-container></modals-container>
</template>

<script >
import { ModalsContainer } from 'vue-final-modal'

export default {
    components: {
        ModalsContainer
    }
}
</script>
