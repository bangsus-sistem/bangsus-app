<template>
    <div :class="'alert ' + alertClass">
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        color: {
            type: String,
            default: 'primary'
        },
    },
    computed: {
        alertClass() {
            let alertColorClass = 'alert-'

            switch (this.color) {
                case 'primary' :
                case 'secondary' :
                case 'success' :
                case 'danger' :
                case 'warning' :
                case 'info' :
                case 'light' :
                    alertColorClass += this.color
                    break
                case 'dark' :
                default :
                    alertColorClass = ''
            }

            return alertColorClass
        }
    },
}
</script>