import getters from './Blast/getters.js'
import mutations from './Blast/mutations.js'
import actions from './Blast/actions.js'

export default {
    namespaced: true,
    state: {
        blasts: []
    },
    getters,
    mutations,
    actions
}
