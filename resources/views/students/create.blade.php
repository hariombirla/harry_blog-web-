@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Students</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('students.store') }}" method="POST" id="form">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Blog Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" >
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select for="category" class="form-label" name="category_name" class="form-label">
                    <option class="form-control" > Category </option>
                    <option class="form-control" value="Education" >  Education </option>
                    <option class="form-control" value="Social" > Social </option>
                    <option class="form-control" value="News" > News </option>
                <select>
                {{-- <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" > --}}
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Blog description</label>
                <input type="textarea" class="form-control" id="description" name="description" value="{{ old('description') }}" >
            </div>
            {{-- <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}" >
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" >
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" >
            </div> --}}
            <button type="submit" class="btn btn-primary">Create Blog</button>
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
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    state: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter Name",
                    },
                    email: {
                        required: "Please select a email",
                    },
                    phone: {
                        required: "Please select an phone",
                    },
                    country: {
                        required: "Please select an country",
                    },
                    state: {
                        required: "Please enter state",
                    },
                    city: {
                        required: "Please enter city",
                    },
                },
            });
        });
    </script>
@endsection
