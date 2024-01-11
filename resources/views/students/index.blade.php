@extends('layouts.app')
@section('content')
<div class="container">
    <h4>Blog List</h4>
    <a class="btn btn-success" href="{{ route('students.create') }}">Add New Blog</a>
    <table class="table table-bordered" id="table-emp">
        <thead>
            <tr>
                <th>Id</th>
                <th>Blog Name</th>
                <th>Blog Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
    var table = $('#table-emp').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('students.index') }}",
    columns: [
        {
            data: 'id',
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },

        {
            data: 'description',
            name: 'description'
        },

        {
            data: 'category_name',
            name: 'category_name'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        },

    ]
});

});

</script>
@endsection
