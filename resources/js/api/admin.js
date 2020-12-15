import request from '@/utils/request.js'


export function statistics(){
    return request({
        url: 'dashboard/statistics',
        method: 'get'
    })
}

export function articles(page = 1){
    return request({
        url: 'dashboard/admin/articles?page=' + page,
        method: 'get'
    })
}

export function users(page = 1){
    return request({
        url: 'dashboard/admin/users?page=' + page,
        method: 'get'
    })
}

export function enableArticle(article_id){
    return request({
        url: 'article/' + article_id + "/enable",
        method: 'put'
    })
}

export function disableArticle(article_id){
    return request({
        url: 'article/' + article_id,
        method: 'delete'
    })
}

export function addArticle(data){
    return request({
        url: 'article',
        method: 'post',
        data
    })
}

export function lockUser(user_id){
    return request({
        url: 'dashboard/admin/lockUser/' + user_id,
        method: 'put'
    })
}

export function unlockUser(user_id){
    return request({
        url: 'dashboard/admin/unlockUser/' + user_id,
        method: 'put'
    })
}

export function assignAdminRoleTo(user_id){
    return request({
        url: 'dashboard/admin/assign-admin-role-to/' + user_id,
        method: 'put'
    })
}

export function revokeAdminRoleTo(user_id){
    return request({
        url: 'dashboard/admin/revoke-admin-role-to/' + user_id,
        method: 'put'
    })
}
