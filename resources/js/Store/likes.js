import axios from 'axios'
import {without} from 'lodash'

export default {
    namespaced: true,
    state: {
        likes: []
    },
    getters: {
        likes(state) {
            return state.likes
        }
    },
    mutations: {
        PUSH_LIKES(state, data) {
            state.likes.push(...data)
        },
        //
        PUSH_LIKE(state, id) {
            state.likes.push(id)
        },
        ELIMINATE_LIKE(state, id) {
            state.likes = without(state.likes, id)
        },
    },
    actions: {
        async likeBlast(_, blast) {
            await axios.post(`/api/blasts/${blast.id}/likes`)
        },
        async unlikeBlast(_, blast) {
            await axios.delete(`/api/blasts/${blast.id}/likes`)
        },
        syncLike({commit, state}, data) {
            //exista like-ul?
            if (state.likes.includes(id)) {
                console.log('scoate like')
                commit('ELIMINATE_LIKE', id)
                return
            }
            console.log('adauga like')
            commit('PUSH_LIKE', id)
        }
    }
}
