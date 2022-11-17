export default {
    blasts(state) {
        return state.blasts.sort((a, b) => b.created_at - a.created_at);
    },
    blast(state){
        return id => state.blasts.find(t => t.id === id)
    }
}
