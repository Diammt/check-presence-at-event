import request from '@/utils/request.js'
// import router from '@/router'
// import store from '@/store'

export function signups(){
    return request({
        url: 'dash/sigups',
        method: 'get'
    })
}

export function enableGuest(id){
    return request({
        url: 'dash/sigup/enable/' + id,
        method: 'put'
    })
}

export function disableGuest(id){
    return request({
        url: 'dash/sigup/disable/' + id,
        method: 'put'
    })
}
