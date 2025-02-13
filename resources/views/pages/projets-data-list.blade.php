@extends('../layout/' . $layout)

@section('subhead')
    <title>Liste des projets</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Liste des projets</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ url('projets-form-page') }}" class="btn btn-primary shadow-md mr-2">
                Ajouter un projet
            </a>
        </div>

            </div>
            <div class="hidden xl:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
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
                    <th class="whitespace-nowrap">Nom</th>

                        <th class="text-center whitespace-nowrap">Structure porteuse</th>
                        <th class="text-center whitespace-nowrap">Phase actuelle</th>
                        <th class="text-center whitespace-nowrap">Date de début</th>
                        <th class="text-center whitespace-nowrap">Date de fin</th>

                        <th class="text-center whitespace-nowrap">Statut</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($projets as $projet)
                        <tr class="intro-x">
                            <td class="w-20">{{ $projet->nom }}</td>



                            <td class="w-20">
                                {{ $projet->structurePorteuse ? $projet->structurePorteuse->nom : 'Aucune structure porteuse' }}
                            </td>
                            <td class="W-20">{{ $projet->phase_actuelle }}</td>
                            <td class="w-20">{{ $projet->date_debut }}</td>
                            <td class="w-20">{{ $projet->date_fin }}</td>

                            <td class="w-40">{{ $projet->statut }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-primary whitespace-nowrap mr-3"
                                       href="{{ route('details', $projet->id) }}">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                    </a>
                                    <a class="flex items-center whitespace-nowrap mr-3" href="javascript:;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                       data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection
