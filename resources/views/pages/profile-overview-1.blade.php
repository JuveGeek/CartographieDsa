@extends('../layout/' . $layout)

@section('subhead')
    <title>Profil</title>
@endsection

@section('subcontent')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 5000
                });
            });
        </script>
    @endif
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Informations détaillées</h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">

            <div class="flex justify-center items-center">

                <a class="flex items-center whitespace-nowrap mr-3 tooltip" data-tw-toggle="modal"
                    data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-firstname="{{ $user->firstname }}"
                    data-tel="{{ $user->tel }}" data-email="{{ $user->email }}"
                    data-role="{{ $user->roles->isNotEmpty() ? $user->roles->pluck('name')->first() : '' }}"
                    data-tw-target="#update-user-modal" href="javascript:;" title="Modifier">
                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                </a>
                <a class="flex items-center text-danger delete-user-btn tooltip" href="javascript:;" data-tw-toggle="modal"
                    data-tw-target="#delete-confirmation-modal" data-user-id="{{ $user->id }}" title="Supprimer">
                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                </a>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                        src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?d=mp&s=200">


                    <div
                        class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-primary rounded-full p-2">
                        <i class="w-4 h-4 text-white" data-lucide="camera"></i>
                    </div>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $user->name }}
                        {{ $user->firstname }}</div>
                    <div class="text-slate-500">
                        {{ $user->roles->isNotEmpty() ? $user->roles->pluck('name')->first() : '' }}</div>
                        <div>
                        ({{ $user->structure }})
                        </div>
                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <i data-lucide="mail" class="w-4 h-4 mr-2"></i> {{ $user->email }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <i data-lucide="phone" class="w-4 h-4 mr-2"></i> Téléphone : {{ $user->tel }}
                    </div>

                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-5">Niveau d'occupation</div>
                <div class="flex items-center justify-center lg:justify-start mt-2">
                    <div class="mr-2 w-20 flex">
                        NP: <span class="ml-3 font-medium text-success">4</span>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <!-- END: Profile Info -->

    <!-- BEGIN: Modal Content (Modifier) -->
    <div id="update-user-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Formulaire de modification</h2>
                </div>
                <!-- END: Modal Header -->

                <!-- BEGIN: Modal Body -->
                <form method="POST" action="{{ route('users.updateUser') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="user-id" name="id">

                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Nom</label>
                            <input id="user-name" type="text" class="form-control" name="name">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Prénom</label>
                            <input id="user-firstname" type="text" class="form-control" name="firstname">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Téléphone</label>
                            <input id="user-tel" type="text" class="form-control" name="tel">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Email</label>
                            <input id="user-email" type="text" class="form-control" name="email">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Rôle</label>
                            <select id="user-role" class="form-select" name="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary w-20"
                            data-tw-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary w-20">Enregistrer</button>
                    </div>
                </form>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>
    <!-- END: Modal Content (Modifier) -->

    <!-- BEGIN: Modal Content (Suppression) -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">ÊTES-VOUS SÛR ?</div>
                        <div class="text-slate-500 mt-2">Voulez-vous vraiment supprimer cet utilisateur?<br>Ce processus
                            est irréversible.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Annuler</button>
                        <button type="button" class="btn btn-danger w-24" id="confirm-delete"
                            data-tw-dismiss="modal">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Modal Content (Suppression) -->

    <!-- Assure-toi d'inclure jQuery avant ton script personnalisé -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        jQuery(document).ready(function() {

            let userId;

            // Quand on clique sur le bouton de suppression
            jQuery(document).on("click", ".delete-user-btn", function() {
                userId = jQuery(this).data("user-id"); // Récupérer l'ID de l'utilisateur

            });

            // Quand on clique sur le bouton de confirmation de suppression dans le modal
            jQuery(document).on("click", "#confirm-delete", function() {

                if (!userId) {
                    console.error("ID utilisateur non défini !");
                    return;
                }

                // Faire une requête AJAX pour supprimer l'utilisateur
                jQuery.ajax({
                    url: "/user/delete", // Changer l'URL pour correspondre à ta route
                    type: "POST", // Utiliser POST pour simuler DELETE
                    data: {
                        _method: "DELETE", // Simule DELETE
                        _token: jQuery('meta[name="csrf-token"]').attr(
                            "content"), // Ajout du token CSRF
                        user_id: userId // ID de l'utilisateur à supprimer
                    },
                    success: function(response) {

                        // Afficher une notification avec SweetAlert
                        Swal.fire({
                            title: "Supprimé !",
                            text: "L'utilisateur a été supprimé avec succès.",
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("update-user-modal");
            const userIdInput = document.getElementById("user-id");
            const userNameInput = document.getElementById("user-name");
            const userFirstnameInput = document.getElementById("user-firstname");
            const userTelInput = document.getElementById("user-tel");
            const userEmailInput = document.getElementById("user-email");
            const userRoleSelect = document.getElementById("user-role");

            // Ouvrir le modal et pré-remplir les champs
            document.querySelectorAll("[data-tw-target='#update-user-modal']").forEach(button => {
                button.addEventListener("click", function() {
                    // Récupérer les données de l'utilisateur depuis les attributs 'data-*'
                    userIdInput.value = this.getAttribute("data-id");
                    userNameInput.value = this.getAttribute("data-name");
                    userFirstnameInput.value = this.getAttribute("data-firstname");
                    userTelInput.value = this.getAttribute("data-tel");
                    userEmailInput.value = this.getAttribute("data-email");

                    // Réinitialiser la sélection du rôle
                    userRoleSelect.selectedIndex = 0;

                    const userRole = this.getAttribute("data-role");

                    if (userRole) {
                        Array.from(userRoleSelect.options).forEach(option => {
                            option.selected = option.value === userRole;
                        });
                    }

                    // Afficher le modal
                    tailwind.Modal.getOrCreateInstance(modal).show();
                });
            });
        });
    </script>
@endsection
