@extends('master');

@section('title', 'Content CRUD');


@section('content')


////

<div class="bg-white p-4 rounded shadow">
    <a href="{{url("categories/$row->id/view")}}"><img src="{{url('image/'.$row->picture) }}" alt="Product 1" class="w-full h-48 object-cover mb-2"></a>
    <h2 class="text-lg font-semibold mb-2">{{ $row->name }}</h2>
    <p class="text-gray-500 text-2x1">{{ $row->detail }}</p>
    <p class="text-blue-500">{{ $row->price }} Bath</p>

    @if (Auth::user()==true)
        @if (Auth::user()->admin == 1)
        <a class="bg-yellow-500 text-white px-4 py-2 rounded mt-2 button" href="{{ url("categories/$row->id/edit") }}">edit</a>
        <a type="button" class="bg-red-500 text-white px-4 py-2 rounded mt-2 delete-item button" href="{{ url("/categories/delete/$row->id")}}" >delete</a>
        @endif
    @endif
    {{-- data-id="{{$row->id}} --}}

</div>

////

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
