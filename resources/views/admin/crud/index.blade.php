@extends('layouts.admin')

@section('content')
<div class="container" id="admin_index">

    <div class="jumbotron">
        <h1 class="display-3">Bag Submissions</h1>
        <p class="lead">Please Submit Batch Entry Form</p>
        <hr class="my-2" style="border-color: var(--yellow);">
    </div>

    <form action=" {{ route('test_post') }} " method="post" class="px-3">
        @csrf
        
        <div v-if="step === 1">
            <div class="form-group form-row">

                    <label for="batchtext" class="col-sm-2 col-form-label offset-md-2">Batch ID</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control " name="bnum" id="batchtext" 
                        aria-describedby="batchtextInput" value="{{ old('bnum') }}" placeholder="MKA-...">
                        <small class="text-danger">{{ $errors->first('bnum') }}</small>
                    </div>

            </div>
            <div class="form-group form-row">

                    <label for="cooler" class="col-sm-2 col-form-label offset-md-2">Cooler Stored In </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="cooler" id="cooler" 
                        aria-describedby="coolerStoredIn" value="{{ old('cooler') }}" placeholder="Please insert coolor number">
                        <small class="text-danger">{{ $errors->first('cooler') }}</small>
                    </div>

            </div>
            <div class="form-group form-row">

                    <label for="dateFilled" class="col-sm-2 col-form-label offset-md-2">Date Filled </label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="dfilled" id="dateFilled" 
                        aria-describedby="batchDateFilled" value="{{ old('dfilled') }}" placeholder="mm-dd-yyyy">
                        <small class="text-danger">{{ $errors->first('dfilled') }}</small>
                    </div>

            </div>
            <div class="form-group form-row">

                    <label for="kegsFilled" class="col-sm-2 col-form-label offset-md-2">Kegs Filled</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="kegsFilled" id="kegsFilled" 
                        aria-describedby="kegsFilled" value="{{ old('kegsFilled') }}" placeholder="Seperate keg numbers with a comma...">
                        <small class="text-danger">{{ $errors->first('kegsFilled') }}</small>
                    </div>

            </div>
            <div class="form-group form-row">

                    <label for="submitter" class="col-sm-2 col-form-label offset-md-2">Submitter</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="submitter" id="submitter" 
                        aria-describedby="submitter">
                    </div>

            </div>
                
                
                
                

            <button class="btn" type="button" @click.prevent="next()">Next</button>

        </div>


        <div v-if="step === 2" v-cloak>
            <!-- Start Bag Rows -->
            
            <div class="form-group form-row mb-4">

                <div class="offset-md-3">
                    <button 
                        type="button" 
                        class="btn addRowBtn"
                        @click="addNewBagRow"
                    >+
                    </button>
                </div>

                <div>
                    <button 
                        type="button" 
                        class="btn rmvRowBtn"
                        @click="removeBagRow"
                    >-
                    </button>
                </div>
            <p>debug: @{{ bagIndex }}</p>
                
                    <label for="totalBagWeight" class="col-sm-2 col-form-label">Total Weight:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="totalBagWeight" id="totalBagWeight" 
                        aria-describedby="totalBagWeight" v-model="" readonly>
                        <small style="color: var(--yellow)" >Target: 25000g</small>
                    </div>
                

            </div>
            
            <div class="form-group form-row tbody_row" name="adminRow[]" v-for="(bag, index) in bags">

                <div class="col-sm-3 offset-md-3">
                    <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" placeholder="Bag Id" 
                    v-model="bag.package_id">
                </div>

                <div class="col-sm-3">
                    <input type="text" class="table_input  form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" placeholder="Flower Weight" 
                    v-model="bag.flower_weight">
                </div>

            </div>

            <button class="btn" type="button" @click.prevent="prev()">Back</button>
            <button class="btn" type="button" @click.prevent="next()">Next</button>

            
        </div>

        <div v-if="step === 3" v-cloak>
        <!-- Start Pillow Rows -->


            <div class="form-group form-row mb-4">

                <div class="offset-md-4">
                    <button 
                        type="button" 
                        class="btn addRowBtn"
                        @click="addNewPillow"
                    >Add Row
                    </button>
                </div>

                <div>
                    <button 
                        type="button" 
                        class="btn rmvRowBtn"
                        @click="removePillow"
                    >Remove Row
                    </button>
                </div>

            </div>
            
            <div class="form-group form-row tbody_row" name="pillowRow[]" v-for="(pillow, index) in pillows">

                <div class="col-sm-4 offset-md-4">                    
                        <input type="text" v-model="pillow.weight" class="table_input pillow_weight form-control" 
                        aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[]') }}" 
                        placeholder="How much do the pillows weigh?">                    
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

