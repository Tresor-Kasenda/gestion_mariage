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
                            <label for="nom_marier" class="text-sm font-medium text-gray-900 block mb-2">
                                Nom du Marié
                            </label>
                            <input
                                type="text"
                                name="nom_marier"
                                id="nom_marier"
                                wire:model="nom_marier"
                                class="shadow-sm bg-gray-50 border @error('date_mariage') border-red-400 @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Saisir le nom du marié"
                                required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="prenom_marier" class="text-sm font-medium text-gray-900 block mb-2">
                                Prénom du Marié
                            </label>
                            <input
                                type="text"
                                name="prenom_marier"
                                id="prenom_marier"
                                wire:model="prenom_marier"
                                class="shadow-sm bg-gray-50 border @error('date_mariage') border-red-400 @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Saisir le prénom du marié"
                                required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="date_naissance_marier" class="text-sm font-medium text-gray-900 block mb-2">
                                Date de naissance du Marié
                            </label>
                            <input
                                type="date"
                                name="date_naissance_marier"
                                id="date_naissance_marier"
                                wire:model="date_naissance_marier"
                                class="shadow-sm bg-gray-50 border @error('date_mariage') border-red-400 @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Selectionner la date de naissance du marié"
                                required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="photo_marier" class="text-sm font-medium text-gray-900 block mb-2">
                                N° Carte d'electeur du Marié
                            </label>
                            <input
                                type="number"
                                name="photo_marier"
                                id="photo_marier"
                                wire:model="photo_marier"
                                class="shadow-sm bg-gray-50 border @error('date_mariage') border-red-400 @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Saissir le numéro de la carte d'electeur du marié"
                                required="">
                        </div>
                        <div class="col-span-full">
                            <label for="photo_marier" class="text-sm font-medium text-gray-900 block mb-2">
                                Photo du Marié
                            </label>
                            <input
                                type="file"
                                name="photo_marier"
                                id="photo_marier"
                                wire:model="photo_marier"
                                class="shadow-sm bg-gray-50 border @error('date_mariage') border-red-400 @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Selectionner la photo du marié"
                                required="">
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
                            <label for="nom_marieer" class="text-sm font-medium text-gray-900 block mb-2">
                                Nom de la Mariée
                            </label>
                            <input
                                type="text"
                                name="nom_marieer"
                                id="nom_marieer"
                                wire:model="nom_marieer"
                                class="shadow-sm bg-gray-50 border @error('date_mariage') border-red-400 @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Saisir le nom de la mariée"
                                required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="prenom_marieer" class="text-sm font-medium text-gray-900 block mb-2">
                                Prénom de la Mariée
                            </label>
                            <input
                                type="text"
                                name="prenom_marieer"
                                id="prenom_marieer"
                                wire:model="prenom_marieer"
                                class="shadow-sm bg-gray-50 border @error('date_mariage') border-red-400 @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Saisir le prenom de la mariée"
                                required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="date_naissance_marieer" class="text-sm font-medium text-gray-900 block mb-2">
                                Date de naissance de la Mariée
                            </label>
                            <input
                                type="date"
                                name="date_naissance_marieer"
                                id="date_naissance_marieer"
                                wire:model="date_naissance_marieer"
                                class="shadow-sm bg-gray-50 border @error('date_mariage') border-red-400 @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Selectionner la date de naissance de la mariee"
                                required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="carte_identite_marieer" class="text-sm font-medium text-gray-900 block mb-2">
                                N° Carte de la piece d'identiter de la Mariée
                            </label>
                            <input
                                type="number"
                                name="carte_identite_marieer"
                                id="carte_identite_marieer"
                                wire:model="carte_identite_marieer"
                                class="shadow-sm bg-gray-50 @error('date_mariage') border-red-400 @enderror border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Saisir le numero de la piece d'identiter de la marieer"
                                required="">
                        </div>
                        <div class="col-span-full">
                            <label for="photos_marieer" class="text-sm font-medium text-gray-900 block mb-2">
                                Photo de la Mariée
                            </label>
                            <input
                                type="file"
                                name="photos_marieer"
                                id="photos_marieer"
                                wire:model="photos_marieer"
                                class="shadow-sm bg-gray-50 @error('date_mariage') border-red-400 @enderror border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Selectionner la photo de la mariee"
                                required="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-lg shadow relative m-10 mb-4">
                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Informations du mariage
                    </h3>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid gap-6">
                        <div class=" sm:col-span-3">
                            <label for="date_mariage" class="text-sm font-medium text-gray-900 block mb-2">
                                Date de mariage
                            </label>
                            <input
                                type="date"
                                name="date_mariage"
                                id="date_mariage"
                                wire:model="date_mariage"
                                class="shadow-sm @error('date_mariage') border-red-400 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="S"
                                required="">
                        </div>
                    </div>
                    <div class="py-3 rounded-b">
                        <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                            Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
