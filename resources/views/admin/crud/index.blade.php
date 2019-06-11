@extends('layouts.admin')

@section('content')
{{-- <bag-form
    form-action=" {{ url('/submit') }} "

>
@csrf
</bag-form> --}}

<batch-submission
    form-route=" {{ url('/submit') }} "
>
    <template v-slot:csrf>
        @csrf
    </template>

    <template v-slot:errors>
        @if ($errors->any())
            <ul class="mt-3">
                @foreach ($errors->all() as $e)
                    <li class="red--text">{{ $e }}</li>
                @endforeach
            </ul>
        @endif
    </template>
</batch-submission>

{{-- <div class="submission__form">

    <div class="jumbotron">
        <h1 class="display-3">Bag Submissions</h1>
        <p class="lead">Please Submit Batch Entry Form</p>
        <hr class="my-2" style="border-color: var(--yellow);">
    </div>



    <form action=" {{ route('submit.store') }} " method="post" class="px-3">
        @csrf
        
        <div v-show="step === 1">

            <div class="row">                    
                <div class="input-field col s12">
                    <input type="text" name="submitStatus"
                    aria-describedby="submitStatus" v-model="setStatus()" readonly>
                    <label for="submitStatus">Status</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="bnum" id="batchtext" 
                    aria-describedby="batchtextInput" v-model="batches.batchId" >
                    <label for="batchtext">Batch ID</label>
                    <small class="text-danger">{{ $errors->first('bnum') }}</small>
                </div>
            </div>

            <div class="row">
                
                <div class="input-field col s12">
                    <input type="text" class="form-control" name="cooler" id="cooler" 
                    aria-describedby="coolerStoredIn" v-model="batches.cooler">
                    <label for="cooler">Cooler Stored In </label>
                    <small class="text-danger">{{ $errors->first('cooler') }}</small>
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

                    <small class="text-danger">{{ $errors->first('dfilled') }}</small>
                </div>
            </div>


            <div class="row">
                
                <div class="input-field col s12">
                    <input type="text" class="form-control" name="submitter" id="submitter" 
                    aria-describedby="submitter" :value=" {{ json_encode($user->id) }} " {{-- v-model="batches.submitter"  readonly>
                    <label for="submitter">Submitter</label>
                </div>
            </div>
                
                
                
                
            <button class="btn btn--p" type="button" v-if="showResetBtn()" v-on:click.prevent="clearStorage()">Reset Form</button>
            <button class="btn btn--p" type="button" v-on:click.prevent="next()">Next</button>

        </div>


        <div v-show="step === 2" v-cloak>
            <!-- Start Bag Rows -->
            
            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input type="text" name="totalBagWeight" id="totalBagWeight" 
                    aria-describedby="totalBagWeight"  v-model.number="bagTotal" readonly>
                    <label for="totalBagWeight" id="totalBagWeightLabel">Total Weight: </label>
                    <small style="color: var(--yellow), font-size: 2em" >Target: 25000g</small>
                </div>
            </div>
            <div class="row">
                <div class="col s1">
                    <button 
                        type="button" 
                        class="btn addRowBtn"
                        @click="addNewBagRow"
                    >+ Row
                    </button>
                </div>

                <div class="col s1">
                    <button 
                        type="button" 
                        class="btn rmvRowBtn"
                        @click="removeBagRow"
                    >- Row
                    </button>
                </div>       
            </div>
                
            <div class="row" name="adminRow[]" v-for="(bag, index) in bags">
                <div class="col s4 input-field">
                    <input type="text" aria-describedby="packageId" name="package_id[]" 
                    placeholder="Bag Id" v-model="bag.package_id">
                </div>
                <div class="col s4 input-field">
                    <input type="number"  aria-describedby="bagWeight" 
                    name="bag_weight[]" placeholder="Bag Weight" v-model.number="bag.bag_weight" min="0">
                </div>
                <div class="col s4 input-field">
                    <input type="number"  aria-describedby="flowerWeight" 
                    name="flow_weight[]" placeholder="Flower Weight" v-model.number="bag.flower_weight" min="0">
                </div>

            </div>

            <button class="btn btn--p" type="button" @click.prevent="prev()">Back</button>
            <button class="btn btn--p" type="button" @click.prevent="next()">Next</button>

            
        </div>

        <div v-show="step === 3" v-cloak>
        <!-- Start Pillow Rows -->
            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input type="text" name="totalPillowWeight" id="totalPillowWeight" 
                    aria-describedby="totalPillowWeight"  v-model.number="pillowTotal" readonly>
                    <label for="totalPillowWeight" id="totalPillowWeightLabel">Total Weight: </label>
                </div>
            </div>
            <div class="row">
                <div class="col s1">
                    <button 
                        type="button" 
                        class="btn addRowBtn"
                        @click="addNewPillow"
                    >+ Row
                    </button>
                </div>

                <div class="col s1">
                    <button 
                        type="button" 
                        class="btn rmvRowBtn"
                        @click="removePillow"
                    >- Row
                    </button>
                </div>

            </div>
            
            <div class="row" name="pillowRow[]" v-for="(pillow, index) in pillows">

                <div class="input-field col s12">                    
                    <input type="number" v-model.number="pillow.weight"
                    aria-describedby="pillowWeight" name="pillow[]"
                    placeholder="How much do the pillows weigh?" min="0">                    
                </div>

            </div>

            <button class="btn btn--p" type="button" @click.prevent="prev()">Back</button>
            <button class="btn btn--p" type="submit" name="bags_submit" >Submit</button>
        </div>

    </form>
    

</div>

     --}}
@endsection

@push('scripts')
{{-- <script>
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
</script> --}}
@endpush

