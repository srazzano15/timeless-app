<template>
	<v-content>
		<v-container>
			<v-layout justify-center>
				<v-card>
					<v-card-title
						primary-title
						class="background--grey yel--text"
					>
						<span class="display-0">Import CSV</span>
					</v-card-title>
					<v-divider></v-divider>

					<v-card-text>
						<p>Please add a CSV file to import.</p>
						<br>
						<p>The file should not include a header row.</p>
						<br>
						<p>The following should be the columns represented in the import file.</p>
						<p style="font-weight: 700">Batch  |  Package  |  Flower Weight  |  Gross Weight</p>
					</v-card-text>
					<v-divider></v-divider>

					<v-card-actions 
						class="ma-2 d-flex"
					>

						<v-flex xs12>
							<slot name="import-form"></slot>
						</v-flex>

						<v-flex 
							grow
						>
							<v-btn
								color="primary"
								class="black--text"
								ripple
								@click.prevent="submitImport"
							>Import</v-btn>
						</v-flex>
					</v-card-actions>
				</v-card>
			</v-layout>
			<v-layout>
				<v-flex xs12 md6 offset-md3>
					<slot name="success"></slot>
				</v-flex>
			</v-layout>
		</v-container>
	</v-content>
</template>

<script>
export default {
	data() {
		return {
			success: true,
		}
	},
	methods: {
			submitImport() {
					let importFile = document.getElementById('import-form');
					importFile.submit();
			}
	}
}
</script>

<style>

</style>
