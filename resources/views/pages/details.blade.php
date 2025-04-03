@extends('../layout/' . $layout)

@section('subhead')
    <title>Détails </title>
@endsection

@section('subcontent')
    <!-- BEGIN: Informations détaillées du projet -->

    <div class="flex items-center mt-10">
        <h2 class="intro-y text-lg font-medium">Informations détaillées du projet</h2>
        <a href="{{ route('export.projet', $projet->id) }}" class="btn btn-success ml-auto shadow-md mr-2">
            Récapitulatif du projet
        </a>
    </div>


    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Nom</th>
                        <th class="text-center whitespace-nowrap">Objectif principal</th>
                        <th class="text-center whitespace-nowrap">Public cible</th>
                        <th class="text-center whitespace-nowrap">Description</th>
                        <th class="text-center whitespace-nowrap">Structure porteuse</th>
                        <th class="text-center whitespace-nowrap">Phase actuelle</th>
                        <th class="text-center whitespace-nowrap">Date de début</th>
                        <th class="text-center whitespace-nowrap">Date de fin</th>
                        <th class="text-center whitespace-nowrap">Nom de l'equipe</th>
                        <th class="text-center whitespace-nowrap">Statut</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="intro-x">
                        <td class="w-20">{{ $unProjet->nom }}</td>
                        <td class="w-40">{{ $unProjet->objectif_principal }}</td>
                        <td class="w-60">{{ $unProjet->public_cible }}</td>
                        <td class="">

                            <div class="w-240">
                                {{ $unProjet->description }}

                            </div>
                        </td>
                        <td class="w-20">
                            {{ $unProjet->structurePorteuse ? $unProjet->structurePorteuse->nom : 'Aucune structure porteuse' }}
                        </td>
                        <td class="W-20">{{ $unProjet->phase_actuelle }}</td>
                        <td class="w-20">{{ $unProjet->date_debut }}</td>
                        <td class="w-20">{{ $unProjet->date_fin }}</td>
                        <td class="w-2O">{{ $unProjet->equipe ? $unProjet->equipe->nom : 'Aucune équipe' }}</td>
                        <td class="w-40">{{ $unProjet->statut }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">

                                <a class="flex items-center" href="javascript:;">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Modifier
                                </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Supprimer
                                </a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process
                            cannot be undone.</div>
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
    <!-- END: Informations détaillées du projet -->



    <!-- BEGIN: fonctionnalité -->
    <h2 class="intro-y text-lg font-medium mt-10">Fonctionnalités </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
                data-tw-target="#new-order-modal-fonctionnalite">Ajouter une fonctionnalité</button>
            <div class="dropdown">



            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">Nom</th>
                        <th class="text-center whitespace-nowrap">Description</th>
                        <th class="text-center whitespace-nowrap">date de debut</th>
                        <th class="text-center whitespace-nowrap">date de fin</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projet->fonctionnalites as $fonctionnalite)
                        <tr class="intro-x">
                            <td class="w-40">{{ $fonctionnalite->nom }}</td>
                            <td class="text-center">{{ $fonctionnalite->description }}</td>
                            <td class="w-40">{{ $fonctionnalite->date_debut }}</td>
                            <td class="w-40">{{ $fonctionnalite->date_fin }}</td>
                            <td class="w-40">{{ $fonctionnalite->statut }}</td>

                            <td class="table-report__action w-56">

                                <div class="flex justify-center items-center">
                                    <a class="flex items-center " href="javascript:;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal-fonctionnalite">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center text-gray-500">Aucune fonctionnalité trouvée pour ce
                                projet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
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
    <!-- BEGIN: New Order Modal -->
    <div id="new-order-modal-fonctionnalite" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Fonctionnalité</h2>
                </div>
                <form id="equipe_form" action="{{ route('fonctionnalites.store', $projet->id) }}" method="POST">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Nom de la fonctionnalité</label>
                            <input id="pos-form-1" name="nom" type="text" class="form-control flex-1"
                                placeholder="Nom de la fonctionnalité" required>
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>

                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-2" class="form-label">Date de début</label>
                            <input id="pos-form-2" name="date_debut" type="date" class="form-control flex-1"
                                required>
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-3" class="form-label">Date de fin</label>
                            <input id="pos-form-3" name="date_fin" type="date" class="form-control flex-1" required>
                        </div>
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Statut</div>

                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <div class="flex flex-col sm:flex-row">
                                    <div class="form-check mr-4">
                                        <input id="statut-en-cour" name="statut" class="form-check-input"
                                            type="radio" value="en cour" required>
                                        <label class="form-check-label" for="statut-en-cour">En cours</label>
                                    </div>
                                    <div class="form-check mr-4 mt-2 sm:mt-0">
                                        <input id="statut-terminer" name="statut" class="form-check-input"
                                            type="radio" value="Terminer">
                                        <label class="form-check-label" for="statut-terminer">Terminé</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                        <button type="submit" class="btn btn-primary w-32">Enregistrer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END: New Order Modal -->
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal-fonctionnalite" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process
                            cannot be undone.</div>
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
    <!-- END: fonctionnalité -->

    <!-- BEGIN: technologie -->
    <h2 class="intro-y text-lg font-medium mt-10">Technologies </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
                data-tw-target="#new-order-modal-technologie">Ajouter une technologie</button>

            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">Nom</th>
                        <th class="text-center whitespace-nowrap">Description</th>
                        <th class="text-center whitespace-nowrap">Role</th>
                        <th class="text-center whitespace-nowrap">version</th>
                        <th class="text-center whitespace-nowrap">Statut</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projet->technologies as $technologie)
                        <tr class="intro-x">
                            <td class="w-40">{{ $technologie->nom }}</td>
                            <td class="text-center">{{ $technologie->description }}</td>
                            <td class="w-40">{{ $technologie->role }}</td>
                            <td class="w-40">{{ $technologie->version }}</td>
                            <td class="w-40">{{ $technologie->statut }}</td>

                            <td class="table-report__action w-56">

                                <div class="flex justify-center items-center">
                                    <a class="flex items-center " href="javascript:;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal-technologie">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center text-gray-500">Aucune technologie trouvée pour ce
                                projet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
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
    <!-- BEGIN: New Order Modal -->
    <div id="new-order-modal-technologie" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Technologie</h2>
                </div>
                <form id="equipe_form" action="{{ route('technologies.store', $projet->id) }}" method="POST">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Nom de la technologie</label>
                            <input id="pos-form-1" name="nom" type="text" class="form-control flex-1"
                                placeholder="Nom de la technologie" required>
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>

                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-2" class="form-label">Role</label>
                            <input id="pos-form-2" name="role" type="text" class="form-control flex-1" required>
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-3" class="form-label">Version</label>
                            <input id="pos-form-3" name="version" type="text" class="form-control flex-1" required>
                        </div>
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Statut</div>

                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <div class="flex flex-col sm:flex-row">
                                    <div class="form-check mr-4">
                                        <input id="statut-actif" name="statut" class="form-check-input" type="radio"
                                            value="actif" required>
                                        <label class="form-check-label" for="statut-actif">Actif</label>
                                    </div>
                                    <div class="form-check mr-4 mt-2 sm:mt-0">
                                        <input id="statut-inactif" name="statut" class="form-check-input"
                                            type="radio" value="inactif">
                                        <label class="form-check-label" for="statut-inactif">Inactif</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                        <button type="submit" class="btn btn-primary w-32">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: New Order Modal -->
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal-technologie" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process
                            cannot be undone.</div>
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
    <!-- END: technologie -->




    <!-- BEGIN: Point focal -->
    <h2 class="intro-y text-lg font-medium mt-10">Point focal de la structure porteuse </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#modal-pivot">Ajouter
                un point focal</button>
            <div class="dropdown">

            </div>

        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">

            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="whitespace-nowrap">Nom et prénom</th>

                        <th class="text-center whitespace-nowrap">Téléphone</th>
                        <th class="text-center whitespace-nowrap">Email</th>

                        <th class="text-center whitespace-nowrap">Structure porteuse</th>
                        <th class="text-center whitespace-nowrap">Date de début</th>
                        <th class="text-center whitespace-nowrap">Date de fin</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projet->structurePorteuse->pointsFocaux as $focal)
                        <tr class="intro-x">
                            <td class="w-10">{{ $focal->id }}</td>
                            <td class="w-10">{{ $focal->name }} {{ $focal->firstname }} ({{ $focal->structure }})
                            </td>

                            <td class="text-center">{{ $focal->tel }}</td>
                            <td class="text-center">{{ $focal->email }}</td>

                            <td class="text-center">{{ $projet->structurePorteuse->nom }}</td>
                            <td class="text-center">{{ $focal->pivot->date_debut }}</td>
                            <td class="text-center">{{ $focal->pivot->date_fin }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <!-- Action Modifier -->
                                    <a class="flex items-center" data-tw-toggle="modal"
                                        data-focal_id="{{ $focal->pivot->id }}" data-focal_user_id="{{ $focal->id }}"
                                        data-focal_name="{{ $focal->name }}"
                                        data-focal_firstname="{{ $focal->firstname }}"
                                        data-focal_structure="{{ $focal->structure }}"
                                        data-focal_date_debut="{{ $focal->pivot->date_debut }}"
                                        data-focal_date_fin="{{ $focal->pivot->date_fin }}"
                                        data-tw-target="#update-focal-modal" href="javascript:;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                    </a>
                                    <a type="submit" class="flex items-center delete-focal-btn text-danger"
                                        href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal-focal"
                                        data-focal-id="{{ $focal->pivot->id }}">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-gray-500">Aucun point focal trouvé pour la
                                structure porteuse de ce projet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Modal pour pivot -->
    <div id="modal-pivot" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="{{ route('point_focal.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Ajouter un point focal</h2>
                    </div>

                    <div class="modal-body">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="p-1">
                                        <div class="input-form">
                                            <label for="structure_porteuse" class="form-label">Structure porteuse</label>
                                            <input id="structure_porteuse" type="text" name="structure_porteuse"
                                                class="form-control" value="{{ $unProjet->structurePorteuse->nom }}"
                                                disabled>
                                        </div>
                                        <input type="hidden" name="structure_porteuse_id"
                                            value="{{ $unProjet->structurePorteuse->id }}">
                                        <div class="input-form mt-3">
                                            <label>Sélectionner le point focal</label>
                                            <div class="mt-2">
                                                <select id="user" name="user_id"
                                                    data-placeholder="Sélectionner le point focal"
                                                    class="tom-select w-full" required>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                            {{ $user->firstname }} ({{ $user->structure }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('user_id')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="p-1">
                                        <div class="input-form">
                                            <label for="date_debut" class="form-label">Date de début</label>
                                            <input id="date_debut" type="date" name="date_debut" class="form-control"
                                                required>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="date_fin" class="form-label">Date de fin</label>
                                            <input id="date_fin" type="date" name="date_fin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                        <button type="submit" class="btn btn-primary w-32">Enregistrer</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- END: New Order Modal -->

    <!-- BEGIN: modifier Modal pour focal -->
    <div id="update-focal-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="{{ route('point_focal.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="focal_id" name="id">

                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Modifier un point focal</h2>
                    </div>

                    <div class="modal-body">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="p-1">
                                        <div class="input-form">
                                            <label for="focal_structure_porteuse" class="form-label">Structure
                                                porteuse</label>
                                            <input id="focal_structure_porteuse" type="text" name="structure_porteuse"
                                                class="form-control" value="{{ $unProjet->structurePorteuse->nom }}"
                                                disabled>
                                        </div>
                                        <input type="hidden" name="structure_porteuse_id"
                                            value="{{ $unProjet->structurePorteuse->id }}">
                                        <div class="input-form mt-3">
                                            <label>Sélectionner le point focal</label>
                                            <div class="mt-2">
                                                <select id="focal_user" name="user_id"
                                                    data-placeholder="Sélectionner le point focal"
                                                    class="tom-select w-full" required>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}"
                                                            {{ isset($pointFocal) && $pointFocal->user_id == $user->id ? 'selected' : '' }}>
                                                            {{ $user->name }} {{ $user->firstname }}
                                                            ({{ $user->structure }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('user_id')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="p-1">
                                        <div class="input-form">
                                            <label for="focal_date_debut" class="form-label">Date de début</label>
                                            <input id="focal_date_debut" type="date" name="date_debut"
                                                class="form-control" value="{{ $pointFocal->date_debut ?? '' }}"
                                                required>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="focal_date_fin" class="form-label">Date de fin</label>
                                            <input id="focal_date_fin" type="date" name="date_fin"
                                                class="form-control" value="{{ $pointFocal->date_fin ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                        <button type="submit" class="btn btn-primary w-32">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Modifier focal Modal -->

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal-focal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">ÊTES-VOUS SÛR ?</div>
                        <div class="text-slate-500 mt-2">Voulez-vous vraiment supprimer le point focal?<br>Ce processus
                            est irréversible.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Annuler</button>
                        <button type="button" class="btn btn-danger w-24" id="confirm-delete-focal"
                            data-tw-dismiss="modal">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
    <!-- END: membres -->




    <!-- BEGIN: membres -->
    <h2 class="intro-y text-lg font-medium mt-10">Membres de l'équipe </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
                data-tw-target="#new-order-modal-membre">Ajouter un membre</button>
            <div class="dropdown">



            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">

            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="whitespace-nowrap">Nom et prénom</th>

                        <th class="text-center whitespace-nowrap">Statut</th>
                        <th class="text-center whitespace-nowrap">Rôle</th>

                        <th class="text-center whitespace-nowrap">Actif</th>
                        <th class="text-center whitespace-nowrap">Date de début</th>
                        <th class="text-center whitespace-nowrap">Date de fin</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($membres as $membre)
                        <tr class="intro-x">
                            <td class="w-10">{{ $membre->id }}</td>
                            <td class="w-10">{{ $membre->name }} {{ $membre->firstname }} ({{ $membre->structure }})
                            </td>

                            <td class="text-center">{{ $membre->pivot->statut }}</td>
                            <td class="text-center">{{ $membre->pivot->role }}</td>

                            <td class="text-center">{{ $membre->pivot->actif ? 'Oui' : 'Non' }}</td>
                            <td class="text-center">{{ $membre->pivot->date_debut }}</td>
                            <td class="text-center">{{ $membre->pivot->date_fin }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <!-- Action Modifier -->

                                    <button class="flex items-center" data-tw-toggle="modal"
                                        data-membre_id="{{ $membre->pivot->id }}" data-membre_name="{{ $membre->name }}"
                                        data-membre_firstname="{{ $membre->firstname }}"
                                        data-membre_statut="{{ $membre->pivot->statut }}"
                                        data-membre_role="{{ $membre->pivot->role }}"
                                        data-membre_structure="{{ $membre->structure }}"
                                        data-membre_actif="{{ $membre->pivot->actif }}"
                                        data-membre_date_debut="{{ $membre->pivot->date_debut }}"
                                        data-membre_date_fin="{{ $membre->pivot->date_fin }}"
                                        data-membre_user_id="{{ $membre->id }}" data-tw-target="#update-membre-modal">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                    </button>
                                    <button type="submit" class="flex items-center text-danger delete-membre-btn"
                                        data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-membre"
                                        data-membre-id="{{ $membre->pivot->id }}">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                    </button>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-gray-500">Aucun membre trouvé pour ce projet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <!-- END: Data List -->
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
    <!-- BEGIN: New Order Modal -->
    <div id="new-order-modal-membre" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="{{ route('membre_equipe.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Ajouter un membre</h2>
                    </div>

                    <div class="modal-body">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="p-1">
                                        <div class="input-form">
                                            <label>Sélectionner un membre</label>
                                            <div class="mt-2">
                                                <select id="users" name="users[]"
                                                    data-placeholder="Sélectionner un membre" class="tom-select w-full"
                                                    multiple required>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                            {{ $user->firstname }} ( {{ $user->structure }} )</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="equipe_id" value="{{ $projet->equipe->id }}">

                                        <div class="input-form mt-3">
                                            <label for="role" class="form-label">Rôle</label>
                                            <select id="role" name="role" class="form-control" required>
                                                <option value="Chef de projet">Chef de projet</option>
                                                <option value="Développeur backend">Développeur backend</option>
                                                <option value="Développeur frontend">Développeur frontend</option>
                                                <option value="Testeur">Testeur</option>
                                                <option value="Expert métier">Expert métier</option>
                                                <option value="Partenaire externe">Partenaire externe</option>
                                            </select>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="statut" class="form-label">Statut</label>
                                            <select id="statut" name="statut" class="form-control" required>
                                                <option value="Equipe technique">Membre technique</option>
                                                <option value="Equipe de suivie">Membre de suivie</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="p-1">
                                        <div class="input-form">
                                            <label for="actif" class="form-label">Sélectionner l'activité</label>
                                            <select id="actif" name="actif" class="form-control" required>
                                                <option value="1">Actif</option>
                                                <option value="0">Inactif</option>
                                            </select>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="date_debut" class="form-label">Date de début</label>
                                            <input id="date_debut" type="date" name="date_debut" class="form-control"
                                                required>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="date_fin" class="form-label">Date de fin</label>
                                            <input id="date_fin" type="date" name="date_fin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                        <button type="submit" class="btn btn-primary w-32">Enregistrer</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- END: New Order Modal -->

    <!-- BEGIN: modifier Modal pour membre -->
    <div id="update-membre-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="{{ route('membres.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="membre_id" name="id" value="{{ $membre->pivot->id }}">

                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Modifier un membre</h2>
                    </div>

                    <div class="modal-body">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="p-1">

                                        <div class="input-form">
                                            <label>Sélectionner un membre</label>
                                            <div class="mt-2">
                                                <select id="update_membre_users" name="user_id"
                                                    data-placeholder="Sélectionner un membre" class="tom-select w-full"
                                                    required>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}"
                                                            {{ isset($membre) && $membre->user_id == $user->id ? 'selected' : '' }}>
                                                            {{ $user->name }}
                                                            {{ $user->firstname }} ( {{ $user->structure }} )
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="equipe_id" value="{{ $projet->equipe->id }}">

                                        <div class="input-form mt-3">
                                            <label for="update_membre_role" class="form-label">Rôle</label>
                                            <select id="update_membre_role" name="role" class="form-control" required>
                                                <option value="Chef de projet">Chef de projet</option>
                                                <option value="Développeur backend">Développeur backend</option>
                                                <option value="Développeur frontend">Développeur frontend</option>
                                                <option value="Testeur">Testeur</option>
                                                <option value="Expert métier">Expert métier</option>
                                                <option value="Partenaire externe">Partenaire externe</option>
                                            </select>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="update_membre_statut" class="form-label">Statut</label>
                                            <select id="update_membre_statut" name="statut" class="form-control"
                                                required>
                                                <option value="Equipe technique">Membre technique</option>
                                                <option value="Equipe de suivie">Membre de suivie</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>
                            </div>


                            <div class="intro-y col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="p-1">

                                        <div class="input-form">
                                            <label for="update_membre_actif" class="form-label">Sélectionner
                                                l'activité</label>
                                            <select id="update_membre_actif" name="actif" class="form-control"
                                                required>
                                                <option value="1">Actif</option>
                                                <option value="0">Inactif</option>
                                            </select>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="update_membre_date_debut" class="form-label">Date de début</label>
                                            <input id="update_membre_date_debut" type="date" name="date_debut"
                                                class="form-control" value="{{ $membre->date_debut ?? '' }}" required>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="update_membre_date_fin" class="form-label">Date de fin</label>
                                            <input id="update_membre_date_fin" type="date" name="date_fin"
                                                class="form-control" value="{{ $membre->date_fin ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                        <button type="submit" class="btn btn-primary w-32">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Modifier membre Modal -->

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal-membre" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">ÊTES-VOUS SÛR ?</div>
                        <div class="text-slate-500 mt-2">Voulez-vous vraiment supprimer cet membre de l'équipe ?<br>Ce
                            processus
                            est irréversible.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Annuler</button>
                        <button type="button" class="btn btn-danger w-24" id="confirm-delete-membre"
                            data-tw-dismiss="modal">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
    <!-- END: membres -->

    < <!-- BEGIN: instances -->
        <h2 class="intro-y text-lg font-medium mt-10">Stucture bénéficiaire</h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
                    data-tw-target="#new-order-modal-structure">Ajouter une structure bénéficiaire</button>
                <div class="dropdown">



                </div>
                <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>

                        <th class="text-center whitespace-nowrap">Structures</th>
                        <th class="text-center whitespace-nowrap">Etat</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Année d'exploitation</th>
                        <th class="text-center whitespace-nowrap">Année de déploiement</th>
                        <th class="text-center whitespace-nowrap">Commentntaire</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($projet->structuresBeneficiaires as $structureBeneficiaire)
                    <tr class="intro-x">
                        <td class="w-40">{{ $structureBeneficiaire->nom }}</td>
                        <td class="text-center">{{ $structureBeneficiaire->statut }}</td>
                        <td class="w-40">{{ $structureBeneficiaire->etat}}</td>
                        <td class="w-40">{{ $structureBeneficiaire->annee_exploitation }}</td>
                        <td class="w-40">{{ $structureBeneficiaire->annee_deploiement }}</td>
                        <td class="w-40">{{ $structureBeneficiaire->commentaire}}</td>

                        <td class="table-report__action w-56">

                            <div class="flex justify-center items-center">
                                <a class="flex items-center " href="javascript:;">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal-instance">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-gray-500">Aucun structure bénéficiaire trouvé pour ce projet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
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
   <!-- BEGIN: New Order Modal -->
   <div id="new-order-modal-structure" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div id="new-order-modal-structure" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="structure-form" action="{{ route('structure-beneficiaire.store',$projet->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Structure bénéficiaire</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <div class="col-span-12">
                        <label for="pos-form-1" class="form-label">Nom de la structure</label>
                        <input id="pos-form-1" type="text" name="nom" class="form-control flex-1" placeholder="nom de la structure">
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>

                            <th class="text-center whitespace-nowrap">Structures</th>
                            <th class="text-center whitespace-nowrap">Etat</th>
                            <th class="text-center whitespace-nowrap">Status</th>
                            <th class="text-center whitespace-nowrap">Année d'exploitation</th>
                            <th class="text-center whitespace-nowrap">Année de déploiement</th>
                            <th class="text-center whitespace-nowrap">Commentntaire</th>
                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projet->structuresBeneficiaires as $structureBeneficiaire)
                            <tr class="intro-x">
                                <td class="w-40">{{ $structureBeneficiaire->nom }}</td>
                                <td class="text-center">{{ $structureBeneficiaire->statut }}</td>
                                <td class="w-40">{{ $structureBeneficiaire->etat }}</td>
                                <td class="w-40">{{ $structureBeneficiaire->annee_exploitation }}</td>
                                <td class="w-40">{{ $structureBeneficiaire->annee_deploiement }}</td>
                                <td class="w-40">{{ $structureBeneficiaire->commentaire }}</td>

                                <td class="table-report__action w-56">

                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center " href="javascript:;">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                        </a>
                                        <a class="flex items-center text-danger" href="javascript:;"
                                            data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-instance">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-gray-500">Aucun structure bénéficiaire trouvé
                                    pour ce projet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
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
        <!-- BEGIN: New Order Modal -->
        <div id="new-order-modal-structure" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="new-order-modal-structure" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="structure-form"
                                    action="{{ route('structure-beneficiaire.store', $projet->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h2 class="font-medium text-base mr-auto">Structure bénéficiaire</h2>
                                    </div>
                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                                        <div class="col-span-12">
                                            <label for="pos-form-1" class="form-label">Nom de la structure</label>
                                            <input id="pos-form-1" type="text" name="nom"
                                                class="form-control flex-1" placeholder="nom de la structure">
                                        </div>

                                        <div
                                            class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="form-label xl:w-64 xl:!mr-10">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Statut</div>
                                                        <div
                                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                <div class="flex flex-col sm:flex-row">
                                                    <div class="form-check mr-4">
                                                        <input id="statut-en-exploitation" name="statut"
                                                            class="form-check-input" type="radio"
                                                            value="en_exploitation" required>
                                                        <label class="form-check-label" for="statut-en-exploitation">En
                                                            exploitation</label>
                                                    </div>
                                                    <div class="form-check mr-4 mt-2 sm:mt-0">
                                                        <input id="statut-pas-en-exploitation" name="statut"
                                                            class="form-check-input" type="radio"
                                                            value="pas_en_exploitation">
                                                        <label class="form-check-label"
                                                            for="statut-pas-en-exploitation">Pas en exploitation</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-12">
                                            <label for="structure-beneficiare-etat" class="form-label">Etat</label>
                                            <select id="structure-beneficiare-etat" name="etat"
                                                class="form-control flex-1">
                                                <option value="deployer">Déployées</option>
                                                <option value="maintenance">En maintenance</option>
                                            </select>
                                        </div>

                                        <div class="col-span-12">
                                            <label for="structure-beneficiaire-commentaire"
                                                class="form-label">Commentaire</label>
                                            <textarea id="structure-beneficiaire-commentaire" name="commentaire" class="form-control flex-1 h-25"
                                                placeholder="Entrez un commentaire..."></textarea>
                                        </div>

                                        <div class="col-span-12">
                                            <label for="pos-form-2" class="form-label">Année d'exploitation</label>
                                            <input id="pos-form-2" type="date" name="annee_exploitation"
                                                class="form-control flex-1" placeholder="">
                                        </div>

                                        <div class="col-span-12">
                                            <label for="pos-form-3" class="form-label">Année de déploiement</label>
                                            <input id="pos-form-3" type="date" name="annee_deploiement"
                                                class="form-control flex-1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="modal-footer text-right">
                                        <button type="button" data-tw-dismiss="modal"
                                            class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                                        <button type="submit" class="btn btn-primary w-32">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END: New Order Modal -->
        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal-instance" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process
                                cannot be undone.</div>
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
        <!-- END:  instances -->

        <!-- BEGIN: amendements-->
        <h2 class="intro-y text-lg font-medium mt-10">Amendements du projet </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
                    data-tw-target="#new-order-modal-amendement">Ajouter un amendement
                </button>

                <div class="dropdown">



                </div>
                <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">ID</th>
                            <th class="text-center whitespace-nowrap">Source</th>
                            <th class="text-center whitespace-nowrap">Responsable</th>
                            <th class="text-center whitespace-nowrap">Catégorie</th>
                            <th class="text-center whitespace-nowrap">Priorité</th>
                            <th class="text-center whitespace-nowrap w-5">Mise en production</th>
                            <th class="text-center whitespace-nowrap">Description</th>
                            <th class="text-center whitespace-nowrap">Fichier</th>
                            <th class="text-center whitespace-nowrap">Date</th>
                            <th class="text-center whitespace-nowrap">Statut</th>
                            <th class="text-center whitespace-nowrap">Difficultés</th>
                            <th class="text-center whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projet->amendements as $amendement)
                            <tr class="intro-x">
                                <td class="w-10">{{ $amendement->id }}</td>
                                <td class="w-10">{{ $amendement->source }}</td>
                                <td class="w-10">{{ $amendement->responsable }}</td>
                                <td class="w-10">{{ $amendement->categorie }}</td>
                                <td class="text-center">{{ $amendement->priorite }}</td>
                                <td class="text-center">{{ $amendement->mise_production }}</td>

                                <td class="text-center">

                                    <button data-tw-toggle="modal" data-tw-target="#amendement-description-modal"
                                        class="amendement-description-btn"
                                        data-description="{{ $amendement->description }}">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                    </button>

                                </td>
                                <td class="text-center">
                                    <!-- Affichage du lien vers le fichier PDF si disponible -->
                                    @if ($amendement->file_path)
                                        <a href="{{ asset('storage/' . $amendement->file_path) }}" target="_blank"
                                            class="text-primary">
                                            Télécharger le PDF
                                        </a>
                                    @else
                                        Aucune pièce jointe
                                    @endif
                                </td>
                                <td class="text-center">{{ $amendement->date }}</td>
                                <td class="text-center">{{ $amendement->statut }}</td>
                                <td class="text-center">
                                    <!-- Affichage des propositions de solution -->
                                    <a class="flex items-center justify-center text-primary tooltip"
                                        href="{{ route('amendements.show', ['id' => $amendement->id]) }}"
                                        title="Voir la liste des difficultés de l'amendement">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                    </a>

                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <!-- Action Modifier (si nécessaire) -->

                                        <button class="flex items-center" data-tw-toggle="modal"
                                            data-amendement_id="{{ $amendement->id }}"
                                            data-amendement_source="{{ $amendement->source }}"
                                            data-amendement_description="{{ $amendement->description }}"
                                            data-amendement_categorie="{{ $amendement->categorie }}"
                                            data-amendement_date="{{ $amendement->date }}"
                                            data-amendement_statut="{{ $amendement->statut }}"
                                            data-amendement_priorite="{{ $amendement->priorite }}"
                                            data-amendement_mise_production="{{ $amendement->mise_production }}"
                                            data-amendement_responsable="{{ $amendement->responsable }}"
                                            data-amendement_projet_id="{{ $amendement->projet_id }}"
                                            data-tw-target="#update-amendement-modal">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        </button>

                                        <button type="submit"
                                            class="flex items-center text-danger delete-amendement-btn"
                                            data-tw-toggle="modal"
                                            data-tw-target="#delete-confirmation-modal-amendement"
                                            data-amendement-id="{{ $amendement->id }}">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                        </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-gray-500">Aucun amendement trouvé pour ce
                                    projet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            <!-- END: Data List -->
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

        <!-- BEGIN: Description amendement Modal -->
        <div id="amendement-description-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Description de l'amendement</h5>
                        <button type="button" class="btn-close" data-tw-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Le texte de la description sera inséré ici -->
                        <p id="amendement-description-text">Aucune description disponible.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Description amendement Modal -->

        <!-- BEGIN: New Order Modal -->
        <div id="new-order-modal-amendement" class="modal" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-xl">
                <form id="amendement-form" method="POST" action="{{ route('amendements.store') }}"
                    enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Ajouter un amendement</h2>
                        </div>


                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="projet_id" value="{{ $projet->id }}">

                            <div class="grid grid-cols-12 gap-6">
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <div class="col-span-12">
                                        <label for="amendement-source" class="form-label">Source ( Auteur de
                                            l'amendement ) </label>
                                        <input id="amendement-source" name="source" type="text"
                                            class="form-control flex-1" placeholder="Entrez la source de l'amendement">
                                    </div>

                                    <!-- Statut -->
                                    <div class="col-span-12 mt-3">
                                        <label for="amendement-statut" class="form-label">Statut ( Etat )</label>
                                        <select id="amendement-statut" name="statut" class="form-control flex-1">
                                            <option value="Réalisé">Réalisé</option>
                                            <option value="En cours">En cours</option>
                                            <option value="Non débuté">Non débuté</option>
                                        </select>
                                    </div>

                                    <!-- Date -->
                                    <div class="col-span-12 mt-3">
                                        <label for="amendement-date" class="form-label">Date ( Echéance ) </label>
                                        <input id="amendement-date" name="date" type="date"
                                            class="form-control flex-1">
                                    </div>

                                    <!-- File Upload -->
                                    <div class="col-span-12 mt-3">
                                        <label for="amendement-file" style="color: red;" class="form-label">Joindre un
                                            fichier (PDF
                                            uniquement)</label>
                                        <div class="flex items-center space-x-2">
                                            <input id="amendement-file" name="file" type="file"
                                                class="hidden">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="document.getElementById('amendement-file').click()">Choisir un
                                                fichier</button>
                                            <span id="file-name-amendement" class="text-gray-500">Aucun fichier
                                                sélectionné</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="intro-y col-span-12 lg:col-span-6">

                                    <div class="col-span-12">
                                        <label for="categorie" class="form-label">Catégorie</label>
                                        <select id="categorie" name="categorie" class="form-control flex-1">
                                            <option value="experience_utilisateur">Expérience utilisateur</option>
                                            <option value="revue_fonctionnelle">Révue fonctionnelle</option>
                                            <option value="support">Support</option>
                                            <option value="autre">Autre</option>
                                        </select>
                                    </div>

                                    <div class="col-span-12 mt-3">
                                        <label for="priorite" class="form-label">Priorité</label>
                                        <select id="priorite" name="priorite" class="form-control flex-1">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-span-12 mt-3">
                                        <label for="responsable" class="form-label">Responsable </label>
                                        <input id="responsable" name="responsable" type="text"
                                            class="form-control flex-1"
                                            placeholder="Entrez le responsable de la prise de l'amendement">
                                    </div>

                                    <div class="col-span-12 mt-3">
                                        <label for="mise_production" class="form-label">Mise en production</label>
                                        <select id="mise_production" name="mise_production"
                                            class="form-control flex-1">
                                            <option value="non">Non</option>
                                            <option value="oui">Oui</option>

                                        </select>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-span-12 mt-3">
                                        <label for="amendement-description" class="form-label">Description ( Commentaire
                                            ) </label>
                                        <textarea id="amendement-description" name="description" class="form-control flex-1 h-25"
                                            placeholder="Entrez une description"></textarea>
                                    </div>

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
                document.getElementById('file-name-amendement').textContent = this.files.length ? this.files[0].name :
                    'Aucun fichier sélectionné';
            });
        </script>
        </div>

        <!-- END: New Order Modal -->


        <!-- BEGIN: Modifier amendement Modal -->
        <div id="update-amendement-modal" class="modal" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-xl">
                <form id="amendement-form-update" method="POST" action="{{ route('amendements.update') }}"
                    enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Modifier un amendement</h2>
                        </div>


                        <div class="modal-body">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                            <input type="hidden" id="update-amendement-id" name="id">

                            <div class="grid grid-cols-12 gap-6">
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <div class="col-span-12">
                                        <label for="update-amendement-source" class="form-label">Source ( Auteur de
                                            l'amendement ) </label>
                                        <input id="update-amendement-source" name="source" type="text"
                                            class="form-control flex-1" placeholder="Entrez la source de l'amendement">
                                    </div>

                                    <!-- Statut -->
                                    <div class="col-span-12 mt-3">
                                        <label for="update-amendement-statut" class="form-label">Statut ( Etat )</label>
                                        <select id="update-amendement-statut" name="statut"
                                            class="form-control flex-1">
                                            <option value="Réalisé">Réalisé</option>
                                            <option value="En cours">En cours</option>
                                            <option value="Non débuté">Non débuté</option>
                                        </select>
                                    </div>

                                    <!-- Date -->
                                    <div class="col-span-12 mt-3">
                                        <label for="update-amendement-date" class="form-label">Date ( Echéance )
                                        </label>
                                        <input id="update-amendement-date" name="date" type="date"
                                            class="form-control flex-1">
                                    </div>

                                    <!-- File Upload -->
                                    <div class="col-span-12 mt-3">
                                        <label for="update-amendement-file" style="color: red;"
                                            class="form-label">Joindre un
                                            fichier (PDF
                                            uniquement)</label>
                                        <div class="flex items-center space-x-2">
                                            <input id="update-amendement-file" name="file" type="file"
                                                class="hidden">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="document.getElementById('update-amendement-file').click()">Choisir
                                                un
                                                fichier</button>
                                            <span id="file-name-update-amendement" class="text-gray-500">Aucun fichier
                                                sélectionné</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="intro-y col-span-12 lg:col-span-6">

                                    <div class="col-span-12">
                                        <label for="update-categorie" class="form-label">Catégorie</label>
                                        <select id="update-categorie" name="categorie" class="form-control flex-1">
                                            <option value="experience_utilisateur">Expérience utilisateur</option>
                                            <option value="revue_fonctionnelle">Révue fonctionnelle</option>
                                            <option value="support">Support</option>
                                            <option value="autre">Autre</option>
                                        </select>
                                    </div>

                                    <div class="col-span-12 mt-3">
                                        <label for="update-priorite" class="form-label">Priorité</label>
                                        <select id="update-priorite" name="priorite" class="form-control flex-1">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-span-12 mt-3">
                                        <label for="update-responsable" class="form-label">Responsable </label>
                                        <input id="update-responsable" name="responsable" type="text"
                                            class="form-control flex-1"
                                            placeholder="Entrez le responsable de la prise de l'amendement">
                                    </div>

                                    <div class="col-span-12 mt-3">
                                        <label for="update-mise_production" class="form-label">Mise en
                                            production</label>
                                        <select id="update-mise_production" name="mise_production"
                                            class="form-control flex-1">
                                            <option value="nom">Non</option>
                                            <option value="oui">Oui</option>

                                        </select>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-span-12 mt-3">
                                        <label for="update-amendement-description" class="form-label">Description (
                                            Commentaire
                                            ) </label>
                                        <textarea id="update-amendement-description" name="description" class="form-control flex-1 h-25"
                                            placeholder="Entrez une description"></textarea>
                                    </div>

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
            document.getElementById('update-amendement-file').addEventListener('change', function() {
                document.getElementById('file-name-update-amendement').textContent = this.files.length ? this.files[0]
                    .name :
                    'Aucun fichier sélectionné';
            });
        </script>
        </div>


        <!-- END: modifier difficulte Modal -->


        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal-amendement" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">ÊTES-VOUS SÛR ?</div>
                            <div class="text-slate-500 mt-2">Voulez-vous vraiment supprimer cet utilisateur?<br>Ce
                                processus
                                est irréversible.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Annuler</button>
                            <button type="button" class="btn btn-danger w-24" data-tw-dismiss="modal"
                                id="confirm-delete-amendement">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
        <!-- END: amendements-->



        <!-- BEGIN: Difficultes-->
        <h2 class="intro-y text-lg font-medium mt-10">Difficultés du projet </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal"
                    data-tw-target="#new-order-modal-difficulte">Ajouter une difficulté
                </button>

                <div class="dropdown">



                </div>
                <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
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
                            <th class="text-center whitespace-nowrap">Status</th>
                            <th class="text-center whitespace-nowrap">Propositions de solution</th>
                            <th class="text-center whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projet->difficulteProjets as $difficulte)
                            <tr class="intro-x">
                                <td class="w-10">{{ $difficulte->id }}</td>
                                <td class="">

                                    <div class="text-center">
                                        <button data-tw-toggle="modal" data-tw-target="#difficultepro-description-modal"
                                            class="difficulte-description-btn"
                                            data-description="{{ $difficulte->description }}">
                                            <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                        </button>

                                    </div>
                                </td>
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
                                <td class="text-center">
                                    <div class="w-40">
                                        {{ $difficulte->date }}
                                    </div>
                                </td>

                                <td class="text-center">
                                    <div class="w-40">
                                        {{ $difficulte->status }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <!-- Affichage des propositions de solution -->
                                    <a class="flex items-center justify-center text-primary tooltip"
                                        href="{{ route('difficultes.show', ['id' => $difficulte->id]) }}"
                                        title="Voir la liste des propositions de solution">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                    </a>

                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <!-- Action Modifier (si nécessaire) -->
                                        <button class="flex items-center" data-tw-toggle="modal"
                                            data-difficulte_id="{{ $difficulte->id }}"
                                            data-difficulte_description="{{ $difficulte->description }}"
                                            data-difficulte_date="{{ $difficulte->date }}"
                                            data-tw-target="#update-difficulte-modal">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        </button>

                                        <button class="flex items-center text-danger delete-difficultepro-btn"
                                            data-tw-toggle="modal"
                                            data-tw-target="#delete-confirmation-modal-difficultepro"
                                            data-difficultepro-id="{{ $difficulte->id }}">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                        </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500">Aucune difficulté trouvée pour ce
                                    projet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            <!-- END: Data List -->
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
        <!-- Modal pour afficher la description -->
        <div id="difficultepro-description-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Description de la difficulté</h5>
                        <button type="button" class="btn-close" data-tw-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Le texte de la description sera inséré ici -->
                        <p id="difficulte-description-text">Aucune description disponible.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- END: Description difficulte Modal -->
        <!-- BEGIN: New Order Modal -->
        <div id="new-order-modal-difficulte" class="modal" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog">
                <form id="difficulte-form" method="POST" action="{{ route('difficultes.store') }}"
                    enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Ajouter une difficulté</h2>
                        </div>


                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            @csrf
                            <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                            <!-- Description -->
                            <div class="col-span-12">
                                <label for="difficulte-description" class="form-label">Description</label>
                                <textarea id="difficulte-description" name="description" class="form-control flex-1 h-28"
                                    placeholder="Entrez une description"></textarea>
                            </div>

                            <!-- Date -->
                            <div class="col-span-12">
                                <label for="difficulte-date" class="form-label">Date</label>
                                <input id="difficulte-date" name="date" type="date"
                                    class="form-control flex-1">
                            </div>

                            <!-- Statut -->
                            <div class="col-span-12">
                                <label for="difficulte-status" class="form-label">Status ( Etat )</label>
                                <select id="difficulte-status" name="status" class="form-control flex-1">
                                    <option value="Réalisé">Réalisé</option>
                                    <option value="En cours">En cours</option>
                                    <option value="Non débuté">Non débuté</option>
                                </select>
                            </div>

                            <!-- File Upload -->
                            <div class="col-span-12">
                                <label for="difficulte-file-store" style="color: red;" class="form-label">Joindre un
                                    fichier
                                    (PDF
                                    uniquement)</label>
                                <div class="flex items-center space-x-2">
                                    <input id="difficulte-file-store" name="difficulte-file-store" type="file"
                                        class="hidden">
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="document.getElementById('difficulte-file-store').click()">Choisir un
                                        fichier</button>
                                    <span id="file-name-difficulte" class="text-gray-500">Aucun fichier
                                        sélectionné</span>
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
            document.getElementById('difficulte-file-store').addEventListener('change', function() {
                document.getElementById('file-name-difficulte').textContent = this.files.length ? this.files[0].name :
                    'Aucun fichier sélectionné';
            });
        </script>
        </div>
        <!-- END: New Order Modal -->

        <!-- BEGIN: modifier difficulte Modal -->
        <div id="update-difficulte-modal" class="modal" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog">
                <form id="difficulte-form-update" method="POST" action="{{ route('difficultes.update') }}"
                    enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Modifier une difficulté</h2>
                        </div>


                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="update-difficulte-id" name="id">
                            <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                            <!-- Description -->
                            <div class="col-span-12">
                                <label for="update-difficulte-description" class="form-label">Description</label>
                                <textarea id="update-difficulte-description" name="description" class="form-control flex-1 h-28"
                                    placeholder="Entrez une description"></textarea>
                            </div>

                            <!-- Date -->
                            <div class="col-span-12">
                                <label for="update-difficulte-date" class="form-label">Date</label>
                                <input id="update-difficulte-date" name="date" type="date"
                                    class="form-control flex-1">
                            </div>

                            <!-- Statut -->
                            <div class="col-span-12">
                                <label for="update-difficulte-status" class="form-label">Status ( Etat )</label>
                                <select id="update-difficulte-status" name="status" class="form-control flex-1">
                                    <option value="Réalisé">Réalisé</option>
                                    <option value="En cours">En cours</option>
                                    <option value="Non débuté">Non débuté</option>
                                </select>
                            </div>

                            <!-- File Upload -->
                            <div class="col-span-12">
                                <label for="difficulte-file" style="color: red;" class="form-label">Joindre un fichier
                                    (PDF
                                    uniquement)</label>
                                <div class="flex items-center space-x-2">
                                    <input id="difficulte-file" name="file" type="file" class="hidden">
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="document.getElementById('difficulte-file').click()">Choisir un
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
            document.getElementById('difficulte-file').addEventListener('change', function() {
                document.getElementById('file-name').textContent = this.files.length ? this.files[0].name :
                    'Aucun fichier sélectionné';
            });
        </script>
        </div>


        <!-- END: modifier difficulte Modal -->


        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal-difficultepro" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">ÊTES-VOUS SÛR ?</div>
                            <div class="text-slate-500 mt-2">Voulez-vous vraiment supprimer cette difficulté ?<br>Ce
                                processus
                                est irréversible.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Annuler</button>
                            <button type="button" class="btn btn-danger w-24" id="confirm-delete-difficultepro"
                                data-tw-dismiss="modal">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- START: Description difficulte -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Sélectionne tous les boutons de description
                const descriptionButtons = document.querySelectorAll('.difficulte-description-btn');

                descriptionButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        // Récupère la description depuis l'attribut data-description
                        const description = this.getAttribute('data-description');

                        // Met à jour le contenu du modal avec la description
                        document.getElementById('difficulte-description-text').textContent =
                        description;
                    });
                });
            });
        </script>
        <!-- END: Description difficulte -->

        <!-- START: Description amendement -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Sélectionne tous les boutons de description
                const descriptionButtons = document.querySelectorAll('.amendement-description-btn');

                descriptionButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        // Récupère la description depuis l'attribut data-description
                        const description = this.getAttribute('data-description');

                        // Met à jour le contenu du modal avec la description
                        document.getElementById('amendement-description-text').textContent =
                        description;
                    });
                });
            });
        </script>
        <!-- END: Description amendement -->

        <!-- END: Delete Confirmation Modal -->
        <!-- END: Difficultes-->

        <!-- start: Difficultes script-->
        <script>
            document.getElementById('difficulte-form').addEventListener('submit', function(event) {
                const fileInput = document.getElementById('difficulte-file-store');
                const file = fileInput.files[0];

                if (file && file.type !== 'application/pdf') {
                    event.preventDefault(); // Empêche l'envoi du formulaire
                    alert('Seuls les fichiers PDF sont autorisés.');
                }
            });
        </script>
        @if (session('successDiffProj'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Difficulté projet enregistré avec succès!',
                    text: '{{ session('success') }}', // Message de succès passé depuis le contrôleur
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
        <!-- end: Difficultes script-->

        @if (session('successMembre'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Membre ajouté avec succès!',
                    text: '{{ session('success') }}', // Message de succès passé depuis le contrôleur
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        <!-- start: amendements script-->
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
                    title: 'Amendement projet enregistré avec succès!',
                    text: '{{ session('success') }}', // Message de succès passé depuis le contrôleur
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
        <!-- end: amendements script-->


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <!-- start: SUPPRIMER script-->
        <!-- start: supprimer focal script-->
        <script>
            jQuery(document).ready(function() {

                let focalId;

                // Quand on clique sur le bouton de suppression
                jQuery(document).on("click", ".delete-focal-btn", function() {

                    focalId = jQuery(this).data("focal-id");

                });

                // Quand on clique sur le bouton de confirmation de suppression dans le modal
                jQuery(document).on("click", "#confirm-delete-focal", function() {

                    if (!focalId) {
                        console.error("ID focal non défini !");
                        return;
                    }

                    // Faire une requête AJAX pour supprimer focal
                    jQuery.ajax({
                        url: "/focal/delete", // Changer l'URL pour correspondre à ta route
                        type: "POST", // Utiliser POST pour simuler DELETE
                        data: {
                            _method: "DELETE", // Simule DELETE
                            _token: jQuery('meta[name="csrf-token"]').attr(
                                "content"), // Ajout du token CSRF
                            focal_id: focalId // ID de l'focal à supprimer
                        },
                        success: function(response) {

                            // Afficher une notification avec SweetAlert
                            Swal.fire({
                                title: "Supprimé !",
                                text: "Le point focal a été supprimé avec succès.",
                                icon: "success",
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: 'btn-black' // Classe CSS personnalisée
                                }
                            }).then(() => {
                                location.reload(); // Recharger la page après la suppression
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Erreur AJAX :", xhr.responseText);
                            Swal.fire({
                                title: "Erreur !",
                                text: "Une erreur s'est produite, veuillez réessayer.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    });

                });
            });
        </script>
        <!-- end: supprimer focal script-->

        <!-- start: supprimer membre script-->
        <script>
            jQuery(document).ready(function() {

                let membreId;

                // Quand on clique sur le bouton de suppression
                jQuery(document).on("click", ".delete-membre-btn", function() {

                    membreId = jQuery(this).data("membre-id");

                });

                // Quand on clique sur le bouton de confirmation de suppression dans le modal
                jQuery(document).on("click", "#confirm-delete-membre", function() {

                    if (!membreId) {
                        console.error("ID membre non défini !");
                        return;
                    }

                    // Faire une requête AJAX pour supprimer membre
                    jQuery.ajax({
                        url: "/membre/delete", // Changer l'URL pour correspondre à ta route
                        type: "POST", // Utiliser POST pour simuler DELETE
                        data: {
                            _method: "DELETE", // Simule DELETE
                            _token: jQuery('meta[name="csrf-token"]').attr(
                                "content"), // Ajout du token CSRF
                            membre_id: membreId
                        },
                        success: function(response) {

                            // Afficher une notification avec SweetAlert
                            Swal.fire({
                                title: "Supprimé !",
                                text: "Le membre a été supprimé avec succès.",
                                icon: "success",
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: 'btn-black' // Classe CSS personnalisée
                                }
                            }).then(() => {
                                location.reload(); // Recharger la page après la suppression
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Erreur AJAX :", xhr.responseText);
                            Swal.fire({
                                title: "Erreur !",
                                text: "Une erreur s'est produite, veuillez réessayer.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    });

                });
            });
        </script>
        <!-- end: supprimer membre script-->

        <!-- start: supprimer amendement script-->
        <script>
            jQuery(document).ready(function() {

                let amendementId;

                // Quand on clique sur le bouton de suppression
                jQuery(document).on("click", ".delete-amendement-btn", function() {

                    amendementId = jQuery(this).data("amendement-id");

                });

                // Quand on clique sur le bouton de confirmation de suppression dans le modal
                jQuery(document).on("click", "#confirm-delete-amendement", function() {

                    if (!amendementId) {
                        console.error("ID amendement non défini !");
                        return;
                    }

                    // Faire une requête AJAX pour supprimer focal
                    jQuery.ajax({
                        url: "/amendement/delete", // Changer l'URL pour correspondre à ta route
                        type: "POST", // Utiliser POST pour simuler DELETE
                        data: {
                            _method: "DELETE", // Simule DELETE
                            _token: jQuery('meta[name="csrf-token"]').attr(
                                "content"), // Ajout du token CSRF
                            amendement_id: amendementId
                        },
                        success: function(response) {

                            // Afficher une notification avec SweetAlert
                            Swal.fire({
                                title: "Supprimé !",
                                text: "L'amendement a été supprimé avec succès.",
                                icon: "success",
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: 'btn-black' // Classe CSS personnalisée
                                }
                            }).then(() => {
                                location.reload(); // Recharger la page après la suppression
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Erreur AJAX :", xhr.responseText);
                            Swal.fire({
                                title: "Erreur !",
                                text: "Une erreur s'est produite, veuillez réessayer.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    });

                });
            });
        </script>
        <!-- end: supprimer amendement script-->

        <!-- start: supprimer difficultepro script-->
        <script>
            jQuery(document).ready(function() {

                let difficulteproId;

                // Quand on clique sur le bouton de suppression
                jQuery(document).on("click", ".delete-difficultepro-btn", function() {

                    difficulteproId = jQuery(this).data("difficultepro-id");

                });

                // Quand on clique sur le bouton de confirmation de suppression dans le modal
                jQuery(document).on("click", "#confirm-delete-difficultepro", function() {

                    if (!difficulteproId) {
                        console.error("ID difficultepro non défini !");
                        return;
                    }

                    // Faire une requête AJAX pour supprimer focal
                    jQuery.ajax({
                        url: "/difficulte/delete", // Changer l'URL pour correspondre à ta route
                        type: "POST", // Utiliser POST pour simuler DELETE
                        data: {
                            _method: "DELETE", // Simule DELETE
                            _token: jQuery('meta[name="csrf-token"]').attr(
                                "content"), // Ajout du token CSRF
                            difficulte_projet_id: difficulteproId
                        },
                        success: function(response) {

                            // Afficher une notification avec SweetAlert
                            Swal.fire({
                                title: "Supprimé !",
                                text: "La difficulté du projet a été supprimé avec succès.",
                                icon: "success",
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: 'btn-black' // Classe CSS personnalisée
                                }
                            }).then(() => {
                                location.reload(); // Recharger la page après la suppression
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Erreur AJAX :", xhr.responseText);
                            Swal.fire({
                                title: "Erreur !",
                                text: "Une erreur s'est produite, veuillez réessayer.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    });

                });
            });
        </script>
        <!-- end: supprimer difficultepro script-->


        <!-- begin: modifier script-->
        <!-- begin: modifier focal-->
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                document.querySelectorAll("[data-tw-target='#update-focal-modal']").forEach(button => {
                    button.addEventListener("click", function() {
                        // Récupération des données depuis les attributs `data-*`
                        let focalId = this.getAttribute("data-focal_id");
                        let userId = this.getAttribute("data-focal_user_id");
                        let name = this.getAttribute("data-focal_name");
                        let firstname = this.getAttribute("data-focal_firstname");
                        let structure = this.getAttribute("data-focal_structure");
                        let dateDebut = this.getAttribute("data-focal_date_debut");
                        let dateFin = this.getAttribute("data-focal_date_fin");

                        // Sélection des champs
                        let selectElement = document.querySelector("#focal_user");
                        let idInput = document.querySelector("#focal_id");
                        let nameInput = document.querySelector("#focal_name");
                        let firstnameInput = document.querySelector("#focal_firstname");
                        let structureInput = document.querySelector("#focal_structure");
                        let dateDebutInput = document.querySelector("#focal_date_debut");
                        let dateFinInput = document.querySelector("#focal_date_fin");

                        if (idInput) idInput.value = focalId;

                        // Vérification et mise à jour du champ <select>

                        if (selectElement) {
                            let tomSelectInstance = selectElement.tomselect;

                            if (tomSelectInstance) {
                                tomSelectInstance.setValue(userId, true);
                            } else {
                                selectElement.value = userId;
                            }
                        }

                        // Mise à jour des dates
                        if (dateDebutInput) dateDebutInput.value = dateDebut;
                        if (dateFinInput) dateFinInput.value = dateFin;

                    });
                });
            });
        </script>

        <!-- end: modifier focal-->

        <!-- begin: modifier membre-->
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                document.querySelectorAll("[data-tw-target='#update-membre-modal']").forEach(button => {
                    button.addEventListener("click", function() {
                        // Récupération des données depuis les attributs `data-*`
                        let membreId = this.getAttribute("data-membre_id");
                        let userId = this.getAttribute("data-membre_user_id");
                        let name = this.getAttribute("data-membre_name");
                        let firstname = this.getAttribute("data-membre_firstname");
                        let structure = this.getAttribute("data-membre_structure");

                        let role = this.getAttribute("data-membre_role");
                        let statut = this.getAttribute("data-membre_statut");
                        let actif = this.getAttribute("data-membre_actif");

                        let dateDebut = this.getAttribute("data-membre_date_debut");
                        let dateFin = this.getAttribute("data-membre_date_fin");


                        // Sélection des champs
                        let selectElement = document.querySelector("#update_membre_users");
                        let idInput = document.querySelector("#update_membre_id");
                        let nameInput = document.querySelector("#update_membre_name");
                        let firstnameInput = document.querySelector("#update_membre_firstname");
                        let structureInput = document.querySelector("#update_membre_structure");

                        let roleInput = document.querySelector("#update_membre_role");
                        let statutInput = document.querySelector("#update_membre_statut");
                        let actifInput = document.querySelector("#update_membre_actif");

                        let dateDebutInput = document.querySelector("#update_membre_date_debut");
                        let dateFinInput = document.querySelector("#update_membre_date_fin");

                        if (idInput) idInput.value = membreId;
                        if (nameInput) nameInput.value = name;
                        if (firstnameInput) firstnameInput.value = firstname;
                        if (structureInput) structureInput.value = structure;
                        if (roleInput) roleInput.value = role;
                        if (statutInput) statutInput.value = statut;
                        if (actifInput) actifInput.value = actif;
                        if (dateDebutInput) dateDebutInput.value = dateDebut;
                        if (dateFinInput) dateFinInput.value = dateFin;


                        // Vérification et mise à jour du champ <select>

                        if (selectElement) {
                            let tomSelectInstance = selectElement.tomselect;

                            if (tomSelectInstance) {
                                tomSelectInstance.setValue(userId, true);
                                console.log(userId)
                            } else {
                                selectElement.value = userId;
                            }
                        }

                    });
                });
            });
        </script>
        <!-- end: modifier membre-->

        <!-- begin: modifier amendement -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                document.querySelectorAll("[data-tw-target='#update-amendement-modal']").forEach(button => {
                    button.addEventListener("click", function() {
                        // Récupération des données depuis les attributs `data-*`
                        let id = this.getAttribute("data-amendement_id");
                        let projet_id = this.getAttribute("data-amendement_projet_id");
                        let date = this.getAttribute("data-amendement_date");
                        let description = this.getAttribute("data-amendement_description");
                        let statut = this.getAttribute("data-amendement_statut");
                        let source = this.getAttribute("data-amendement_source");
                        let mise_production = this.getAttribute("data-amendement_mise_production");
                        let priorite = this.getAttribute("data-amendement_priorite");
                        let categorie = this.getAttribute("data-amendement_categorie");
                        let responsable = this.getAttribute("data-amendement_responsable");

                        // Sélection des champs
                        let idInput = document.querySelector("#update-amendement-id");
                        let projet_idInput = document.querySelector("#update-amendement-projet_id");
                        let dateInput = document.querySelector("#update-amendement-date");
                        let descriptionInput = document.querySelector("#update-amendement-description");
                        let statutInput = document.querySelector("#update-amendement-statut");
                        let sourceInput = document.querySelector("#update-amendement-source");
                        let mise_productionInput = document.querySelector("#update-mise_production");
                        let prioriteInput = document.querySelector("#update-priorite");
                        let categorieInput = document.querySelector("#update-categorie");
                        let responsableInput = document.querySelector("#update-responsable");

                        // Mise à jour
                        if (idInput) idInput.value = id;
                        if (projet_idInput) idInput.value = projet_id;
                        if (dateInput) dateInput.value = date;
                        if (descriptionInput) descriptionInput.value = description;
                        if (statutInput) statutInput.value = statut;
                        if (sourceInput) sourceInput.value = source;
                        if (mise_productionInput) mise_productionInput.value = mise_production;
                        if (prioriteInput) prioriteInput.value = priorite;
                        if (categorieInput) categorieInput.value = categorie;
                        if (responsableInput) responsableInput.value = responsable;


                    });
                });
            });
        </script>
        <!-- end: modifier amendement -->

        <!-- begin: modifier difficulte-->
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                document.querySelectorAll("[data-tw-target='#update-difficulte-modal']").forEach(button => {
                    button.addEventListener("click", function() {
                        // Récupération des données depuis les attributs `data-*`
                        let id = this.getAttribute("data-difficulte_id");
                        let date = this.getAttribute("data-difficulte_date");
                        let description = this.getAttribute("data-difficulte_description");

                        // Sélection des champs
                        let idInput = document.querySelector("#update-difficulte-id");
                        let dateInput = document.querySelector("#update-difficulte-date");
                        let descriptionInput = document.querySelector("#update-difficulte-description");

                        // Mise à jour
                        if (idInput) idInput.value = id;
                        if (dateInput) dateInput.value = date;
                        if (descriptionInput) descriptionInput.value = description;

                    });
                });
            });
        </script>
        <!-- end: modifier difficulte-->
        <!-- end: modifier script-->
    @endsection
