<template>
  <div class="">
      <Menubar :model="items">
        <template #start>
            <img src="logo.png" alt="logo">
        </template>
        <template #end>
            <span> <i class="pi pi-fw pi-power-off"></i>  Déconnexion</span>
        </template>
    </Menubar>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
    data() {
       return {
           items: [
               {
                  label:'Liste des invités',
                  icon:'pi pi-list',
                  to: "/login"
               },
               {
                  label:'Gérer',
                  icon:'pi pi-setting',
                  items:[
                     {
                        label:'Réception',
                        icon:'pi pi-fw pi-align-left'
                     },
                     {
                        label:'Ajouter',
                        icon:'pi pi-fw pi-align-right'
                     }
                  ]
               }
            ]
       }
   }
}
</script>

<style lang="css" scoped>
</style>
