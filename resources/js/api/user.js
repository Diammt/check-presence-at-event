import request from '@/utils/request.js'

export function me(){
    return request({
        url: '/auth/me',
        method: 'get'
    })
}

export function logout(){
    return request({
        url: '/auth/logout',
        method: 'post'
    })
}
