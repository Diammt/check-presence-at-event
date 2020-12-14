<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            // this.$notify({
            //   group: 'foo',
            //   title: 'Important message',
            //   text: 'Hello user! This is a notification! <em class=""> test</em>',
            //   speed: 10000
            // });
            // this.$dialog
            //   .confirm('Etes vous sur de vouloir suprimer cette facture')
            //   .then(function(dialog) {
            //     console.log('Clicked on proceed');
            //   })
            //   .catch(function() {
            //     console.log('Clicked on cancel');
            //   });
            //

        },
        methods:     {

        }
    }
</script>
