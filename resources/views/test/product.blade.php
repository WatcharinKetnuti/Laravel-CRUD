@extends('master')



@section('content')
{{--
<main class="container mx-auto mt-4 background-color " id="categories">
    <div class=" bg-white">
        <div class="">

            <div class="items-center p-4 shadow-md ">
                <div class="p-3 w-full">


                    <h1 class="text-lg font-semibold mb-2"><b>Name</b>  {{ $categories->name }} </h1>


                </div>
            <?php
                //   var_dump($categories);
                //     exit();
               // echo($categories)
            ?>






                <div class="border-t-2 flex h-full w-full items-start justify-between rounded-md  bg-white px-3 pt-3 pb-3 ">
                    <div class="flex items-center gap-3">
                        <div class="flex w-full h-96 object-cover items-center justify-center ">
                        <img
                            class="h-full w-full rounded-xl"
                            src="{{url('image/'.$categories->picture) }}"
                            alt=""
                        />
                        </div>
                        <div class="flex flex-col">
                        <h5 class="text-base font-bold text-navy-700 dark:text-white">
                            {{ $categories->name }}
                        </h5>
                        <p class="mt-1 text-sm font-normal text-gray-600 ">
                            {{ $categories->detail }} asdasddddddddddddddd
                        </p>

                        </div>
                    </div>
                    <div class="mx-1 flex items-center justify-center text-navy-700 dark:text-white">

                        @if (Auth::user()==true)
                        @if (Auth::user()->admin == 1)
                        <a class="bg-yellow-500 text-white px-4 py-2 rounded mx-1 button" href="{{ url("product/$row->id/edit") }}">edit</a>
                        <a type="button" class="bg-red-500 text-white px-4 py-2 rounded mx-1 delete-item button" href="{{ url("/product/delete/$row->id")}}" >delete</a>
                        @endif
                    @endif
                    </div>
                </div>










    </div>
    </div>

</main> --}}


<main id="main" data-aos="" data-aos-delay="" >
    <section id="gallery" class="gallery ">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="gallery-item h-100 col-md-6">
                    <img src="{{url('image/'.$categories->picture)}}" class="img-fluid " alt="">
                    <div class="gallery-links d-flex align-items-center justify-content-center">
                      <a href="{{url('image/'.$categories->picture)}}" title="{{$categories->name}}" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand "></i></a>

                    </div>
                    <div class="d-flex align-items-center justify-content-center">

                    </div>
                  </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{$categories->name}}</h1>
                    <div class="fs-5 mb-5">
                    </div>
                    <p class="offcanvas-body">{{$categories->detail}}</p>

                </div>
            </div>
        </div>


      </div>
    </section>
  </main>

@endsection




