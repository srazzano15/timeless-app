<div class="container">
    
    <div class="table">
        <h3>Packages Outstanding</h3>
        <table class="table" id="pending_table">
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
                
                <tr>
                        <td>{{ $row['bag_id'] }}</td>
                        <td>{{ $row['bag_weight'] }}</td>
                        <td>{{ $row['created_at'] }}</td>
                        <td><a href="#" type="button" class="btn">Update</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $rows->links() }}
</div>
