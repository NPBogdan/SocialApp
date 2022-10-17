import axios from "axios";

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
    },
    actions:{
        async reblastBlast(_, blast) {
            await axios.post(`/api/blasts/${blast.id}/reblasts`)
        },
        async unreblastBlast(_, blast) {
            await axios.delete(`/api/blasts/${blast.id}/reblasts`)
        },
    }
}
