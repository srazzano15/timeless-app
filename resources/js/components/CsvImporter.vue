<template>
    <div class="row">
        <h3>CSV Data Importer</h3>
        <hr>
        <!-- <form enctype="multipart/form-data" method="POST" action="">
            <slot></slot>
            <input type="file" name="csvFileImport" id="csvFileImport" @change="parseData">

        </form>
        {{ imported }} -->
        
    </div>
</template>

<script>
import Papa from 'papaparse';
import axios from 'axios';
import VueCsvImport from 'vue-csv-import';

export default {
    components: {
        VueCsvImport: 'vue-csv-import'
    },
    data() {
        return {
            imported: [],
        }
    },
    methods: {
        parseData() {
            let file = document
            let results = Papa.parse()
        }
    }
}
</script>

<style>

</style>
