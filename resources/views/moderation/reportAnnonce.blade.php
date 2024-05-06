<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Signaler une annonce') }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('report.store') }}" class="py-12">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <input name="idAnnonce" value="{{$annonce->idA}}" hidden></input>
                <input name="idUtilisateur" value="{{$annonce->Etudiant->Utilisateur->idU}}" hidden></input>

                <!-- titre -->
                <div class="p-6 text-gray-100">
                    <label for="titreA" class="block font-medium">Titre de l'annonce</label>
                    <x-text-input type="text" name="titreA" id="title" value="{{$annonce->titreA}}" class="w-full" disabled></x-text-input>
                </div>

                <!-- user -->
                <div class="p-6 text-gray-100">
                    <label for="titreA" class="block font-medium">Utilisateur</label>
                    <x-text-input type="text" name="user" id="title" value="{{$annonce->Etudiant->Utilisateur->prenomU}}  {{$annonce->Etudiant->Utilisateur->nomU}}" class="w-full" disabled></x-text-input>
                </div>

                <!-- type de l'annonce -->
                <div class="p-6 pt-0 text-gray-100">
                    <label for="titreA" class="block font-medium">Type de l'annonce</label>
                    <select id="type" name="idT" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" disabled>
                        <option selected>{{$annonce->typeAnnonce->libT}}</option>
                    </select>
                </div>

                <!-- Nombre maximum de personne pour l'activité -->
                <div class="p-6 pt-0 text-gray-100 ">
                    <label for="titreA" class="block font-medium">Nombre de personne</label>
                    <x-text-input type="number" name="nbPersMax" value="{{$annonce->nbPersMax}}" class="w-full" disabled></x-text-input>
                </div>

                <!-- Contenu de l'annonce -->
                <div class="p-6 pt-0 text-gray-100 ">
                    <label for="titreA" class="block font-medium">Descriptif de l'annonce</label>
                    <x-text-area rows="5" name="descrA" id="desc" placeholder="{{$annonce->descrA}}" class="w-full" disabled></x-text-area>
                </div>
                <div class="relative">

                    <!-- Combobox du motif de signalement -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="p-6 pt-0 text-gray-100">
                            <label for="titreA" class="block font-medium">Motif de signalement</label>
                            <select id="type" name="idMotif" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @foreach($motifs as $motif)
                                @if ($motif->idTypeAction==1)
                                <option value="{{$motif->idMotif}}">{{$motif->nomMotif}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- TextArea de la raison du signalement -->
                    <div class="p-6 pt-0 text-gray-100 ">
                        <label for="titreA" class="block font-medium">Raison du signalement</label>
                        <x-text-area rows="5" name="Description" id="raison" value="{{$annonce->descrA}}" class="w-full"></x-text-area>
                    </div>

                    @if (Auth::user()->etudiant->moderateur && Auth::check())
                    <!-- Checkbox pour cacher ou non l'annonce -->
                    <div class="p-6 text-gray-100 flex items-center">
                        <input type="checkbox" id="hideAnnounce" name="hideAnnounce" class="mr-2">
                        <label for="hideAnnounce" class="block font-medium">Cacher l'annonce</label>
                    </div>
                    @endif


                    <!-- Action sur le formulaire -->
                    <div class="p-6 text-gray-900 flex items-center">
                        <div>
                            <button type="submit" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Signaler
                            </button>
                        </div>
                    </div>

                </div>
            </div>
    </form>
</x-app-layout>