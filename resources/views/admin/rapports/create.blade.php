<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{route('admin.rapports.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> rapports index</a>
            </div>

            <div class="m-2 p-2">


                <form method="POST" action="{{route('admin.rapports.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="titreL" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">cin</label>
                        <select name="cin" id="cin">
                            <option value=""></option>
                            @foreach($data as $info)
                            <option value="{{$info->id}}">{{$info->cin}}</option>
                            @endforeach
                        </select>
                        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> description</label>
                        <input type="text" id="desc" name="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required>

                        <label for="amend" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> amend (DH)</label>
                        <input type="number" id="amend" name="amend" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="amend dh" required>




                    </div>


                    <button type="submit" class="text-white bg-indigo-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">create</button>
                </form>


            </div>


        </div>
    </div>
</x-admin-layout>