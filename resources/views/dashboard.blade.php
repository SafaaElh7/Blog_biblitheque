<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('bienvenue') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">





                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <h3 class="card-header">nouveaux livres</h3>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($livres as $livre)
                                            <div class="col-md-6 mb-2 shadow-sm">
                                                <div class="card" style="width: 18rem; height:100;">
                                                    <div class="card-img-top">
                                                        <img src="{{Storage::url($livre->photo)}}" class="w-100  h-100 rounded" alt="">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="font-weight: bolder;color:blueviolet; font-size:30px">
                                                            {{$livre->titre}}
                                                        </h5>
                                                        <p class="d-flex flex-row justify-content-between align-items-centre">
                                                        <p class="card-text" style="font-size:20px;">
                                                            {{$livre->desc}}
                                                        </p>
                                                        </p>
                                                        <a href="{{route('livre_show',$livre->id)}}" class=" btn btn-primary">
                                                            Reserve
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="justify-content-centre d-flex">
                                            {{$livres->links()}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="list-group">
                                    <li class="list-group-item active">
                                        categories
                                    </li>
                                    @foreach($categories as $category)
                                    <a class=" list-group-item list-group-item-action" href="{{route('category.livres',$category->id)}}">
                                        {{$category->titre}}
                                        ({{$category->livres->count()}})
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>