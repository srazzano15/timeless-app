<template>
	<v-content>
		<v-container>
			<v-card>
				<v-card-title
					primary-title
				>
					<div class="display-1">Submitted Bags</div>
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
						:items="bags"
						:search="searchFilter"
				>
					<template v-slot:items="props">
						<td >{{ props.item.batch_id }}</td>
						<td >{{ props.item.package_id }}</td>
						<td >{{ props.item.bag_weight }}</td>
						<td >{{ props.item.flower_weight }}</td>
						<td >{{ props.item.created_at }}</td>
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

export default {
	data() {
		return {
			bags: [],
			headers: [
				{
					text: 'Batch ID',
					value: 'batch_id',
					align: 'left'
				},
				{
					text: 'Package ID',
					value: 'package_id'
				},
				{
					text: 'Bag Weight',
					value: 'bag_weight'
				},
				{
					text: 'Flower Weight',
					value: 'flower_weight'
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
			.get('/api/bag_stats')
			.then(r => {
				this.bags = r.data
			})
			.catch(e => {
				console.log(e)
			})
	},
	methods: {
		downloadCsv() {
			// data from API
			let csv = Papa.unparse(this.bags);
			// new blob for csv
			let csvData = new Blob([csv], {type: 'text/csv;charset=utf-8'});
			// object url
			let csvUrl = window.URL.createObjectURL(csvData);

			let downloadBtn = document.createElement('a');
			downloadBtn.href = csvUrl;
			downloadBtn.setAttribute('download', 'bags_report.csv');
			downloadBtn.click();
		}
	}
}
</script>

<style>

</style>




















<!--<template>
    <div class="row base__table--full">
        <h3>Bag Statistics</h3>
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
                    <th @click="sortCol('bag_weight')">Bag Weight</th>
                    <th @click="sortCol('flower_weight')">Flower Weight</th>
                    <th @click="sortCol('created_at')">Date Submitted</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(bag, index) in sortedBags" :key="index">
                    <td>{{ bag.batch_id }}</td>
                    <td>{{ bag.package_id }}</td>
                    <td>{{ bag.bag_weight }}</td>
                    <td>{{ bag.flower_weight }}</td>
                    <td>{{ bag.created_at }}</td>
                </tr>
            </tbody>
        </table>

        <p>
            <button class="btn btn--lk" @click="prevPage">Back</button>
            <button class="btn btn--lk" @click="nextPage">Next</button>
        </p>
    </div>
</template>

<script>

import Papa from 'papaparse';

export default {
    data() {
        return {
            bags: [],
            currentSort: 'batch_id',
            currentSortDir: 'asc',
            pageSize: 8,
            currentPage: 1,
            searchFilter: ''
        }
    },
    created() {
        window.axios
            .get('/api/bag_stats')
            .then(response => (this.bags = response.data))
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
            if ((this.currentPage * this.pageSize) < this.bags.length)
            this.currentPage++;
        },
        prevPage() {
            if (this.currentPage > 1)
            this.currentPage--;
        },
        downloadCsv() {
            // data from API
            let csv = Papa.unparse(this.bags);
            // new blob for csv
            let csvData = new Blob([csv], {type: 'text/csv;charset=utf-8'});
            // object url
            let csvUrl = window.URL.createObjectURL(csvData);

            let downloadBtn = document.createElement('a');
            downloadBtn.href = csvUrl;
            downloadBtn.setAttribute('download', 'bags_report.csv');
            downloadBtn.click();
        },
    },
    computed: {
        sortedBags() {
            let filter = this.searchFilter.toLowerCase();
            let bags = this.bags.filter((row, index) => {
                if (this.searchFilter === '' || this.bags[index].package_id.toLowerCase().indexOf(filter) >= 0) return true;
                    return false;
            });

            return bags.sort((a, b) => {
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
        }

    }

}
</script> 

<style>
th {
    cursor: pointer;
}
.bagStatsTable {
    overflow: hidden;
}
</style>-->
