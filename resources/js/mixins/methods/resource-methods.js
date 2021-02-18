
const resourceMethods = {

    /**
    | ---------------------------------------------------------------
    | RESOURCES FUNCTIONALITIES
    | ---------------------------------------------------------------
    | Resource functionalities aren't that important, but substantial
    | to form submission that requires foreign resources from other
    | table.
    */

    /**
     * Set the resource.
     * 
     * @param  {String}  index 
     * @param  {*}  data 
     * @param  {Callback}  callback 
     * @return {void}
     */
    setResource(index, data, callback = null) {
        this.resources[index] = callback == null ? data : callback(data)
    },

    /**
     * Set multiple resources.
     * 
     * @param  {Array}  resources 
     * @return {void}
     */
    setResources(resources) {
        resources.forEach(resource => {
            if (typeof resource == 'array') {
                resource = {
                    index: resource[0],
                    data: resource[1],
                    callback: resource[2],
                }
            }

            this.setResource(resource.index, resource.data, resource.callback || null)
        })
    },

    /**
     * Set resources from promises.
     * 
     * @param  {Array}  indexes 
     * @param  {Array}  resourcesFromPromises 
     * @return {void}
     */
    setResourcesFromMultiplePromises(indexes, resourcesFromPromises) {
        resourcesFromPromises.forEach((resourceFromPromise, i) => {
            this.setResource(indexes[i], resourceFromPromise.data)
        })
    },

    /**
     * Parse multiple resources config.
     * 
     * @param  {Object}  config
     * @return {Object}
     */
    parseMultipleResourcesConfig(config) {
        let resourceIndexes = []
        let resourceEndpoints = []

        Object.keys(config).forEach(index => {
            resourceIndexes.push(index)
            resourceEndpoints.push(
                axios.get(config[index])
            )
        })

        return {
            resourceIndexes,
            resourceEndpoints,
        }
    },

    /**
     * Fetch and set multiple resources.
     * 
     * @param  {Object}  config
     * @param  {Object}  allows
     * @param  {Object}  loading
     * @return {Promise}
     */
    fetchAndSetMultipleResources(config, allows = { resolve: true, reject: true }, loading = { startLoading: true, stopLoading: true }) {
        let { resourceIndexes, resourceEndpoints } = this.parseMultipleResourcesConfig(config)

        if (loading.startLoading) this.startPageLoading()
        return new Promise((resolve, reject) => {
            Promise.all(resourceEndpoints)
                .then(res => {
                    this.setResourcesFromMultiplePromises(resourceIndexes, res)
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

    // --------------------------------------------------------------

}

export default resourceMethods
