<template>
  <div class="">
      <div class="limiter">
  		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
  			<div class="wrap-login100">
  				<form class="login100-form">
  					<span class="login100-form-logo">
  						<img src="logo.png" alt="">
  					</span>

  					<span class="login100-form-title p-b-34 p-t-27">
  						Se connecter
  					</span>

  					<div class="wrap-input100" data-validate = "Entrer votre email">
  						<input class="input100" type="text" name="email" v-model="model.email" >
  						<span class="focus-input100" data-placeholder="Email"></span>
  					</div>

  					<div class="wrap-input100" data-validate="Enter password">
  						<input class="input100" type="password" name="password" v-model="model.password" >
  						<span class="focus-input100" data-placeholder="Mot de passe"></span>
  					</div>

  					<div class="container-login100-form-btn">
                        <button v-if="connexion" @click.prevent="logUser" class="login100-form-btn" disabled>
                            Connexion ...
                        </button>

  						<button v-else class="login100-form-btn" @click.prevent="logUser">
  							Se connecter
  						</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>
  	<div id="dropDownSelect1"></div>
  </div>
</template>

<script>
import login from "@/api/login.js"
import { me } from '@/api/user.js'
import { defineAbilityFor } from '@/utils/ability.js'
import { setRoles, setPermissions } from "@/cookies/user.js"
import { required,  } from 'vuelidate/lib/validators'

export default {
    data() {
        return {
            model: {
                email: '',
                password: ''
            },
            connexion: false
        }
    },
    validations: {
        model: {
            email: {
                required
            },
            password: {
                required
            }
        }
    },
    mounted() {
    },
    methods: {
        logUser() {

            if(this.$v.model.email.$invalid){
                this.$toast.add({
                    severity:'warn',
                    summary: 'Error',
                    detail: '"Email non renseigné"',
                    life: 3000
                })
                return
                //this.$toast.add({
                //    severity:'success',
                //    summary: 'Successful',
                //    detail: '"Email non renseigné"',
                //    life: 3000
                //})
            }
            if(this.$v.model.password.$invalid) {
                this.$toast.add({
                    severity:'warn',
                    summary: 'Error',
                    detail: "Mot de passe non renseigné",
                    life: 3000
                })
                return
            }
            this.$toast.add({
                severity:'info',
                summary: '...',
                detail: "Connexion en cours",
                life: 3000
            })
            this.connexion = true
            login(this.model).then( async (rep_db) => {
                //Initialize rep_db
                if (rep_db.success) {
                    let fatal_error = false
                    await   me().then( rep_db => {
                                console.log("rep:", rep_db)
                                setRoles(rep_db.data.user.roleNames)
                                setPermissions(rep_db.data.user.permissionNames)
                                this.$store.dispatch("setAbility", defineAbilityFor(rep_db.data.user) )
                            }).catch( error => {
                                console.log("error: ", error)
                                //error
                                this.$toast.add({
                                    severity:'warn',
                                    summary: 'Error',
                                    detail: "Impossible de se connecter",
                                    life: 3000
                                })
                                fatal_error = true
                            })

                        if(!fatal_error) {
                            this.$toast.add({
                                severity:'success',
                                summary: 'Excelent',
                                detail: "Connexion réussi",
                                life: 3000
                            })
                            //Initialize data..

                            // Redirect if necessary
                                const path = this.$route.query.redirect
                                if(path){
                                    this.$router.push(path)
                                }
                            // Redirect if necessary..
                            this.$router.push({
                                name: "dashboard"
                            })
                        }

                }else {
                    //console.log("Informations incorrectes")
                    //alert("wrong data")
                    this.$toast.add({
                        severity:'error',
                        summary: 'Error',
                        detail: "Email ou mot de passe incorrectes",
                        life: 3000
                    })
                }
            }).catch( error => {
                //console.log(error)
                error
                //alert(error)
                this.$toast.add({
                    severity:'error',
                    summary: 'Error',
                    detail: "Une erreur s'est produite, veuillez réessayer",
                    life: 3000
                })
            }).then( () => {
                this.connexion = false
            })
        }
    },
    head: {
        link: [
            {rel:"stylesheet", href:"images/icons/favicon.ico", type: 'text/css'},
            {rel:"stylesheet", href:"vendor/bootstrap/css/bootstrap.min.css", type: 'text/css'},
            {rel:"stylesheet", href:"fonts/font-awesome-4.7.0/css/font-awesome.min.css", type: 'text/css'},
            {rel:"stylesheet", href:"fonts/iconic/css/material-design-iconic-font.min.css", type: 'text/css'},
            {rel:"stylesheet", href:"vendor/animate/animate.css", type: 'text/css'},
            {rel:"stylesheet", href:"vendor/css-hamburgers/hamburgers.min.css", type: 'text/css'},
            {rel:"stylesheet", href:"vendor/animsition/css/animsition.min.css", type: 'text/css'},
            {rel:"stylesheet", href:"vendor/select2/select2.min.css", type: 'text/css'},
            {rel:"stylesheet", href:"vendor/daterangepicker/daterangepicker.css", type: 'text/css'},
            {rel:"stylesheet", href:"css/util.css", type: 'text/css'},
            {rel:"stylesheet", href:"css/main.css", type: 'text/css'}

        ],
        script: [
            { type: 'text/javascript', src: 'vendor/jquery/jquery-3.2.1.min.js', async: true, body: true},
            { type: 'text/javascript', src: 'vendor/animsition/js/animsition.min.js', async: true, body: true},
            { type: 'text/javascript', src: 'vendor/bootstrap/js/popper.js', async: true, body: true},
            { type: 'text/javascript', src: 'vendor/bootstrap/js/bootstrap.min.min.js', async: true, body: true},
            { type: 'text/javascript', src: 'vendor/select2/select2.min.js', async: true, body: true},
            { type: 'text/javascript', src: 'vendor/daterangepicker/moment.min.js', async: true, body: true},
            { type: 'text/javascript', src: 'vendor/daterangepicker/daterangepicker.js', async: true, body: true},
            { type: 'text/javascript', src: 'vendor/countdowntime/countdowntime.js', async: true, body: true},
            { type: 'text/javascript', src: 'js/main.js', async: true, body: true}
        ]
    }
}
</script>

<style lang="css" scoped>
</style>
