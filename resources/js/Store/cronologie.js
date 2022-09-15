import axios from 'axios'

export default {
    namespaced: true,
    state: {
        blasts: []
    },
    getters: {
        blasts(state) {
            return state.blasts;
        }
    },
    mutations: {
        PUSH_BLASTS(state, data) {
            state.blasts.push(...data)
        }
    },
    actions: {
        async getBlasts({commit}, url) {
            let response = await axios.get(url);
            commit('PUSH_BLASTS', response.data.data);
            return response;
        }

    }
}
