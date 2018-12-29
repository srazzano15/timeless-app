<div class="container">
    <div class="table">
        <h3>Packages Outstanding</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Package Id</th>
                    <th>Weight</th>
                    <th>Date Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    @if ($row->bagMatch['batch_id'] == null)
                    <tr>
                        <td>{{ $row->bag_id }}</td>
                        <td>{{ $row->bag_weight }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td><a href="#" type="button" class="btn">Update</a></td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>