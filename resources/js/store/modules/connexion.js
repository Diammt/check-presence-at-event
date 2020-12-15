
const state = {
    token: null,
    token_exp: null,
    roles: [],
    permissions: []
}


const mutations = {
    SET_TOKEN: (state, token) => {
        state.token = token
    },
    SET_TOKEN_EXP: (state, token_exp) => {
        state.token_exp = token_exp
    },
    SET_ROLES: (state, roles) => {
        state.roles = roles
    },
    SET_PERMISSIONS: (state, permissions) => {
        state.permissions = permissions
    },
}

export default {
    namespaced: true,
    state: state,
    mutations: mutations,
}