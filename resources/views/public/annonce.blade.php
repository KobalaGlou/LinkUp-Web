<x-app-layout>
    @if (session('success')||session('error'))
    <div class="">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Détail annonce
        </h2>
    </x-slot>
    @if ($evenement == 1)
    <div class="w-full mx-auto sm:px-6 lg:px-8 pt-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $annonce->titreA }}
                </h2>
                <p class="text-gray-400 dark:text-gray-300">{{ $annonce->Typeannonce->libT}}</p>
            </div>
        </div>
    </div>
    <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Sport :</strong> {{ $annonce->evenement_sportif->sport->libS }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Nombre de personnes :</strong> {{ $annonce->nbPersMax }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de place(s) restante(s) :</strong> {{ (new App\Http\Controllers\AnnonceController)->nbPlaceRestante($annonce) }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Date :</strong> {{ $annonce->date }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Description :</strong></h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $annonce->descrA }}</p>
            </div>
            <div class="pt-3 px-6">
                <h2 class=" text-gray-900 dark:text-gray-100"><strong>Localisation :</strong></h2>
                <gmp-map center="{{$annonce->evenement_sportif->GPS}}" zoom="10" map-id="DEMO_MAP_ID" style="height: 400px;" class="pb-3" id="mapEvenement">
                    <gmp-advanced-marker position="{{$annonce->evenement_sportif->GPS}}" title="{{$annonce->evenement_sportif->adresse}}" gmp-clickable></gmp-advanced-marker>
                </gmp-map>
            </div>
            <br>
        </div>
        <div class="flex items-center">
            @if (Auth::user()->idU != $annonce->idU)
            @if (Auth::check() && \DB::table('interesser')
            ->where('idAnnonce', $annonce->idA)
            ->where('idEtudiant', Auth::user()->idU)
            ->exists())
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.desinscrire', $annonce) }}">Se désinscrire</a>
            </div>
            @else
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.participer', $annonce) }}">Participer</a>
            </div>
            @endif
            <div class="p-6 text-gray-700 flex items-center">
                <a class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('moderation.reportUser', ['etudiant' => $annonce->Etudiant]) }}">Signaler</a>
            </div>
            @endif
        </div>
    </div>
    @endif
    @if ($evenement == 2)
    <div class="w-full mx-auto sm:px-6 lg:px-8 pt-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $annonce->titreA }}
                </h2>
                <p class="text-gray-400 dark:text-gray-300">{{ $annonce->Typeannonce->libT}}</p>
            </div>
        </div>
    </div>
    <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <img src="{{ $film['couverture'] }}" alt="{{ $film['titre'] }}" class="float-right m-6" style="width: 13%;" />
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Film :</strong> {{ $film['titre'] }}({{ $film['annee'] }})</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de personnes :</strong> {{ $annonce->nbPersMax }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de place(s) restante(s) :</strong> {{ (new App\Http\Controllers\AnnonceController)->nbPlaceRestante($annonce) }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Date :</strong> {{ $annonce->date }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Montant à ajouter :</strong> {{ $annonce->cinema->montantAjouter }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Description :</strong></h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $annonce->descrA }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Adresse :</strong></h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $annonce->cinema->adresse }}</p>
            </div>
            <div class="pt-3 px-6">
                <h2 class=" text-gray-900 dark:text-gray-100"><strong>Localisation :</strong></h2>
                <gmp-map center="{{$annonce->cinema->GPS}}" zoom="10" map-id="DEMO_MAP_ID" style="height: 400px;" class="pb-3" id="mapEvenement">
                    <gmp-advanced-marker position="{{$annonce->cinema->GPS}}" title="{{$annonce->cinema->adresse}}"></gmp-advanced-marker>
                </gmp-map>
            </div>
            <br>

        </div>
        <div class="flex items-center">
            @if (Auth::user()->idU != $annonce->idU)
            @if (Auth::check() && \DB::table('interesser')
            ->where('idAnnonce', $annonce->idA)
            ->where('idEtudiant', Auth::user()->idU)
            ->exists())
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.desinscrire', $annonce) }}">Se désinscrire</a>
            </div>
            @else
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.participer', $annonce) }}">Participer</a>
            </div>
            @endif
            <div class="p-6 text-gray-700 flex items-center">
                <a class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('moderation.reportUser', ['etudiant' => $annonce->Etudiant]) }}">Signaler</a>
            </div>
            @endif
        </div>
    </div>
    @endif
    @if ($evenement == 3)
    <div class="w-full mx-auto sm:px-6 lg:px-8 pt-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $annonce->titreA }}
                </h2>
                <p class="text-gray-400 dark:text-gray-300">{{ $annonce->Typeannonce->libT}}</p>
            </div>
        </div>
    </div>
    <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Destination :</strong> {{ $annonce->covoiturage->adresse }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Nombre de personnes :</strong> {{ $annonce->nbPersMax }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de place(s) restante(s) :</strong> {{ (new App\Http\Controllers\AnnonceController)->nbPlaceRestante($annonce) }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Date :</strong> {{ $annonce->date }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Description :</strong></h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $annonce->descrA }}</p>
            </div>
            <div class="pt-3 px-6">
                <h2 class="text-gray-900 dark:text-gray-100"><strong>Localisation :</strong></h2>
                <gmp-map center="{{$annonce->covoiturage->GPS}}" zoom="10" map-id="DEMO_MAP_ID" style="height: 400px;" class="pb-3" id="mapEvenement">
                    <gmp-advanced-marker position="{{$annonce->covoiturage->GPS}}" title="{{$annonce->covoiturage->adresse}}" gmp-clickable></gmp-advanced-marker>
                </gmp-map>
            </div>
        </div>
        <div class="flex items-center">
            @if (Auth::user()->idU != $annonce->idU)
            @if (Auth::check() && \DB::table('interesser')
            ->where('idAnnonce', $annonce->idA)
            ->where('idEtudiant', Auth::user()->idU)
            ->exists())
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.desinscrire', $annonce) }}">Se désinscrire</a>
            </div>
            @else
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.participer', $annonce) }}">Participer</a>
            </div>
            @endif
            <div class="p-6 text-gray-700 flex items-center">
                <a class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('moderation.reportUser', ['etudiant' => $annonce->Etudiant]) }}">Signaler</a>
            </div>
            @endif
        </div>
    </div>
    @endif
    @if ($evenement == 4)
    <div class="w-full mx-auto sm:px-6 lg:px-8 pt-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $annonce->titreA }}
                </h2>
                <p class="text-gray-400 dark:text-gray-300">{{ $annonce->Typeannonce->libT}}</p>
            </div>
        </div>
    </div>
    <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Jeux Video :</strong> {{ $jeuxSociete['name'] }}({{ $jeuxSociete['year'] }})</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Nombre de personnes :</strong> {{ $annonce->nbPersMax }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de place(s) restante(s) :</strong> {{ (new App\Http\Controllers\AnnonceController)->nbPlaceRestante($annonce) }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Date :</strong> {{ $annonce->date }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Description :</strong></h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $annonce->descrA }}</p>
            </div>
        </div>
        <div class="flex items-center">
            @if (Auth::user()->idU != $annonce->idU)
            @if (Auth::check() && \DB::table('interesser')
            ->where('idAnnonce', $annonce->idA)
            ->where('idEtudiant', Auth::user()->idU)
            ->exists())
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.desinscrire', $annonce) }}">Se désinscrire</a>
            </div>
            @else
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.participer', $annonce) }}">Participer</a>
            </div>
            @endif
            <div class="p-6 text-gray-700 flex items-center">
                <a class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('moderation.reportUser', ['etudiant' => $annonce->Etudiant]) }}">Signaler</a>
            </div>
            @endif
        </div>
    </div>
    @endif
    @if ($evenement == 7)
    <div class="w-full mx-auto sm:px-6 lg:px-8 pt-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $annonce->titreA }}
                </h2>
                <p class="text-gray-400 dark:text-gray-300">{{ $annonce->Typeannonce->libT}}</p>
            </div>
        </div>
    </div>
    <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Jeux Video :</strong> {{ $jeuxVideo['name'] }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Nombre de personnes :</strong> {{ $annonce->nbPersMax }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de place(s) restante(s) :</strong> {{ (new App\Http\Controllers\AnnonceController)->nbPlaceRestante($annonce) }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Date :</strong> {{ $annonce->date }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Description :</strong></h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $annonce->descrA }}</p>
            </div>
        </div>
        <div class="flex items-center">
            @if (Auth::user()->idU != $annonce->idU)
            @if (Auth::check() && \DB::table('interesser')
            ->where('idAnnonce', $annonce->idA)
            ->where('idEtudiant', Auth::user()->idU)
            ->exists())
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.desinscrire', $annonce) }}">Se désinscrire</a>
            </div>
            @else
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.participer', $annonce) }}">Participer</a>
            </div>
            @endif
            <div class="p-6 text-gray-700 flex items-center">
                <a class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('moderation.reportUser', ['etudiant' => $annonce->Etudiant]) }}">Signaler</a>
            </div>
            @endif
        </div>
    </div>
    @endif
    @if ($evenement == 5)
    <div class="w-full mx-auto sm:px-6 lg:px-8 pt-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $annonce->titreA }}
                </h2>
                <p class="text-gray-400 dark:text-gray-300">{{ $annonce->Typeannonce->libT}}</p>
            </div>
        </div>
    </div>
    <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Matière :</strong> {{ $concerner->matiere->libM }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Nombre de personnes :</strong> {{ $annonce->nbPersMax }}</h2>
                <p class="text-gray-700 dark:text-gray-300"></p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de place(s) restante(s) :</strong> {{ (new App\Http\Controllers\AnnonceController)->nbPlaceRestante($annonce) }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Date :</strong> {{ $annonce->date }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <h2><strong>Description :</strong></h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $annonce->descrA }}</p>
            </div>
        </div>
        <div class="flex items-center">
            @if (Auth::user()->idU != $annonce->idU)
            @if (Auth::check() && \DB::table('interesser')
            ->where('idAnnonce', $annonce->idA)
            ->where('idEtudiant', Auth::user()->idU)
            ->exists())
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.desinscrire', $annonce) }}">Se désinscrire</a>
            </div>
            @else
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.participer', $annonce) }}">Participer</a>
            </div>
            @endif
            <div class="p-6 text-gray-700 flex items-center">
                <a class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('moderation.reportUser', ['etudiant' => $annonce->Etudiant]) }}">Signaler</a>
            </div>
            @endif
        </div>
    </div>
    @endif
    @if ($evenement == 6)
    <div class="w-full mx-auto sm:px-6 lg:px-8 pt-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $annonce->titreA }}
                </h2>
                <p class="text-gray-400 dark:text-gray-300">{{ $annonce->Typeannonce->libT}}</p>
            </div>
        </div>
    </div>
    <div class="w-full mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                @if (isset($livre['cover']))
                <img src="{{ $livre['cover']['thumbnail'] }}" alt="{{ $livre['title'] }}" class="float-left pr-3 pt-2" />
                @endif
                <p class="pb-2"><strong>Livre :</strong> {{ $livre['title'] }}</p>
                @foreach ($livre['author'] as $author)
                <p class="pb-2"><strong>Auteur :</strong> {{ $author }}</p>
                @endforeach

                <p><strong>Description du livre :</strong></p>
                @php
                echo htmlspecialchars_decode($livre['description']);
                @endphp
            </div>

            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de personnes :</strong> {{ $annonce->nbPersMax }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Nombre de place(s) restante(s) :</strong> {{ (new App\Http\Controllers\AnnonceController)->nbPlaceRestante($annonce) }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Date :</strong> {{ $annonce->date }}</p>
            </div>
            <div class="px-6 pt-3 text-gray-900 dark:text-gray-100">
                <p><strong>Description :</strong></p>
                <p class="text-gray-700 dark:text-gray-300">{{ $annonce->descrA }}</p>
            </div>
        </div>
        <div class="flex items-center">
            @if (Auth::user()->idU != $annonce->idU)
            @if (Auth::check() && \DB::table('interesser')
            ->where('idAnnonce', $annonce->idA)
            ->where('idEtudiant', Auth::user()->idU)
            ->exists())
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.desinscrire', $annonce) }}">Se désinscrire</a>
            </div>
            @else
            <div class="p-6 text-gray-700 flex items-center">
                <a type="submit" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('annonce.participer', $annonce) }}">Participer</a>
            </div>
            @endif
            <div class="p-6 text-gray-700 flex items-center">
                <a class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('moderation.reportUser', ['etudiant' => $annonce->Etudiant]) }}">Signaler</a>
            </div>
            @endif
        </div>
    </div>
    @endif
    @if ($annonce->idU == Auth::user()->idU)
    @foreach ($interesser as $participant)
    <div class="w-full mx-auto sm:px-6 lg:px-8 pt-6">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 shadow-md sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Participants</h2>
                <p class="text-gray-400 dark:text-gray-300 mt-3">{{ $participant->etudiant->utilisateur->nomU}} {{ $participant->etudiant->utilisateur->prenomU}}</p>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</x-app-layout>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap&libraries=marker&v=beta" defer></script>
<script>
    async function initMap() {
        const {
            Map
        } = await google.maps.importLibrary("maps");
        const {
            AdvancedMarkerElement
        } = await google.maps.importLibrary("marker");

        const advancedMarkers = document.querySelectorAll(
            "#mapEvenement gmp-advanced-marker",
        );

        for (const advancedMarker of advancedMarkers) {
            customElements.whenDefined(advancedMarker.localName).then(async () => {
                advancedMarker.addEventListener("gmp-click", async () => {
                    const infoWindow = new google.maps.InfoWindow({
                        //@ts-ignore
                        content: advancedMarker.title,
                    });

                    infoWindow.open({
                        //@ts-ignore
                        anchor: advancedMarker,
                    });
                });
            });
        }
    }

    initMap();
</script>