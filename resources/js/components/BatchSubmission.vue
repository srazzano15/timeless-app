<template>
<v-content>
		<v-container>
				
				<v-stepper v-model="stepper">
					<v-stepper-header>
						<div v-for="(step, index) in steps" :key=index>
							<v-stepper-step
								:step="index + 1"
								:edit-icon="'check'"
								:complete-icon="'edit'"
								:editable="(index + 1) < stepper"
								:complete="(index + 1) <= stepper"
							>{{ step.label }}</v-stepper-step>
							<v-divider></v-divider>
						</div>
					</v-stepper-header>

					<v-stepper-items>
						<form :action="formRoute" method="POST">
							<slot name="csrf"></slot>
							<v-stepper-content step="1">
								<v-layout row wrap>

									<v-flex xs12 md6 class="px-2">
										<v-text-field
											label="Status"
											v-model="batch.status"
											readonly
											name="submitStatus"
											v-validate="'required'"
										></v-text-field>
									</v-flex>
								
									<v-flex xs12 md6 class="px-2">
										<v-text-field
											label="Batch ID"
											v-model="batch.batchId"
											name="bnum"
											v-validate="'required'"
										></v-text-field>
									</v-flex>

									<v-flex xs12 md6 class="px-2">
										<v-text-field
											label="Cooler"
											v-model.number="batch.cooler"
											name="cooler"
											v-validate="'required'"
										></v-text-field>
									</v-flex>

									<v-flex xs12 md6 class="px-2">
										<v-menu
											ref="picker"
											v-model="picker"
											:close-on-content-click="false"
											:nudge-right="40"
											:return-value.sync="batch.dateFilled"
											lazy
											transition="scale-transition"
											offset-y
											full-width
											min-width="290px"
										>
											<template v-slot:activator="{ on }">
												<v-text-field
													label="Date Filled"
													v-model="batch.dateFilled"
													prepend-icon="event"
													readonly
													v-on="on"
													name="dFilled"
													v-validate="'required'"
												></v-text-field>												
											</template>
											<v-date-picker 
												v-model="batch.dateFilled"
												no-title
												scrollable
												color="primary"
											>
												<v-spacer></v-spacer>

												<v-btn 
													flat
													color="grey darken-3"
													@click="picker = false"
												>Cancel</v-btn>

												<v-btn
													flat
													color="primary"
													@click="$refs.picker.save(batch.dateFilled)"
												>OK</v-btn>

											</v-date-picker>
										</v-menu>
									</v-flex>

									<v-flex xs12 md6 class="px-2">
										<v-autocomplete
											v-model="batch.submitter"
											:items="users"
											:search-input.sync="userSearch"
											hide-no-data
											hide-selected
											cache-items
											item-text="name"
											item-value="id"
											label="Submitter"
											name="submitter"
											v-validate="'required'"
										></v-autocomplete>
									</v-flex>

									<v-flex xs12>
										<v-btn
											@click.native="stepper = 2"
											color="primary"
											class="black--text"
										>Next Page</v-btn>
									</v-flex>
								</v-layout>
							</v-stepper-content>

							<v-stepper-content step="2">
								<v-layout row justify-center>
									<v-flex xs12 md4 class="px-2">
                    <v-text-field
                      v-model.number="bagTotal"
                      readonly
											label="Total Weight"
											name="totalBagWeight"
											v-validate="'required'"
                    ></v-text-field>
                  </v-flex>
								</v-layout>

								<v-layout row wrap v-for="(bag, index) in bags" :key="index">
									<v-flex xs12 md4 class="px-2">
										<v-autocomplete
											v-model="bag.packageId"
                      :search-input.sync="bag.bagSearch"
                      :items="imported"
                      item-text="bag_id"
                      item-value="bag_id"
											hide-selected
											hide-no-data
											cache-items
											name="package_id[]"
											@input="selectedBags.push(bag.packageId)"
											v-validate="'required'"
										></v-autocomplete>
									</v-flex>

									<v-flex xs5 md3 class="px-2">
										<v-text-field
											label="Bag Weight"
											v-model.number="bag.bagWeight"
											name="bag_weight[]"
											v-validate="'required'"
										></v-text-field>
									</v-flex>
									
									<v-flex xs5 md3 class="px-2">
										<v-text-field
											label="Flower Weight"
											v-model.number="bag.flowerWeight"
											name="flow_weight[]"
											v-validate="'required'"
										></v-text-field>
									</v-flex>
									<v-btn
										small
										fab
										@click="addBagRow"
										color="green"
									>+</v-btn>
									<v-btn
										small
										fab
										@click="removeBagRow"
										color="red"
									>-</v-btn>
								</v-layout>

								<v-layout row>
									<v-flex xs6 md1>
										<v-btn
											@click.native="stepper = 1"
											class="black--text"
											flat
										>Previous Page</v-btn>
									</v-flex>

									<v-flex xs6 md1>
										<v-btn
											@click.native="stepper = 3"
											class="black--text"
											color="primary"
										>Next Page</v-btn>
									</v-flex>
								</v-layout>
							</v-stepper-content>

							<v-stepper-content step="3">

								<v-layout row justify-center>
									<v-flex xs12 md4 class="px-2">
										<v-text-field
											readonly
											v-model.number="pillowTotal"
											label="Total Weight"
											name="totalPillowWeight"
											v-validate="'required'"
										></v-text-field>
									</v-flex>
								</v-layout>

								<v-layout justify-center row v-for="(pillow, index) in pillows" :key="index">
									<v-flex xs10 md4 class="px-2">
										<v-text-field
											v-model.number="pillow.pillowWeight"
											label="Pillow Weight"
											name="pillow[]"
											v-validate="'required'"
										></v-text-field>
									</v-flex>
									<v-btn
											small
											fab
											@click="addPillowRow"
											color="green"
									>+</v-btn>
									<v-btn
										small
										fab
										@click="removePillowRow"
										color="red"
									>-</v-btn>
								</v-layout>
								
								<v-layout row>
									<v-flex xs6 md1>
										<v-btn 
											flat
											@click="stepper = 2"
										>Previous Page</v-btn>
									</v-flex>

									<v-flex xs6 md1>
										<v-btn
											color="primary"
											type="submit"
											class="black--text"
										>Submit Batch</v-btn>
									</v-flex>
								</v-layout>
							</v-stepper-content>
						</form>
					</v-stepper-items>
				</v-stepper>
				<slot name="errors"></slot>
		</v-container>
</v-content> 
</template>

<script>

import moment from 'moment'
import axios from 'axios'

export default {
	props: ['formRoute'],
	data() {
		return {
			stepper: 0,
			steps: [
				{
					label: "Batch Information",
					completed: false
				},
				{
					label: "Bag Information",
					completed: false
				},
				{
					label: "Pillow Information",
					completed: false
				}
			],
			picker: false,
			userSearch: null,
			selectedUser: null,
			selectedBags: [],
			batch: {
				status: 'Stuffed',
				batchId: null,
				cooler: null,
				dateFilled: null,
				submitter: null
			},
			//filteredUsers: [],
			users: [],
			//filteredBags: [],
			imported: [],
			bags: [
				{
					bagSearch: null,
					packageId: "",
					bagWeight: null,
					flowerWeight: null
				}
			],
			pillows: [
				{
					pillowWeight: null
				}
			],
		}
	},
	methods: {
		addBagRow() {
      if (this.bagCount < 10) {
        this.bags.push({
          packageId: "",
          bagWeight: "",
          flowerWeight: ""
        });
      }

    },
    removeBagRow() {
      if (this.bagCount > 1) {
        this.bags.pop({
          packageId: "",
          bagWeight: "",
          flowerWeight: ""
        });
      }
		},
		addPillowRow() {
      if (this.pillowCount < 10) {
        this.pillows.push({
          pillowWeight: ""
        });
      }

    },
    removePillowRow() {
      if (this.pillowCount > 1) {
        this.pillows.pop({
          pillowWeight: ""
        });
      }
		},
		saveBatches() {
      let parsed = JSON.stringify(this.batch);
      localStorage.setItem("batch", parsed);
    },
    saveBags() {
      let parsed = JSON.stringify(this.bags);
      localStorage.setItem("bags", parsed);
    },
    savePillows() {
      let parsed = JSON.stringify(this.pillows);
      localStorage.setItem("pillows", parsed);
		},
		getUsers() {
			return axios.get('api/all_users')
		},
		getBags() {
			return axios.get('api/imported')
		}
	},
	created() {
		window.axios
			.get('api/all_users')
			.then(r => {
				this.users = r.data
			})
			.catch(e => console.log(e))
		window.axios
			.get('api/imported')
			.then(r => {
				this.imported = r.data
			})
			.catch(e => console.log(e))
  },
  mounted() {		
		// flash data on page if reauth or validation error
    if (localStorage.getItem("batch")) {
      try {
        this.batch = JSON.parse(localStorage.getItem("batch"));
      } catch (e) {
        localStorage.removeItem("batch");
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
	watch: {
		userSearch(val) {
			val && val !== this.batch.submitter 
		},
		bagSearch(val) {
      val && !this.selectedBags.includes(val)
		},
		stepper() {
			let self = this
			if (self.stepper === 3) {
				setInterval(() => {
					self.saveBatches()
					self.saveBags()
					self.savePillows()
				}, 500)
			}
		}
	},
	computed: {
		bagTotal() {
			let sum = 0
			return this.bags.reduce((sum, bag) => sum + bag.flowerWeight, 0)
		},
		pillowTotal() {
			let sum = 0
			return this.pillows.reduce((sum, pillow) => sum + pillow.pillowWeight, 0)
		},
		bagCount() {
			return this.bags.length
		},
		pillowCount() {
			return this.pillows.length
		},
	
	}
}
</script>

