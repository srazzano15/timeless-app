<div class="dataTable">
    <div class="table">
        <h1>Stuffed Batches</h1>
        <table class="table" id="pending_table">
            <thead>
                <tr>
                    <th>Submitted By</th>
                    <th>Batch ID</th>
                    <th>Cooler</th>
                    <th>Total Flower Weight</th>
                    <th>Total Pillow Weight</th>
                    <th>Date Filled</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row['submitter'] }}</td>
                        <td>{{ $row['batch_id'] }}</td>
                        <td>{{ $row['cooler'] }}</td>
                        <td>{{ $row['total_batch_weight'] }}</td>
                        <td>{{ $row['total_flower_weight'] }}</td>
                        <td>{{ $row['date_filled']->format('m-d-Y') }}</td>
                        <td><a href="#" type="button" class="btn">Run Batch</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $rows->links() }}
</div>