import axios from "axios";

export default {
    async getBlasts({commit}, url) {
        let response = await axios.get(url);
        commit('PUSH_BLASTS', response.data.data);
        commit('likes/PUSH_LIKES', response.data.meta.likes, {root: true})
        commit('reblasts/PUSH_REBLASTS', response.data.meta.reblasts, {root: true})
        return response;
    },
    async citareBlast(_, {blast, data}) {
        await axios.post(`/api/blasts/${blast.id}/quotes`, data)
    },
    async replyBlast(_, {blast, data}) {
        await axios.post(`/api/blasts/${blast.id}/replies`, data)
    }

}
