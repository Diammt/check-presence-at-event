
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
        permissions: state => state.connexion.permissions,
    //CONNEXION

    //HEADER
        active_page: state => state.header.active_page,
        fixed_header: state => state.header.fixed_header
    //HEADER

}
export default getters
