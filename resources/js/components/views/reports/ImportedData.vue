<template>
  <v-content>
    <v-container>

      <v-dialog
        v-model="modal"
        max-width="500px"
      >
        <v-card>
          <v-card-title 
            class="elevation-3 grey"
            primary-title
          >
            <span class="headline white--text">{{ formTitle }}</span>
          </v-card-title>
          <v-divider></v-divider>
          <v-card-text class="pa-4">
            <v-form 
              ref="form"
              v-model="valid"
            >
              <v-text-field
                v-model="editedItem.batch_id"
                label="Batch ID"
                persistent-hint
                hint="Include if applicable, else, leave blank"
                name="batch_id"
                
              ></v-text-field>

              <v-text-field
                v-model="editedItem.bag_id"
                label="Bag ID"
                name="bag_id"
                :rules="[rules.required, rules.unique]"
                required
                validate-on-blur
              ></v-text-field>

              <v-text-field
                v-model.number="editedItem.bag_weight"
                label="Gross Weight"
                name="bag_weight"
                :rules="[rules.required]"
                required
                validate-on-blur
              ></v-text-field>

              <v-text-field
                v-model.number="editedItem.flower_weight"
                label="Flower Weight"
                name="flower_weight"
                :rules="[rules.required]"
                required
                validate-on-blur
              ></v-text-field>
            </v-form>
          </v-card-text>

          <v-card-actions class="pa-4">
            <v-spacer></v-spacer>
            
            <v-btn
              flat
              class="black--text "
              @click.stop="close"
            >Cancel</v-btn>

            <v-btn
              color="primary"
              class="black--text"
              @click.stop="save"
              :disabled="valid == false"
            >Save</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <!--End Modal-->

      <v-card>
				<v-card-title
					primary-title
				>
					<div class="display-1">Imported Bags</div>
					<v-spacer></v-spacer>
					<v-text-field
						v-model="searchFilter"
						append-icon="search"
						label="Search"
						single-line
						hide-details
					></v-text-field>
				</v-card-title>

        <v-btn
          color="secondary"
          class="my-2 ml-3"
          small
          @click.stop="modal = true"
        >Add Single Package</v-btn>
        <v-btn
          color="primary"
          class="black--text ml-0 my-2"
          small
          href="/import_csv"
        >Import CSV</v-btn>
				<v-data-table
						:headers="headers"
						:items="results"
						:search="searchFilter"
				>
					<template v-slot:items="props">
						<td>{{ props.item.bag_id }}</td>
						<td >{{ props.item.bag_weight }}</td>
						<td >{{ props.item.flower_weight }}</td>
						<td >{{ props.item.created_at }}</td>
            <td class="justify-center layout px-0">
              <v-icon
                small
                class="mr-2"
                @click.once="editItem(props.item)"
              >
                edit
              </v-icon>
              <v-icon
                small
                @click.once="deleteItem(props.item)"
                title="Delete Item"
              >
                delete
              </v-icon>
            </td>
					</template>

          
				</v-data-table>
			</v-card>
      <!--End DataTable-->
    </v-container>
  </v-content>
</template>

<script>

import moment from 'moment'
import { setTimeout } from 'timers'

export default {
  data() {
    return {
      modal: false,
      results: [],
      valid: true,
      headers: [
        {
          text: 'Package ID',
          value: 'bag_id',
          align: 'left'
        },
        {
          text: 'Gross Weight',
          value: 'bag_weight'
        },
        {
          text: 'Flower Weight',
          value: 'flower_weight'
        },
        {
          text: 'Import Date',
          value: 'created_at'
        },
        {
          text: 'Actions',
          value: 'actions',
          sortable: false
        },
      ],
      searchFilter: '',
      editedIndex: -1,
      editedItem: {
        batch_id: '',
        bag_id: '',
        bag_weight: '',
        flower_weight: ''
      },
      defaultItem: {
        batch_id: '',
        bag_id: '',
        bag_weight: '',
        flower_weight: ''
      },
      rules: {
        required: value => !!value || 'Required',
        unique: value => {
          for (let i = 0; i < this.results.length; i++) {
            let arr = Object.values(this.results[i])
            if (arr.includes(value)) {
              return 'Please include a unique package'
            }
          }
          return true
        }
      }
    }
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
  },
  watch: {
    modal(val) {
      val || this.close()
    }, 
    'editedItem.bag_id': function() {
      this.editedItem.bag_id = this.editedItem.bag_id.replace(/timeless/i, 'Timeless')
      this.editedItem.bag_id = this.editedItem.bag_id.replace(/\s/g, '')
      this.editedItem.bag_id = this.editedItem.bag_id.replace(/extract/gi, 'Extract')
      this.editedItem.bag_id = this.editedItem.bag_id.replace(/trim/gi, 'Trim')
      this.validate()
    },
    'editedItem.batch_id': function() {
      this.editedItem.batch_id = this.editedItem.batch_id.toUpperCase()
      this.editedItem.batch_id = this.editedItem.batch_id.replace(/\s/g, '')
    },
    'editedItem.bag_weight': 'validate',
    'editedItem.flower_weight': 'validate'

  },
  methods: {
    validate() {
      this.$refs.form.validate()
    },
    initialize() {
      window.axios
      .get('/api/imported')
      .then(r => {
        this.results = r.data
        this.formatDate()
      })
      .catch(e => (console.log(e)))
    },
    formatDate() {
      for (let i = 0; i < this.results.length; i++) {
        let t = moment(this.results[i].created_at)
        this.results[i].created_at = t.format('MM-DD-YYYY')
      }
    },
  
    save() {
      this.validate()
      if (this.valid === false) {
        return
      }
      if (this.editedIndex > -1) {
        Object.assign(this.results[this.editedIndex], this.editedItem)
        window.axios
          .patch(`/api/reports/imported_data/${this.results[this.editedIndex].id}`, {
            batch_id: this.results[this.editedIndex].batch_id,
            bag_id: this.results[this.editedIndex].bag_id,
            bag_weight: this.results[this.editedIndex].bag_weight,
            flower_weight: this.results[this.editedIndex].flower_weight
          })
          .then(() => {
            alert('Item was successfully updated.')
            this.initialize()
          })
          .catch(e => (console.log(e)))
      } else {
        window.axios
          .post(`/api/reports/imported_data`, {
            batch_id: this.editedItem.batch_id,
            bag_id: this.editedItem.bag_id,
            bag_weight: this.editedItem.bag_weight,
            flower_weight: this.editedItem.flower_weight
          })
          .then(() => {
            alert('Item was successfully created.')
            this.initialize()
          })
          .catch(e => (console.log(e)))
      }
      this.close()
    },

    close() {
      this.modal = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 500)
    },

    editItem(item) {
      this.editedIndex = this.results.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.modal = true

      console.log(this.editedItem)
    },

    deleteItem(item) {
      const index = this.results.indexOf(item)
      console.log(this.results[index].id) 

      if (confirm('Are you sure you want to delete this item?')) {
        window.axios
          .delete(`/api/reports/imported_data/${this.results[index].id}`)
          .then(() => {
            alert("Package successfully deleted")
            this.initialize()
          })
      }
    }
  },
  created() {
    this.initialize()
  }
}
</script>