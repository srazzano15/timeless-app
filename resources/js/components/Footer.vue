<template>
  <v-footer 
		class="grey darken-3 pa-2 yel--text "
		app 
		height="auto"
	>
    <v-layout justify-center>
      <v-flex 
				text-xs-center
			>
				Timeless Batch Master - Version 1.2.0 <br>
				Developed by Razzbury Holdings LLC - {{ year }}
			</v-flex>
    </v-layout>
  </v-footer>
</template>

<script>
import moment from 'moment'
export default {
	data() {
		return {
			year: moment().year()
		}
	},

};
</script>

<style>
</style>
