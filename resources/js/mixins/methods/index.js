import queryMethods from './query-methods'
import resultMethods from './result-methods'
import formMethods from './form-methods'
import errorMethods from './error-methods'
import stateMethods from './state-methods'
import resourceMethods from './resource-methods'
import datetimeMethods from './datetime-methods'


const methods = {
    ...queryMethods,
    ...resultMethods,
    ...formMethods,
    ...errorMethods,
    ...stateMethods,
    ...resourceMethods,
    ...datetimeMethods,
}

export default methods
