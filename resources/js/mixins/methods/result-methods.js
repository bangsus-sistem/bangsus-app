
const resultMethods = {

    /**
    | --------------------------------------------------------------
    | RESULT FUNCTIONALITIES
    | --------------------------------------------------------------
    | Result functionalities are basically any methods that would
    | complement the result fetching of an index page.
    | There's also some error handling that could relate to the
    | State functionalities.
    */

    /**
     * Parse result items from non-single row data return.
     * 
     * @param  {Object}  res
     * @return {Object}
     */
    parseResultItems(res) {
        return res.data.items
    },

    /**
     * Parse result meta from non-single row data return.
     * 
     * @param  {Object}  res
     * @return {Object}
     */
    parseResultMeta(res) {
        return res.data.meta
    },

    /**
     * Set the result items.
     * 
     * @param  {Object}  res
     * @return {void}
     */
    setResultItems(res) {
        this.result.items = this.parseResultItems(res)
    },

    /**
     * Set the result meta values.
     * 
     * @param  {Object}  res
     * @return {void}
     */
    setResultMeta(res) {
        this.result.meta = this.parseResultMeta(res)
    },

    /**
     * Set the result.
     * 
     * @param  {Object}  res
     * @return {void}
     */
    setResult(res) {
        this.setResultItems(res)
        this.setResultMeta(res)
    },

    /**
     * 
     * @param  {Boolean}  spinner 
     * @param  {String}   spinnerExpense 
     * @return {void}
     */
    getAndSetResult(spinner = true, spinnerExpense = 'page') {
        
        // Determine the loading spinner that would be spinned.
        if (spinner) {
            switch (spinnerExpense) {
                case 'page' :
                    this.startPageLoading()
                    break;
                case 'result' :
                    this.startResultLoading()
                    break;
            }
        }

        // Fetch result.
        this.fetchResult()
            .then(res => {
                this.setResult(res)
                this.refreshRouteWithQuery()
            })
            .catch(err => {
                this.handleResultError(err)
            })
            .finally(() => {
                // Determine the loading spinner that would be spinned.
                if (spinner) {
                    switch (spinnerExpense) {
                        case 'page' :
                            this.stopPageLoading()
                            break;
                        case 'result' :
                            this.stopResultLoading()
                            break;
                    }
                }
            })
    },

    // --------------------------------------------------------------

}

export default resultMethods
