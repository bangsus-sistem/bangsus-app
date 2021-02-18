<template>
    <input
        :type="type"
        :step="step"
        :class="'form-control ' + inputSize"
        :value="value"
        @input="$emit('input', $event.target.value)"
        :readonly="readonly"
    >
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'text',
        },
        step: {
            default: null,
        },
        value: {
            default: ''
        },
        size: {
            type: String,
            default: 'md'
        },
        readonly: {
            type: Boolean,
            default: false,
        }
    },
    computed: {
        inputSize() {
            let inputSize = ''

            switch (this.size) {
                case 'sm' :
                case 'lg' :
                    inputSize += 'form-control-' + this.size
                    break
                default :
                    inputSize = ''
            }

            return inputSize
        }
    },
}
</script>