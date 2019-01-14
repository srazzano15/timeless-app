@extends('layouts.admin')


@section('content')


<form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
        @csrf
        <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />
        <table class="table">
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
                        <select name="fields[{{ $key}}]">
                            @foreach (config('app.db_fields') as $db_field => $field_val)
                                <option value="{{ $loop->index }}">{{ $field_val }}</option>
                            @endforeach
                        </select>
                    </td>
                @endforeach
            </tr>
        </table>

        <button type="submit" class="btn btn-primary">
            Import Data
        </button>
    </form>
@endsection
