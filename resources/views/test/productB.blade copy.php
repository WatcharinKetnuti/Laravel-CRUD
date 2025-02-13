@extends('master');

@section('title', 'Content CRUD');


@section('content')





<main class="container mx-auto mt-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 w-full">
        @foreach ($categories as $row)
        <div class="bg-white p-4 rounded shadow">
            <img src="{{url('image/'.$row->picture) }}" alt="Product 1" class="w-full h-48 object-cover mb-2">
            <h2 class="text-lg font-semibold $">{{$row->name }}</h2>
            <p class="text-gray-500">Description of Product 1</p>
            <p class="text-blue-500">$19.99</p>
            <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Add to Cart</button>
        </div>
        @endforeach

    </div>
</main>


{{-- <footer class="bg-gray-200 py-4">
    <div class="container mx-auto text-center">

    </div>
</footer> --}}

@endsection

</html>
