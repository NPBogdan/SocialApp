import axios from 'axios'

export default {
    namespaced:true,
    state:{
        likes:[]
    },
    getters:{
        likes(state){
            return state.likes
        }
    },
    mutations:{
        PUSH_LIKES(state,data){
            state.likes.push(...data)
        }
    },
    actions:{
        async likeBlast(_,blast){
            await axios.post(`/api/blasts/${blast.id}/likes`)
        },
        async unlikeBlast(_,blast){
            await axios.delete(`/api/blasts/${blast.id}/likes`)
        }
    }
}
