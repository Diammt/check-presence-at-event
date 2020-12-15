<template>
  <div class="">
      <Menubar :model="items">
        <template #start>
            <img src="logo.png" alt="logo">
        </template>
        <template #end>
            <span  @click.prevent="logOutUser" > <i class="pi pi-fw pi-power-off"></i>  Déconnexion</span>
        </template>
    </Menubar>
    <router-view></router-view>
  </div>
</template>

<script>
import { logout, me } from '@/api/user.js'
import { removeToken, removeTokenExpire, removeRoles, removePermissions } from "@/cookies/user.js"

export default {
    data() {
       return {
           items: [
               {
                  label:'Liste des invités',
                  icon:'pi pi-id-card',
                  to: "/"
               },
               {
                  label:'Gérer',
                  icon:'pi pi-cog',
                  items:[
                     {
                        label:'Réceptionniste',
                        icon:'pi pi-list'
                     }
                  ]
               }
            ]
       }
   },
   methods: {
        logOutUser() {
            me()
            logout().then( data => {
                data
                this.$router.push({
                    name: "login"
                })
            }).catch( error => {
                error
            }).then(() => {
                removeToken()
                removeTokenExpire()
                removeRoles()
                removePermissions()
                this.$toast.add({
                    severity:'info',
                    summary: 'Excelent',
                    detail: "Vous êtes désormains déconnecté",
                    life: 3000
                })
            })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
