const production = true // 0: local, 1: production

export function titleForUrl(title) {
    return title.replace(/ /gi, "-")
}

export function ibudoSiteUrl() {
    if(production) {
        return "https://ibudohub.co"
    }
    return "http://127.0.0.1:8000"
}

export function domainCookies() {
    if(production) {
        return ".ibudohub.co"
    }
    return "127.0.0.1"
}

export function appBaseApi() {
    return ibudoSiteUrl() + "/api"
}
