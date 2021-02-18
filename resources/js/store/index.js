import flashers from './utils/flashers'

export default {
    modules: {

        // Utils package
        utils: {
            namespaced: true,
            modules: {

                // Utils.Flashers package
                flashers: {
                    namespaced: true,
                    ...flashers
                }
            }
        },
    }
}