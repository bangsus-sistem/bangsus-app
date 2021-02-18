<template>
    <a href="#" @click.prevent="toggleLoginMode">
        <template v-if="standardMode">
            Login menggunakan token 12 digit
        </template>
        <template v-else>
            Login menggunakan username dan password
        </template>
    </a>
</template>

<script>
export default {
    props: {
        standardModeVal: {
            required: true,
        },
    },
    created() {
        this.standardMode = this.standardModeVal
    },
    data() {
        return {
            standardMode: false,
        }
    },
    methods: {
        toggleLoginMode() {
            this.standardMode = ! this.standardMode
            this.$emit('toggleMode', this.standardMode)
        }
    }
}
</script>