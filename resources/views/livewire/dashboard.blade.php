<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agent <span class="bg-indigo-100 px-4 py-1 rounded">{{ auth()->user()->name }}</span> | <span class="bg-indigo-500 rounded-full px-3 py-1 text-white">Commune de {{ auth()->user()->commune->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-text-input
                        label="Name"
                        name="name"
                        wire:model.live="search"
                        class="w-full px-3 py-2"
                        placeholder="Rechercher le nom d'un client"
                    />
                </div>
            </div>

            @if($search !==null)
                <div class="bg-slate-50 p-6 shadow rounded">
                    <section class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
                        @foreach($results as $key => $result)
                            <div wire:key="{{ $key }}" class="w-80 bg-white shadow-md rounded-xl duration-500">
                                <a href="{{ route('candidat-show', $result->id) }}" wire:navigate>
                                    <img
                                        src="{{ asset('storage/'.$result->photos) }}"
                                        alt="{{ $result->name }}"
                                        class="size-60 object-cover rounded-t-xl aspect-auto"
                                    />
                                    <div class="px-4 py-3 w-80 space-y-2">
                                    <span class="font-semibold mr-3 uppercase text-xs flex items-center space-x-4">
                                        <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-400 hover:text-slate-600 duration-300">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                        <span>{{ $result->name . " " . $result->prenon }}</span>
                                    </span>
                                        <p class="text-lg font-bold text-black truncate block capitalize flex items-center space-x-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-400 hover:text-slate-600 duration-300">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                            </svg>
                                            <span>{{ $result->date_naissance->format('Y-m-d') }}</span>
                                        </p>
                                        <p class="flex items-center space-x-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-400 hover:text-slate-600 duration-300">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                                            </svg>
                                            <span class="text-lg font-semibold text-black cursor-auto">
                                            {{ $result->id_carte_electeur }}
                                        </span>
                                        <p class="space-x-2 bg-red-400 py-1 px-2 rounded-full">
                                            <span class="text-xs text-center justify-items-center text-white cursor-auto">
                                                Marié a la commune : {{ $result->commune->name }}
                                            </span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </section>
                    <div class="py-4">
                        {{ $results->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
