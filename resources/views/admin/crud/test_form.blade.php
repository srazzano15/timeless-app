@extends('layouts.admin')

@section('content')
<div class="container" id="admin_index">

    <h2>Bag Submissions</h2>


    <form action=" {{ route('test_post') }} " method="post" class="px-3">
        @csrf
        
        


    </form>
    

</div>

    
@endsection

@push('scripts')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
    
@endpush