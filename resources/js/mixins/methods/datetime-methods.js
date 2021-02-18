
const datetimeMethods = {
    
    /**
    | ---------------------------------------------------------------
    | DATETIME FUNCTIONALITIES
    | ---------------------------------------------------------------
    | 
    */

    /**
     * Parse the timestamp into standard datetime.
     * 
     * @deprecated
     * @param  {String}  datetime
     * @return {Number}
     */
    standardDatetime(datetime = null) {
        moment.locale('id')
        return datetime == null ? '-' : moment(datetime).format('dddd, Do MMMM YYYY H:mm:ss')
    },

    // --------------------------------------------------------------

}

export default datetimeMethods
