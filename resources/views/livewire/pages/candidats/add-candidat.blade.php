<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenue {{ auth()->user()->name }} | <span class="bg-indigo-500 rounded-full px-3 py-1 text-white">Commune de {{ auth()->user()->commune->name }}</span>
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl">
        <form wire:submit.prevent="storeCandidat" enctype="multipart/form-data">
            <div class="bg-white border rounded-lg shadow relative m-10">
                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Identité du Marié
                    </h3>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">
                                Nom du Marié
                            </label>
                            <input type="text" name="product-name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple Imac 27”" required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="category" class="text-sm font-medium text-gray-900 block mb-2">
                                Prénom du Marié
                            </label>
                            <input type="text" name="category" id="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Electronics" required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">
                                Date de naissance du Marié
                            </label>
                            <input type="text" name="brand" id="brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple" required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">
                                N° Carte d'electeur du Marié
                            </label>
                            <input type="number" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="$2300" required="">
                        </div>
                        <div class="col-span-full">
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">
                                Photo du Marié
                            </label>
                            <input type="file" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="$2300" required="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg shadow relative m-10 my-4">
                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Identité de la Mariée
                    </h3>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">
                                Nom de la Mariée
                            </label>
                            <input type="text" name="product-name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple Imac 27”" required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="category" class="text-sm font-medium text-gray-900 block mb-2">
                                Prénom de la Mariée
                            </label>
                            <input type="text" name="category" id="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Electronics" required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">
                                Date de naissance de la Mariée
                            </label>
                            <input type="text" name="brand" id="brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple" required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">
                                N° Carte d'electeur de la Mariée
                            </label>
                            <input type="number" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="$2300" required="">
                        </div>
                        <div class="col-span-full">
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">
                                Photo de la Mariée
                            </label>
                            <input type="file" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="$2300" required="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg shadow relative m-10 my-4">
                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Informations du mariage
                    </h3>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid gap-6">
                        <div class=" sm:col-span-3">
                            <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">
                                Date de mariage
                            </label>
                            <input type="date" name="product-name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple Imac 27”" required="">
                        </div>
                    </div>
                    <div class="py-6 rounded-b">
                        <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
