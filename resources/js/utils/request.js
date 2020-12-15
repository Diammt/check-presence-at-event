import axios from 'axios'
import store from '@/store'
import { refresh } from '@/api/login'
import { getToken, getTokenExpire } from "@/cookies/user.js"
import { appBaseApi } from '@/utils/general.js'

const request = axios.create({
    baseURL: appBaseApi(),
    timeout: 15000
})
const cancelToken = axios.CancelToken
const source  = cancelToken.source()

request.interceptors.request.use( async (config) => {
        // Do something before request is sent

        // ..Add Token Autorisation
            const token = getToken()
            const token_exp = getTokenExpire()
            if(token){
                config.headers['Authorization'] = 'Bearer ' + token // Set JWT token
                const limit = Date.now() / 1000
                if(token_exp <= limit){
                    console.log("un refresh s'entamé")
                    await refresh(token)
                    console.log("un refresh effectué")
                }
            }else{
                //source.cancel("Vous n'êtes pas connecté")
                config.cancelToken = source.token
                source.cancel("Requete interrompue: Abscence de token")
            }
        //   Add Token Autorisation..
        // ..Loading Enable
            store.dispatch("enable_loading")
        // Loading Enable..

        return config
    },
     (error) => {
        // Do something with request error

        // ..See Error
            //console.log("error_request", error)
            //alert("error_request: "+ error.message)
            error
        // See Error..
        return Promise.reject(error)
    }
)

request.interceptors.response.use((response) => {
        // Any status code that lie within the range of 2xx cause this function to trigger
        // Do something with response data

        // ..See datum in console
            const datum = response.data
            //console.log('result_request ', datum )
        //   See datum in console..

        // ..Loading Disable
            store.dispatch("disable_loading")
        // Loading Disable..
        return datum
    },
    (error) => {
        // Any status codes that falls outside the range of 2xx cause this function to trigger
        // Do something with response error

        // ..See Error
            //console.log("error_response", error)
            //alert("error_response: " + error.message)
            error
        // See Error..

        // ..Loading Disable
        store.dispatch("disable_loading")
        // Loading Disable..
        return Promise.reject(error)
})

export default request
