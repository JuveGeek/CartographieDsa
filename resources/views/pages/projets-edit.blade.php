@extends('../layout/' . $layout)

@section('subhead')
    <title> Formulaire d'enregistrement projet </title>
@endsection

@section('subcontent')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

      <div class="intro-y col-span-11 2xl:col-span-9">

             <div class="intro-y box p-5 mt-5">
    <form action="{{ route('projets.update', $projet->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Pour indiquer que c'est une mise à jour -->

        <input type="hidden" name="id" value="{{ $projet->id }}">

        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
            <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Modifier un projet
            </div>

            <div class="mt-5">
                <!-- Nom du projet -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Nom du projet</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="projet-nom" name="nom" type="text" class="form-control" value="{{ $projet->nom }}" required>
                    </div>
                </div>

                <!-- Structure porteuse -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Structure porteuse</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <select name="structure_porteuse_id" id="structure" class="form-select">
                            @foreach ($structures as $structure)
                                <option value="{{ $structure->id }}" {{ $projet->structure_porteuse_id == $structure->id ? 'selected' : '' }}>
                                    {{ $structure->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Objectif principal -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Objectif principal</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <textarea name="objectif_principal" class="form-control" rows="4" required>{{ $projet->objectif_principal }}</textarea>
                    </div>
                </div>

                <!-- Public cible -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Public cible</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <textarea name="public_cible" class="form-control" rows="4" required>{{ $projet->public_cible }}</textarea>
                    </div>
                </div>

                <!-- Statut -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
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
                                <input id="statut" name="statut" class="form-check-input" type="radio" value="en_exploitation"
                                    {{ $projet->statut == 'en_exploitation' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statut-en-exploitation">En exploitation</label>
                            </div>
                            <div class="form-check mr-4 mt-2 sm:mt-0">
                                <input id="statut" name="statut" class="form-check-input" type="radio" value="pas_en_exploitation"
                                    {{ $projet->statut == 'pas_en_exploitation' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statut-pas-en-exploitation">Pas en exploitation</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Description du projet</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <textarea name="description" class="form-control" rows="5" required>{{ $projet->description }}</textarea>
                    </div>
                </div>

                <!-- Phase actuelle -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5"id="phase-actuelle-container">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Phase actuelle</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <select name="phase_actuelle" id="phase_actuelle" class="form-select">
                            <option value="analyse" {{ $projet->phase_actuelle == 'analyse' ? 'selected' : '' }}>Analyse</option>
                            <option value="developpement" {{ $projet->phase_actuelle == 'developpement' ? 'selected' : '' }}>Développement</option>
                            <option value="tests" {{ $projet->phase_actuelle == 'tests' ? 'selected' : '' }}>Tests</option>
                            <option value="deploiement" {{ $projet->phase_actuelle == 'deploiement' ? 'selected' : '' }}>Déploiement</option>
                        </select>
                    </div>
                </div>

                <!-- Dates -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0" id="date-debut-container">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="font-medium"> Date de debut</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="date" name="date_debut"  value="{{ $projet->date_debut }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0" id="date-fin-container">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="font-medium">Date de fin</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="date" name="date_fin" value="{{ $projet->date_fin }}" class="form-control">
                                </div>
                            </div>
                        </div>
            </div>

            <!-- Boutons -->
            <div class="flex justify-end mt-5">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </div>
    </form>
</div>
 </div>
 </div>
 <script>
    document.addEventListener("DOMContentLoaded", function() {
        const statutRadios = document.querySelectorAll('input[name="statut"]');
        const phaseActuelle = document.getElementById('phase-actuelle-container');
        const dateDebut = document.getElementById('date-debut-container');
        const dateFin = document.getElementById('date-fin-container');

        // Fonction pour activer/désactiver les éléments
        function toggleFormElements() {
            const statutSelectionne = document.querySelector('input[name="statut"]:checked').value;

            if (statutSelectionne === 'en_exploitation') {
                phaseActuelle.style.display = 'none';
                dateDebut.style.display = 'none';
                dateFin.style.display = 'none';
            } else {
                phaseActuelle.style.display = 'block';
                dateDebut.style.display = 'block';
                dateFin.style.display = 'block';
            }
        }

        toggleFormElements();  // Applique au chargement initial

        statutRadios.forEach(radio => {
            radio.addEventListener('change', toggleFormElements);
        });
    });
</script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery("#Structure_porteuse").submit(function (e) {
            e.preventDefault(); // Empêche le rechargement de la page

            let formData = jQuery(this).serialize(); // Récupérer les données du formulaire
            let url = "{{ route('structure-porteuse.storeStructureporteuse') }}"; // Route Laravel

            jQuery.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function (response) {
                    // Affiche le message de succès avec SweetAlert
                    Swal.fire({
                        title: "Succès !",
                        text: "Structure porteuse enregistrée avec succès.",
                        icon: "success",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: 'btn-black' // Classe CSS personnalisée
                        }
                    });

                    // Réinitialiser le formulaire
                    jQuery("#Structure_porteuse")[0].reset();

                    // Fermer la modal
                    // Fermer la modal
                    jQuery("[data-tw-dismiss='modal']").click();

                    // Ajouter la nouvelle structure à une liste affichée sur la page
                    jQuery("#liste-structures").append(`
                        <tr>
                            <td>${response.structure.nom}</td>
                            <td>${response.structure.adresse}</td>
                            <td>${response.structure.date}</td>
                        </tr>
                    `);

                    // Mettre à jour dynamiquement la liste des options dans le select
                    jQuery("#structure").append(`
                        <option value="${response.structure.id}" selected>${response.structure.nom}</option>
                    `);
                },
                error: function (xhr) {
                    let errorMsg = xhr.responseJSON?.message || "Erreur lors de l'enregistrement.";
                    Swal.fire({
                        title: "Erreur !",
                        text: errorMsg,
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });
    });
</script>




<script>
    jQuery(document).ready(function () {
        jQuery("#equipe_form").submit(function (e) {
            e.preventDefault(); // Empêche le rechargement de la page

            let formData = jQuery(this).serialize(); // Récupérer les données du formulaire
            let url = "{{ route('equipe.storeEquipe') }}"; // Route Laravel

            jQuery.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function (response) {
                    // Affiche le message de succès avec SweetAlert
                    Swal.fire({
                        title: "Succès !",
                        text: "L'équipe a été enregistrée avec succès.",
                        icon: "success",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: 'btn-black' // Classe CSS personnalisée
                        }
                    });

                    // Réinitialiser le formulaire
                    jQuery("#equipe_form")[0].reset();

                    // Fermer la modal
                    jQuery("[data-tw-dismiss='modal']").click();

                    // Mettre à jour dynamiquement le select
                    let equipeOptions = '';
                    response.equipes.forEach(function(equipe) {
                        equipeOptions += `<option value="${equipe.id}">${equipe.nom}</option>`;
                    });

                    jQuery("#equipe").html(equipeOptions); // Mettre à jour toutes les options du select
                    jQuery("#equipe").val(response.equipe.id); // Sélectionner la nouvelle équipe ajoutée
                },
                error: function (xhr) {
                    let errorMsg = xhr.responseJSON?.message || "Erreur lors de l'enregistrement.";
                    Swal.fire({
                        title: "Erreur !",
                        text: errorMsg,
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        });
    });
</script>



@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
