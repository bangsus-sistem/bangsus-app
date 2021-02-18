<template>
    <div :class="'alert alert-dismissible fade show ' + alertClass">
        <slot></slot>
        <bsb-close-button :data-dismiss="dataDismiss" @click="click($event)" />
    </div>
</template>

<script>
export default {
    props: {
        color: {
            type: String,
            default: 'primary',
        },
        preventOnClick: {
            type: Boolean,
            default: false,
        }
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
        },
        dataDismiss() {
            return this.preventOnClick ? '' : 'alert'
        }
    },
    methods: {
        click(event) {
            if (this.preventOnClick) {
                event.preventDefault()
                this.$emit('closed')
            }
        }
    }
}
</script>