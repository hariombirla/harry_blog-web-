@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Blog</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('students.update', $student->id) }}" id="form" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Blog Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Blog Description</label>
                <input type="textarea" class="form-control" id="description" name="description" value="{{ old('description', $student->description) }}" >
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select for="category" class="form-label" name="category_name" class="form-label">
                    <option class="form-control" value="Education" {{ old('category_name',$student->category_name) == 'Education' ? 'selected' : '' }} >  Education </option>
                    <option class="form-control" value="Social" {{ old('category_name',$student->category_name) == 'Social' ? 'selected' : '' }}> Social </option>
                    <option class="form-control" value="News" {{ old('category_name',$student->category_name) == 'News' ? 'selected' : '' }}> News </option>
                <select>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#form").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    category_name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter Name",
                    },
                    description: {
                        required: "Please select a description",
                    },
                    category_name: {
                        required: "Please select an Category",
                    },
                },
            });
        });
    </script>
@endsection
