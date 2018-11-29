<div class="container">

    @include('inc.stopwatch')

    <form action="{{URL::to('/extraction')}}" method="post">

            @csrf

            <div class="formElement" id="batch_form">
                <div class="form-group row">
                    <div class="col-3">
                        <label for="batchNumber" class="form-label">Extraction Batch Number </label>
                            <input type="text" class="form-control" name="bnum" id="batchNumber" aria-describedby="batchNumberInput" value="{{ old('bnum') }}" placeholder="MKA-...">
                        <small class="text-danger">{{ $errors->first('bnum') }}</small>
                    </div>

                    <div class="col-3">
                        <label for="cooler" class="form-label">Cooler Stored In </label>
                            <input type="number" class="form-control" name="cooler" id="cooler" aria-describedby="coolerStoredIn" value="{{ old('cooler') }}" min="1" max="99">
                        <small class="text-danger">{{ $errors->first('cooler') }}</small>
                    </div>

                    <div class="col-3">
                        <label for="dateFilled" class="form-label">Date Filled </label>
                            <input type="date" class="form-control" name="dfilled" id="dateFilled" aria-describedby="batchDateFilled" value="{{ old('dfilled') }}" placeholder="mm-dd-yyyy">
                        <small class="text-danger">{{ $errors->first('dfilled') }}</small>
                    </div>

                    <div class="col-3">
                        <label for="dateRun" class="form-label">Date Run </label>
                            <input type="date" class="form-control" name="drun" id="dateRun" aria-describedby="dateRun" value="{{ old('drun') }}" placeholder="mm-dd-yyyy">
                        <small class="text-danger">{{ $errors->first('drun') }}</small>
                    </div>
                </div>
            </div>
            <!--end form elemet-->
            <div class="formElement">
                <div class="form-group row" style="text-align: center;">
                    <label for="packageId" class="col-3 col-form-label">Package ID</label>
                    <label for="bagWeight" class="col-3 col-form-label">Bag Weight</label>
                    <label for="flowerWeight" class="col-3 col-form-label">Flower Weight</label>
                </div>
                <div class="form-group row tbody_row" name="row[0]">
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                    <div class="col-3">
                        <input type="button" id="addRow" class="btn" value="Add Row">
                        <input type="button" id="rmvRow" class="btn" value="Remove Row">
                    </div>
                </div>

                <div class="form-group row tbody_row" name="row[1]" hidden>
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[2]" hidden>
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[3]" hidden>
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[4]" hidden>
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[5]" hidden>
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[6]" hidden>
                        <div class="col-3">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                        </div>
                        <div class="col-3">
                            <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                        </div>
                        <div class="col-3">
                            <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                        </div>
                    </div>
                <div class="form-group row tbody_row" name="row[7]" hidden>
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[8]" hidden>
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[9]" hidden>
                    <div class="col-3">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="bag_number[]">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control bag_weight" aria-describedby="bagWeight" name="bag_weight[]" value="">
                    </div>
                    <div class="col-3">
                        <input type="number" class="table_input form-control flower_weight" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row">
                    <div class="col-3">
                        <label for="totalFlowerWeight">Total Flower Weight</label>
                        <input type="number" class="form-control" name="totalFlowWeight" id="totalFlowerWeight" aria-describedby="totalFlowerWeight" readonly>
                    </div>
                    <div class="col-3">
                        <label for="totalBatchWeight">Total Weight</label>
                        <input type="number" class="form-control" name="totalBatchWeight" id="totalBatchWeight" aria-describedby="totalBatchWeight" readonly>
                    </div>
                </div>
            </div>

                <!--end form container-->
                <div class="container" id="timeOutputs">
                    <div class="form-group row">
                        <label for="splitOne" class="form-label">Split One</label>
                        <div class="col-2">
                            <input type="text" class="time_split form-control" name="split[0]" id="split_0" readonly>
                        </div>
                        <label for="splitTwo" class="form-label">Split Two</label>
                        <div class="col-2">
                            <input type="text" class="time_split form-control" name="split[1]" id="split_1" readonly>
                        </div>
                        <label for="splitThree" class="form-label">Split Three</label>
                        <div class="col-2">
                            <input type="text" class="time_split form-control" name="split[2]" id="split_2" readonly>
                        </div>
                        <label for="totalTime" class="form-label">Total Batch Time</label>
                        <div class="col-2">
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
</div>

