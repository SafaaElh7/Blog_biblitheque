<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{route('admin.rapports.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">nouvelle rapport</a>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                nomComplet
                            </th>
                            <th scope="col" class="px-6 py-3">
                                cin
                            </th>
                            <th scope="col" class="px-6 py-3">
                                description
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Amend
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rapports as $rapport)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{$rapport->id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$rapport->name}}
                            </td>

                            <td class="px-6 py-4">
                                {{$rapport->cin}}
                            </td>

                            <td class="px-6 py-4">
                                {{$rapport->description}}
                            </td>

                            <td class="px-6 py-4">
                                {{$rapport->amend}}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <form class="p-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" method="POST" action="{{route('admin.rapports.destroy',$rapport->id)}}" onsubmit="return confirm('es-tu sûr?');">
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