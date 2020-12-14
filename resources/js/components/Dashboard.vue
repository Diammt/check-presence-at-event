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
  </div>
</template>

<script>
export default {
    data() {
       return {
           items: [
               {
                  label:'Liste des invités',
                  icon:'pi pi-fw pi-file',
                  to: "/login"
               },
               {
                  label:'Gérer',
                  icon:'pi pi-fw pi-pencil',
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
