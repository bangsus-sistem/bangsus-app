import Vue from 'vue'
import config from '../components/register'
import lodash from 'lodash'

class Component
{
    /**
     * Main entry point.
     */
    static main() {
        this.registerMainView()
        this.registerComponents()
    }

    /**
     * Register the main App View.
     */
    static registerMainView() {
        Vue.component('app', require('../App.vue').default);
    }

    /**
     * Register components.
     */
    static registerComponents() {
        const { prefix, components } = config

        Object.keys(components).forEach(componentDirective => {
            let component = components[componentDirective]
            componentDirective = prefix + '-' + componentDirective

            Vue.component(componentDirective, component)
        })
    }

    /**
     * Generate component name
     */
    static parseComponentName(prefix, component) {
        const componentDirs = component.split('/')
        const componentDirective = prefix + '-' + lodash.kebabCase(
            componentDirs[componentDirs.length - 1]
        )

        return componentDirective
    }

    static parseComponentDir(component) {
        return '../components/' + component
    }
}

export default Component