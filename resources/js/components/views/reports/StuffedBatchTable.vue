<template>
	<v-content>
		<v-container>
			<v-dialog
				v-model="dialog"
			>

			</v-dialog>
			<v-card>
				<v-card-title primary-title>
					<div class="display-1">Stuffed Batches</div>
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
						<td>{{ props.item.submitter }}</td>
						<td>{{ props.item.batch_id }}</td>
						<td>{{ props.item.cooler }}</td>
						<td>{{ props.item.total_batch_weight }}</td>
						<td>{{ props.item.total_flower_weight }}</td>
						<td>{{ props.item.created_at }}</td>
						<td class=" layout px-0">
              <v-btn
								flat
                small
                class="mr-2 grey"
								outline
                @click.once="runBatch(props.item)"
              >
                Run Batch
              </v-btn>
              
            </td>
					</template>
				</v-data-table>
			</v-card>
		</v-container>
	</v-content>
</template>

<script>
	import Papa from "papaparse";
	import moment from 'moment'

	export default {
		data() {
			return {
				dialog: false,
				headers: [
					{
						text: "Submitter ID",
						sortable: false,
						value: "submitter"
					},
					{
						text: "Batch ID",
						value: "batch_id"
					},
					{
						text: "Cooler",
						value: "cooler"
					},
					{
						text: "Total Flower Weight",
						value: "total_batch_weight"
					},
					{
						text: "Total Pillow Weight",
						value: "total_flower_weight"
					},
					{
						text: "Submit Date",
						value: "created_at"
					},
					{
						text: 'Actions',
						value: 'actions',
						sortable: false
					}
				],
				results: [],
				searchFilter: "",
				export: [],
				batchItem: {
					batch_id: '',
					date_run: '',
					res_temp_first: '',
					soak_time_first: '',
					aggitation_time_first: '',
					exit_temp_first: '',
					res_temp_scnd: '',
					soak_time_scnd: '',
					aggitation_time_scnd: '',
					exit_temp_scnd: '',
					total_time: ''
				},
				defaultItem: {
					batch_id: '',
					date_run: '',
					res_temp_first: '',
					soak_time_first: '',
					aggitation_time_first: '',
					exit_temp_first: '',
					res_temp_scnd: '',
					soak_time_scnd: '',
					aggitation_time_scnd: '',
					exit_temp_scnd: '',
					total_time: ''
				}
			};
		},
		created() {
			this.init()
		},
		methods: {
			routeFormat(id) {
				return "submit/" + id + "/edit";
			},
			
			/* downloadCsv() {
				// data from API
				let csv = Papa.unparse(this.export);
				// new blob for csv
				let csvData = new Blob([csv], { type: "text/csv;charset=utf-8" });
				// object url
				let csvUrl = window.URL.createObjectURL(csvData);

				let downloadBtn = document.createElement("a");
				downloadBtn.href = csvUrl;
				downloadBtn.setAttribute("download", "disparity_report.csv");
				downloadBtn.click();
			},
			exportObject() {
				// callback method to follow the ajax response
				// run a loop over each index and push object into the export data object
				for (let i = 0; i < this.results.length; i++) {
					// premake the disparity equation and return as var
					let disp =
						this.results[i].bag_weight - this.results[i].bag_match.flower_weight;
					// our object
					let object = {
						"Batch ID": this.results[i].bag_match.batch_id,
						"Package ID": this.results[i].bag_id,
						"Gross Weight": this.results[i].bag_weight,
						"Bag Weight": this.results[i].bag_match.flower_weight,
						Disparity: disp,
						"Date Submitted": this.results[i].created_at
					};
					this.export.push(object);
				}
			}, */
			format() {
				for (let i = 0; i < this.results.length; i++) {
					// format each date i for humans
					let t = moment(this.results[i].created_at)
					this.results[i].created_at = t.format('MM-DD-YYYY')
				}
			},
			runBatch(v) {
				
			},
			init() {
				axios
				.get("/api/stuffed_batches")
				.then(response => {
					this.results = response.data;
					this.format()
				})
				.catch(e => console.log(e));
			}
		}
	};
</script>

<style>
</style>
