
const getters = {
    //GLOBAL
        loading: state => state.global.loading,
        path_intended: state => state.global.path_intended,
        ability: state => state.global.ability,
    //GLOBAL


    //CONNEXION
        token: state => state.connexion.token,
        token_exp: state => state.connexion.token_exp,
        roles: state => state.connexion.roles,
        permissions: state => state.connexion.permissions
    //CONNEXION
    
}
export default getters