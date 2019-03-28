<template>
    <div class="row">
        <h2>Dashboard</h2>
        <div class="card dashboard__card col s12 m3 l3 xl3">
            <div class="card-content">
                <div class="card-title">
                    <i class="fa fa-cannabis w3-xxlarge"></i>
                    <span >Bags Submitted</span>
                </div>
                <h3> <slot name="bagCount"></slot> </h3>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            
        }
    },

}
</script>

<style>

</style>
