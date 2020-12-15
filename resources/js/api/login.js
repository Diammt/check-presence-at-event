import axios from 'axios'
import { setToken, setTokenExpire } from "@/cookies/user.js"
import { appBaseApi } from '@/utils/general.js'

const instance = axios.create({
    baseURL: appBaseApi() + '/auth',
    timeout: 15000
})

instance.interceptors.request.use( config => {
     // ..Loading Enable
     // Loading Enable..

    return config
}, error => {

    return Promise.reject(error)
})

instance.interceptors.response.use( response => {
    console.log("response", response);
    const rep_db = response.data
    if (rep_db.success) {
        // store.dispatch("setToken", rep_db.data.access_token)
        // store.dispatch("setTokenExp", rep_db.data.expires_in)
        setToken(rep_db.data.access_token)
        setTokenExpire(rep_db.data.expires_in)

    }else {
        console.log("Informations incorrectes")
    }
     // ..Loading Disable
     // Loading Disable..
     //console.log("retour ", rep_db)
    return rep_db
}, error => {
     // ..Loading Disable
     // Loading Disable..
    //console.log("error", error);
    return Promise.reject(error)
})

export default function login(data){
    //console.log("data: ", data);
    return instance({
        url: '/login',
        method: 'post',
        data: data,
    })
}

export function register(data){
    //console.log("data: ", data);
    return instance({
        url: '/register',
        method: 'post',
        data: data
    })
}

export function refresh(token){
    return instance({
        url: '/refresh',
        method: 'post',
        headers: {
            Authorization: 'Bearer ' + token // Set JWT token
        }
    }).then( data => {
        console.log(data)
    }).catch( error => {
        console.log(error)
    })
}

/*
.then( async (rep_db) => {
    console.log(rep_db)
    //Initialize rep_db
        await   me().then( rep_db => {
                    // store.dispatch("setPermissions", rep_db.data.permissionNames)
                    // store.dispatch("setRoles", rep_db.data.roleNames)
                    setRoles(rep_db.data.roleNames)
                    setPermissions(rep_db.data.permissionNames)
                    store.dispatch("setAbility", defineAbilityFor(rep_db.data))
                }).catch( error => {
                    console.log("error: ", error)
                })
    //Initialize data..

    // Redirect if necessary
        const path = store.getters.path_intended
        if(path){
            store.dispatch("setPathEntented", null)
            console.log("path intended to null")
            router.push(path)
        }
    // Redirect if necessary..
    router.push({
        name: "dashboard"
    })
}).catch( error => {
    //console.log(error)
    error
    alert(error.status)
})
*/
