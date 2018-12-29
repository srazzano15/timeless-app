<div class="container">
        <div>
            <a href="{{ route('report_download') }}" type="button">Download Report</a>
        </div>
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Batch ID</th>
                        <th>Bag ID</th>
                        <th>Bag Weight</th>
                        <th>Flower Weight</th>
                        <th>Difference</th>
                        <th>Date Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                        @if ($row->bagMatch['batch_id'] != null)
                                @php
                                    $h = $row->bag_weight;
                                    $l = ($row->bagMatch['flower_weight']);
                                @endphp
                            <tr>
                                <td>{{ $row->bagMatch['batch_id'] }}</td>
                                <td>{{ $row->bag_id }}</td>
                                <td>{{ $h }}</td>
                                <td>{{ $l }}</td>
                                {{-- <td>{{ $h - $l }}</td> --}}
                                <td>{{ ($row->bag_weight) - ($row->bagMatch['flower_weight']) }}</td>
                                <td>{{ $row->created_at }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
