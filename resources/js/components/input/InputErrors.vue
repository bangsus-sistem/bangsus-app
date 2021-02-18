<template>
    <div>
        <bsb-input
            :type="type"
            :step="step"
            :value="value"
            @input="$emit('input', $event)"
            :class="{ 'is-invalid': errors.length > 0 }"
            :readonly="readonly"
        />
        <bsb-errors :errors="errors" />
    </div>
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
            default: '',
        },
        errors: {
            type: Array,
            default() {
                return []
            },
        },
        readonly: {
            type: Boolean,
            default: false,
        }
    },
}
</script>