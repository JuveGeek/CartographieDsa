@extends('../layout/' . $layout)

@section('subhead')
    <title>Liste des difficultés liées à l'amendement</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-bold font-medium mt-10">Liste des difficultés liées à l'amendement  </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
                data-tw-target="#new-order-modal-amendement">Ajouter une difficulté liée à l'amendement
            </button>

            <div class="dropdown">



            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Rechercher...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">

        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">ID</th>
                    <th class="text-center whitespace-nowrap">Description</th>
                    <th class="text-center whitespace-nowrap">Fichier</th>
                    <th class="text-center whitespace-nowrap">Date</th>

                    <th class="text-center whitespace-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($amendement->difficulteAmendements as $difficulte)
                    <tr class="intro-x">
                        <td class="w-40">{{ $difficulte->id }}</td>
                        <td class="text-center">{{ $difficulte->description }}</td>
                        <td class="text-center">
                            <!-- Affichage du lien vers le fichier PDF si disponible -->
                            @if ($difficulte->file_path)
                                <a href="{{ asset('storage/' . $difficulte->file_path) }}" target="_blank"
                                    class="text-primary">
                                    Télécharger le PDF
                                </a>
                            @else
                                Aucune pièce jointe
                            @endif
                        </td>
                        <td class="text-center">{{ $difficulte->date }}</td>

                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <!-- Action Modifier (si nécessaire) -->
                                <a class="flex items-center" href="">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Modifier
                                </a>

                                <button type="submit" class="flex items-center text-danger">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Supprimer
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500">Aucune difficulté trouvée pour cet amendement.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->

    <!-- BEGIN: New Order Modal -->
    <div id="new-order-modal-amendement" class="modal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog">
            <form id="amendement-form" method="POST" action="{{ route('amendements.storeDifficulteAmendement') }}"
                enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Ajouter une difficulté liée à l'amendement</h2>
                    </div>


                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        @csrf
                        <input type="hidden" name="amendement_id" value="{{ $amendement->id }}">
                        <!-- Description -->
                        <div class="col-span-12">
                            <label for="amendement-description" class="form-label">Description</label>
                            <textarea id="amendement-description" name="description" class="form-control flex-1 h-28"
                                placeholder="Entrez une description"></textarea>
                        </div>

                        <!-- Date -->
                        <div class="col-span-12">
                            <label for="amendement-date" class="form-label">Date</label>
                            <input id="amendement-date" name="date" type="date" class="form-control flex-1">
                        </div>

                        <!-- File Upload -->
                        <div class="col-span-12">
                            <label for="amendement-file" style="color: red;" class="form-label">Joindre un fichier (PDF uniquement)</label>
                            <div class="flex items-center space-x-2">
                                <input id="amendement-file" name="file" type="file" class="hidden">
                                <button type="button" class="btn btn-outline-primary"
                                    onclick="document.getElementById('amendement-file').click()">Choisir un
                                    fichier</button>
                                <span id="file-name" class="text-gray-500">Aucun fichier sélectionné</span>
                            </div>
                        </div>

                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                        <button type="submit" class="btn btn-primary w-32">Enregistrer</button>
                    </div>
            </form>
        </div>

    </div>
    <script>
        // Script pour afficher le nom du fichier sélectionné
        document.getElementById('amendement-file').addEventListener('change', function() {
            document.getElementById('file-name').textContent = this.files.length ? this.files[0].name :
                'Aucun fichier sélectionné';
        });
    </script>
    </div>


    <!-- END: New Order Modal -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevron-left"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevron-right"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot
                            be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <script>
        document.getElementById('amendement-form').addEventListener('submit', function(event) {
            const fileInput = document.getElementById('amendement-file');
            const file = fileInput.files[0];

            if (file && file.type !== 'application/pdf') {
                event.preventDefault(); // Empêche l'envoi du formulaire
                alert('Seuls les fichiers PDF sont autorisés.');
            }
        });
    </script>
    @if (session('successAmendement'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Difficulté amendement enregistré avec succès!',
                text: '{{ session('success') }}', // Message de succès passé depuis le contrôleur
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
