<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{route('admin.reserves.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white"> reservation index</a>
            </div>

            <div class="m-2 p-2">


                <form method="POST" action="{{route('admin.reserves.update',$livre->id)}}">
                    @csrf

                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">cin</label>
                        <input type="text" class="form-control" id="cin" name="cin" value=" {{$livre->user_cin}}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">nom livrs</label>
                        <input type="text" class="form-control" id="nom_livre" name="nom_livre" value=" {{$livre->nom_livre}}">
                    </div>



                    <div class="mb-3">
                        <label for="name" class="form-label">duree</label>
                        <input type="text" class="form-control" id="duree" name="duree" value=" {{$livre->duree}}">
                    </div>


                    <label for="name" class="form-label">active status</label>

                    <select class="form-control" name="job_active" id="job_active">
                        <option value="">Select status</option>
                        <option @if(old('job_active',$livre['statut'])==1) selected @endif value="1">Active</option>
                        <option @if(old('job_active',$livre['statut'])==0) selected @endif value="0">Not Active</option>
                    </select>
            </div>

        </div>


        <button type="submit" class="text-white bg-indigo-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
        </form>


    </div>


    </div>
    </div>
</x-admin-layout>