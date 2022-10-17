import axios from 'axios'
import {get} from 'lodash'
export default {
    namespaced: true,
    state: {
        blasts: []
    },
    getters: {
        blasts(state) {
            return state.blasts.sort((a, b) => b.created_at - a.created_at);
        }
    },
    mutations: {
        PUSH_BLASTS(state, data) {
            state.blasts.push(...data.filter((blast) => {
                //Filtram blasturile pentru a nu exista 2 cu acelasi id in cronologie atunci cand o impingem in state
                return !state.blasts.map((b) => b.id).includes(blast.id)
            }))
        },
        SET_LIKES(state, {id, count}) {
            state.blasts = state.blasts.map((t) => {
                if (t.id === id) {
                    t.likes_count = count
                }
                //Verificam daca proprietatea 'id' exista in 'original_blast pentru ca unele blasturi nu sunt redistribuite
                if(get(t.original_blast,'id') === id){
                    t.original_blast.likes_count = count
                }
                return t;
            })
        },
        SET_REBLASTS(state, {id, count}) {
            state.blasts = state.blasts.map((t) => {
                if (t.id === id) {
                    t.reblasts_count = count
                }
                //Verificam daca proprietatea 'id' exista in 'original_blast pentru ca unele blasturi nu sunt redistribuite
                if(get(t.original_blast,'id') === id){
                    t.original_blast.reblasts_count = count
                }
                return t;
            })
        }
    },
    actions: {
        async getBlasts({commit}, url) {
            let response = await axios.get(url);
            commit('PUSH_BLASTS', response.data.data);
            commit('likes/PUSH_LIKES', response.data.meta.likes, {root: true})
            commit('reblasts/PUSH_REBLASTS', response.data.meta.reblasts, {root: true})
            return response;
        }

    }
}
