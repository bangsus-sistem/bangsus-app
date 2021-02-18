<template>
    <bsb-button type="submit" :disabled="loading" :size="size" @click="$emit('click', $event)" :block="block">
        <bsb-spinner size="sm" v-if="loading" />
        <slot></slot>
    </bsb-button>
</template>

<script>
export default {
    props: {
        loading: {
            type: Boolean,
            default: true,
        },
        size: {
            type: String,
            default: 'md',
        },
        block: {
            type: Boolean,
            default: false,
        }
    },
}
</script>