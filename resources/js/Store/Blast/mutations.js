import {get} from "lodash";

export default {
    PUSH_BLASTS(state, data) {
        state.blasts.push(...data.filter((blast) => {
            //Filtram blasturile pentru a nu exista 2 cu acelasi id in cronologie atunci cand o impingem in state
            return !state.blasts.map((b) => b.id).includes(blast.id)
        }))
    },
    ELIMINATE_BLAST(state, id) {
        state.blasts = state.blasts.filter(
            (t) => {
                return t.id !== id
            }
        )
    },
    SET_LIKES(state, {id, count}) {
        state.blasts = state.blasts.map((t) => {
            if (t.id === id) {
                t.likes_count = count
            }
            //Verificam daca proprietatea 'id' exista in 'original_blast pentru ca unele blasturi nu sunt redistribuite
            if (get(t.original_blast, 'id') === id) {
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
            if (get(t.original_blast, 'id') === id) {
                t.original_blast.reblasts_count = count
            }
            return t;
        })
    },
    SET_REPLIES(state, {id, count}) {
        state.blasts = state.blasts.map((t) => {
            if (t.id === id) {
                t.replies_count = count
            }
            //Verificam daca proprietatea 'id' exista in 'original_blast pentru ca unele blasturi nu sunt redistribuite
            if (get(t.original_blast, 'id') === id) {
                t.original_blast.replaies_count = count
            }
            return t;
        })
    }
}
