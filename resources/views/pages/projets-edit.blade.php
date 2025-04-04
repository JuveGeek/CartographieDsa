@extends('../layout/' . $layout)

@section('subhead')
    <title>Formulaire de mise à jour du projet</title>
@endsection

@section('subcontent')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">

        <div class="intro-y col-span-11 2xl:col-span-9">
            <!-- BEGIN: Modifier projet -->
            <div class="intro-y box p-5 mt-5">
                <form action="{{ route('projets.update', $projet->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Modifier un projet
                        </div>
                        <div class="mt-5">
                            <!-- Nom Projet  -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Nom du projet</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required
                                            </div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            Inclure au moins 40 caractères pour faciliter la recherche.
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="projet-nom" name="nom" type="text" class="form-control"
                                        placeholder="Nom du projet" value="{{ old('nom', $projet->nom) }}" required>
                                    <div class="form-help text-right">Maximum character 0/70</div>
                                </div>
                            </div>

                            <!-- Structure porteuse -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Structure porteuse</div>
                                            <button class="btn btn-primary w-44" data-tw-toggle="modal"
                                                data-tw-target="#new-order-modal-structure-porteuse">
                                                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Ajouter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <select name="structure_porteuse_id" id="structure" class="form-select">
                                        @foreach ($structures as $structure)
                                            <option value="{{ $structure->id }}" {{ $structure->id == $projet->structure_porteuse_id ? 'selected' : '' }}>
                                                {{ $structure->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Objectif principal -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium"> Objectif principal</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="objectif_principal" class="form-control" rows="4" required>{{ old('objectif_principal', $projet->objectif_principal) }}</textarea>
                                    <div class="form-help text-right">Maximum character 0/200</div>
                                </div>
                            </div>

                            <!-- Public cible -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Public cible</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="public_cible" class="form-control" rows="4" required>{{ old('public_cible', $projet->public_cible) }}</textarea>
                                    <div class="form-help text-right">Maximum character 0/200</div>
                                </div>
                            </div>

                            <!-- Statut -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Statut</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <div class="flex flex-col sm:flex-row">
                                        <div class="form-check mr-4">
                                            <input id="statut" name="statut" class="form-check-input"
                                                type="radio" value="en_exploitation" {{ $projet->statut == 'en_exploitation' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="statut-en-exploitation">En exploitation</label>
                                        </div>
                                        <div class="form-check mr-4 mt-2 sm:mt-0">
                                            <input id="statut" name="statut" class="form-check-input"
                                                type="radio" value="pas_en_exploitation" {{ $projet->statut == 'pas_en_exploitation' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statut-pas-en-exploitation">Pas en exploitation</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium"> Description du projet</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="description" class="form-control" rows="5" required>{{ old('description', $projet->description) }}</textarea>
                                    <div class="form-help text-right">Maximum character 0/2000</div>
                                </div>
                            </div>

                            <!-- Phase actuelle -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
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
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="font-medium"> Date de début</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $projet->date_debut) }}">
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="font-medium">Date de fin</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin', $projet->date_fin) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Annuler</button>
                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Sauvegarder les modifications</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END: Modifier projet -->
        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Récupérer les éléments nécessaires
        const statutRadios = document.getElementsByName("statut");
        const phaseActuelle = document.getElementById("phase_actuelle");
        const dateDebut = document.querySelector('input[name="date_debut"]');
        const dateFin = document.querySelector('input[name="date_fin"]');

        // Fonction pour griser ou réactiver les champs en fonction du statut
        function toggleFields() {
            // Vérifier si le statut "en exploitation" est sélectionné
            const statutEnExploitation = Array.from(statutRadios).some(radio => radio.checked && radio.value === "en_exploitation");

            // Si le statut est "en exploitation", griser les champs
            if (statutEnExploitation) {
                phaseActuelle.disabled = true;  // Désactiver le champ phase actuelle
                dateDebut.disabled = true;     // Désactiver le champ date de début
                dateFin.disabled = true;       // Désactiver le champ date de fin
                phaseActuelle.classList.add('bg-slate-200', 'text-slate-400'); // Appliquer un fond gris et un texte grisé
                dateDebut.classList.add('bg-slate-200', 'text-slate-400');    // Appliquer un fond gris et un texte grisé
                dateFin.classList.add('bg-slate-200', 'text-slate-400');      // Appliquer un fond gris et un texte grisé
            } else {
                phaseActuelle.disabled = false; // Réactiver le champ phase actuelle
                dateDebut.disabled = false;    // Réactiver le champ date de début
                dateFin.disabled = false;      // Réactiver le champ date de fin
                phaseActuelle.classList.remove('bg-slate-200', 'text-slate-400'); // Enlever le style gris
                dateDebut.classList.remove('bg-slate-200', 'text-slate-400');    // Enlever le style gris
                dateFin.classList.remove('bg-slate-200', 'text-slate-400');      // Enlever le style gris
            }
        }

        // Écouter les changements de statut
        statutRadios.forEach(radio => {
            radio.addEventListener("change", toggleFields);
        });

        // Initialiser l'affichage en fonction de la sélection actuelle
        toggleFields();
    });
</script>


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
