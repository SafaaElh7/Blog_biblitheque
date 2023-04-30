<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bibliotheque') }}
        </h2>
    </x-slot>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">{{$livre->titre}}</h3>

                    <div class="card-img-top">
                        <img class="img-fluid w-100" src="{{Storage::url($livre->photo)}}" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$livre->titre}}
                        </h5>
                        <!-- <p class="text-dark font-weight-bold">
                            categorier {{$dat->titre}}
                        </p> -->
                        <p class="d-flex flex-row justify-content-between align-items-centre">
                        <p class="card-text">
                            {{$livre->desc}}
                        </p>
                        </p>
                        <p class="font-weight-bold">
                            @if($livre->inStock>0)
                            <span class="text-success">
                                Disponible
                            </span>
                            @else
                            <span class="text-danger">
                                non disponible
                            </span>
                            @endif
                        </p>
                    </div>
                </div>


            </div>

            <div class="col-md-4">
                <form method="POST" action="{{route('client.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> entrer votre carte cin</label>
                        <input type="text" value="" id="cin" name="cin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="la carte national" required>
                    </div>

                    <div class="mb-6">
                        <label for="nom_livre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> nom</label>
                        <input type="text" value="{{($livre->titre)}}" id="nom_livre" name="nom_livre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="titre categorie" required>
                    </div>

                    <!-- <div class="form-group">
                        <label for="qte" class="label-input">
                            quantité:
                        </label>
                        <input type="number" name="qty" id="qty" value="1" placeholder="quantité" max="{{$livre->inStock}}" min="1" class="form-control">
                    </div> -->
                    <div class="form-group">
                        <label for="dur" class="label-input">
                            durée: <span class="text-danger">jours</span>
                        </label>
                        <input type="number" min='1' max='30' name="dure" id="dure" value="1" placeholder="durée" class="form-control">
                    </div>
                    <br>


                    <button type="submit" class="text-white bg-indigo-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

                <!-- <div class="form-group">
                    <label for="dur" class="label-input">
                        durée: <span class="text-danger">jours</span>
                    </label>
                    <input type="number" min='1' max='30' name="dure" id="dure" value="1" placeholder="durée" class="form-control">
                </div>
                <div class="form-group mt-2">

                    <div class="form-group mt-2">

                        <a href="{{route('show.create',$livre->id)}}" class=" btn btn-primary">
                            Reserve
                        </a>
                    </div>
                </div>
                </form> -->
            </div>

        </div>
    </div>




</x-app-layout>