<div class="container">

    @include('inc.stopwatch')

    <form action="{{URL::to('/extraction')}}" method="post">
            @csrf

            <div id="batch_form">
                    <div class="form-group row">
                        <label for="batchNumber" class="col-3 col-form-label">Extraction Batch Number : </label>
                        <div class="col-3">
                            <input type="text" class="form-control" name="bnum" id="batchNumber" aria-describedby="batchNumberInput" placeholder="MKA-...">
                        </div>
                        <div class="invalid-feedback">
                            Invalid input, please try again!
                        </div>


                        <label for="dateFilled" class="col-3 col-form-label">Date Filled : </label>
                        <div class="col-3">
                            <input type="text" class="form-control" name="dfilled" id="dateFilled" aria-describedby="batchDateFilled" placeholder="mm-dd-yyyy">
                        </div>
                        <div class="invalid-feedback">
                            Invalid input, please try again!
                        </div>


                        <label for="cooler" class="col-3 col-form-label">Cooler Stored In : </label>
                        <div class="col-3">
                            <input type="number" class="form-control" name="cooler" id="cooler" aria-describedby="coolerStoredIn" min="1" max="99">
                        </div>
                        <div class="invalid-feedback">
                            Invalid input, please try again!
                        </div>


                        <label for="cooler" class="col-3 col-form-label">Cooler Stored In : </label>
                        <div class="col-3">
                            <input type="text" class="form-control" name="drun" id="dateRun" aria-describedby="dateRun" placeholder="mm-dd-yyyy">
                        </div>
                        <div class="invalid-feedback">
                            Invalid input, please try again!
                        </div>
                    </div>
                    {{-- @include('inc.stopwatch') --}}
            </div>
            <!--end form container-->
            <div class="container">
                <div class="table_header form-group row">
                    <label for="packageId" class="thead col-4 col-form-label">Package ID</label>
                    <label for="bagWeight" class="thead col-4 col-form-label">Bag Weight</label>
                    <label for="flowerWeight" class="thead col-4 col-form-label">Flower Weight</label>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                        <div class="col-4">
                            <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                        </div>
                        <div class="col-4">
                            <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                        </div>
                        <div class="col-4">
                            <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                        </div>
                    </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
                <div class="form-group row tbody_row" name="row[]">
                    <div class="col-4">
                        <input type="text" class="table_input form-control" aria-describedby="packageId" name="pack_id[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="bagWeight" name="bag_weight[]">
                    </div>
                    <div class="col-4">
                        <input type="number" class="table_input form-control" aria-describedby="flowerWeight" name="flow_weight[]">
                    </div>
                </div>
            </div>
                <!--end form container-->
                <div class="container" id="timeOutputs">
                    <div class="form-group row">
                        <label for="splitOne" class="col-2 col-form-label">Split One</label>
                        <div class="col-2">
                            <input type="text" class="time_split form-control" name="split[0]" id="split_0" readonly>
                        </div>
                        <label for="splitTwo" class="col-2 col-form-label">Split Two</label>
                        <div class="col-2">
                            <input type="text" class="time_split form-control" name="split[1]" id="split_1" readonly>
                        </div>
                        <label for="splitThree" class="col-2 col-form-label">Split Three</label>
                        <div class="col-2">
                            <input type="text" class="time_split form-control" name="split[2]" id="split_2" readonly>
                        </div>
                        <label for="totalTime" class="col-2 col-form-label">Total Batch Time</label>
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

