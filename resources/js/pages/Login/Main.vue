<template>
    <bsb-screen>
        <template v-slot:mobile>
            <Mobile />
            <bsb-flashers :flashers="flashers" @closed="closeFlasher($event)" />
        </template>
        <template v-slot:desktop>
            <Desktop />
            <bsb-flashers :flashers="flashers" @closed="closeFlasher($event)" />
        </template>
    </bsb-screen>
</template>

<script>
import Mobile from './Mobile'
import Desktop from './Desktop'

export default {
    components: {
        Mobile,
        Desktop,
    },
    computed: {
        flashers() {
            return this.$store.getters['utils/flashers/flashers']
        },
    },
    methods: {
        closeFlasher(id) {
            this.$store.dispatch('utils/flashers/closeFlasher', id)
        }
    },
    created() {
        this.$store.dispatch('utils/flashers/buildStoredFlashersTimeout')
    },
}
</script>