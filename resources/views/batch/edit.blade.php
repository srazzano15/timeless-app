@extends('layouts.app')

@section('content')


<div class="container">
        @include('inc.stopwatch')
    </div>
    <!--end stopwatch-->
    <div class="container">
        <form action="{{URL::to('/extraction')}}" method="post">

                @csrf

                <div class="formElement" id="batch_form">
                    <div class="form-group form-row">
                        <div class="col-2">
                            <label for="batchtext" class="form-label">Batch ID</label>
                                <input type="text" class="form-control" name="bnum" id="batchtext" aria-describedby="batchtextInput" value="{{ old('bnum') }}" placeholder="MKA-...">
                            <small class="text-danger">{{ $errors->first('bnum') }}</small>
                        </div>
                        <div class="col-2">
                            <label for="cooler" class="form-label">Cooler Stored In </label>
                                <input type="text" class="form-control" name="cooler" id="cooler" aria-describedby="coolerStoredIn" value="{{ old('cooler') }}">
                            <small class="text-danger">{{ $errors->first('cooler') }}</small>
                        </div>
                        <div class="col-2">
                            <label for="dateFilled" class="form-label">Date Filled </label>
                                <input type="date" class="form-control" name="dfilled" id="dateFilled" aria-describedby="batchDateFilled" value="{{ old('dfilled') }}" placeholder="mm-dd-yyyy">
                            <small class="text-danger">{{ $errors->first('dfilled') }}</small>
                        </div>
                        <div class="col-2">
                            <label for="dateRun" class="form-label">Date Run </label>
                                <input type="date" class="form-control" name="drun" id="dateRun" aria-describedby="dateRun" value="{{ old('drun') }}" placeholder="mm-dd-yyyy">
                            <small class="text-danger">{{ $errors->first('drun') }}</small>
                        </div>
                        <div class="col-2">
                            <label for="kegsFilled" class="form-label">Kegs Filled</label>
                                <input type="text" class="form-control" name="kegsFilled" id="kegsFilled" aria-describedby="kegsFilled" value="{{ old('kegsFilled') }}" placeholder="1, 5, 8">
                            <small class="text-danger">{{ $errors->first('kegsFilled') }}</small>
                        </div>
                        <div class="col-2">
                            <label for="submitter" class="form-label">Submitter</label>
                                <input type="text" class="form-control" name="submitter" id="submitter" aria-describedby="submitter" value=" {{ $user->name }} " readonly>
                        </div>
                    </div>
                </div>
                <!--end form elemet-->
                <div class="row">
                    <div class="formElement col-8" style="padding-right: 5px;">
                        <div class="form-group form-row" style="text-align: center;">
                            <div class="col-3">
                                <label for="packageId" class="form-label">Package ID</label>
                            </div>
                            <div class="col-3">
                                <label for="bagWeight" class="form-label">Bag Weight</label>
                            </div>
                            <div class="col-3">
                                <label for="flowerWeight" class="form-label">Flower Weight</label>
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[0]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[0]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input  form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[0]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input  form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[0]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[1]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value=" {{ old('bag_text[1]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[1]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[1]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[2]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[2]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[2]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[2]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[3]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[3]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[3]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[3]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[4]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[4]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[4]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[4]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[5]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[5]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[5]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[5]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[6]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[6]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[6]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[6]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[7]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[7]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[7]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[7]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[8]" hidden="hidden">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[8]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[8]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[8]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="row[9]">
                            <div class="col-3">
                                <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_text[]" value="{{ old('bag_text[9]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="{{ old('bag_weight[9]') }}">
                            </div>
                            <div class="col-3">
                                <input type="text" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]" value="{{ old('flow_weight[9]') }}">
                            </div>
                            <div class="col" id="dynamicRowBtns">
                                <input type="button" id="addRow" class="btn addRowBtn" value="+">
                                <input type="button" id="rmvRow" class="btn rmvRowBtn" value="-">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row">
                            <div class="col-3 offset-6">
                                <label for="totalFlowerWeight" class="form-label">Total Flower Weight</label>
                                <input type="text" class="form-control" name="totalFlowWeight" id="totalFlowerWeight"
                                aria-describedby="totalFlowerWeight" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="formElement col-4" style="padding-left: 5px;">
                        <div class="form-group form-row" style="text-align: center;">
                            <div class="col-6">
                                <label for="pillowWeight" class="form-label">Pillow Weight</label>
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[0]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[0]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[1]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[1]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[2]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[2]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[3]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[3]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[4]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[4]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[5]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[5]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[6]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[6]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[7]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[7]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[8]" hidden>
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[8]') }}">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row" name="pillow[9]">
                            <div class="col-6">
                                <input type="text" class="table_input pillow_weight form-control" aria-describedby="pillowWeight" name="pillow[]" value="{{ old('pillow[9]') }}">
                            </div>
                            <div class="col" id="pillowBtns">
                                <input type="button" id="addPillow" class="btn addRowBtn" value="+">
                                <input type="button" id="rmvPillow" class="btn rmvRowBtn" value="-">
                            </div>
                        </div>
                        <div class="form-group form-row tbody_row">
                            <div class="col-6">
                                <label for="totalBatchWeight" class="form-label">Total Weight</label>
                                <input type="text" class="form-control" name="totalBatchWeight" id="totalBatchWeight"
                                aria-describedby="totalBatchWeight" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--end form container-->
                    <div id="timeOutputs">
                        <div class="form-group form-row">
                            <div class="col-2">
                                <label for="resTempFirst" class=" form-label">Res Temp (1st)</label>
                                <input type="text" class="form-control" name="resTempFirst" id="resTempFirst" value="{{ old('resTempFirst') }}">
                                <small class="text-danger">{{ $errors->first('resTempFirst') }}</small>
                            </div>
                            <div class="col-2">
                                <label for="splitOne" class=" form-label">Soak Time (1st)</label>
                                <input type="text" class="time_split form-control" name="split[0]" id="split_0" value="{{ old('split[0]') }}" readonly>
                                <small class="text-danger">{{ $errors->first('split[0]') }}</small>
                            </div>
                            <div class="col-2">
                                <label for="splitTwo" class="form-label">Aggitation Time (1st)</label>
                                <input type="text" class="time_split form-control" name="split[1]" id="split_1" value="{{ old('split[1]') }}" readonly>
                                <small class="text-danger">{{ $errors->first('split[1]') }}</small>
                            </div>
                            <div class="col-2">
                                <label for="exitTempFirst" class=" form-label">Exit Temp (1st)</label>
                                <input type="text" class="form-control" name="exitTempFirst" id="exitTempFirst" value="{{ old('exitTempFirst') }}">
                                <small class="text-danger">{{ $errors->first('exitTempFirst') }}</small>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-2">
                                <label for="resTempScnd" class=" form-label">Res Temp (2nd)</label>
                                <input type="text" class="form-control" name="resTempScnd" id="resTempScnd" value="{{ old('resTempScnd') }}">
                                <small class="text-danger">{{ $errors->first('resTempScnd') }}</small>
                            </div>
                            <div class="col-2">
                                <label for="splitThree" class="form-label">Soak Time (2nd)</label>
                                <input type="text" class="time_split form-control" name="split[2]" id="split_2" value="{{ old('split[2]') }}" readonly>
                                <small class="text-danger">{{ $errors->first('split[2]') }}</small>
                            </div>
                            <div class="col-2">
                                <label for="splitFour" class="form-label">Aggitation Time (2nd)</label>
                                <input type="text" class="time_split form-control" name="split[3]" id="split_3" value="{{ old('split[3]') }}" readonly>
                                <small class="text-danger">{{ $errors->first('split[3]') }}</small>
                            </div>
                            <div class="col-2">
                                <label for="exitTempScnd" class=" form-label">Exit Temp (2nd)</label>
                                <input type="text" class="form-control" name="exitTempScnd" id="exitTempScnd" value="{{ old('exitTempScnd') }}">
                                <small class="text-danger">{{ $errors->first('exitTempScnd') }}</small>
                            </div>
                            <div class="col-2">
                                <label for="totalTime" class="form-label">Total Batch Time</label>
                                <input type="text" class="time_split form-control" name="totTime" id="total_time" value="0" readonly>
                                <small class="text-danger">{{ $errors->first('totTime') }}</small>
                            </div>
                        </div>
                    </div>
                        <!--end of form container-->
                    <div class="form-group form-row">
                        <div class="col-2">
                            <label for="batchStatus">Batch Status</label>
                            <select class="custom-select" name="status" id="batch_status">
                                <option>Select one</option>
                                <option value="stuffed" @if(old('status') == 'stuffed')selected @endif >Stuffed</option>
                                <option value="complete" @if(old('status') == 'complete')selected @endif >Complete</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-row justify-content-left">
                        <div class="col-2">
                            <input class="btn btn-primary" id="batchSubmitBtn" type="submit" name="submit" value="Submit">
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        <!--end extraction form-->
    </div>

@endsection
@push('scripts')
    <script src="{{asset('/js/app.js')}}"></script>
@endpush
