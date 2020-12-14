<!DOCTYPE html>
<html>

  <head>
    <link href="https://unpkg.com/vue-simple-notify/dist/vue-simple-notify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  </head>

  <body>

    <div id="app">
        <vue-simple-notify
            :items="items"
            :delay="delay"
            @on-dismiss="onDismiss"
          ></vue-simple-notify>
    </div>

    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-simple-notify/dist/vue-simple-notify.min.js"></script>

    <script>
        Vue.component('VueSimpleNotify', VueSimpleNotify.VueSimpleNotify)
        new Vue({
        el: '#app',
        data () {
          return {
            delay: 800,
            items: [

            ]
          }
        },
        mounted() {

        },
        methods: {
          onDismiss: function onDismiss (index) {
            console.log(index)
            // alert("cc")
          }
        }
        })
    </script>

  </body>

</html>
