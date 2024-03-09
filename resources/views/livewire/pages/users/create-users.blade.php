<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agent <span class="bg-indigo-100 px-4 py-1 rounded">{{ auth()->user()->name }}</span> | <span class="bg-indigo-500 rounded-full px-3 py-1 text-white">Commune de {{ auth()->user()->commune->name }}</span>
        </h2>
    </x-slot>
    <div class="mx-auto max-w-7xl">
        <div class="bg-white border rounded-lg shadow relative m-10">
            <div class="p-6 space-y-6">
                <form wire:submit.prevent="store">
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Nom</label>
                            <input type="text" wire:model="name" name="name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple Imac 27”" required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                            <input type="text" wire:model="email" name="email" id="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Electronics" required="">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Commune</label>
                            <select  name="brand" wire:model="commune" id="brand" class="w-full px-2 py-2 bg-gray-50 border border-gray-300 focus:border-cyan-600 rounded-lg block">
                                <option value="" selected>Selectionner la ville</option>
                                @foreach($communes as $commune)
                                    <option
                                        value="{{ $commune->id }}"
                                        {{ old('commune_id') == $commune->id ? 'selected' : '' }}
                                    >{{ $commune->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Mot de passe</label>
                            <input
                                type="password"
                                wire:model="password"
                                name="password"
                                id="password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Electronics" required="">
                        </div>
                    </div>
                    <div class="py-8 border-gray-200 rounded-b">
                        <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                            Sauvegarder
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
