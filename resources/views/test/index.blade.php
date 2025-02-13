@extends('master')



@section('content')
<main class="container mx-auto mt-4 background-color " id="categories">
    <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 w-full ">

        @foreach ($categories as $row)
        <div class="bg-white p-4 rounded shadow ">
            <a href="{{url("categories/$row->id/view")}}"><img src="{{url('image/'.$row->picture) }}" alt="Product 1" class="w-full h-48 object-cover mb-2"></a>
            <h2 class="text-lg font-semibold mb-2">{{ $row->name }}</h2>


            @if (Auth::user()==true)
                @if (Auth::user()->admin == 1)
                <a class="bg-yellow-500 text-white px-4 py-2 rounded mt-2 button" href="{{ url("categories/$row->id/edit") }}">edit</a>
                <a type="button" class="bg-red-500 text-white px-4 py-2 rounded mt-2 delete-item button" href="{{ url("/categories/delete/$row->id")}}" >delete</a>
                @endif
            @endif
            {{-- data-id="{{$row->id}} --}}

        </div>
        @endforeach

    </div>
</main>


{{-- <footer class="bg-gray-200 py-4">
    <div class="container mx-auto text-center">

    </div>
</footer> --}}

@endsection


@push('script')
    <script>
        document.querySelector('#categories').addEventListener('click', (e) => {
            if (e.target.matches('.delete-item')) {
                console.log(e.target.dataset.id);
                Swal ,.fire({
                    title: 'Are you sure?',
                    text: "You won't be delete!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'

                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get($url + '/categories/delete/' + e.target.dataset.id).then((response) => {
                            Swal.fire(
                                'Success!',
                                'Category has been deleated.',
                                'success'
                            );

                            setTimeout(() => {
                                window.location.href = $url + '/';
                            }, 2000);

                        });
                    }
                });



            }
        });
    </script>
@endpush


