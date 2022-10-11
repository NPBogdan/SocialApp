import axios from 'axios'

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
                return t;
            })
        }
    },
    actions: {
        async getBlasts({commit}, url) {
            let response = await axios.get(url);
            commit('PUSH_BLASTS', response.data.data);
            commit('likes/PUSH_LIKES', response.data.meta.likes, {root: true})
            return response;
        }

    }
}
