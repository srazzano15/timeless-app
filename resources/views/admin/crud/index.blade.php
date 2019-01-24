@extends('layouts.admin')

@section('content')
<div class="container" >

    <div class="jumbotron">
        <h1 class="display-3">Bag Submissions</h1>
        <p class="lead">Please Submit Batch Entry Form</p>
        <hr class="my-2" style="border-color: var(--yellow);">
    </div>



    <form action=" {{ route('submit.store') }} " method="post" class="px-3">
        @csrf
        
        <div v-show="step === 1">

            <div class="form-group form-row">

                    <label for="submitStatus" class="col-sm-2 col-form-label offset-md-2">Status</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control " name="submitStatus"
                        aria-describedby="submitStatus" v-model="setStatus()" readonly>

                    </div>

            </div>


            <div class="form-group form-row">

                    <label for="batchtext" class="col-sm-2 col-form-label offset-md-2">Batch ID</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control " name="bnum" id="batchtext" 
                        aria-describedby="batchtextInput" v-model="batches.batchId" placeholder="MKA-...">
                        <small class="text-danger">{{ $errors->first('bnum') }}</small>
                    </div>

            </div>
            <div class="form-group form-row">

                    <label for="cooler" class="col-sm-2 col-form-label offset-md-2">Cooler Stored In </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="cooler" id="cooler" 
                        aria-describedby="coolerStoredIn" v-model="batches.cooler" placeholder="Please insert coolor number">
                        <small class="text-danger">{{ $errors->first('cooler') }}</small>
                    </div>

            </div>

            <div class="form-group form-row">

                    <label for="dateFilled" class="col-sm-2 col-form-label offset-md-2">Date Filled </label>
                    <div class="col-sm-4">
                        <datepicker 
                            format="dd-MM-yyyy"
                            v-model="batches.dFilled"
                            name="dFilled"
                            :bootstrap-styling="true"
                        ></datepicker>
                        <small class="text-danger">{{ $errors->first('dfilled') }}</small>
                    </div>

            </div>


            <div class="form-group form-row">

                    <label for="submitter" class="col-sm-2 col-form-label offset-md-2">Submitter</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="submitter" id="submitter" 
                        aria-describedby="submitter" v-model="batches.submitter">
                    </div>

            </div>
                
                
                
                
            <button class="btn" type="button" v-if="showResetBtn()" v-on:click.prevent="clearStorage()">Reset Form</button>
            <button class="btn" type="button" v-on:click.prevent="next()">Next</button>

        </div>


        <div v-show="step === 2" v-cloak>
            <!-- Start Bag Rows -->
            
            <div class="form-group form-row mb-4">

                <label for="totalBagWeight" id="totalBagWeightLabel" class="col-sm-2 offset-md-2 col-form-label">Total Weight:</label>
                    <div class="col-sm-2 ">
                        <input type="text" class="form-control" name="totalBagWeight" id="totalBagWeight" 
                        aria-describedby="totalBagWeight"  v-model.number="bagTotal" readonly>
                        <small style="color: var(--yellow), font-size: 2em" >Target: 25000g</small>
                    </div>


                <div class="offset-md-1">
                    <button 
                        type="button" 
                        class="btn addRowBtn"
                        @click="addNewBagRow"
                    >+ Row
                    </button>
                </div>

                <div>
                    <button 
                        type="button" 
                        class="btn rmvRowBtn"
                        @click="removeBagRow"
                    >- Row
                    </button>
                </div>            

            </div>
                
            <div class="form-group form-row tbody_row" name="adminRow[]" v-for="(bag, index) in bags">
                <div class="col-sm-2 offset-md-3">
                    <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" 
                    placeholder="Bag Id" v-model="bag.package_id">
                </div>
                <div class="col-sm-2">
                    <input type="number" class="table_input  form-control" aria-describedby="bagWeight" 
                    name="bag_weight[]" placeholder="Bag Weight" v-model.number="bag.bag_weight" min="0">
                </div>
                <div class="col-sm-2">
                    <input type="number" class="table_input  form-control flower_weight" aria-describedby="flowerWeight" 
                    name="flow_weight[]" placeholder="Flower Weight" v-model.number="bag.flower_weight" min="0">
                </div>

            </div>

            <button class="btn" type="button" @click.prevent="prev()">Back</button>
            <button class="btn" type="button" @click.prevent="next()">Next</button>

            
        </div>

        <div v-show="step === 3" v-cloak>
        <!-- Start Pillow Rows -->


            <div class="form-group form-row mb-4">


                <label for="totalPillowWeight" id="totalPillowWeightLabel" class="col-sm-2 offset-md-2 col-form-label">Total Weight:</label>
                    <div class="col-sm-2 ">
                        <input type="text" class="form-control" name="totalPillowWeight" id="totalPillowWeight" 
                        aria-describedby="totalPillowWeight"  v-model.number="pillowTotal" readonly>
                    </div>

                <div class="offset-md-1">
                    <button 
                        type="button" 
                        class="btn addRowBtn"
                        @click="addNewPillow"
                    >+ Row
                    </button>
                </div>

                <div>
                    <button 
                        type="button" 
                        class="btn rmvRowBtn"
                        @click="removePillow"
                    >- Row
                    </button>
                </div>

            </div>
            
            <div class="form-group form-row tbody_row" name="pillowRow[]" v-for="(pillow, index) in pillows">

                <div class="col-sm-4 offset-md-4">                    
                        <input type="number" v-model.number="pillow.weight" class="table_input pillow_weight form-control" 
                        aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[]') }}" 
                        placeholder="How much do the pillows weigh?" min="0">                    
                </div>

            </div>

            <button class="btn" type="button" @click.prevent="prev()">Back</button>
            <button class="btn btn-success" type="submit" name="bags_submit" >Submit</button>
        </div>

    </form>
    

</div>

    
@endsection

@push('scripts')
   
@endpush

