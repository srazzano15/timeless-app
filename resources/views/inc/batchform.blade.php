

    @include('inc.stopwatch')

    <form action="{{URL::to('/extraction')}}" method="post">

            @csrf

            <div class="formElement" id="batch_form">
                <div class="form-group row">
                    <div class="col-2">
                        <label for="batchNumber" class="form-label">Batch ID</label>
                            <input type="text" class="form-control" name="bnum" id="batchNumber" aria-describedby="batchNumberInput" value="{{ old('bnum') }}" placeholder="MKA-...">
                        <small class="text-danger">{{ $errors->first('bnum') }}</small>
                    </div>

                    <div class="col-2">
                        <label for="cooler" class="form-label">Cooler Stored In </label>
                            <input type="number" class="form-control" name="cooler" id="cooler" aria-describedby="coolerStoredIn" value="{{ old('cooler') }}" min="1" max="99">
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
                </div>
            </div>
            <!--end form elemet-->
            <div class="formElement">
                <div class="form-group row" style="text-align: center;">
                    <label for="packageId" class="col-2 col-form-label">Package ID</label>
                    <label for="bagWeight" class="col-2 col-form-label">Bag Weight</label>
                    <label for="flowerWeight" class="col-2 col-form-label">Flower Weight</label>
                </div>
                <div class="form-group row tbody_row" name="row[0]" hidden="hidden">
                    <div class="col-2">
                        <input type="text" class="table_input  form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input  form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input  form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                    {{-- <div class="col-2" id="dynamicRowBtns">
                        <input type="button" id="addRow" class="btn" value="Add Row">
                        <input type="button" id="rmvRow" class="btn" value="Remove Row">
                    </div> --}}
                </div>

                <div class="form-group row tbody_row" name="row[1]" hidden="hidden">
                    <div class="col-2">
                        <input type="text" class="table_input col-2 form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[2]" hidden="hidden">
                    <div class="col-2">
                        <input type="text" class="table_input col-2 form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[3]" hidden="hidden">
                    <div class="col-2">
                        <input type="text" class="table_input col-2 form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[4]" hidden="hidden">
                    <div class="col-2">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[5]" hidden="hidden">
                    <div class="col-2">
                        <input type="text" class="table_input col-2 form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[6]" hidden="hidden">
                        <div class="col-2">
                            <input type="text" class="table_input col-2 form-control" aria-describedby="packageId" name="bag_number[]">
                        </div>
                        <div class="col-2">
                            <input type="number" class="table_input col-2 form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                        </div>
                        <div class="col-2">
                            <input type="number" class="table_input col-2 form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                        </div>
                    </div>
                <div class="form-group row tbody_row" name="row[7]" hidden="hidden">
                    <div class="col-2">
                        <input type="text" class="table_input col-2 form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[8]" hidden="hidden">
                    <div class="col-2">
                        <input type="text" class="table_input col-2 form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input col-2 form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[9]">
                    <div class="col-2">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-2">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                    <div class="col-2" id="dynamicRowBtns">
                        <input type="button" id="addRow" class="btn" value="+" style="background: var(--green); color: var(--light); font-size: 1.3rem; font-weight: 500; padding: 0 .75rem; border-radius: 10px">
                        <input type="button" id="rmvRow" class="btn" value="-" style="background: var(--red); color: var(--light); font-size: 1.3rem; font-weight: 500; padding: 0 .75rem; border-radius: 10px">
                    </div>
                </div>
                <div class="form-group row tbody_row">
                    <div class="col order-6">
                        <label for="totalFlowerWeight" class="form-label">Total Flower Weight</label>
                        <input type="number" class=" col-3 form-control" name="totalFlowWeight" id="totalFlowerWeight" aria-describedby="totalFlowerWeight" readonly>
                    </div>
                    <div class="col order-10">
                        <label for="totalBatchWeight" class="form-label">Total Weight</label>
                        <input type="number" class=" col-3 form-control" name="totalBatchWeight" id="totalBatchWeight" aria-describedby="totalBatchWeight" readonly>
                    </div>
                </div>
            </div>

                <!--end form container-->
                <div id="timeOutputs">
                    <div class="form-group row">
                        <div class="col-2">
                            <label for="splitOne" class=" form-label">Split One</label>
                            <input type="text" class="time_split form-control" name="split[0]" id="split_0" readonly>
                        </div>
                        <div class="col-2">
                            <label for="splitTwo" class="form-label">Split Two</label>
                            <input type="text" class="time_split form-control" name="split[1]" id="split_1" readonly>
                        </div>
                        <div class="col-2">
                            <label for="splitThree" class="form-label">Split Three</label>
                            <input type="text" class="time_split form-control" name="split[3]" id="split_3" readonly>
                        </div>
                        <div class="col-2">
                            <label for="totalTime" class="form-label">Total Batch Time</label>
                            <input type="text" class="time_split form-control" name="totTime" id="total_time" readonly>
                        </div>
                    </div>
                </div>
                    <!--end of form container-->

            <input class="btn" type="submit" name="submit" value="Submit">
            <br>
            <br>
        </form>
    <!--end extraction form-->


