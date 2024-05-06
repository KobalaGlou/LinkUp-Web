<x-GuestApp-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-12 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Accueil') }}
                            </x-nav-link>
                            <x-nav-link :href="route('annonce.create')" :active="request()->routeIs('annonce.create')">
                                {{ __('Ajouter annonce') }}
                            </x-nav-link>
                            <x-nav-link :href="route('annonce.list')" :active="request()->routeIs('annonce.list')">
                                {{ __('Mes annonces') }}
                            </x-nav-link>
                            <x-nav-link :href="route('annonce.inscritptionAnnonces')" :active="request()->routeIs('annonce.list')">
                                {{ __('Mes inscriptions') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <x-nav-link :href="route('login')">
                                {{ __('Se connecter') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>
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
            @if ($annonce->cache == 0)
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <article class="overflow-hidden rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <a href="{{ route('public.annonce', $annonce) }}">
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
                    </a>
                    <header class="flex items-center justify-between leading-tight p-2 md:p-4 ">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-white" href="{{ route('public.annonce', $annonce) }}">
                                {{ $annonce->titreA }}
                            </a>
                        </h1>
                        @if ($annonce->evenement_sportif)
                        <p class="text-white text-sm">
                            Sport
                        </p>
                        @endif
                        @if ($annonce->loisir)
                        <p class="text-white text-sm">Loisir</p>
                        @endif
                        @if ($annonce->covoiturage)
                        <p class="text-white text-sm">Covoiturage</p>
                        @endif
                        @if ($annonce->lecture)
                        <p class="text-white text-sm">Lecture</p>
                        @endif
                        @if ($annonce->cinema)
                        <p class="text-white text-sm">Cinema</p>
                        @endif
                        @if ($annonce->competence)
                        <p class="text-white text-sm">Compétence</p>
                        @endif
                    </header>
                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <p class="text-white text-sm">
                            Date : {{ $annonce->date->format('d/m/Y H:m') }}
                        </p>
                        <p class="text-white text-sm">
                            Place disponible : {{ (new App\Http\Controllers\AnnonceController)->nbPlaceRestante($annonce) }}
                        </p>
                    </footer>
                </article>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</x-GuestApp-layout>