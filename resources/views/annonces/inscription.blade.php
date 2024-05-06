<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes inscriptions') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach($annonces as $annonce)
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
                        <p class="text-white text-sm">Sport</p>
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
                        <p class="text-white text-sm">Cinéma</p>
                        @endif
                        @if ($annonce->competence)
                        <p class="text-white text-sm">Compétence</p>
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
            @endforeach
        </div>
    </div>
</x-app-layout>