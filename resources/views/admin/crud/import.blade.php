@extends('layouts.admin')

@section('content')
{{--     <div class="row">
        <div class="col s12 m6 offset-m2">
            <div class="card">
                <div class="card-content">
                        <div class="card-title">CSV Import</div>
                        <p>Make sure the file being imported does not includes a header row.</p>
                    
                    <form class="form-horizontal" method="POST" action="{{ route('import_parse') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row {{ $errors->has('csv_file') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input id="csv_file" type="file" class="form-control" name="csv_file" required>
                                @if ($errors->has('csv_file'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('csv_file') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="header" checked> File contains header row?
                                    </label>
                                </div>
                            </div>
                        </div>
                            <hr>
                            <div class="row">
                                <div class="col s6 m6 ">
                                    <button type="submit" class="btn btn--p ">
                                        Parse CSV
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
    <div class="card col s12 m6 offset-m3">
        <div class="card-content">
            <div class="card-title">
                CSV File Import
            </div>
            <hr>
            
            <p>Please add a CSV file to import.</p>
            <br>
            <p>The file should not include a header row.</p>
            <br>
            <p>The following should be the columns represented in the import file.</p>
            <p><b>Batch  |  Package  |  Flower Weight  |  Gross Weight</b></p>
            <hr>
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-field">
                    <input type="file" name="file">
                </div>
                <br>
                <button class="btn btn--lk">Import File</button>
            </form>
            
        </div>
    </div>
</div>

@endsection
