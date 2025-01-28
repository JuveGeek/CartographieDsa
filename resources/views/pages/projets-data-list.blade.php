@extends("layout.$layout")

@section('subhead')
    <title>Projets Data List - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Liste des projets</h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ url('projets-form-page') }}" class="btn btn-primary shadow-md mr-2">
                Ajouter un projet
            </a>
        </div>

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Nom</th>
                        <th class="text-center whitespace-nowrap">Description</th>
                        <th class="text-center whitespace-nowrap">Structure porteuse</th>
                        <th class="text-center whitespace-nowrap">Date de début</th>
                        <th class="text-center whitespace-nowrap">Date de fin</th>
                        <th class="text-center whitespace-nowrap">Statut</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projets as $projet)
                        <tr class="intro-x">
                            <td class="w-40">{{ $projet->nom }}</td>
                            <td class="text-center">{{ $projet->description }}</td>
                            <td class="text-center">
                                {{ $projet->structurePorteuse ? $projet->structurePorteuse->nom : 'Aucune structure porteuse' }}
                            </td>
                            <td class="w-40">{{ $projet->date_debut }}</td>
                            <td class="w-40">{{ $projet->date_fin }}</td>
                            <td class="w-40">{{ $projet->statut }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-primary whitespace-nowrap mr-3"
                                       href="{{ route('details', $projet->id) }}">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Détails
                                    </a>
                                    <a class="flex items-center" href="javascript:;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Modifier
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                       data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records? <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
