//import { abilitiesPlugin } from '@casl/vue'
import { defineAbility } from '@casl/ability'
import { me } from '@/api/user.js'
import { setRoles, setPermissions } from "@/cookies/user.js"
import store from '@/store'

export default defineAbility((can, cannot) => {
    can('manage', 'all')
    cannot('delete', 'User')
})

export function defineAbilityFor(user){
    console.log("user: ", user)
    return defineAbility((can, cannot) => {

        if(user.roleNames.indexOf("ADMIN") != -1){
            //console.log("un admin");
            can("manage", "Guests")
        }
        if(user.roleNames.indexOf("GOUROU") != -1){
            //console.log("un gourou");
            can("manage", "User")
        }

    })
}

export async function getUserAbility() {
    let ability = store.getters.ability
    if(ability) {
        return ability
    }
    await defineUserInfos()
    ability = store.getters.ability
    if(ability) {
        return ability
    }
    return null
}

async function defineUserInfos() {
    await   me().then( rep_db => {
                // store.dispatch("setPermissions", rep_db.data.permissionNames)
                // store.dispatch("setRoles", rep_db.data.roleNames)
                setRoles(rep_db.data.roleNames)
                setPermissions(rep_db.data.permissionNames)
                store.dispatch("setAbility", defineAbilityFor(rep_db.data) )
            }).catch( error => {
                console.log("error: ", error)
            })

}
