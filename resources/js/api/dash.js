import request from '@/utils/request.js'
// import router from '@/router'
// import store from '@/store'

export function statistics(){
    return request({
        url: 'dashboard/statistics',
        method: 'get'
    })
}

export function myArticles(page = 1){
    return request({
        url: 'dashboard/my-articles?page=' + page,
        method: 'get'
    })
}

export function addArticle(data){
    return request({
        url: 'article',
        method: 'post',
        data
    })
}

export function updateArticle(article_id, data){
    return request({
        url: 'article/' + article_id,
        method: 'put',
        data
    })
}
