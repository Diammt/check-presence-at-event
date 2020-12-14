
const state = {
    active_page: "#accueil", // The active element id
    fixed_header: false // determine if Header will be fixed
}


const mutations = {
    SET_ACTIVE_PAGE: (state, active_page) => {
        state.active_page = active_page
    },
    SET_FIXED_HEADER: (state, fixed_header) => {
        state.fixed_header = fixed_header
    },
}

export default {
    namespaced: true,
    state,
    mutations,
}
