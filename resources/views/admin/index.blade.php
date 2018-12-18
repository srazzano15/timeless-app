@extends('layouts.admin')


@section('content')

 <!-- Header -->
 <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
      </header>

      <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
          <div class="w3-container admin_stats w3-padding-16">
            <div class="w3-left"><i class="fa fa-cannabis w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>0</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Stuffed Batches</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container admin_stats w3-padding-16">
            <div class="w3-left"><i class="fa fa-bong w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>0</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Completed Batches</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container admin_stats w3-padding-16">
            <div class="w3-left"><i class="fa fa-barcode w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>0</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Orders</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container admin_stats w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>3</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Users</h4>
          </div>
        </div>
      </div>

@endsection

