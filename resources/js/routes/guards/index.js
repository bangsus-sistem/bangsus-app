const guards = {

    /**
     * Check if the user is authenticated.
     * If the user is unauthenticated then the function will
     * redirect to login route.
     */
    authenticated: (to, from, next) => {
        axios.get('/ajax/utils/authenticated')
            .then(res => {
                if (res.data['logged_in']) next()
                else next({ name: 'login' })
            })
            .catch(err => {
                
            })
    },

    /**
     * Check if the user is unauthenticated.
     * If the user is authenticated then return to previous route.
     */
    unauthenticated: (to, from, next) => {
        axios.get('/ajax/utils/authenticated')
            .then(res => {
                if (res.data['logged_in']) next({ name: from.name || 'dashboard' })
                else next()
            })
            .catch(err => {
                
            })
    },



    /**
     * For test purposes only.
     */
    access: (to, from, next) => {
        next()
    },
}

export default guards