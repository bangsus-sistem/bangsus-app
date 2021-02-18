
export default {
    state: {
        flashers: JSON.parse(localStorage.getItem('flashers')) || [],
        intervered: false,
    },
    getters: {
        flashers: state => state.flashers,
    },
    mutations: {
        addFlasher(state, { color, content }) {
            state.intervered = true

            const flasher = {
                id: state.flashers.length - 1,
                color,
                content,
            }
            state.flashers.push(flasher)
            localStorage.setItem('flashers', JSON.stringify(state.flashers))
            
            window.setTimeout(() => {
                this.dispatch('utils/flashers/closeFlasher', flasher.id)
            }, 3 * 1000)
        },
        closeFlasher(state, id) {
            state.intervered = true

            const i = lodash.findIndex(state.flashers, (flasher) => flasher.id == id)
            state.flashers.splice(i, 1)
            localStorage.setItem('flashers', JSON.stringify(state.flashers))
        },
        buildStoredFlashersTimeout(state) {
            if ( ! state.intervered) {
                state.flashers.forEach(flasher => {
                    window.setTimeout(() => {
                        this.dispatch('utils/flashers/closeFlasher', flasher.id)
                    }, 3 * 1000)
                })
            }
        }
    },
    actions: {
        addFlasher(context, flashObject) {
            context.commit('addFlasher', flashObject)
        },
        closeFlasher(context, id) {
            context.commit('closeFlasher', id)
        },
        buildStoredFlashersTimeout(context) {
            context.commit('buildStoredFlashersTimeout')
        },
    },
}