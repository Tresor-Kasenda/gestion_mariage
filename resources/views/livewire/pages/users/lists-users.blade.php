<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenue {{ auth()->user()->name }} | <span class="bg-indigo-500 rounded-full px-3 py-1 text-white">Commune de {{ auth()->user()->commune->name }}</span>
        </h2>
    </x-slot>

    @if (session('status'))
        <div class="text-white bg-red-300 w-full px-4 py-2  shadow rounded-lg font-semibold">
            {{ session('status') }}
        </div>

    @endif

    <div class="mt-12 mx-4 px-4 rounded-md border-l-4 border-green-500 bg-green-50 md:max-w-2xl md:mx-auto">
        <div class="flex justify-between py-3">
            <div class="flex">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rounded-full text-green-500" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fillRule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clipRule="evenodd" />
                    </svg>
                </div>
                <div class="self-center ml-3">
                        <span class="text-green-600 font-semibold">
                          Success
                        </span>
                    <p class="text-green-600 mt-1">
                        Team member has been added successfully.
                    </p>
                </div>
            </div>
            <button class="self-start text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fillRule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clipRule="evenodd" />
                </svg>
            </button>
        </div>
    </div>

    <div class="mx-auto max-w-7xl py-12 space-y-6">
        <h2 class="font-semibold text-2xl">Liste des gestionnaires</h2>
        <div class="flex justify-end ">
            <a
                href="{{ route('users.create') }}"
                class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
            >
                Ajouter un gestionnaire
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nom</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Commune</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Status</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-center space-x-4">
                    @foreach($users as $user)
                        <tr wire:key="{{ $user->id }}">
                            <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">{{$user->name}}</td>
                            <td class="whitespace-nowrap px-4 py-4 text-gray-700">{{$user->email}}</td>
                            <td class="whitespace-nowrap px-4 py-4 text-gray-700">{{$user->commune->name}}</td>
                            <td class="whitespace-nowrap px-4 py-4 text-gray-700">

                                <span class="{{ $user->is_admin ? 'bg-blue-800 text-white px-2 py-1 rounded-full' :  '' }}">
                                    {{ $user->is_admin ? "Admin" : "Gestionnaire" }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    <div class="py-6">
                        {{ $users->links() }}
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
