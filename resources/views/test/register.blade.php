
@extends('master')

@section('title', 'Content CRUD')



@section('content')





<div class="bg-gray-100 h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-semibold mb-4">Register</h2>
    <form action="{{ url('register/add')}}" method="post">
        @csrf
        <div class="">
            <label for="username" class="block text-gray-600">Username</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400" value="{{ old('name') }}">
        </div>
        @error('name')
                <div class="invalid-feedback mb-4 text-red-600
                    d-block">{{ $errors->first('name') }}
                </div>
        @enderror
        <div class="mt-6">
            <label for="email" class="block text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400" value="{{ old('email') }}">
        </div>
        @error('email')
                <div class="invalid-feedback text-red-600
                    d-block">{{ $errors->first('email') }}</div>
        @enderror
        <div class="mt-6">
            <label for="password" class="block text-gray-600">Password</label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400" value="{{ old('password') }}">
        </div>
        @error('password')
        <div class="invalid-feedback text-red-600
            d-block">{{ $errors->first('password') }}</div>
        @enderror

        <div class="mt-4">
            <label for="password_confirmation" class="block text-gray-600">Password confirm</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400" >
        </div>


        @error('password_confirmation')
        <div class="invalid-feedback text-red-600
            d-block">{{ $errors->first('password_confirmation') }}</div>
        @enderror


        <div class="flex items-center justify-between mt-6">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none">Register</button>
        </div>

    </form>
</div>
</div>







@endsection

</html>
