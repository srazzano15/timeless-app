
        <h1 style="margin-top: 1.5em">Weighted Bag Report</h1>
        <div>
            <a href="{{ route('report_download') }}" type="button" class="btn btn--p" style="margin-top: 1.5em">Export Report</a>
        </div>
        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Batch ID</th>
                        <th>Package ID</th>
                        <th>Gross Weight</th>
                        <th>Bag Weight</th>
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
                                <td>{{ $h - $l }}</td>
                                <td>{{ $row->created_at }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

