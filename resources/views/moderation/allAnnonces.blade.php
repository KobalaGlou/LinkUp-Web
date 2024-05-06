<x-app-layout>
    <style>
        .context-menu {
            position: absolute;
            background-color: #ffffff;
            /* Couleur de fond */
            color: #000000;
            /* Couleur du texte */
            border: 1px solid #ccc;
            padding: 5px 0;
            z-index: 9999;
        }

        .context-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .context-menu li {
            padding: 8px 15px;
            cursor: pointer;
        }

        .context-menu li:hover {
            background-color: #f0f0f0;
        }
    </style>

    <style>
        /* Autres styles ... */

        /* Style pour flouter les annonces cachées */
        .hidden-announcement img {
            filter: blur(10px);
            /* Ajoute un flou à l'image */
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Toutes les Annonces') }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-7 px-4">
        <div class="mx-auto w-full px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm">
                <div class="p-5 text-gray-900 dark:text-gray-100">
                    <form class="flex flex-wrap md:flex-nowrap items-center justify-center" method="GET" action="{{ route('searchAnnonce') }}">
                        <input type="text" name="titreA" id="ttireA" class="form-control mb-4 sm:mb-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-1/4 p-2.5" placeholder="Titre de l'annonce">
                        <select class="bg-gray-50 border mb-4 sm:mb-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-1/4 p-2.5 ms-3" name="typeEvenement" id="selectType" ref="selectType">
                            <option value="">Choisir un type d'evenement</option>
                            <option value="1">Sportif</option>
                            <option value="2">Cinéma</option>
                            <option value="3">Covoiturage</option>
                            <option value="4">Loisir</option>
                            <option value="5">Compétence</option>
                            <option value="6">Lecture</option>
                        </select>
                        <select class="bg-gray-50 border mb-4 sm:mb-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-1/4 p-2.5 ms-3 me-1" name="typeAnnonce" id="selectType" ref="selectType">
                            <option value="">Choisir un type d'annonce</option>
                            @foreach($types as $type)
                            <option value="{{$type->idT}}">{{ $type->libT }}</option>
                            @endforeach
                        </select>
                        <label class="mr-1" for="CheckDispo">
                            <input type="checkbox" id="CheckDispo" class="w-4 h-4 text-gray-400 bg-gray-100 border-gray-300 rounded focus:ring-gray-800 ml-5" name="disponible">
                            Place disponible
                        </label>
                        <button type="submit" class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center ml-3">Rechercher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach($annonces as $annonce)
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <article class="overflow-hidden rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <a href="{{ route('public.annonce', $annonce) }}">

                        @if ($annonce->cache == 1)
                        <div class="hidden-announcement">
                            @endif
                            @if ($annonce->image != '')
                            <img alt="Placeholder" class="block h-auto w-full" src="{{ asset('storage/img/' . $annonce->image) }}" style="height: 300px; width: 600px">
                            @endif
                            @if ($annonce->image == '')
                            @if ($annonce->evenement_sportif)
                            <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/id/73/600/400">
                            @endif
                            @if ($annonce->loisir)
                            <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/id/96/600/400">
                            @endif
                            @if ($annonce->covoiturage)
                            <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/id/183/600/400">
                            @endif
                            @if ($annonce->lecture)
                            <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/id/367/600/400">
                            @endif
                            @if ($annonce->cinema)
                            <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/id/355/600/400">
                            @endif
                            @if ($annonce->competence)
                            <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/id/4/600/400">
                            @endif
                            @endif
                            @if ($annonce->cache == 1)
                        </div>
                        @endif
                    </a>
                    <header class="flex items-center justify-between leading-tight p-2 md:p-4 ">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-white" href="#">
                                {{ $annonce->titreA }}
                            </a>
                        </h1>
                        <p class="text-white text-sm">
                            {{ $annonce->Typeannonce->libT }}
                        </p>
                    </header>
                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <a class="flex items-center no-underline hover:underline text-white signalement-link" href="#" data-user-id="{{ $annonce->Etudiant->Utilisateur->id }}">
                            <img alt="Placeholder" class="h-8 w-8 block rounded-full" src="{{ Gravatar::get($annonce->etudiant->utilisateur->emailU) }}">
                            <p class="ml-2 text-sm">
                                {{ $annonce->Etudiant->Utilisateur->nomU}} {{ $annonce->Etudiant->Utilisateur->prenomU}}
                            </p>
                        </a>
                        <div id="contextMenu" class="context-menu" style="display: none;">
                            <ul>
                                <li><a href="{{ route('moderation.reportUser', ['etudiant' => $annonce->Etudiant]) }}">Signaler</a></li>
                                <!-- Autres options du menu -->
                            </ul>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var btnSignalement = document.getElementById('btn-signalement');

                                btnSignalement.addEventListener('click', function(event) {
                                    event.preventDefault(); // Empêcher le comportement par défaut du lien

                                    // Dispatch l'événement pour ouvrir la modal correspondante
                                    var event = new CustomEvent('open-modal', {
                                        detail: 'signalement'
                                    });
                                    window.dispatchEvent(event);
                                });
                            });
                        </script>
                        <a href="{{ route('moderation.reportAnnonce', $annonce->idA) }}" class="text-red-500 hover:text-red-700">Report</a>
                    </footer>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var lienSignalement = document.querySelector(".signalement-link");

        lienSignalement.addEventListener("contextmenu", function(event) {
            event.preventDefault(); // Empêcher le menu contextuel par défaut du navigateur de s'afficher

            // Afficher le menu contextuel à l'emplacement du clic
            var contextMenu = document.getElementById("contextMenu");
            contextMenu.style.display = "block";
            contextMenu.style.left = event.pageX + "px";
            contextMenu.style.top = event.pageY + "px";

            // Récupérer l'ID de l'utilisateur à partir de l'attribut data
            var userId = lienSignalement.getAttribute('data-user-id');

            // Lien vers la route Laravel pour le signalement
            var signalementUrl = "/signalement/" + userId;

            // Action à effectuer lors du clic sur "Signaler"
            document.getElementById("signalement").setAttribute("href", signalementUrl);

            // Gestionnaire d'événements pour masquer le menu contextuel lors du clic en dehors de celui-ci
            document.addEventListener("click", function(event) {
                var isClickInsideMenu = contextMenu.contains(event.target);
                var isClickOnLink = event.target.classList.contains('signalement-link');

                if (!isClickInsideMenu && !isClickOnLink) {
                    contextMenu.style.display = "none";
                }
            });
        });
    });
</script>