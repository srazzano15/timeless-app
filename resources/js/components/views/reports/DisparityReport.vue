<template>
	<v-content>
		<v-container>
			<v-card>
				<v-card-title
					primary-title
				>
					<div class="display-1">Disparity Report</div>
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
						must-sort
				>
					<template v-slot:items="props">
						<td>{{ props.item.bag_match.batch_id }}</td>
						<td>{{ props.item.bag_id }}</td>
						<td>{{ props.item.bag_weight }}</td>
						<td>{{ props.item.bag_match.bag_weight }}</td>
						<td>{{ props.item.disparity }}</td>
						<td>{{ props.item.created_at }}</td>
					</template>

					<template v-slot:footer>
						<v-btn 
							@click="downloadCsv"
							color="primary"
							class="black--text"
						>Export CSV</v-btn>
					</template>
				</v-data-table>
			</v-card>
		</v-container>
	</v-content>
</template>

<script>

import axios from 'axios'
import Papa from 'papaparse'
import moment from 'moment'

export default {
	data() {
		return {
			results: [],
			export: [],
			headers: [
				{
					text: 'Batch ID',
					value: 'bag_match.batch_id',
					align: 'left'
				},
				{
					text: 'Package ID',
					value: 'bag_id'
				},
				{
					text: 'Gross Weight',
					value: 'bag_weight'
				},
				{
					text: 'Input Bag Weight',
					value: 'bag_match.bag_weight'
				},
				{
					text: 'Disparity',
					value: 'disparity'
				},
				{
					text: 'Submit Date',
					value: 'created_at'
				}
			],
			searchFilter: '',
		}
	},
	created() {
		window.axios
			.get('/api/disparity_data')
			.then(r => {
				this.results = r.data
				this.format()
				this.exportObject()
			})
			.catch(e => {
				console.log(e)
			})
	},
	methods: {
		downloadCsv() {
			// data from API
			let csv = Papa.unparse(this.export);
			// new blob for csv
			let csvData = new Blob([csv], {type: 'text/csv;charset=utf-8'});
			// object url
			let csvUrl = window.URL.createObjectURL(csvData);

			let downloadBtn = document.createElement('a');
			downloadBtn.href = csvUrl;
			downloadBtn.setAttribute('download', `disparity_report_${moment().format('MM-DD-YY')}.csv`);
			downloadBtn.click();
    },
		exportObject() {
			// callback method to follow the ajax response
			// run a loop over each index and push object into the export data object
			for (let i = 0; i < this.results.length; i++) {
					// our object
					let object = {
						'Batch ID' : this.results[i].bag_match.batch_id,
						'Package ID' : this.results[i].bag_id,
						'Gross Weight' : this.results[i].bag_weight,
						'Input Bag Weight' : this.results[i].bag_match.bag_weight,
						'Disparity' : this.results[i].disparity,
						'Date Submitted' : this.results[i].created_at
					}
					this.export.push(object)
			}
		},
		format() {
			for (let i = 0; i < this.results.length; i++) {
					// format the date as it is coming in through the request
					let t = moment(this.results[i].created_at)
					this.results[i].created_at = t.format('MM-DD-YYYY')
					// premake the disparity values and create as new object property
					let d = this.results[i].bag_weight - this.results[i].bag_match.bag_weight
					this.results[i].disparity = d
			}
		},
		
	}
}
</script>




<!--template>
    <div class="row base__table--full">
        <h3>Disparity Report</h3>
        <hr>
        <div class="row">
            <div class="input-field col s6 m3 l3">
                <input type="text" v-model="searchFilter" placeholder="Search for a Package ID">
            </div>
            <div class="input-field col s6 m3 l3 offset-m6 offset-l6 offset-xl6 p-t">
                <a id="bagsStatsExport" @click="downloadCsv" type="button" class="btn btn--p">Export CSV</a>
            </div>
        </div>
        <table class="highlight reports__table">
            <thead>
                <tr>
                    <th @click="sortCol('batch_id')">Batch ID</th>
                    <th @click="sortCol('package_id')">Package ID</th>
                    <th @click="sortCol('gross_weight')">Gross Weight</th>
                    <th @click="sortCol('bag_weight')">Input Bag Weight</th>
                    <th @click="sortCol('disparity')">Disparity</th>
                    <th @click="sortCol('created_at')">Date Submitted</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(result, index) in sortedResults" :key="index">
                    <td>{{ result.bag_match.batch_id }}</td>
                    <td>{{ result.bag_id }}</td>
                    <td>{{ result.bag_weight }}</td>
                    <td>{{ result.bag_match.bag_weight }}</td>
                    <td>{{ result.bag_weight - result.bag_match.bag_weight }}</td>
                    <td>{{ result.created_at }}</td>
                </tr>
            </tbody>
        </table>

        <p>
            <button class="btn btn--lk" @click="prevPage">Back</button>
            <button class="btn btn--lk" @click="nextPage">Next</button>
        </p>
        
    </div>
</<!--template>

<script>

import Papa from 'papaparse';

export default {
    data() {
        return {
            results: [],
            currentSort: 'batch_id',
            currentSortDir: 'asc',
            pageSize: 10,
            currentPage: 1,
            searchFilter: '',
            export: []
        }
    },
    created() {
        window.axios
            .get('/api/disparity_data')
            .then(response => {
                this.results = response.data
                this.exportObject()                
            })
            .catch(e => (console.log(e)))
            
    },
    methods: {
        sortCol(col) {
            // if col == current sort, reverse direction
            if (col === this.currentSort) {
                this.currentSortDir = this.currentSortDir === 'asc' ? 'desc': 'asc';
            }
            this.currentSort = col;
        },
        nextPage() {
            if ((this.currentPage * this.pageSize) < this.results.length)
            this.currentPage++;
        },
        prevPage() {
            if (this.currentPage > 1)
            this.currentPage--;
        },
        downloadCsv() {
            // data from API
            let csv = Papa.unparse(this.export);
            // new blob for csv
            let csvData = new Blob([csv], {type: 'text/csv;charset=utf-8'});
            // object url
            let csvUrl = window.URL.createObjectURL(csvData);

            let downloadBtn = document.createElement('a');
            downloadBtn.href = csvUrl;
            downloadBtn.setAttribute('download', 'disparity_report.csv');
            downloadBtn.click();
        },
        exportObject() {
            // callback method to follow the ajax response
            // run a loop over each index and push object into the export data object
            for (let i = 0; i < this.results.length; i++) {
                // premake the disparity equation and return as var
                let disp = this.results[i].bag_weight - this.results[i].bag_match.bag_weight;
                // our object
                let object = {
                    'Batch ID' : this.results[i].bag_match.batch_id,
                    'Package ID' : this.results[i].bag_id,
                    'Gross Weight' : this.results[i].bag_weight,
                    'Input Bag Weight' : this.results[i].bag_match.bag_weight,
                    'Disparity' : disp,
                    'Date Submitted' : this.results[i].created_at
                }
                this.export.push(object)
            }
        }
    },
    computed: {
        sortedResults() {
            let filter = this.searchFilter.toLowerCase();
            let results = this.results.filter((row, index) => {
                if (this.searchFilter === '' || this.results[index].package_id.toLowerCase().indexOf(filter) >= 0) return true;
                    return false;
            });

            return results.sort((a, b) => {
                let mod = 1;
                if (this.currentSortDir === 'desc') mod = -1;
                if (a[this.currentSort] < b[this.currentSort]) return -1 * mod;
                if (a[this.currentSort] > b[this.currentSort]) return 1 * mod;
                return 0;
            })
            .filter((row, index) => {
                let start = (this.currentPage - 1) * this.pageSize;
                let end = this.currentPage * this.pageSize;
                if (index >= start && index < end)
                return true;
            })  
        },
        firstPage() {
            if (this.searchFilter) 
            return this.currentPage = 1;
        },

    }
}
</script>

<style>
th {
    cursor: pointer;
}

</style>-->
