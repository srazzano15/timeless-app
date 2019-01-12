
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * We will add in our own custom scripts made for the purpose of making
 * custom JS apps work as well as scripts for plugins.
 */

require('./custom_scripts');
/* require('./metisMenu');
require('./sb-admin-2'); */

window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

/* Vue.component('example-component', require('./components/ExampleComponent.vue')); */

Vue.component('bag', require('./components/BagForm.vue').default);

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* const app = new Vue({
    el: '#app'
}); */

/**
 * Vue instance for admin page + scaffolding * 
 */
const admin = new Vue({

    el: '#admin_index',
    data: {
        step: 1,
        bagIndex: 1,
        pillowIndex: 1,
        bagTotal: 0,
        batches: [{
            batchId: '',
            cooler: '',
            dateFilled: '',
            kegs: '',
            submitter: ''

        }],
        bags: [{
            package_id: '',
            flower_weight: ''
        }],
        pillows: [{
            weight: '',
        }],
    },
    computed: {
        
    },
    methods: {
        addNewBagRow() {
            
            if (this.bagIndex < 9) {
                this.bags.push({
                    package_id: '',
                    flower_weight: ''
                })
                this.bagIndex++;
            }
        },
        removeBagRow() {

            if (this.bagIndex > 1) {
                this.bags.pop({
                    package_id: '',
                    flower_weight: ''
                })
                this.bagIndex--;
            } 
        },
        addNewPillow() {
            if (this.pillowIndex < 9) {
                this.pillows.push({
                    weight: ''
                })
                this.pillowIndex++;
            }
        },
        removePillow() {
            if (this.pillowIndex > 1) {
                this.pillows.pop({
                    weight: '',
                })
                this.pillowIndex--;
            }
        },
        prev() {
            this.step--;
        },
        next() {
            this.step++;
        },

    }
})