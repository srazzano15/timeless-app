<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        @csrf
        <div id="batch_form">
            <div class="form-group row">
                <label for="batchNumber" class="col-3 col-form-label">Extraction Batch Number : </label>
                <div class="col-3">
                    <input type="text" class="form-control" name="bnum" id="batchNumber" aria-describedby="batchNumberInput" placeholder="MKA-..." required>
                </div>
                <div class="invalid-feedback">
                    Invalid input, please try again!
                </div>
            </div>
            <div class="form-group row">
                <label for="dateFilled" class="col-3 col-form-label">Date Filled : </label>
                <div class="col-3">
                    <input type="text" class="form-control" name="dfilled" id="dateFilled" aria-describedby="batchDateFilled" placeholder="mm-dd-yyyy">
                </div>
                <div class="invalid-feedback">
                    Invalid input, please try again!
                </div>    
            </div>
            <div class="form-group row">
                <label for="cooler" class="col-3 col-form-label">Cooler Stored In : </label>
                <div class="col-3">
                    <input type="number" class="form-control" name="cooler" id="cooler" aria-describedby="coolerStoredIn" min="1" max="99" required>
                </div>
                <div class="invalid-feedback">
                    Invalid input, please try again!
                </div>
            </div>
            <div class="form-group row">
                <label for="cooler" class="col-3 col-form-label">Cooler Stored In : </label>
                <div class="col-3">
                    <input type="text" class="form-control" name="drun" id="dateRun" aria-describedby="dateRun" placeholder="mm-dd-yyyy" required>
                </div>
                <div class="invalid-feedback">
                    Invalid input, please try again!
                </div>
            </div>
        </div> 
        <!--end form container-->
        <div class="container">
            <div class="table_header">
                <span class="thead">Package ID</span>
                <span class="thead">Bag Weight</span>
                <span class="thead">Flower Weight</span>
            </div>
            <div class="tbody_row" name="row[0]">
                <input type="text" name="pack_id[]" required>
                <input type="number" name="bag_weight[]" required>
                <input type="number" name="flow_weight[]" required>
            </div>
            <br>
            <div class="tbody_row" name="row[1]">
                <input type="text" name="pack_id[]" required>
                <input type="number" name="bag_weight[]" required>
                <input type="number" name="flow_weight[]" required>
            </div>
            <br>
            <div class="tbody_row" name="row[2]">
                <input type="text" name="pack_id[]">
                <input type="number" name="bag_weight[]">
                <input type="number" name="flow_weight[]">
            </div>
            <br>
            <div class="tbody_row" name="row[3]">
                <input type="text" name="pack_id[]">
                <input type="number" name="bag_weight[]">
                <input type="number" name="flow_weight[]">
            </div>
            <br>
            <div class="tbody_row" name="row[4]">
                <input type="text" name="pack_id[]">
                <input type="number" name="bag_weight[]">
                <input type="number" name="flow_weight[]">
            </div>
            <br>
            <div class="tbody_row" name="row[5]">
                <input type="text" name="pack_id[]">
                <input type="number" name="bag_weight[]">
                <input type="number" name="flow_weight[]">
            </div>
            <br>
            <div class="tbody_row" name="row[6]">
                <input type="text" name="pack_id[]">
                <input type="number" name="bag_weight[]">
                <input type="number" name="flow_weight[]">
            </div>
            <br>
            <div class="tbody_row" name="row[7]">
                <input type="text" name="pack_id[]">
                <input type="number" name="bag_weight[]">
                <input type="number" name="flow_weight[]">
            </div>
            <br>
            <div class="tbody_row" name="row[8]">
                <input type="text" name="pack_id[]">
                <input type="number" name="bag_weight[]">
                <input type="number" name="flow_weight[]">
            </div>
            <br>
            <div class="tbody_row" name="row[9]">
                <input type="text" name="pack_id[]">
                <input type="number" name="bag_weight[]">
                <input type="number" name="flow_weight[]">
            </div>
            <br>
            </div>
            <!--end form container-->
            <div class="container" id="timeOutputs">
                Split One:
                <input type="text" name="split[0]" id="split_0" readonly>
                <br>
                <br>
                Split Two: 
                <input type="text" name="split[1]" id="split_1" readonly>    
                <br>
                <br>
                Split Three: 
                <input type="text" name="split[2]" id="split_2" readonly>
                <br>
                <br>
                Total Time: 
                <input type="text" name="total_time" id="total_time" readonly>
            </div>
            <!--end of form container-->

        <input type="submit" name="submit" value="Submit">
        <br>
        <br>
    </form>
    <!--end extraction form-->
</div>

