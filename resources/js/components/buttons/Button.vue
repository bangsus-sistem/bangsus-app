<template>
    <button :class="[{ 'btn': true, 'active': active, 'btn-block': block }, buttonClass]" @click="$emit('click', $event)">
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        size: {
            type: String,
            default: 'md'
        },
        buttonType: {
            type: String,
            default: 'regular',
        },
        color: {
            type: String,
            default: 'primary'
        },
        active: {
            type: Boolean,
            default: false
        },
        block: {
            type: Boolean,
            default: false,
        }
    },
    computed: {
        buttonClass() {
            let buttonSizeClass
            let buttonTypeColorClass

            switch (this.size) {
                case 'sm' :
                    buttonSizeClass = 'btn-sm'
                    break
                case 'lg' :
                    buttonSizeClass = 'btn-lg'
                    break
                case 'md' :
                default :
                    buttonSizeClass = ''
            }

            buttonTypeColorClass = 'btn-'
            switch (this.buttonType) {
                case 'outline' :
                    buttonTypeColorClass += 'outline-'
                    break
                default :
                    buttonTypeColorClass += ''
            }

            switch (this.color) {
                case 'primary' :
                case 'secondary' :
                case 'success' :
                case 'danger' :
                case 'warning' :
                case 'info' :
                case 'light' :
                case 'dark' :
                    buttonTypeColorClass += this.color
                    break
                default :
                    buttonTypeColorClass = ''
            }

            return buttonSizeClass + ' ' + buttonTypeColorClass
        }
    },
}
</script>