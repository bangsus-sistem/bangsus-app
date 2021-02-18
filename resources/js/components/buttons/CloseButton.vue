<template>
    <button type="button" class="close" @click="click($event)">
        <bsb-icon icon="times" />
    </button>
</template>

<script>
export default {
    methods: {
        click(event) {
            this.$emit('click', event)
        }
    }
}
</script>