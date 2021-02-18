<template>
    <i :class="iconClass"/>
</template>

<script>
export default {
    props: {
        plugin: {
            type: String,
            default: 'fa',
        },
        type: {
            type: String,
            default: 'solid'
        },
        icon: {
            required: true
        },
        color: {
            default: 'dark'
        }
    },
    computed: {
        iconClass() {
            switch (this.plugin) {
                case 'fa' :
                    return this.generateFontAwesomeClass()
                    break;
            }
        }
    },
    methods: {
        generateFontAwesomeClass() {
            let iconClass = ''

            switch (this.type) {
                case 'solid' :
                    iconClass += 'fas'
                    break;
                case 'regular' :
                    iconClass += 'far'
                    break;
                case 'light' :
                    iconClass += 'fal'
                    break;
                case 'duotone' :
                    iconClass += 'fad'
                    break;
                case 'brand' :
                    iconClass += 'fab'
                    break;
            }

            iconClass += ' fa-' + lodash.kebabCase(this.icon) + ' text-' + this.color

            return iconClass
        },
    }
}
</script>