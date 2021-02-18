<template>
    <div :class="spinnerClass"></div>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'border'
        },
        color: {
            type: String,
            default: 'dark'
        },
        size: {
            type: String,
            default: 'default'
        }
    },
    computed: {
        spinnerClass() {
            let spinnerTypeClass
            let spinnerColorClass
            let spinnerSizeClass

            switch (this.type) {
                case 'grow' :
                    spinnerTypeClass = 'spinner-grow'
                    break
                case 'border' :
                default :
                    spinnerTypeClass = 'spinner-border'
            }

            switch (this.color) {
                case 'primary' :
                case 'secondary' :
                case 'success' :
                case 'danger' :
                case 'warning' :
                case 'info' :
                case 'light' :
                    spinnerColorClass = 'text-' + this.color
                    break
                case 'dark' :
                default :
                    spinnerColorClass = ''
            }

            switch (this.size) {
                case 'sm' :
                    spinnerSizeClass = spinnerTypeClass + '-sm'
                    break
                case 'default' :
                default :
                    spinnerSizeClass = ''
            }

            return spinnerTypeClass + ' ' + spinnerColorClass + ' ' + spinnerSizeClass
        }
    }
}
</script>