
const state = {
    loading: false,
    path_intended: null,
    ability: null
}

const mutations = {
    ENABLE_LOADING: (state) => {
        state.loading = true
    },

    DISABLE_LOADING: (state) => {
        state.loading = false
    },

    SET_PATH_INTENDED: (state, path_intended) => {
        state.path_intended = path_intended
    },
    SET_ABILITY: (state, ability) => {
        state.ability = ability
    }
}


export default {
    namespaced: true,
    state: state,
    mutations: mutations
}