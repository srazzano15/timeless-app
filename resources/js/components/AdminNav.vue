<template>
    <div class="sidenav sidenav-fixed main-nav yel--text" >
    <div class="row">
        <div>
        <div class="col s2">
            <img :src="logoImg" class="center-align">
        </div>
        <div class="col s10">
            <span class="centered">Welcome, <slot name="welcome-name"></slot></span><br>
        </div>
        </div>
    </div>
    <hr>
    <span style="padding: 0 10px; font-size: 1em;">Where would you like to go?</span>
    
    <div class="main-nav__items">
    
        <div class="main-nav__item">
            <a :href="adminUrl">
            <i class="fa fa-tachometer-alt fa-fw"></i> Dashboard</a>
        </div>
        
        <div class="main-nav__item">
            <a :href="submitUrl">
            <i class="fas fa-leaf"></i>  Submit Bag Weights</a>
        </div>
        <div class="main-nav__dropdown">
          <a @click="toggleReportsDropDown"><i class="far fa-chart-bar"></i> Reports    
          <i id="reports_dropdown" class="fas fa-angle-right"></i></a>
        </div>
        <transition name="dropdown">
            <div id="reports_mgmt" v-show="reportsDropDown" >
                <div class="main-nav__item dropdown__item">
                <a :href="bagsSub" class="p-l"><i class="fa fa-angle-double-right"></i> Submitted Bags</a>
                </div>
            </div>
        </transition>
        <div class="main-nav__dropdown">
            <a @click="toggleUserDropDown"><i class="fa fa-users fa-fw"></i> User Management     
            <i id="user_dropdown" class="fas fa-angle-right"></i></a>
        </div>
        <transition name="dropdown">
        <div id="user_mgmt" v-show="userDropDown">
            <div class="main-nav__item dropdown__item">
                <a :href="adminUsers" class="p-l"><i class="fa fa-angle-double-right"></i> Users</a>
            </div>
            <div class="main-nav__item dropdown__item">
                <a :href="adminCreate" class="p-l"><i class="fa fa-angle-double-right"></i> Add User</a>
            </div>
        </div>
        </transition>
        <div class="main-nav__dropdown">
            <a @click="toggleAdminDropDown"><i class="fas fa-barcode fa-fw"></i> Orders  
            <i id="admin_dropdown" class="fas fa-angle-right"></i></a>
        </div>
        <transition name="dropdown">
            <div id="order_mgmt" v-show="adminDropDown">
                <div class="main-nav__item dropdown__item" >
                    <a :href="importCsv" class="p-l"><i class="fa fa-angle-double-right"></i>  Import CSV</a>
                </div>
                <div class="main-nav__item dropdown__item" >
                    <a :href="exportReport" class="p-l"><i class="fa fa-angle-double-right"></i>  Export Report</a>
                </div>
            </div>
        </transition>
        <div class="main-nav__item">
        <a class="" :href="logout"
            @click.prevent="submitForm">
            <i class="fa fa-cog fa-fw"></i>
            Logout
        </a>
        </div>
        <slot></slot>
    
    </div>
    
    </div>

</template>

<script>
export default {
    props: [
        'logoImg',
        'adminUrl',
        'submitUrl',
        'adminUsers',
        'adminCreate',
        'logout',
        'importCsv',
        'exportReport',
        'bagsSub',
    ],
    data() {
        return {
            userDropDown: false,
            adminDropDown: false,
            reportsDropDown: false,
        }
    },
    methods: {
        toggleUserDropDown() {
            let arrow = document.getElementById('user_dropdown');
            arrow.classList.toggle('active')
            this.userDropDown = !this.userDropDown;
        },
        toggleAdminDropDown() {
            let arrow = document.getElementById('admin_dropdown');
            arrow.classList.toggle('active')
            this.adminDropDown = !this.adminDropDown;
        },
        toggleReportsDropDown() {
            let arrow = document.getElementById('reports_dropdown');
            arrow.classList.toggle('active')
            this.reportsDropDown = !this.reportsDropDown;
        },
        submitForm() {
            let logoutForm = document.getElementById('logout-form')
            logoutForm.submit();

        }
    },

}
</script>

<style scoped>
.active {

  transform: rotate(90deg)
}
#admin_dropdown, 
#user_dropdown,
#reports_dropdown  {
    transition: all .3s ease;
}
.dropdown-leave-active, {
    transition: all .5s;
}
.dropdown-enter-active {
    transition: all .15s;
}
.dropdown-enter,
.dropdown-leave-to {
    opacity: 0;
    transform: translateY(-30px)
}

</style>