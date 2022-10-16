export default {
    namespaced: true,
    state: {
        reblasts: []
    },
    getters: {
        reblasts(state) {
            return state.reblasts
        }
    },
    mutations: {
        PUSH_REBLASTS(state, data) {
            state.reblasts.push(...data)
        }
    }
}
