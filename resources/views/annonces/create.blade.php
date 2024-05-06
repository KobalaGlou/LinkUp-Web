<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer une annonce') }}
        </h2>
    </x-slot>
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
    <form method="get" action="{{ route('annonce.create') }}" class="pt-6">
        @csrf
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <select id="evenement" name="evenement" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="0" {{ $evenement == 0 ? 'selected' : '' }}>Choisir le type d'événement</option>
                        <option value="1" {{ $evenement == 1 ? 'selected' : '' }}>Sportif</option>
                        <option value="2" {{ $evenement == 2 ? 'selected' : '' }}>Cinéma</option>
                        <option value="3" {{ $evenement == 3 ? 'selected' : '' }}>Covoiturage</option>
                        <option value="4" {{ $evenement == 4 ? 'selected' : '' }}>Loisir</option>
                        <option value="5" {{ $evenement == 5 ? 'selected' : '' }}>Compétence</option>
                        <option value="6" {{ $evenement == 6 ? 'selected' : '' }}>Lecture</option>
                    </select>
                </div>
                <div class="p-6  flex items-center pt-0">
                    <!-- Action sur le formulaire -->
                    <div>
                        <button type="submit" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Valider
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if ($evenement == 1)
    <form method="post" action="{{ route('annonce.store') }}" class="py-6" enctype="multipart/form-data">
        @csrf
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <!-- Input de titre de l'annonce -->
                    <x-text-input type="text" name="titreA" id="title" placeholder="Titre de l'annonce" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0">
                    <select id="type" name="idT" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="0" selected>Choisir un type d'annonce</option>
                        @foreach($types as $type)
                        <option value="{{$type->idT}}">{{ $type->libT }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-6 pt-0 ">
                    <label for="time" class="block mb-2 text-sm font-medium  dark:text-white lg:mr-4">Date:</label>
                    <div class="relative flex items-center mt-4 lg:mt-0">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pr-3.5 pointer-events-none">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6.94028 2C7.35614 2 7.69326 2.32421 7.69326 2.72414V4.18487C8.36117 4.17241 9.10983 4.17241 9.95219 4.17241H13.9681C14.8104 4.17241 15.5591 4.17241 16.227 4.18487V2.72414C16.227 2.32421 16.5641 2 16.98 2C17.3958 2 17.733 2.32421 17.733 2.72414V4.24894C19.178 4.36022 20.1267 4.63333 20.8236 5.30359C21.5206 5.97385 21.8046 6.88616 21.9203 8.27586L22 9H2.92456H2V8.27586C2.11571 6.88616 2.3997 5.97385 3.09665 5.30359C3.79361 4.63333 4.74226 4.36022 6.1873 4.24894V2.72414C6.1873 2.32421 6.52442 2 6.94028 2Z" fill="#1C274C"></path>
                                    <path opacity="0.5" d="M21.9995 14.0001V12.0001C21.9995 11.161 21.9963 9.66527 21.9834 9H2.00917C1.99626 9.66527 1.99953 11.161 1.99953 12.0001V14.0001C1.99953 17.7713 1.99953 19.6569 3.1711 20.8285C4.34267 22.0001 6.22829 22.0001 9.99953 22.0001H13.9995C17.7708 22.0001 19.6564 22.0001 20.828 20.8285C21.9995 19.6569 21.9995 17.7713 21.9995 14.0001Z" fill="#1C274C"></path>
                                </g>
                            </svg>
                        </div>
                        <input name="date" type="datetime-local" id="datetime-local" class="bg-gray-50 border leading-none border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" />
                    </div>
                </div>

                <div class="p-6 pt-0  ">
                    <select id="type" name="idS" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm js-example-placeholder-single js-states form-control">
                        <option value="0" selected>Choisir un sport</option>
                        @foreach($sports as $sport)
                        <option value="{{$sport->idS}}">{{ $sport->libS }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-6 pt-0  ">
                    <x-text-input type="text" name="nbPersMax" placeholder="Nombre de personnes" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0">
                    <label class="block mb-2 text-sm font-medium text-white" for="file_input">Image de l'annonce :</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M12 21V11M12 11L9 14M12 11L15 14M7 16.8184C4.69636 16.2074 3 14.1246 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.8148 19.25 16.7236 17 16.9725" stroke="#dedede" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique pour ajouter</span> ou glisser et déposer</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Tous les types d'images sont autorisés (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*" onchange="displayFileName(this)" />
                        </label>
                    </div>
                    <p id="file-name" class="mt-2 text-sm text-gray-500 dark:text-gray-400"></p>
                </div>
                <div class="p-6 pt-0 ">
                    <x-text-input type="text" name="adresse" placeholder="Adresse" class="w-full" id="adresse"></x-text-input>
                </div>
                <x-text-input type="text" name="GPS" placeholder="GPS" class="w-full" id="GPS" hidden></x-text-input>
                <div class="p-6 pt-0  ">
                    <!-- Contenu de l'annonce -->
                    <x-text-area rows="5" name="descrA" id="desc" placeholder="Description de l'annonce" class="w-full"></x-text-area>
                </div>
                <x-text-input type="text" name="evenement" value="{{$evenement}}" class="w-full" hidden></x-text-input>
                <div class="p-6  flex items-center pt-0">
                    <!-- Action sur le formulaire -->
                    <div>
                        <button type="submit" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Créer l'annonce
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
    @if ($evenement == 2)
    <form method="post" action="{{ route('annonce.store') }}" class="py-6" enctype="multipart/form-data">
        @csrf
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <!-- Input de titre de l'annonce -->
                    <x-text-input type="text" name="titreA" id="title" placeholder="Titre de l'annonce" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0 ">
                    <label for="time" class="block mb-2 text-sm font-medium  dark:text-white lg:mr-4">Date:</label>
                    <div class="relative flex items-center mt-4 lg:mt-0">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pr-3.5 pointer-events-none">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6.94028 2C7.35614 2 7.69326 2.32421 7.69326 2.72414V4.18487C8.36117 4.17241 9.10983 4.17241 9.95219 4.17241H13.9681C14.8104 4.17241 15.5591 4.17241 16.227 4.18487V2.72414C16.227 2.32421 16.5641 2 16.98 2C17.3958 2 17.733 2.32421 17.733 2.72414V4.24894C19.178 4.36022 20.1267 4.63333 20.8236 5.30359C21.5206 5.97385 21.8046 6.88616 21.9203 8.27586L22 9H2.92456H2V8.27586C2.11571 6.88616 2.3997 5.97385 3.09665 5.30359C3.79361 4.63333 4.74226 4.36022 6.1873 4.24894V2.72414C6.1873 2.32421 6.52442 2 6.94028 2Z" fill="#1C274C"></path>
                                    <path opacity="0.5" d="M21.9995 14.0001V12.0001C21.9995 11.161 21.9963 9.66527 21.9834 9H2.00917C1.99626 9.66527 1.99953 11.161 1.99953 12.0001V14.0001C1.99953 17.7713 1.99953 19.6569 3.1711 20.8285C4.34267 22.0001 6.22829 22.0001 9.99953 22.0001H13.9995C17.7708 22.0001 19.6564 22.0001 20.828 20.8285C21.9995 19.6569 21.9995 17.7713 21.9995 14.0001Z" fill="#1C274C"></path>
                                </g>
                            </svg>
                        </div>
                        <input name="date" type="datetime-local" id="datetime-local" class="bg-gray-50 border leading-none border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" />
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <select id="type" name="idT" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="0" selected>Choisir un type d'annonce</option>
                        @foreach($types as $type)
                        <option value="{{$type->idT}}">{{ $type->libT }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-6 pt-0 ">
                    <form method="post" action="{{ route('film.search') }}">
                        @csrf
                        <div class="flex items-center pb-6">
                            <x-text-input type="text" name="nom" id="nomFilm" placeholder="Nom du film" class="w-full mr-2"></x-text-input>
                            <button type="button" id="searchButtonFilm" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
                        </div>
                    </form>
                    <select name="imdbIdFilm" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm js-example-placeholder-single js-states form-control">
                        <option selected>Choisir un film</option>
                    </select>
                </div>

                <script>
                    document.getElementById('searchButtonFilm').addEventListener('click', function() {
                        var nom = document.getElementById('nomFilm').value;
                        // Envoyer la requête AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route("film.search") }}', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    // Mettre à jour les options du select
                                    var selectElement = document.querySelector('select[name="imdbIdFilm"]');
                                    selectElement.innerHTML = ''; // Clear previous options
                                    response.results.forEach(function(film) {
                                        var option = document.createElement('option');
                                        option.value = film.imdbID; // Utilisez l'ID IMDB du film comme valeur
                                        option.textContent = film.Title + " (" + film.Year + ")";
                                        selectElement.appendChild(option);
                                    });
                                } else {
                                    console.error('Erreur lors de la requête : ' + xhr.status);
                                }
                            }
                        };
                        xhr.send(JSON.stringify({
                            nom: nom
                        }));
                    });
                </script>


                <div class="p-6 pt-0  ">
                    <x-text-input type="text" name="montantAjouter" placeholder="Montant à ajouter par personne" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0  ">
                    <x-text-input type="text" name="nbPersMax" placeholder="Nombre de personnes" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0">
                    <label class="block mb-2 text-sm font-medium text-white" for="file_input">Image de l'annonce :</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M12 21V11M12 11L9 14M12 11L15 14M7 16.8184C4.69636 16.2074 3 14.1246 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.8148 19.25 16.7236 17 16.9725" stroke="#dedede" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique pour ajouter</span> ou glisser et déposer</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Tous les types d'images sont autorisés (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*" />
                        </label>
                    </div>
                </div>
                <div class="p-6 pt-0  ">
                    <label class="text-white">Lieu personnel ?</label>
                    <div class="flex">
                        <div class="bg-gray-900 hover:bg-gray-500 w-full flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 mr-2">
                            <input id="lieuPerso-1" type="radio" value="1" name="LieuPerso" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="lieuPerso-1" class="w-full py-4 ms-2 text-sm font-medium  dark:text-gray-300">Oui</label>
                        </div>
                        <div class="bg-gray-900 hover:bg-gray-500 w-full flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 ml-2">
                            <input id="lieuPerso-2" type="radio" value="0" name="LieuPerso" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="lieuPerso-2" class="w-full py-4 ms-2 text-sm font-medium  dark:text-gray-300">Non</label>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0 ">
                    <x-text-input type="text" name="adresse" placeholder="Adresse" class="w-full" id="adresse"></x-text-input>
                </div>
                <x-text-input type="text" name="GPS" placeholder="GPS" class="w-full" id="GPS" hidden></x-text-input>
                <div class="p-6 pt-0  ">
                    <!-- Contenu de l'annonce -->
                    <x-text-area rows="5" name="descrA" id="desc" placeholder="Description de l'annonce" class="w-full"></x-text-area>
                </div>
                <x-text-input type="text" name="evenement" value="{{$evenement}}" class="w-full" hidden></x-text-input>
                <div class="p-6  flex items-center pt-0">
                    <!-- Action sur le formulaire -->
                    <div>
                        <button type="submit" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Créer l'annonce
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif

    @if ($evenement == 3)
    <form method="post" action="{{ route('annonce.store') }}" class="py-6" enctype="multipart/form-data">
        @csrf
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <!-- Input de titre de l'annonce -->
                    <x-text-input type="text" name="titreA" id="title" placeholder="Titre de l'annonce" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0 ">
                    <label for="time" class="block mb-2 text-sm font-medium  dark:text-white lg:mr-4">Date:</label>
                    <div class="relative flex items-center mt-4 lg:mt-0">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pr-3.5 pointer-events-none">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6.94028 2C7.35614 2 7.69326 2.32421 7.69326 2.72414V4.18487C8.36117 4.17241 9.10983 4.17241 9.95219 4.17241H13.9681C14.8104 4.17241 15.5591 4.17241 16.227 4.18487V2.72414C16.227 2.32421 16.5641 2 16.98 2C17.3958 2 17.733 2.32421 17.733 2.72414V4.24894C19.178 4.36022 20.1267 4.63333 20.8236 5.30359C21.5206 5.97385 21.8046 6.88616 21.9203 8.27586L22 9H2.92456H2V8.27586C2.11571 6.88616 2.3997 5.97385 3.09665 5.30359C3.79361 4.63333 4.74226 4.36022 6.1873 4.24894V2.72414C6.1873 2.32421 6.52442 2 6.94028 2Z" fill="#1C274C"></path>
                                    <path opacity="0.5" d="M21.9995 14.0001V12.0001C21.9995 11.161 21.9963 9.66527 21.9834 9H2.00917C1.99626 9.66527 1.99953 11.161 1.99953 12.0001V14.0001C1.99953 17.7713 1.99953 19.6569 3.1711 20.8285C4.34267 22.0001 6.22829 22.0001 9.99953 22.0001H13.9995C17.7708 22.0001 19.6564 22.0001 20.828 20.8285C21.9995 19.6569 21.9995 17.7713 21.9995 14.0001Z" fill="#1C274C"></path>
                                </g>
                            </svg>
                        </div>
                        <input name="date" type="datetime-local" id="datetime-local" class="bg-gray-50 border leading-none border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" />
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <select id="type" name="idT" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="0" selected>Choisir un type d'annonce</option>
                        @foreach($types as $type)
                        <option value="{{$type->idT}}">{{ $type->libT }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-6 pt-0  ">
                    <label class="text-white">Voiture personnelle ?</label>
                    <div class="flex">
                        <div class="w-full flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="voiturePersonnel-1" type="radio" value="1" name="voiturePersonnel" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="voiturePersonnel-1" class="w-full py-4 ms-2 text-sm font-medium  dark:text-gray-300">Oui</label>
                        </div>
                        <div class="w-full flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="voiturePersonnel-2" type="radio" value="0" name="voiturePersonnel" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="voiturePersonnel-2" class="w-full py-4 ms-2 text-sm font-medium  dark:text-gray-300">Non</label>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0  ">
                    <x-text-input type="text" name="nbPersMax" placeholder="Nombre de personnes" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0">
                    <label class="block mb-2 text-sm font-medium text-white" for="file_input">Image de l'annonce :</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M12 21V11M12 11L9 14M12 11L15 14M7 16.8184C4.69636 16.2074 3 14.1246 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.8148 19.25 16.7236 17 16.9725" stroke="#dedede" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique pour ajouter</span> ou glisser et déposer</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Tous les types d'images sont autorisés (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*" />
                        </label>
                    </div>
                </div>
                <div class="p-6 pt-0 ">
                    <x-text-input type="text" name="adresse" placeholder="Adresse" class="w-full" id="adresse"></x-text-input>
                </div>
                <x-text-input type="text" name="GPS" placeholder="GPS" class="w-full" id="GPS" hidden></x-text-input>
                <div class="p-6 pt-0  ">
                    <x-text-area rows="5" name="descrA" id="desc" placeholder="Description de l'annonce" class="w-full"></x-text-area>
                </div>
                <x-text-input type="text" name="evenement" value="{{$evenement}}" class="w-full" hidden></x-text-input>
                <div class="p-6  flex items-center pt-0">
                    <div>
                        <button type="submit" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Créer l'annonce
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif

    @if ($evenement == 4)
    <form method="post" action="{{ route('annonce.store') }}" class="py-6" enctype="multipart/form-data">
        @csrf
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <!-- Input de titre de l'annonce -->
                    <x-text-input type="text" name="titreA" id="title" placeholder="Titre de l'annonce" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0 ">
                    <label for="time" class="block mb-2 text-sm font-medium  dark:text-white lg:mr-4">Date:</label>
                    <div class="relative flex items-center mt-4 lg:mt-0">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pr-3.5 pointer-events-none">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6.94028 2C7.35614 2 7.69326 2.32421 7.69326 2.72414V4.18487C8.36117 4.17241 9.10983 4.17241 9.95219 4.17241H13.9681C14.8104 4.17241 15.5591 4.17241 16.227 4.18487V2.72414C16.227 2.32421 16.5641 2 16.98 2C17.3958 2 17.733 2.32421 17.733 2.72414V4.24894C19.178 4.36022 20.1267 4.63333 20.8236 5.30359C21.5206 5.97385 21.8046 6.88616 21.9203 8.27586L22 9H2.92456H2V8.27586C2.11571 6.88616 2.3997 5.97385 3.09665 5.30359C3.79361 4.63333 4.74226 4.36022 6.1873 4.24894V2.72414C6.1873 2.32421 6.52442 2 6.94028 2Z" fill="#1C274C"></path>
                                    <path opacity="0.5" d="M21.9995 14.0001V12.0001C21.9995 11.161 21.9963 9.66527 21.9834 9H2.00917C1.99626 9.66527 1.99953 11.161 1.99953 12.0001V14.0001C1.99953 17.7713 1.99953 19.6569 3.1711 20.8285C4.34267 22.0001 6.22829 22.0001 9.99953 22.0001H13.9995C17.7708 22.0001 19.6564 22.0001 20.828 20.8285C21.9995 19.6569 21.9995 17.7713 21.9995 14.0001Z" fill="#1C274C"></path>
                                </g>
                            </svg>
                        </div>
                        <input name="date" type="datetime-local" id="datetime-local" class="bg-gray-50 border leading-none border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" />
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <select id="typeAnnonce" name="idT" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="0" selected>Choisir un type d'annonce</option>
                        @foreach($types as $type)
                        <option value="{{$type->idT}}">{{ $type->libT }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-6 pt-0  ">
                    <select id="typeJeux" name="idTypeJeu" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm js-example-placeholder-single js-states form-control">
                        <option selected>Choisir un type de jeux</option>
                        @foreach($typejeux as $typejeu)
                        <option value="{{$typejeu->idT}}">{{ $typejeu->libT }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="jeux-video" class="p-6 pt-0 " style="display: none;">
                    <form method="post" action="{{ route('jeuxVideo.search') }}">
                        @csrf
                        <div class="flex items-center pb-6">
                            <x-text-input type="text" name="nom" id="nomJeuxVideo" placeholder="Nom jeux video" class="w-full mr-2"></x-text-input>
                            <button type="button" id="searchButton" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
                        </div>
                    </form>
                    <select name="idJeuxVideo" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm js-example-placeholder-single js-states form-control">
                        <option value="0">Choisir un jeu vidéo</option>
                    </select>
                </div>
                <script>
                    document.getElementById('searchButton').addEventListener('click', function() {
                        var nom = document.getElementById('nomJeuxVideo').value;
                        // Envoyer la requête AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route("jeuxVideo.search") }}', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    // Mettre à jour les options du select
                                    var selectElement = document.getElementsByName('idJeuxVideo')[0];
                                    selectElement.innerHTML = ''; // Clear previous options
                                    response.results.forEach(function(jeuVideo) {
                                        var option = document.createElement('option');
                                        option.value = jeuVideo.id;
                                        option.textContent = jeuVideo.name;
                                        selectElement.appendChild(option);
                                    });
                                } else {
                                    console.error('Erreur lors de la requête : ' + xhr.status);
                                }
                            }
                        };
                        xhr.send(JSON.stringify({
                            nom: nom
                        }));
                    });
                </script>
                <div id="jeux-societe" class="p-6 pt-0 " style="display: none;">
                    <form method="post" action="{{ route('jeuxSociete.search') }}">
                        @csrf
                        <div class="flex items-center pb-6">
                            <x-text-input type="text" name="nom" id="nomJeuxSociete" placeholder="Nom jeux Societe" class="w-full mr-2"></x-text-input>
                            <button type="button" id="searchButtonSociete" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
                        </div>
                    </form>
                    <select name="idJeuxSociete" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm js-example-placeholder-single js-states form-control">
                        <option selected>Choisir un jeu de société</option>
                    </select>
                </div>

                <script>
                    document.getElementById('searchButtonSociete').addEventListener('click', function() {
                        var nom = document.getElementById('nomJeuxSociete').value;
                        // Envoyer la requête AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route("jeuxSociete.search") }}', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    // Mettre à jour les options du select
                                    var selectElement = document.getElementsByName('idJeuxSociete')[0];
                                    selectElement.innerHTML = ''; // Clear previous options
                                    response.results.forEach(function(jeuSociete) {
                                        var option = document.createElement('option');
                                        option.value = jeuSociete.id; // Utilisez l'ID du jeu de société comme valeur
                                        option.textContent = jeuSociete.name + " (" + jeuSociete.year + ")";
                                        selectElement.appendChild(option);
                                    });
                                } else {
                                    console.error('Erreur lors de la requête : ' + xhr.status);
                                }
                            }
                        };
                        xhr.send(JSON.stringify({
                            nom: nom
                        }));
                    });
                </script>


                <div class="p-6 pt-0  ">
                    <x-text-input type="text" name="nbPersMax" placeholder="Nombre de personnes" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0">
                    <label class="block mb-2 text-sm font-medium text-white" for="file_input">Image de l'annonce :</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M12 21V11M12 11L9 14M12 11L15 14M7 16.8184C4.69636 16.2074 3 14.1246 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.8148 19.25 16.7236 17 16.9725" stroke="#dedede" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique pour ajouter</span> ou glisser et déposer</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Tous les types d'images sont autorisés (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*" />
                        </label>
                    </div>
                </div>
                <div class="p-6 pt-0  ">
                    <!-- Contenu de l'annonce -->
                    <x-text-area rows="5" name="descrA" id="desc" placeholder="Description de l'annonce" class="w-full"></x-text-area>
                </div>
                <x-text-input type="text" name="evenement" value="{{$evenement}}" class="w-full" hidden></x-text-input>
                <div class="p-6  flex items-center pt-0">
                    <!-- Action sur le formulaire -->
                    <div>
                        <button type="submit" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Créer l'annonce
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('typeJeux').addEventListener('change', function() {
            var selectValue = this.value;
            if (selectValue == '2') {
                document.getElementById('jeux-video').style.display = 'block';
                document.getElementById('jeux-societe').style.display = 'none';
            } else if (selectValue == '1') {
                document.getElementById('jeux-societe').style.display = 'block';
                document.getElementById('jeux-video').style.display = 'none';
            } else {
                document.getElementById('jeux-video').style.display = 'none';
                document.getElementById('jeux-societe').style.display = 'none';
            }
        });
    </script>
    @endif

    @if ($evenement == 5)
    <form method="post" action="{{ route('annonce.store') }}" class="py-6" enctype="multipart/form-data">
        @csrf
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <!-- Input de titre de l'annonce -->
                    <x-text-input type="text" name="titreA" id="title" placeholder="Titre de l'annonce" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0 ">
                    <label for="time" class="block mb-2 text-sm font-medium  dark:text-white lg:mr-4">Date:</label>
                    <div class="relative flex items-center mt-4 lg:mt-0">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pr-3.5 pointer-events-none">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6.94028 2C7.35614 2 7.69326 2.32421 7.69326 2.72414V4.18487C8.36117 4.17241 9.10983 4.17241 9.95219 4.17241H13.9681C14.8104 4.17241 15.5591 4.17241 16.227 4.18487V2.72414C16.227 2.32421 16.5641 2 16.98 2C17.3958 2 17.733 2.32421 17.733 2.72414V4.24894C19.178 4.36022 20.1267 4.63333 20.8236 5.30359C21.5206 5.97385 21.8046 6.88616 21.9203 8.27586L22 9H2.92456H2V8.27586C2.11571 6.88616 2.3997 5.97385 3.09665 5.30359C3.79361 4.63333 4.74226 4.36022 6.1873 4.24894V2.72414C6.1873 2.32421 6.52442 2 6.94028 2Z" fill="#1C274C"></path>
                                    <path opacity="0.5" d="M21.9995 14.0001V12.0001C21.9995 11.161 21.9963 9.66527 21.9834 9H2.00917C1.99626 9.66527 1.99953 11.161 1.99953 12.0001V14.0001C1.99953 17.7713 1.99953 19.6569 3.1711 20.8285C4.34267 22.0001 6.22829 22.0001 9.99953 22.0001H13.9995C17.7708 22.0001 19.6564 22.0001 20.828 20.8285C21.9995 19.6569 21.9995 17.7713 21.9995 14.0001Z" fill="#1C274C"></path>
                                </g>
                            </svg>
                        </div>
                        <input name="date" type="datetime-local" id="datetime-local" class="bg-gray-50 border leading-none border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" />
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <select id="type" name="idT" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="0" selected>Choisir un type d'annonce</option>
                        @foreach($types as $type)
                        <option value="{{$type->idT}}">{{ $type->libT }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-6 pt-0  ">
                    <select id="type" name="idM" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm js-example-placeholder-single js-states form-control">
                        <option selected>Choisir une matière</option>
                        @foreach($matieres as $matiere)
                        <option value="{{$matiere->idM}}">{{ $matiere->libM }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-6 pt-0  ">
                    <x-text-input type="text" name="nbPersMax" placeholder="Nombre de personnes" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0">
                    <label class="block mb-2 text-sm font-medium text-white" for="file_input">Image de l'annonce :</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M12 21V11M12 11L9 14M12 11L15 14M7 16.8184C4.69636 16.2074 3 14.1246 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.8148 19.25 16.7236 17 16.9725" stroke="#dedede" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique pour ajouter</span> ou glisser et déposer</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Tous les types d'images sont autorisés (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*" />
                        </label>
                    </div>
                </div>
                <div class="p-6 pt-0  ">
                    <!-- Contenu de l'annonce -->
                    <x-text-area rows="5" name="descrA" id="desc" placeholder="Description de l'annonce" class="w-full"></x-text-area>
                </div>
                <x-text-input type="text" name="evenement" value="{{$evenement}}" class="w-full" hidden></x-text-input>
                <div class="p-6  flex items-center pt-0">
                    <!-- Action sur le formulaire -->
                    <div>
                        <button type="submit" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Créer l'annonce
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif

    @if ($evenement == 6)
    <form method="post" action="{{ route('annonce.store') }}" class="py-6" enctype="multipart/form-data">
        @csrf
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <!-- Input de titre de l'annonce -->
                    <x-text-input type="text" name="titreA" id="title" placeholder="Titre de l'annonce" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0 ">
                    <label for="time" class="block mb-2 text-sm font-medium  dark:text-white lg:mr-4">Date:</label>
                    <div class="relative flex items-center mt-4 lg:mt-0">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pr-3.5 pointer-events-none">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6.94028 2C7.35614 2 7.69326 2.32421 7.69326 2.72414V4.18487C8.36117 4.17241 9.10983 4.17241 9.95219 4.17241H13.9681C14.8104 4.17241 15.5591 4.17241 16.227 4.18487V2.72414C16.227 2.32421 16.5641 2 16.98 2C17.3958 2 17.733 2.32421 17.733 2.72414V4.24894C19.178 4.36022 20.1267 4.63333 20.8236 5.30359C21.5206 5.97385 21.8046 6.88616 21.9203 8.27586L22 9H2.92456H2V8.27586C2.11571 6.88616 2.3997 5.97385 3.09665 5.30359C3.79361 4.63333 4.74226 4.36022 6.1873 4.24894V2.72414C6.1873 2.32421 6.52442 2 6.94028 2Z" fill="#1C274C"></path>
                                    <path opacity="0.5" d="M21.9995 14.0001V12.0001C21.9995 11.161 21.9963 9.66527 21.9834 9H2.00917C1.99626 9.66527 1.99953 11.161 1.99953 12.0001V14.0001C1.99953 17.7713 1.99953 19.6569 3.1711 20.8285C4.34267 22.0001 6.22829 22.0001 9.99953 22.0001H13.9995C17.7708 22.0001 19.6564 22.0001 20.828 20.8285C21.9995 19.6569 21.9995 17.7713 21.9995 14.0001Z" fill="#1C274C"></path>
                                </g>
                            </svg>
                        </div>
                        <input name="date" type="datetime-local" id="datetime-local" class="bg-gray-50 border leading-none border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" />
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <select id="type" name="idT" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="0" selected>Choisir un type d'annonce</option>
                        @foreach($types as $type)
                        <option value="{{$type->idT}}">{{ $type->libT }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-6 pt-0 ">
                    <form method="post" action="{{ route('book.search') }}">
                        @csrf
                        <div class="flex items-center pb-6">
                            <x-text-input type="text" name="nom" id="nomBook" placeholder="Nom du livre" class="w-full mr-2"></x-text-input>
                            <button type="button" id="searchButtonBook" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
                        </div>
                    </form>
                    <select name="idGoogleBooks" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm js-example-placeholder-single js-states form-control">
                        <option selected>Choisir un livre</option>
                    </select>
                </div>

                <script>
                    document.getElementById('searchButtonBook').addEventListener('click', function() {
                        var nom = document.getElementById('nomBook').value;
                        // Envoyer la requête AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route("book.search") }}', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    // Mettre à jour les options du select
                                    var selectElement = document.querySelector('select[name="idGoogleBooks"]');
                                    selectElement.innerHTML = ''; // Clear previous options
                                    response.results.forEach(function(book) {
                                        var option = document.createElement('option');
                                        option.value = book.id; // Utilisez l'ID du livre comme valeur
                                        option.textContent = book.title + " (" + book.date + ")";
                                        selectElement.appendChild(option);
                                    });
                                } else {
                                    console.error('Erreur lors de la requête : ' + xhr.status);
                                }
                            }
                        };
                        xhr.send(JSON.stringify({
                            nom: nom
                        }));
                    });
                </script>

                <div class="p-6 pt-0  ">
                    <x-text-input type="text" name="nbPersMax" placeholder="Nombre de personnes" class="w-full"></x-text-input>
                </div>
                <div class="p-6 pt-0">
                    <label class="block mb-2 text-sm font-medium text-white" for="file_input">Image de l'annonce :</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M12 21V11M12 11L9 14M12 11L15 14M7 16.8184C4.69636 16.2074 3 14.1246 3 11.6493C3 9.20008 4.8 6.9375 7.5 6.5C8.34694 4.48637 10.3514 3 12.6893 3C15.684 3 18.1317 5.32251 18.3 8.25C19.8893 8.94488 21 10.6503 21 12.4969C21 14.8148 19.25 16.7236 17 16.9725" stroke="#dedede" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique pour ajouter</span> ou glisser et déposer</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Tous les types d'images sont autorisés (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*" />
                        </label>
                    </div>
                </div>
                <div class="p-6 pt-0  ">
                    <!-- Contenu de l'annonce -->
                    <x-text-area rows="5" name="descrA" id="desc" placeholder="Description de l'annonce" class="w-full"></x-text-area>
                </div>
                <x-text-input type="text" name="evenement" value="{{$evenement}}" class="w-full" hidden></x-text-input>
                <div class="p-6  flex items-center pt-0">
                    <!-- Action sur le formulaire -->
                    <div>
                        <button type="submit" class="bg-gray-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Créer l'annonce
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif

</x-app-layout>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=initAutocomplete" async></script>
<script>
    let autocomplete;

    /* ------------------------- Initialize Autocomplete ------------------------ */
    function initAutocomplete() {
        const input = document.getElementById("adresse");
        const options = {
            componentRestrictions: {
                country: "FR"
            }
        }
        autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener("place_changed", onPlaceChange)
    }

    /* --------------------------- Handle Place Change -------------------------- */
    function onPlaceChange() {
        const place = autocomplete.getPlace();
        const lat = place.geometry.location.lat();
        const lng = place.geometry.location.lng();
        const gpsInput = document.getElementById("GPS");
        gpsInput.value = `${lat},${lng}`;
        cpInput.value = postalCode;
    }


    document.getElementById('dropzone-file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const maxSize = 268435456; // Taille maximale de l'image en octets (25 Mo)

        if (!file) {
            alert('Veuillez sélectionner un fichier.');
            event.target.value = ''; // Réinitialiser le champ de fichier
            return;
        }

        if (file.size > maxSize) {
            alert('La taille du fichier dépasse la limite autorisée (25 Mo).');
            event.target.value = ''; // Réinitialiser le champ de fichier
            return;
        }

        // Autres actions à effectuer si le fichier est valide
        const fileNameElement = document.getElementById('file-name');
        fileNameElement.textContent = 'Fichier sélectionné : ' + file.name;
    });

    function displayFileName(input) {
        const fileNameElement = document.getElementById('file-name');
        const fileName = input.files[0].name;
        fileNameElement.textContent = 'Fichier sélectionné : ' + fileName;
    }
</script>