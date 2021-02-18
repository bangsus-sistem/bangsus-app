import Vue from 'vue'
import Component from './component'
import Plugin from './plugin'

class Compiler
{
    /**
     * Main compiler entry point.
     */
    static compile() {
        this.compileComponent()
    }

    /**
     * Return the new Vue instance.
     */
    static getInstance() {
        const router = Plugin.getRouterInstance()
        const store = Plugin.getStoreInstance()
        Plugin.initiateMobileDetection()
        Plugin.initiateFragment()

        return new Vue({
            el: '#app',
            router,
            store,
        })
    }

    /**
     * Compile component
     */
    static compileComponent() {
        Component.main()
    }
}

export default Compiler