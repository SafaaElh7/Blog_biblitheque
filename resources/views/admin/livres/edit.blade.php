<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{route('admin.livres.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> catégorie index</a>
            </div>

            <div class="m-2 p-2">


                <form method="POST" action="{{route('admin.livres.update',$livre->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="titreL" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> titre</label>
                        <input type="text" id="titreL" name="titreL" value="{{$livre->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="titre livre" required>

                        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> description</label>
                        <input type="text" id="desc" name="desc" value="{{$livre->desc}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required>

                        <label for="inStock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Stock</label>
                        <input type="number" id="Stock" name="Stock" value="{{$livre->inStock}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Stock" required>

                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> photo</label>
                        <div>
                            <img src="{{Storage::url($livre->photo)}}" alt="">
                        </div>
                        <input type="file" id="photo" name="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="photo" required>

                        <label for="caregory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> categorie</label>
                        <select multiple name="caregory" id="caregory">
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->titre}}</option>
                            @endforeach
                        </select>

                    </div>


                    <button type="submit" class="text-white bg-indigo-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
                </form>


            </div>


        </div>
    </div>
</x-admin-layout>