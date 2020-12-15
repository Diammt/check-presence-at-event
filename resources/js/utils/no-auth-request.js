import axios from 'axios'
import store from '@/store'
import { appBaseApi } from '@utils/general.js'

const request = axios.create({
    baseURL: appBaseApi(),
    timeout: 15000
})

request.interceptors.request.use( (config) => {
        // Do something before request is sent

        // ..Add Token Autorisation
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
        // See Error..
        return Promise.reject(error)
    }
)

request.interceptors.response.use((response) => {
        // Any status code that lie within the range of 2xx cause this function to trigger
        // Do something with response data

            const datum = response.data
            //console.log('result_request ', datum )

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
            error
            //alert("error_response: " + error.message)
        // See Error..

        // ..Loading Disable
        store.dispatch("disable_loading")
        // Loading Disable..
        return Promise.reject(error)
})

export default request
