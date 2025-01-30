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
            <!-- BEGIN: Ajouter projet-nom -->
            <div class="intro-y box p-5 mt-5">
                <form action="{{ route('projet.storeProjet') }}" method="POST">
                    @csrf
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Ajouter un projet
                        </div>
                        <div class="mt-5">
                            <!-- Nom Projet  -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Nom du projet</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            Inclure au moins 40 caractères pour faciliter la recherche.
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="projet-nom" name="nom" type="text" class="form-control"
                                        placeholder="Nom du projet" required>
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
                                            <option value="{{ $structure->id }}">{{ $structure->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!--  objectif principal -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium"> Objectif principal</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="objectif_principal" class="form-control" rows="4" required></textarea>
                                    <div class="form-help text-right">Maximum character 0/200</div>
                                </div>
                            </div>
                          <!-- public cible -->
                          <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Public cible</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="public_cible" class="form-control" rows="4" required></textarea>
                                    <div class="form-help text-right">Maximum character 0/200</div>
                                </div>
                            </div>


                            

                            <!-- status -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Statut</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <div class="flex flex-col sm:flex-row">
                                        <div class="form-check mr-4">
                                            <input id="statut" name="statut" class="form-check-input"
                                                type="radio" value="en_exploitation" required>
                                            <label class="form-check-label" for="statut-en-exploition">En exploitation</label>
                                        </div>
                                        <div class="form-check mr-4 mt-2 sm:mt-0">
                                            <input id="statut" name="statut" class="form-check-input"
                                                type="radio" value="pas_en_exploitation">
                                            <label class="form-check-label" for="statut-pas-en-exploitation">Pas en exploitation</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  Description -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium"> Description du projet</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <textarea name="description" class="form-control" rows="5" required></textarea>
                                    <div class="form-help text-right">Maximum character 0/2000</div>
                                </div>
                            </div>

                            <!-- fichier lier au projet
                                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                    <div class="form-label xl:w-64 xl:!mr-10">
                                        <div class="text-left">
                                            <div class="flex items-center">
                                                <div class="font-medium">cahier de chaerge du projet</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full mt-3 xl:mt-0 flex-1">
                                        <input type="file" name="fichier" class="form-control">
                                    </div>
                                </div> -->
                            <!-- phase actuelle-->
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
                                           <option value="analyse">Analyse</option>
                                            <option value="developpement">Développement</option>
                                            <option value="tests">Tests</option>
                                            <option value="deploiement">Déploiement</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Date -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="font-medium"> Date de debut</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="date" name="date_debut" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="font-medium">Date de fin</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="date" name="date_fin" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="button"
                                class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Annuler</button>
                            <button type="submit"
                                class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Sauvegarder
                                et ajouter un projet</button>
                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END: Product Detail -->
        </div>
    </div>

    <!-- BEGIN: Structure_porteur-->

    <!-- BEGIN: New Order Modal -->
    <div id="new-order-modal-structure-porteuse" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Structure porteuse</h2>
                </div>

                <form id="Structure_porteuse">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Nom</label>
                            <input id="pos-form-1" name="nom" type="text" class="form-control flex-1" placeholder="Nom" required>
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-2" class="form-label">Adresse</label>
                            <input id="pos-form-2" name="adresse" type="text" class="form-control flex-1" placeholder="Adresse" required>
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-3" class="form-label">Date</label>
                            <input id="pos-form-3" name="date" type="date" class="form-control flex-1" required>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Annuler</button>
                        <button type="submit" id="save-structure" class="btn btn-primary w-32">Enregistrer</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- END: New Order Modal -->
    <!-- END: Structure_porteur-->
    <!-- BEGIN: Equipe-->
    <!-- BEGIN: New Order Modal -->
    <div id="new-order-modal-equipe" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Equipe</h2>
                </div>
                <form id="equipe_form">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Nom de l'equipe</label>
                            <input id="pos-form-1" name="nom" type="text" class="form-control flex-1"
                                placeholder="Nom de l'equipe" required>
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
    <!-- END: Equipe-->
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
