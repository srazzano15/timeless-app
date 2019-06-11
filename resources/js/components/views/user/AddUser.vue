<template>
  <v-content>
    <v-container>
      
        <form :action="formRoute" method="POST">
          <v-layout row>
          <slot name="csrf"></slot>

          <v-flex 
            xs9 
            md3
            class="pa-2"
          >
            <v-text-field
              v-model="email"
              name="email"
              type="email"
              label="Email Address"
            ></v-text-field>
          </v-flex>
          
          <v-flex 
            xs3   
            md2
            class="pa-2"
          >
            <v-btn
              color="primary"
              class="black--text"
              type="submit"
            >Create Code</v-btn>
          </v-flex>
        
      </v-layout>
</form>
      <v-card>
				<v-card-title
					primary-title
				>
					<div class="display-1">Outstanding Invites</div>
					<v-spacer></v-spacer>
					<v-text-field
						v-model="searchFilter"
						append-icon="search"
						label="Search"
						single-line
						hide-details
					></v-text-field>
				</v-card-title>
				<v-data-table
						:headers="headers"
						:items="results"
						:search="searchFilter"
				>
					<template v-slot:items="props">
						<td>{{ props.item.code }}</td>
						<td>{{ props.item.for }}</td>
						<td>{{ props.item.created_at }}</td>
					</template>
          
				</v-data-table>
			</v-card>
    </v-container>
  </v-content>
</template>

<script>
export default {
  props: ['formRoute'],
  data() {
    return {
      email: null,
      headers: [
        {
          'text': 'Invite Code',
          'value': 'code'
        },
        {
          'text': 'Email Associated',
          'value': 'email'
        },
        {
          'text': 'Date Generated',
          'value': 'created_at'
        }
      ],
      searchFilter: '',
      results: []
    }
  },
  created() {
    window.axios
      .get('/api/invites')
      .then(r => {
        this.results = r.data
      })
      .catch(e => {
        console.log(e)
      })
  }
}
</script>

<style>

</style>
