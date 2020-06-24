<template>
<v-content>
 <v-layout>
  <v-toolbar
		color="grey darken-4"

	>
		<v-toolbar-side-icon class="yel--text" @click.stop="drawerAction"></v-toolbar-side-icon>
		<v-toolbar-title class="yel--text">Timeless Batch Master</v-toolbar-title>
		<v-spacer></v-spacer>
	</v-toolbar>
    <v-navigation-drawer
      v-model="drawer"
      absolute
      dark
      temporary

    >
      <v-list class="pa-1">


        <v-list-tile avatar tag="div">
          <v-list-tile-avatar>
            <img src="/images/timeless_drip_logo.png">
          </v-list-tile-avatar>

          <v-list-tile-content>
            <v-list-tile-title><slot name="user"></slot></v-list-tile-title>
          </v-list-tile-content>


        </v-list-tile>
      </v-list>

      <v-list class="pt-0" dense>
        <v-divider light></v-divider>

        <v-list-tile
          v-for="item in singleItems"
          :key="item.title"
          :href="item.href"
        >
          <v-list-tile-action>
            <v-icon>{{item.icon}}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>{{ item.title }}</v-list-tile-content>
        </v-list-tile>

        <v-list-group
          v-for="item in dropDownItems"
          :key="item.title"
          :prepend-icon="item.icon"
          v-model="item.active"
          no-action
        >
          <template v-slot:activator>
            <v-list-tile>
              <v-list-tile-content>
                <v-list-tile-title>{{ item.title }}</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </template>

          <v-list-tile
            v-for="subItem in item.items"
            :key="subItem.title"
            :href="subItem.href"
          >
            <v-list-tile-content>
              <v-list-tile-title>{{ subItem.title }}</v-list-tile-title>
            </v-list-tile-content>

          </v-list-tile>
        </v-list-group>

        <v-list-tile
          @click.prevent="submitForm"
          href="/logout"
        >
          <v-list-tile-action>
            <v-icon>work_off</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>Logout</v-list-tile-content>
        </v-list-tile>

      </v-list>
      <slot name="logout-form"></slot>
    </v-navigation-drawer>
    </v-layout>
    </v-content>
</template>

<script>

import { eventBus } from '../app.js'

export default {


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
              href: '/admin/edit'
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
  },
  created() {
    eventBus.$on('drawerOpened', (data) => {
      this.drawer = data;
    })
  }
}
</script>

<style>

</style>
