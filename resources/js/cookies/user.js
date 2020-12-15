import Cookies from "js-cookie"
import { domainCookies } from '@/utils/general.js'

const token = "user-token-for-summit-management"
const roles = "user-roles-for-summit-management"
const permissions = "user-premissions-for-summit-management"
const token_expire = "user-token-expire-for-summit-management"
const domain = domainCookies()
const options = {
    domain
}
import { refresh } from '@/api/login'

async function makeARefresh(user_token) {
    await refresh(user_token)
}
// GET COOKIES

export function getToken() {
    let user_token = Cookies.get(token)
    const token_exp = getTokenExpire()
    if(user_token){
        const limit = Date.now() / 1000
        if(token_exp <= limit){
            console.log("un refresh s'entamé pour gettoken")
            makeARefresh(user_token)
            console.log("un refresh effectué pour gettoken ")
            user_token = Cookies.get(token)
        }
    }
    return user_token
}

export function getRoles() {
    return Cookies.getJSON(roles)
}

export function getPermissions() {
    return Cookies.getJSON(permissions)
}

export function getTokenExpire() {
    return Cookies.get(token_expire)
}
// GET COOKIES END


// SET COOKIES
export function setToken(value) {
    Cookies.set(token, value, options)
}

export function setRoles(value) {
    Cookies.set(roles, value, options)
}

export function setPermissions(value) {
    Cookies.set(permissions, value, options)
}

export function setTokenExpire(value) {
    Cookies.set(token_expire, value, options)
}
// SET COOKIES extends

// REMOVE COOKIES
export function removeToken() {
    Cookies.remove(token, options)
}

export function removeRoles() {
    Cookies.remove(roles, options)
}

export function removePermissions() {
    Cookies.remove(permissions, options)
}

export function removeTokenExpire() {
    Cookies.remove(token_expire, options)
}
// REMOVE COOKIES END
