
const stateMethods = {
    
    /**
    | ---------------------------------------------------------------
    | STATE FUNCTIONALITIES
    | ---------------------------------------------------------------
    | State functionalities is a pretty powerful functionalities
    | considering every page component needs state to represent
    | the loading, error, and message.
    */
    
    /**
     * Start the loading of a page.
     * 
     * @return {void}
     */
    startPageLoading() {
        this.state.page.loading = true
    },

    /**
     * Stop the loading of a page.
     * 
     * @return {void}
     */
    stopPageLoading() {
        this.state.page.loading = false
    },

    /**
     * Set the page message.
     * 
     * @param  {Boolean}  error
     * @return {void}
     */
    setPageError(error) {
        this.state.page.error = error
    },

    /**
     * Reset the page error.
     * 
     * @return {void}
     */
    resetPageError() {
        this.state.page.error = null
    },

    /**
     * Set the page message.
     * 
     * @param  {Object}  err
     * @return {void}
     */
    setPageMessage(err) {
        this.state.page.message = this.parseErrorMessage(err)
    },

    /**
     * Reset the page message.
     * 
     * @return {void}
     */
    resetPageMessage() {
        this.state.page.message = null
    },
    
    /**
     * Start the loading of a result fetching.
     * 
     * @return {void}
     */
    startResultLoading() {
        this.state.result.loading = true
    },

    /**
     * Stop the loading of a result fetching.
     * 
     * @return {void}
     */
    stopResultLoading() {
        this.state.result.loading = false
    },

    /**
     * Start the loading of a form.
     * 
     * @return {void}
     */
    startFormLoading() {
        this.state.form.loading = true
    },

    /**
     * Start the loading of a form.
     * 
     * @return {void}
     */
    stopFormLoading() {
        this.state.form.loading = false
    },

    // --------------------------------------------------------------

}

export default stateMethods
