@extends('layouts.admin')


@section('content')

<h2>Import Results</h2>
<p>The following data is the first two lines of the file imported. Does the data look correct?</p>
<p>Please select which data belongs to which column and click the "Import Data" button!</p>
<hr>
<form method="POST" action="{{ route('import_process') }}" class="p-t">
        @csrf
        <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />
        <table class="highlight">
            @foreach ($csv_data as $row)
                <tr>
                @foreach ($row as $key => $value)
                    <td>{{ $value }}</td>
                @endforeach
                </tr>
            @endforeach
            <tr>
                @foreach ($csv_data[0] as $key => $value)
                    <td>
                        
                        <select class="browser-default" name="fields[{{ $key}}]">
                            @foreach (config('app.db_fields') as $db_field => $field_val)
                                <option value="{{ $loop->index }}">{{ $field_val }}</option>
                            @endforeach
                        </select>
                        
                    </td>
                @endforeach
            </tr>
        </table>
        <p>

            "bag_id" is for <b>Package ID</b> <br/>
            "bag_weight" is for <b>Package Weight</b> <br/>
            "package_weight" is for <b>Gross Weight</b> <br/>
            "flower_weight" is for <b>Flower Weight</b> <br/>
        </p>

        <button type="submit" class="btn btn--p">
            Import Data
        </button>
    </form>
@endsection
