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
  						<input class="input100" type="text" name="email">
  						<span class="focus-input100" data-placeholder="Email"></span>
  					</div>

  					<div class="wrap-input100" data-validate="Enter password">
  						<input class="input100" type="password" name="password">
  						<span class="focus-input100" data-placeholder="Mot de passe"></span>
  					</div>

  					<div class="container-login100-form-btn">
  						<button class="login100-form-btn" @click.prevent="login">
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
export default {
    mounted() {
        this.login()
    },
    methods: {
        login() {
            this.$toast.add({severity:'success', summary: 'Successful', detail: 'Monté', life: 3000})
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
