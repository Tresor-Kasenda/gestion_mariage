<div>
    <x-slot name="header" class="print:hidden">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agent <span class="bg-indigo-100 px-4 py-1 rounded">{{ auth()->user()->name }}</span> | <span class="bg-indigo-500 rounded-full px-3 py-1 text-white">Commune de {{ auth()->user()->commune->name }}</span>
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl py-6 space-y-6">
        <div class="bg-white overflow-hidden shadow rounded-lg border">
            <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
                <div class="space-y-3">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900">
                        Detail du candidat
                    </h3>
                    <p class="mt-1 max-w-2xl text-lg text-gray-500 flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-slate-400 hover:text-indigo-600 duration-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                        </svg>
                        <span class="text-lg text-indigo-400 font-semibold">{{ $result->id_carte_electeur }}</span>
                    </p>
                </div>
                <div class="flex gap-4">
                    <img
                        src="{{ asset('storage/'.$result->photos) }}"
                        alt="{{$result->name}}"
                        class=" size-36 object-cover rounded-full shadow">
                    <img
                        src="{{ asset('storage/'.$result->mariage->femme->photos) }}"
                        alt="{{$result->mariage->femme->name}}"
                        class=" size-36 object-cover rounded-full shadow">
                </div>
            </div>
            <div class="border-t border-indigo-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nom et Prenom
                        </dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $result->name . " " . $result->prenon }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Date de naissance
                        </dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $result->date_naissance->format('Y-m-d') }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Piece d'identite
                        </dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $result->id_carte_electeur }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow rounded-lg border">
            <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
                <div class="space-y-3">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900">
                        Detail de sa femme
                    </h3>
                    <p class="mt-1 max-w-2xl text-lg text-gray-500 flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-slate-400 hover:text-indigo-600 duration-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                        </svg>
                        <span class="text-lg text-indigo-400 font-semibold">{{ $result->mariage->femme->carte_electeur }}</span>
                    </p>
                </div>
            </div>
            <div class="border-t border-indigo-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nom et Prenom
                        </dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $result->mariage->femme->name . " " . $result->mariage->femme->prenon }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Date de naissance
                        </dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $result->mariage->femme->date_naissance->format('Y-m-d') }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Piece d'identite
                        </dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $result->mariage->femme->carte_electeur }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow rounded-lg border">
            <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
                <div class="space-y-3">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900">
                        Date de mariage
                    </h3>
                    <p class="mt-1 max-w-2xl text-lg text-gray-500 flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-slate-400 hover:text-indigo-600 duration-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                        </svg>
                        <span class="text-lg text-indigo-400 font-semibold">{{ $result->mariage->date_mariage->format('D-M-Y') }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
