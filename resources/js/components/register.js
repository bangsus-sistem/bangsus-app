
export default {
    prefix: 'bsb',
    components: {
        /**
         * Alerts
         */
        'alert': require('./alerts/Alert').default,
        'alert-dismissible': require('./alerts/AlertDismissible').default,

        /**
         * Buttons
         */
        'button': require('./buttons/Button').default,
        'button-spinner': require('./buttons/ButtonSpinner').default,
        'close-button': require('./buttons/CloseButton').default,

        /**
         * Flashers
         */
        'flashers': require('./flashers/Flashers').default,
        'flasher-wrapper': require('./flashers/FlasherWrapper').default,

        /**
         * Icon
         */
        'icon': require('./icons/Icon').default,

        /**
         * Input
         */
        'errors': require('./input/Errors').default,
        'input': require('./input/Input').default,
        'input-errors': require('./input/InputErrors').default,

        /**
         * Sample
         */
        'sample': require('./sample/Sample').default,

        /**
         * Screeen
         */
        'screen': require('./screen/Screen').default,

        /**
         * Spinner
         */
        'spinner': require('./spinner/Spinner').default,
    }
}
