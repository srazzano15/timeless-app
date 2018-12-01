<div class="container">
        <div class="row">
            <div class="wrapper" id="dashboardWrapper">
                <table class="table table-striped table-bordered table-condensed">
                    <thead class="thead-default">
                        <tr>
                            <th>Create Date</th>
                            <th>Batch Number</th>
                            <th>Cooler</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($submits))
                            @foreach ($submits as $submit)
                                <tr>
                                    <td>{{ $submit->created_at->format('m-d-Y') }}</td>
                                    <td>{{ $submit->batch_id }}</td>
                                    <td>{{ $submit->cooler }}</td>
                                </tr>
                            @endforeach
                        @else
                            <span>No pending batches at this time!</span>
                            <span>Please submit a new batch now!</span>
                            <a class="btn btn-primary" href="{{ route('/extraction') }}" role="button">Submit New Batch</a>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

