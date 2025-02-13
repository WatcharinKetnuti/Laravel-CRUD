
@extends('master')




@section('content')








<div class="bg-gray-100 h-screen flex items-center justify-center p-32">
<div class="bg-white p-8 rounded shadow-md w-full">

    <h2 class="text-2xl font-semibold mb-4">
        @if (empty($categories->id))
            Landmark Add
        @else
            Landmark Edit
        @endif
    </h2>

    <form action="{{ empty($categories->id) ? url('categories/add') : url('categories/add/' . $categories->id) }}" method="post" enctype="multipart/form-data">

        @if (!empty($categories->id))
            @method('put')
        @endif


        @csrf

        <div class="mb-4">
            <label for="username" class="block text-gray-600">Name</label>
            <input type="text" id="name" name="name" required class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400" value="{{ old('name', $categories->name) }}">
        </div>
        @error('name')
        <div class="w-full text-red-300 ">{{ $errors->first('name') }}</div>
        @enderror

        <div class="mb-4">

            <label for="picture" class="block text-gray-600">Picture</label>
            @if (!empty($categories->id))
            <label for="picture" class="block text-black-600 ml-5">Current Picture</label>
            <div class="flex items-center justify-between">
                <img class="w-48 h-48 object-cover mb-2 ml-8" src="{{ url('image/'.old('picture', $categories->picture)) }}">
            </div>
            @endif

            <input type="file" id="picture" name="picture" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400">
        </div>

        @error('picture')
        <div class="w-full text-red-300 ">{{ $errors->first('picture') }}</div>
        @enderror

        <div class="mb-4">
            <label for="username" class="block text-gray-600">detail</label>
            <textarea type="text" id="detail" name="detail" required class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-400" value="">{{ old('detail', $categories->detail) }}</textarea>
        </div>
        @error('detail')
        <div class="w-full text-red-300 ">{{ $errors->first('detail') }}</div>
        @enderror

        <div class="flex items-center justify-between mt-2">
            @if (empty($categories->id))
                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none">Add</button>
            @else
                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none">Edit</button>
            @endif

        </div>

    </form>

</div>
</div>







@endsection

</html>
