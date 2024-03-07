<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenue {{ auth()->user()->name }} | <span class="bg-indigo-500 rounded-full px-3 py-1 text-white">Commune de {{ auth()->user()->commune->name }}</span>
        </h2>
    </x-slot>

    @if (session('status'))
        <div x-data="{ open: true }" x-init="setTimeout(() => open = false, 3000)" x-show="open" class="mt-12 px-4 rounded-md border-l-4 border-green-500 bg-green-50 mx-auto max-w-7xl">
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
                            {{ session('status') }}
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
    @endif

    <div class="mx-auto max-w-7xl py-12 space-y-6">
        <h2 class="font-semibold text-2xl">Liste des candidats</h2>
        <div class="flex justify-end ">
            <a
                wire:navigate
                href="{{ route('candidats.create') }}"
                class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
            >
                Ajouter un candidat
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Photo</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nom</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Prenon</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date de naissance</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">ID Carte Electeur</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-center">
                    @foreach($candidats as $candidat)
                        <tr wire:key="{{ $candidat->id }}">
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-center text-gray-900">
                                <img
                                    src="{{ asset('storage/'.$candidat->photos) }}"
                                    alt="{{$candidat->name}}"
                                    class="size-14 rounded-full border bg-red-200 object-cover">
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$candidat->name}}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$candidat->prenon}}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$candidat->date_naissance->format('Y-m-d')}}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$candidat->id_carte_electeur}}</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a
                                    href="{{ route('candidat-show',$candidat->id) }}"
                                    wire:navigate
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                                >
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
