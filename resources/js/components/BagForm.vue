<template>
  <div class="submission__form">
    <div class="jumbotron">
      <h1 class="display-3">Bag Submissions</h1>
      <p class="lead">Please Submit Batch Entry Form</p>
      <hr class="my-2" style="border-color: var(--yellow);">
    </div>

    <form :action="formAction" method="post" class="px-3">
      <slot></slot>

      <div v-show="step === 1">
        



        <div class="row">
          <div class="input-field col s12">
            <input
              type="text"
              name="submitStatus"
              aria-describedby="submitStatus"
              v-model="batches.status"
              readonly
            >
            <label for="submitStatus">Status</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input
              type="text"
              name="bnum"
              id="batchtext"
              aria-describedby="batchtextInput"
              v-model="batches.batchId"
            >
            <label for="batchtext">Batch ID</label>
            <small class="text-danger"></small>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input
              type="text"
              class="form-control"
              name="cooler"
              id="cooler"
              aria-describedby="coolerStoredIn"
              v-model="batches.cooler"
            >
            <label for="cooler">Cooler Stored In</label>
            <small class="text-danger"></small>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <datepicker
              format="dd-MM-yyyy"
              v-model="batches.dFilled"
              name="dFilled"
              placeholder="Date Filled"
            ></datepicker>

            <small class="text-danger"></small>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m6">
            <select name="submitter" v-model="batches.submitter" class="browser-default">
              <!-- <input type="text" class="form-control" name="submitter"
              aria-describedby="submitter"  >-->
              <option :value="null" disabled selected>Please Select User</option>
              <option v-for="(user, index) in users" :key="index" :value="user.id">{{ user.name }}</option>
            </select>
            <label for="submitter">Submitter</label>
          </div>
        </div>

        <button
          class="btn btn--p"
          type="button"
          v-if="showResetBtn()"
          v-on:click.prevent="clearStorage()"
        >Reset Form</button>
        <button class="btn btn--p" type="button" v-on:click.prevent="next()">Next</button>
      </div>

      <div v-show="step === 2" v-cloak>
        <!-- Start Bag Rows -->

        <div class="row">
          <div class="input-field col s12 m6 offset-m3">
            <input
              type="text"
              name="totalBagWeight"
              id="totalBagWeight"
              aria-describedby="totalBagWeight"
              v-model.number="bagTotal"
              readonly
            >
            <label for="totalBagWeight" id="totalBagWeightLabel">Total Weight:</label>
            <small style="color: var(--yellow), font-size: 2em">Target: 25000g</small>
          </div>
        </div>
        <div class="row">
          <div class="col s1">
            <button type="button" class="btn addRowBtn" @click="addNewBagRow">+ Row</button>
          </div>

          <div class="col s1">
            <button type="button" class="btn rmvRowBtn" @click="removeBagRow">- Row</button>
          </div>
        </div>

        <div class="row" name="adminRow[]" v-for="(bag, index) in bags" :key="index">
          <div class="col s4 input-field">
<!--             <input
              type="text"
              aria-describedby="packageId"
              name="package_id[]"
              placeholder="Bag Id"
              v-model="bag.package_id"

            > -->
        <autocomplete
          :source="imported"
          input-class="input-field"
          placeholder="Search Bags"
          resultsDisplay="bag_id"
          resultsValue="bag_id"
          v-model="bag.package_id"
          name="package_id[]"
        >
        </autocomplete>
          </div>
          <div class="col s4 input-field">
            <input
              type="number"
              aria-describedby="bagWeight"
              name="bag_weight[]"
              placeholder="Bag Weight"
              v-model.number="bag.bag_weight"
              min="0"
            >
          </div>
          <div class="col s4 input-field">
            <input
              type="number"
              aria-describedby="flowerWeight"
              name="flow_weight[]"
              placeholder="Flower Weight"
              v-model.number="bag.flower_weight"
              min="0"
            >
          </div>
        </div>

        <button class="btn btn--p" type="button" @click.prevent="prev()">Back</button>
        <button class="btn btn--p" type="button" @click.prevent="next()">Next</button>
      </div>

      <div v-show="step === 3" v-cloak>
        <!-- Start Pillow Rows -->
        <div class="row">
          <div class="input-field col s12 m6 offset-m3">
            <input
              type="text"
              name="totalPillowWeight"
              id="totalPillowWeight"
              aria-describedby="totalPillowWeight"
              v-model.number="pillowTotal"
              readonly
            >
            <label for="totalPillowWeight" id="totalPillowWeightLabel">Total Weight:</label>
          </div>
        </div>
        <div class="row">
          <div class="col s1">
            <button type="button" class="btn addRowBtn" @click="addNewPillow">+ Row</button>
          </div>

          <div class="col s1">
            <button type="button" class="btn rmvRowBtn" @click="removePillow">- Row</button>
          </div>
        </div>

        <div class="row" name="pillowRow[]" v-for="(pillow, index) in pillows" :key="index">
          <div class="input-field col s12">
            <input
              type="number"
              v-model.number="pillow.weight"
              aria-describedby="pillowWeight"
              name="pillow[]"
              placeholder="How much do the pillows weigh?"
              min="0"
            >
          </div>
        </div>

        <button class="btn btn--p" type="button" @click.prevent="prev()">Back</button>
        <button class="btn btn--p" type="submit" name="bags_submit">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import datepicker from "vuejs-datepicker";
import axios from "axios";
import autocomplete from 'vuejs-auto-complete';

export default {
  components: {
    datepicker,
    autocomplete
  },
  props: {
    formAction: String
  },
  data() {
    return {
      test: '',
      users: [],
      imported: [],
      step: 1,
      bagIndex: 1,
      pillowIndex: 1,
      batches: {
        batchId: "",
        cooler: "",
        dateFilled: "",
        submitter: "",
        status: "Stuffed"
      },
      bags: [
        {
          package_id: "",
          bag_weight: "",
          flower_weight: ""
        }
      ],
      pillows: [
        {
          weight: ""
        }
      ],
      resetBtn: false,
      errors: []
    };
  },
  created() {
    window.axios
      .get("api/all_users")
      .then(response => (this.users = response.data))
      .catch(e => {
        this.errors.push(e);
      });
    window.axios
      .get("api/imported")
      .then(response => (this.imported = response.data))
      .catch(e => {
        this.errors.push(e);
      });
  },
  mounted() {
    // flash data on page if reauth or validation error
    if (localStorage.getItem("batches")) {
      try {
        this.batches = JSON.parse(localStorage.getItem("batches"));
      } catch (e) {
        localStorage.removeItem("batches");
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
  computed: {
    bagTotal() {
      let sum = 0;
      return this.bags.reduce((sum, bag) => sum + bag.flower_weight, 0);
    },
    pillowTotal() {
      let sum = 0;
      return this.pillows.reduce((sum, pillow) => sum + pillow.weight, 0);
    },
    bagCount() {
      let bagCount = this.bags.length;
      return (this.bagIndex = bagCount);
    },
    pillowCount() {
      let pillowCount = this.pillows.length;
      return (this.pillowIndex = pillowCount);
    }
  },
  methods: {
    saveBatches() {
      let parsed = JSON.stringify(this.batches);
      localStorage.setItem("batches", parsed, 900);
    },
    saveBags() {
      let parsed = JSON.stringify(this.bags);
      localStorage.setItem("bags", parsed, 900);
    },
    savePillows() {
      let parsed = JSON.stringify(this.pillows);
      localStorage.setItem("pillows", parsed, 900);
    },
    // methods for adding/removing additional field rows on bags submission
    addNewBagRow() {
      if (this.bagCount < 10) {
        this.bags.push({
          package_id: "",
          bag_weight: "",
          flower_weight: ""
        });
      }
      this.saveBags();
      this.savePillows();
    },
    removeBagRow() {
      if (this.bagCount > 1) {
        this.bags.pop({
          package_id: "",
          bag_weight: "",
          flower_weight: ""
        });
      }

      this.saveBags();
      this.savePillows();
    },
    // methods for adding/removing additional fields from pillows submission
    addNewPillow() {
      if (this.pillowCount < 10) {
        this.pillows.push({
          weight: ""
        });
      }

      this.saveBags();
      this.savePillows();
    },
    removePillow() {
      if (this.pillowCount > 1) {
        this.pillows.pop({
          weight: ""
        });
      }

      this.saveBags();
      this.savePillows();
    },
    // methods to make my stepper work
    prev() {
      this.step--;
      this.saveBatches();
      this.saveBags();
      this.savePillows();
    },
    next() {
      this.step++;
      this.saveBatches();
      this.saveBags();
      this.savePillows();
    },
    setStatus() {
      return "Stuffed";
    },
    clearStorage() {
      /* this.batches.batchId = '';
            this.batches.cooler = '';
            this.batches.dateFilled = '';
            this.batches.submitter = '';
            for (j = this.bagIndex; j > 1; j--) {
                this.bags[j].pop({
                    package_id: "",
                    bag_weight: "",
                    flower_weight: ""
                });
            }
            for (i = this.pillowIndex; i > 1; i--) {
                this.pillows[i].pop({
                    weight: ""
                });
            } */

      localStorage.clear();
      location.reload(true);
    },
    showResetBtn() {
      if (localStorage.length > 0) {
        return (this.resetBtn = true);
      }
    }
  }
};
</script>

<style>
.IZ-select__item {
  background-color: grey;
  z-index: 9999;
}

</style>
