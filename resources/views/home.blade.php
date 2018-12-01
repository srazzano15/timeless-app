@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <h1>Dashboard</h1>
        </div>
        <div class="row justify-content-center">
            <span>Review the stuffed batches awaiting to be run or submit a new batch now!</span>
        </div>
        <div class="container">
            <div class="row">
                <div class="wrapper" id="dashboardWrapper">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead class="thead-default">
                            <tr>
                                <th>Create Date</th>
                                <th>Created By</th>
                                <th>Batch Number</th>
                                <th>Cooler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <td scope="row">Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body" id="homeSuccess">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}

