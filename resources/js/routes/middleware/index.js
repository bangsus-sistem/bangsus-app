import Multiguard from 'vue-router-multiguard'
import guards from '../guards'
import guardGroups from '../guard-groups'

const middleware = (guardIndexes, groupIndex) => {
    let guards = []
    guardIndexes.forEach(guardIndex => guards.push(getGuard(guardIndex)))

    let group = getGroup(groupIndex)
    if (typeof group == 'array') group.forEach(guardIndex => guards.push(getGuard(guardIndex)))

    return Multiguard(guards)
}

const getGuard = (path) => {
    const paths = path.split('.')

    let guard = guards[paths[0]]
    paths.forEach((path, i) => {
        if (i > 0) guard = guard[path]
    })

    return guard
}

const getGroup = (path) => guardGroups[path]

export default middleware