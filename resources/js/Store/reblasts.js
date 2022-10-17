import axios from "axios";
import {without} from "lodash";

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
        },
        PUSH_REBLAST(state, id) {
            state.reblasts.push(id)
        },
        ELIMINATE_REBLAST(state, id) {
            state.reblasts = without(state.reblasts, id)
        },
    },
    actions:{
        async reblastBlast(_, blast) {
            await axios.post(`/api/blasts/${blast.id}/reblasts`)
        },
        async unreblastBlast(_, blast) {
            await axios.delete(`/api/blasts/${blast.id}/reblasts`)
        },

        syncReblast({commit, state}, id) {
            //exista reblast?
            if (state.reblasts.includes(id)) {
                //adauga like
                console.log('scoate reblastul')
                commit('ELIMINATE_REBLAST', id)
                return
            }
            //elimina reblast
            console.log('adauga reblast')
            commit('PUSH_REBLAST', id)
        }
    }
}
