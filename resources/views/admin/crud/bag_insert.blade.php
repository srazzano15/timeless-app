@extends('layouts.admin')

@section('content')

<div class="container">
    <h1>Bag Submissions</h1><br>
    <p>Please add the extraction batch number and as many bags that are being submitted.</p>
    <form action="{{ route('admin_bags_processing') }}" method="post" id="admin_bags_form">
        
    @csrf
    <div class="wrapper">
        
        <div class="form-group row justify-content-center">
            <label for="batch_id" class="col-4 col-form-label">Extraction Batch Number</label>
            <div class="col-4">  
                <input type="text" class="form-control" name="batch_id" aria-describedby="batchId" placeholder="mka-xxxxx">  
            </div>
        </div>
        <div class="row">
                <div class="formElement col-12" style="padding-right: 5px;">
                    <div class="form-group form-row" style="text-align: center;">
                        <div class="col-5">
                            <label for="packageId" class="form-label">Package ID</label>
                        </div>
                        <div class="col-5">
                            <label for="flowerWeight" class="form-label">Flower Weight</label>
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[0]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[0]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input  form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[0]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[1]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value=" {{ old('package_id[1]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[1]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[2]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[2]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[2]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[3]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[3]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[3]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[4]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[4]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[4]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[5]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[5]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[5]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[6]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[6]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[6]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[7]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[7]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[7]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[8]" hidden="hidden">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[8]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[8]') }}">
                        </div>
                    </div>
                    <div class="form-group form-row tbody_row" name="adminRow[9]">
                        <div class="col-5">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="package_id[]" value="{{ old('package_id[9]') }}">
                        </div>
                        <div class="col-5">
                            <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[9]') }}">
                        </div>
                        <div class="col-2" id="adminRowBtns">
                            <input type="button" id="adminAddRow" class="btn addRowBtn" value="+">
                            <input type="button" id="adminRmvRow" class="btn rmvRowBtn" value="-">
                        </div>
                    </div>
                </div>
        </div>

        <button type="submit" name="submit_bag" class="btn btn-primary" style="border-color: var(--yellow);">Submit</button>
    
    </div>

    </form>

</div>

@endsection
