<template>
  <v-content>
    <v-container>
      <v-card>
				<v-card-title
					primary-title
				>
					<div class="display-1">Users</div>
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
						<td>{{ props.item.id }}</td>
						<td>{{ props.item.name }}</td>
						<td>{{ props.item.email }}</td>
						<td>{{ props.item.created_at }}</td>
					</template>
          
				</v-data-table>
			</v-card>
    </v-container>
  </v-content>
</template>

<script>
export default {
  data() {
    return {
      headers: [
        {
          text: 'ID',
          value: 'id'
        },
        {
          text: 'Name',
          value: 'name'
        },
        {
          text: 'Email',
          value: 'email'
        },
        {
          text: 'Date Registered',
          value: 'created_at'
        }
      ],
      results: [],
      searchFilter: '',
    }
  },
  created() {
    window.axios
      .get('/api/all_users')
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
