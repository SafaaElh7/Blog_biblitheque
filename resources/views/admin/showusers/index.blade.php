<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-md-4">
                <input type="text" id="searchbycin" class="form-control" placeholder="search by cin">
            </div>
        </div>
        <br>

        <div id="ajax_search_result">

            <table class="table">
                <caption>List of users</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">cin</th>
                        <th scope="col">telephone</th>
                        <th scope="col">email</th>
                        <th scope="col">action</th>


                    </tr>
                </thead>
                <tbody>
                    @if(!@empty($data))
                    @php $i=1; @endphp
                    @foreach($data as $info)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$info->name}}</td>
                        <td>{{$info->cin}}</td>
                        <td>{{$info->tel}}</td>
                        <td>{{$info->email}}</td>

                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <form class="p-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" method="POST" action="{{route('admin.showusers.destroy',$info->id)}}" onsubmit="return confirm('es-tu sûr?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <p>we dont have user </p>
                    @endif
                </tbody>
            </table>

        </div>


        {{$data->links()}}
</x-admin-layout>