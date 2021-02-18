<template>
    <bsb-flasher-wrapper>
        <bsb-alert-dismissible
            v-for="(flasher, i) in flashers"
            :color="flasher.color"
            :key="i"
            :prevent-on-click="true"
            @closed="closed(flasher.id)"
        >
            {{ flasher.content }}
        </bsb-alert-dismissible>
    </bsb-flasher-wrapper>
</template>

<script>
export default {
    props: {
        flashers: {
            type: Array,
            default() {
                return []
            }
        }
    },
    methods: {
        closed(id) {
            this.$emit('closed', id)
        }
    }
}
</script>