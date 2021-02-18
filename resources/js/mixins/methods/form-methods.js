
const formMethods = {

    /**
    | ---------------------------------------------------------------
    | FORM FUNCTIONALITIES
    | ---------------------------------------------------------------
    | Form functionalities would be used to handle the form sub-
    | mission to the server all along with message and errors.
    */

    /**
     * Parse form data.
     * 
     * @param  {Object}  res
     * @return {Object}
     */
    parseFormData(res) {
        return res.data
    },

    /**
     * Parse the error feedbacks.
     * 
     * @param  {Object}  err 
     * @return {Object}
     */
    parseErrorFeedback(err) {
        return err.response.data.errors
    },

    /**
     * Set form data.
     * 
     * @param  {Object}  res
     * @return {void}
     */
    setFormData(res) {
        this.form.data = this.setFormDataWithoutParse(this.parseFormData(res))
    },

    /**
     * Set form data without parsing.
     * 
     * @param  {Object}  data
     * @return {void}
     */
    setFormDataWithoutParse(data) {
        this.form.data = data
    },

    /**
     * Return the form data.
     * 
     * @return {Object}
     */
    getFormData() {
        return this.form.data
    },

    /**
     * Reset the form data.
     * 
     * @return {void}
     */
    resetFormData() {
        this.form.data = {}
    },

    /**
     * Set the form errors.
     * 
     * @param  {Object}  err 
     * @return {void}
     */
    setFormErrors(err) {
        const deepSetter = (obj, indexes, val) => {
            let refObj = obj

            indexes = indexes.split('.')
            indexes.forEach((index, i) => {
                if (i == indexes.length - 1) {
                    refObj[index] = val
                } else {
                    refObj = refObj[index]
                }
            })
        }

        const deepGetter = (obj, indexes) => {
            let value = obj

            indexes = indexes.split('.')
            indexes.forEach(index => {
                if (index != '') value = value[index]
            })

            return value
        }

        const errors = this.parseErrorFeedback(err)
        
        const resetter = (prefix = '') => {
            // Loop object
            Object.keys(deepGetter(errors, prefix)).forEach(key => {
                // If the value is array, then we could assume that it could be the error index
                let index = prefix == '' ? key : prefix + '.' + key
                if (Array.isArray(deepGetter(errors, index))) {
                    
                    deepGetter(errors, index).forEach((error, key) => {
                        if (typeof error === 'string') {
                            deepSetter(this.form.errors, index, deepGetter(errors, index))
                        } else {
                            // This algorithm is to prevent nested key on loop
                            // such as #{...}.0.1.2.3

                            // Split the index
                            let indexes = index.split('.')
                            let newIndex = ''

                            // And with this subroutine we simply remove the latest
                            // index from exploded index by dot.
                            indexes.forEach((index, i) => {
                                if (indexes.length == 1) {
                                    newIndex += index
                                    return
                                } else {
                                    if (i == indexes.length - 1) return
                                    if (i != 0) newIndex += '.'
                                    newIndex += index
                                }
                            })

                            // Then we concatenate it with a new key.
                            index = newIndex + '.' + key
                            resetter(index)
                        }
                    })
                } else {
                    resetter(index)
                }
            })
        }
        
        resetter()
    },

    /**
     * Reset the form errors.
     * 
     * @return {void} 
     */
    resetFormErrors() {
        const deepSetter = (obj, indexes, val) => {
            let refObj = obj

            indexes = indexes.split('.')
            indexes.forEach((index, i) => {
                if (i == indexes.length - 1) {
                    refObj[index] = val
                } else {
                    refObj = refObj[index]
                }
            })
        }

        const deepSplice = (obj, indexes, key) => {
            let refObj = obj

            indexes = indexes.split('.')
            indexes.forEach((index, i) => {
                if (index != '') refObj = refObj[index]
            })

            refObj.splice(key, 1)
        }

        const deepGetter = (obj, indexes) => {
            let value = obj

            indexes = indexes.split('.')
            indexes.forEach(index => {
                if (index != '') value = value[index]
            })

            return value
        }

        const resetter = (prefix = '') => {
            // Loop object
            Object.keys(deepGetter(this.form.errors, prefix)).forEach(key => {
                // If the value is array, then we could assume that it could be the error index
                let index = prefix == '' ? key : prefix + '.' + key
                if (Array.isArray(deepGetter(this.form.errors, index))) {

                    // If the elements inside are string, then we must reset
                    if (deepGetter(this.form.errors, index).every(error => typeof error === 'string')) {
                        deepSetter(this.form.errors, index, [])
                    }
                    // Else, it must contains objects
                    else {
                        deepGetter(this.form.errors, index).forEach((error, key) => {
                            if (typeof error === 'string') {
                                deepSplice(this.form.errors, index, key)
                            } else {
                                // This algorithm is to prevent nested key on loop
                                // such as #{...}.0.1.2.3

                                // Split the index
                                let indexes = index.split('.')
                                let newIndex = ''

                                // And with this subroutine we simply remove the latest
                                // index from exploded index by dot.
                                indexes.forEach((index, i) => {
                                    if (indexes.length == 1) {
                                        newIndex += index
                                        return
                                    } else {
                                        if (i == indexes.length - 1) return
                                        if (i != 0) newIndex += '.'
                                        newIndex += index
                                    }
                                })

                                // Then we concatenate it with a new key.
                                index = newIndex + '.' + key
                                resetter(index)
                            }
                        })
                    }
                } else {
                    resetter(index)
                }
            })
        }

        resetter()
    },
    
    /**
     * Set the form message.
     * 
     * @param  {Object}  err 
     * @return {void}
     */
    setFormMessage(err) {
        this.form.message = this.parseErrorMessage(err)
    },

    /**
     * Reset form message.
     * 
     * @return {void} 
     */
    resetFormMessage() {
        this.form.message = null
    },

    /**
     * Form initiation.
     * 
     * @return {void}
     */
    initiateForm() {
        this.resetFormMessage()
        this.startFormLoading()
        this.resetFormErrors()
    },

    /**
     * Flash message for successful form.
     * 
     * @return {void}
     */
    flashFormSuccess() {
        this.$store.dispatch('utils/flashers/addFlasher', { color: 'success', content: 'Berhasil' })
    },

    /**
     * Handle form success.
     * 
     * @param  {Object}  res
     * @param  {Boolean} flash
     * @return {void}
     */
    handleFormSuccess(res, flash = true) {
        // this.resetFormData()
        if (flash) this.flashFormSuccess()
    },

    /**
     * Handle the form error.
     * 
     * @param  {Object}  err 
     * @param  {Boolean} flash
     * @return {void}
     */
    handleFormError(err, flash = true) {
        this.resetFormErrors()
        this.setFormErrors(err)

        this.resetFormMessage()
        this.setFormMessage(err)

        if (flash) {
            this.$store.dispatch('utils/flashers/addFlasher', {
                color: 'danger',
                content: 'Cek kembali data anda',
            })
        }
    },

    /**
     * Submit form automatically.
     * 
     * @param  {String}  link 
     * @param  {String}  method 
     * @param  {Object}  allows
     */
    submitForm(link, method = 'post', allows = { resolve: true, reject: true }) {
        return new Promise((resolve, reject) => {
            this.initiateForm()
            axios[method](link, this.getFormData())
                .then(res => {
                    this.handleFormSuccess(res)
                    if (allows.resolve) resolve(res)
                })
                .catch(err => {
                    this.handleResultError(err)
                    if (allows.reject) reject(err)
                })
                .finally(() => {
                    this.stopFormLoading()
                })
        })
    },

    /**
     * Fetch and set form data.
     * 
     * @param  {Array}     link
     * @param  {Object}    allows
     * @param  {Object}    loading
     * @param  {Callback}  callback
     * @return {Promise}
     */
    fetchAndSetFormData(link, allows = { resolve: true, reject: true }, loading = { startLoading: true, stopLoading: true }, callback) {
        return new Promise((resolve, reject) => {
            if (loading.startLoading) this.startPageLoading()
            axios.get(link)
                .then(res => {
                    let originalData = this.parseFormData(res)
                    let data = callback != null ? callback(originalData) : originalData

                    if (originalData['user_create'] != undefined) data['user_create'] = originalData['user_create']
                    if (originalData['created_at'] != undefined) data['created_at'] = originalData['created_at']
                    if (originalData['user_update'] != undefined) data['user_update'] = originalData['user_update']
                    if (originalData['updated_at'] != undefined) data['updated_at'] = originalData['updated_at']

                    this.setFormDataWithoutParse(data)

                    if (allows.resolve) resolve(res)
                })
                .catch(err => {
                    this.handleResultError(err)
                    if (allows.reject) reject(err)
                })
                .finally(() => {
                    if (loading.stopLoading) this.stopPageLoading()
                })
        })
    },

    /**
     * Show Modal Form based on ref.
     * 
     * @param  {String}  ref 
     * @param  {Object}  data 
     * @param  {String}  link 
     * @param  {String}  method 
     * @return {void}
     */
    showModalForm(ref, data, link = null, method = null) {
        this.$refs[ref].setData(data)
        this.$refs[ref].setLink(link)
        this.$refs[ref].setMethod(method)

        this.$refs[ref].show()
    },

    // --------------------------------------------------------------

}

export default formMethods
