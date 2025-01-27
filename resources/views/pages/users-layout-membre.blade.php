@extends('../layout/' . $layout)

@section('subhead')
    <title>Liste des utilisateurs</title>
@endsection

@section('subcontent')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif

    <h2 class="intro-y text-lg font-medium mt-10">Liste des utilisateurs</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('users-form') }}">
                <button class="btn btn-primary shadow-md mr-2">Ajouter</button>
            </a>
            <div class="hidden md:block mx-auto text-slate-500">
                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
            </div>
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-0">
                <div class="search hidden sm:block">
                    <input type="text" class="search__input form-control border-transparent" placeholder="Rechercher..."
                    >
                    <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                </div>

            </div>
            <!-- END: Search -->
        </div>

        <!-- BEGIN: Users Layout -->
        @foreach ($users as $user)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div
                        class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <img alt="User Profile" class="rounded-full"
                                src="https://www.gravatar.com/avatar/{{ md5(strtolower("")) }}?d=mp&s=200">
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{ $user->name }} {{ $user->firstname }}</a>
                            <div class="text-slate-500 text-xs mt-0.5">
                                @foreach ($user->roles as $role)
                                    {{ $role->name }} @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </div>
                            {{ $user->email }}
                        </div>
                        <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-primary whitespace-nowrap mr-3 tooltip"
                                    href="{{ route('users.show', $user->id) }}" title="Voir les détails">
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                </a>
                                <a class="flex items-center whitespace-nowrap mr-3 tooltip" data-tw-toggle="modal"
                                    data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                    data-firstname="{{ $user->firstname }}" data-tel="{{ $user->tel }}"
                                    data-email="{{ $user->email }}"
                                    data-role="{{ $user->roles->isNotEmpty() ? $user->roles->pluck('name')->first() : '' }}"
                                    data-tw-target="#update-user-modal" href="javascript:;" title="Modifier">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                </a>
                                <a class="flex items-center text-danger delete-user-btn tooltip" href="javascript:;"
                                    data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"
                                    data-user-id="{{ $user->id }}" title="Supprimer">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- END: Users Layout -->

        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $users->links() }} <!-- Pagination -->
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>

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

<script>
    jQuery(document).ready(function () {
        jQuery(".search__input").on("input", function () {
            let searchTerm = jQuery(this).val().toLowerCase().trim();
            jQuery(".intro-y.col-span-12.md\\:col-span-6").each(function () {
                let userName = jQuery(this).find(".font-medium").text().toLowerCase();
                jQuery(this).toggle(userName.includes(searchTerm));
            });
        });
    });
</script>




@endsection
