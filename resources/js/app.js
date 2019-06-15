
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

window.Vue = require('vue');

import Vuetify from 'vuetify'
Vue.use(Vuetify, {
    theme: {
        primary: '#fdd00c'
    }
});

import VeeValidate from 'vee-validate'
Vue.use(VeeValidate)

export const eventBus = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

/* Vue.component('example-component', require('./components/ExampleComponent.vue')); */
//Vue.component('dashboard', require('./components/Dashboard.vue').default)
//Vue.component('text-field', require('./components/TextInput.vue').default);
//Vue.component('bag-form', require('./components/BagForm.vue').default);
//Vue.component('admin-nav', require('./components/AdminNav.vue').default);
Vue.component('batch-statistics', require('./components/views/reports/BatchStatistics.vue').default);
Vue.component('disparity-report', require('./components/views/reports/DisparityReport.vue').default);
Vue.component('stuffed-table', require('./components/views/reports/StuffedBatchTable.vue').default)
Vue.component('batch-times', require('./components/layout/BatchTimes.vue').default);
Vue.component('stopwatch', require('./components/layout/Stopwatch.vue').default);
Vue.component('vue-footer', require('./components/layout/Footer.vue').default)
//Vue.component('home-nav', require('./components/HomeNav.vue').default)
Vue.component('vue-import', require('./components/views/pages/VueImport.vue').default)
Vue.component('batch-submission', require('./components/views/pages/BatchSubmission.vue').default)
Vue.component('user-table', require('./components/views/user/UserTable.vue').default)
Vue.component('add-user', require('./components/views/user/AddUser.vue').default)
Vue.component('imported-data', require('./components/views/reports/ImportedData.vue').default)


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
    el: "#admin_index",
    data() {
        return {
            drawer: null,
            singleItems: [
                {
                    title: 'Dashboard',
                    icon: 'dashboard',
                    href: '/admin'
                },
                {
                    title: 'Submit Batch',
                    icon: 'whatshot',
                    href: '/submit'
                },
                {
                    title: 'Import CSV',
                    icon: 'publish',
                    href: '/import_csv'
                }
            ],
            dropDownItems: [
                {
                    active: false,
                    title: 'Reports',
                    icon: 'pie_chart',
                    items: [
                        {
                            title: 'Submitted Bags',
                            href: '/reports/bags_submitted'
                        },
                        {
                            title: 'Disparity Report',
                            href: '/reports/disparity_report'
                        },
                        {
                            title: 'Imported Data',
                            href: '/reports/imported_data'
                        }
                    ],
                },
                {
                    active: false,
                    title: 'User Management',
                    icon: 'supervisor_account',
                    items: [
                        {
                            title: 'Users',
                            href: '/admin/users'
                        },
                        {
                            title: 'Add User',
                            href: '/admin/users/create'
                        }
                    ],
                }

            ]
        }
    },
    methods: {
        submitForm() {
            let logoutForm = document.getElementById("logout-form");
            logoutForm.submit();
        }
    }


/*     data: {
        step: 1,
        bagIndex: 1,
        pillowIndex: 1,
        batches: {
            batchId: "",
            cooler: "",
            dateFilled: "",
            submitter: "",
            status: "Stuffed"
        },
        bags: [
            {
                package_id: "",
                bag_weight: "",
                flower_weight: ""
            }
        ],
        pillows: [
            {
                weight: ""
            }
        ],
        resetBtn: false,
    },
    mounted() {
        // flash data on page if reauth or validation error
        if (localStorage.getItem("batches")) {
            try {
                this.batches = JSON.parse(localStorage.getItem("batches"));
            } catch (e) {
                localStorage.removeItem("batches");
            }
        }
        if (localStorage.getItem("bags")) {
            try {
                this.bags = JSON.parse(localStorage.getItem("bags"));
            } catch (e) {
                localStorage.removeItem("bags");
            }
        }
        if (localStorage.getItem("pillows")) {
            try {
                this.pillows = JSON.parse(localStorage.getItem("pillows"));
            } catch (e) {
                localStorage.removeItem("pillows");
            }
        }
    },
    computed: {
        bagTotal() {
            let sum = 0;
            return this.bags.reduce((sum, bag) => sum + bag.flower_weight, 0);
        },
        pillowTotal() {
            let sum = 0;
            return this.pillows.reduce((sum, pillow) => sum + pillow.weight, 0);
        },
        bagCount() {
            let bagCount = this.bags.length;
            return this.bagIndex = bagCount;
        },
        pillowCount() {
            let pillowCount = this.pillows.length;
            return this.pillowIndex = pillowCount;
        }
    },
    methods: {
        saveBatches() {
            let parsed = JSON.stringify(this.batches);
            localStorage.setItem("batches", parsed, 900);
        },
        saveBags() {
            let parsed = JSON.stringify(this.bags);
            localStorage.setItem("bags", parsed, 900);
        },
        savePillows() {
            let parsed = JSON.stringify(this.pillows);
            localStorage.setItem("pillows", parsed, 900);
        },
        // methods for adding/removing additional field rows on bags submission
        addNewBagRow() {
            if (this.bagCount < 10) {
                this.bags.push({
                    package_id: "",
                    bag_weight: "",
                    flower_weight: ""
                });
            }
            this.saveBags();
            this.savePillows();
        },
        removeBagRow() {
            if (this.bagCount > 1) {
                this.bags.pop({
                    package_id: "",
                    bag_weight: "",
                    flower_weight: ""
                });

            }

            this.saveBags();
            this.savePillows();
        },
        // methods for adding/removing additional fields from pillows submission
        addNewPillow() {
            if (this.pillowCount < 10) {
                this.pillows.push({
                    weight: ""
                });
            }

            this.saveBags();
            this.savePillows();
        },
        removePillow() {
            if (this.pillowCount > 1) {
                this.pillows.pop({
                    weight: ""
                });
            }

            this.saveBags();
            this.savePillows();
        },
        // methods to make my stepper work
        prev() {
            this.step--;
            this.saveBatches();
            this.saveBags();
            this.savePillows();
        },
        next() {
            this.step++;
            this.saveBatches();
            this.saveBags();
            this.savePillows();
        },
        setStatus() {
            return "Stuffed";
        },
        clearStorage() {
            /* this.batches.batchId = '';
            this.batches.cooler = '';
            this.batches.dateFilled = '';
            this.batches.submitter = '';
            for (j = this.bagIndex; j > 1; j--) {
                this.bags[j].pop({
                    package_id: "",
                    bag_weight: "",
                    flower_weight: ""
                });
            }
            for (i = this.pillowIndex; i > 1; i--) {
                this.pillows[i].pop({
                    weight: ""
                });
            } 
            
            localStorage.clear();
            location.reload(true);

        },
        showResetBtn() {
            if (localStorage.length > 0) {
               return this.resetBtn = true;
            }
        }
    } */
});

