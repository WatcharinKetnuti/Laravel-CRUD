
@extends('master')

@section('title', 'Content CRUD')



@section('content')









<div class="bg-gray-100 h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-semibold mb-4">Login</h2>

    <form action="{{ url('login')}}" method="post">
        @csrf
        <div class="">
            <label for="username" class="block text-gray-600">Email</label>
            <input type="text" id="email" name="email" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400" value="{{ old('email') }}" placeholder="email">
        </div>
        @error('email')
        <div class="invalid-feedback text-red-600
            d-block">{{ $errors->first('email') }}</div>
        @enderror

        <div class="mt-6">
            <label for="password" class="block text-gray-600">Password</label>
            <input type="password" id="password" name="password"  class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400" placeholder="password">
        </div>
        @error('password')
        <div class="invalid-feedback text-red-600
            d-block">{{ $errors->first('password') }}</div>
        @enderror

        <div class="flex items-center mt-6">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none">Login</button>
        </div>

    </form>

</div>
</div>








@endsection

</html>
