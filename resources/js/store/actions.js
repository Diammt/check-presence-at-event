export default {
    //GLOBAL
        enable_loading( {commit} ){
            commit('global/ENABLE_LOADING')
        },
        disable_loading( {commit} ){
            commit('global/DISABLE_LOADING')
        },
        setPathEntented ( {commit}, path_intended){
            commit("global/SET_PATH_INTENDED", path_intended)
        },
        setAbility ( {commit}, ability){
            commit("global/SET_ABILITY", ability)
        },
    //GLOBAL
    
    //CONNEXION
        setToken ( {commit}, token){
            commit('connexion/SET_TOKEN', token)
        },
        setTokenExp ( {commit}, token_exp){
            commit('connexion/SET_TOKEN_EXP', token_exp)
        },
        setRoles ( {commit}, roles){
            commit('connexion/SET_ROLES', roles)
        },
        setPermissions ( {commit}, permissions){
            commit('connexion/SET_PERMISSIONS', permissions)
        }
    //CONNEXION

}