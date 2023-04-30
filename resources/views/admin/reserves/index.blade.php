<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                Reservation
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                nom
                            </th>
                            <th scope="col" class="px-6 py-3">
                                cin
                            </th>

                            <th scope="col" class="px-6 py-3">
                                nom livre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                telephone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                statut
                            </th>

                            <th scope="col" class="px-6 py-3">
                                duree
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reserves as $reserv)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{$reserv->id}}
                            </td>

                            <td class="px-6 py-4">
                                {{$reserv->name}}
                            </td>

                            <td class="px-6 py-4">
                                {{$reserv->cin}}
                            </td>

                            <td class="px-6 py-4">
                                {{$reserv->nom_livre}}
                            </td>
                            <td class="px-6 py-4">
                                {{$reserv->tel}}
                            </td>


                            <td class="px-6 py-4">
                                {{$reserv->statut}}
                            </td>

                            <td class="px-6 py-4">
                                {{$reserv->duree}}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{route('admin.reserves.edit',$reserv->id)}}" class="p-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                    <form class="p-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" method="POST" action="{{route('admin.reserves.destroy',$reserv->id)}}" onsubmit="return confirm('es-tu sûr?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>



        </div>
    </div>
</x-admin-layout>