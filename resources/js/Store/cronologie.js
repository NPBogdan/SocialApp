import axios from 'axios'

export default {
    namespaced:true,
    state: {
        blasts: []
    },
    getters: {
        blasts(state){
            return state.blasts;
        }
    },
    mutations: {
        PUSH_BLASTS(state,data){
            state.blasts.push(...data)
        }
    },
    actions: {
        async getBlasts({commit}){
            let response = await axios.get('/api/cronologie');
            console.log(response);
            commit('PUSH_BLASTS',response.data.data);
        }
    }
}
