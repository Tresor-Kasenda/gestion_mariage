<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenue {{ auth()->user()->name }} | <span class="bg-indigo-500 rounded-full px-3 py-1 text-white">Commune de {{ auth()->user()->commune->name }}</span>
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl py-12 space-y-6">
        <h2 class="font-semibold text-2xl">Liste des candidats</h2>
        <div class="flex justify-end ">
            <a
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
