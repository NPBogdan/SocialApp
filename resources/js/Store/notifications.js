import actions from './Blast/actions.js'
import getters from './Blast/getters.js'
import mutations from './Blast/mutations.js'

export default {
    namespaced:true,
    state:{
        notifications:[],
        blasts:[]
    },
    getters:{
        ...getters,
        notifications(state){
            return state.notifications
        },
        blastIdsFromNotification(state){
            return state.notifications.map(n => n.data.blast.id)
        }
    },
    mutations:{
        ...mutations,
        PUSH_NOTIFICATIONS(state,data){
            state.notifications.push(...data)
        }
    },
    actions:{
        ...actions,

       async getNotifications({commit,dispatch,getters},url){
           let response = await axios.get(url)

           commit('PUSH_NOTIFICATIONS',response.data.data)

           dispatch('getBlasts',`/api/blasts?ids=${getters.blastIdsFromNotification.join(',')}`)

           return response;
        }
    }
}
