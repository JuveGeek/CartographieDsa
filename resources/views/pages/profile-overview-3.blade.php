@extends('../layout/' . $layout)

@section('subhead')
    <title>Profil</title>
@endsection

@section('subcontent')
    @if (session('success'))
        <script>
            // Attendre que le DOM soit complètement chargé avant d'afficher l'alerte
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: "{{ session('success') }}", // Récupérer le message de succès
                    showConfirmButton: false, // Pas de bouton de confirmation
                    timer: 5000 // La notification disparaît après 5 secondes
                });
            });
        </script>
    @endif
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Profil</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?d=mp&s=200">
                    </div>
                    <div class="ml-4 mr-auto">
                        @if (Auth::check())
                            <div class="text-slate-500">

                                <div class="font-medium">{{ Auth::user()->name }} {{ Auth::user()->firstname }}</div>
                                <div class="text-xs text-black/70 mt-0.5 dark:text-slate-500">
                                    <!-- Affichage des rôles de l'utilisateur -->
                                    @if (Auth::user()->roles->count() > 0)
                                        {{ Auth::user()->roles->pluck('name')->implode(', ') }}
                                    @else
                                        'Non spécifié'
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary font-medium" href="#informations-personnelles">
                        <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Informations personnelles
                    </a>

                    <a class="flex items-center mt-5" href="#changer-mot-de-passe">
                        <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Changer le mot de passe
                    </a>

                    <a class="flex items-center mt-5" href="#changer-email">
                        <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Changer l'email
                    </a>
                </div>

                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">

                    <a class="flex items-center" href="">
                        <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Paramètres
                    </a>
                </div>

            </div>

        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Infos personnelles -->
                <div class="intro-y box col-span-12 2xl:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Informations personnelles</h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                                data-tw-toggle="dropdown">
                                <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                            </a>

                        </div>

                    </div>
                    <div class="p-5">
                        <form method="POST" action="{{ route('users.update') }}">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">

                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label for="update-profile-form-6" class="form-label">Email</label>
                                        <input id="update-profile-form-6" type="text" class="form-control"
                                            value="{{ auth()->user()->email }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-7" class="form-label">Nom</label>
                                        <input id="update-profile-form-7" name="name" type="text" class="form-control"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-8" class="form-label">Prénom</label>
                                        <input id="update-profile-form-8" name="firstname" type="text"
                                            class="form-control" value="{{ auth()->user()->firstname ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3">
                                        <label for="update-profile-form-9" class="form-label">Téléphone</label>
                                        <input id="update-profile-form-9" name="tel" type="text" class="form-control"
                                            value="{{ auth()->user()->tel ?? '' }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-10" class="form-label">Rôle</label>
                                        <select name="role" id="role" class="form-control">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    @if ($userRoles->contains($role->name)) selected @endif>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="btn btn-primary w-20 mr-auto">Enregistrer</button>


                            </div>
                        </form>
                    </div>

                </div>
                <!-- END: Infos personnelles -->


                <!-- BEGIN: Modif email -->
                <div class="intro-y box col-span-12 2xl:col-span-6" id="changer-email">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Modifier l'email</h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                                data-tw-toggle="dropdown">
                                <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                            </a>

                        </div>

                    </div>
                    <div class="p-5">
                        @if (session('successEmail'))
                            <div class="alert alert-success">
                                {{ session('successEmail') }}
                            </div>
                        @endif

                        @if (session('errorEmail'))
                            <div class="alert alert-danger">
                                {{ session('errorEmail') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('users.update.email') }}">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div>
                                        <label for="update-profile-form-16" class="form-label">Email</label>
                                        <input id="update-profile-form-16" type="email" name="email"
                                            class="form-control @error('email') border-red-500 @enderror"
                                            value="{{ old('email', auth()->user()->email) }}">

                                        @error('email')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="submit" class="btn btn-primary w-20 mr-auto">Enregistrer</button>
                            </div>
                        </form>
                    </div>


                </div>
                <!-- END: Modif email -->

                <!-- BEGIN: Modif passord -->
                <div class="intro-y box col-span-12 2xl:col-span-6" id="changer-mot-de-passe">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Modifier le mot de passe</h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                                data-tw-toggle="dropdown">
                                <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                            </a>

                        </div>

                    </div>

                    <div class="p-5">
                        @if (session('successPassword'))
                            <div class="alert alert-success">
                                {{ session('successPassword') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('users.update-password') }}">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">

                                    <div class="mt-3">
                                        <label for="current-password" class="form-label">Ancien mot de passe</label>
                                        <input id="current-password" name="current_password" type="password"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3">
                                        <label for="new-password" class="form-label">Nouveau mot de passe</label>
                                        <input id="new-password" name="new_password" type="password"
                                            class="form-control" required>
                                    </div>

                                    <div class="mt-3">
                                        <label for="confirm-password" class="form-label">Confirmer le nouveau mot de
                                            passe</label>
                                        <input id="confirm-password" name="new_password_confirmation" type="password"
                                            class="form-control" required>
                                    </div>

                                </div>
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="submit" class="btn btn-primary w-20">Enregistrer</button>
                            </div>
                        </form>
                    </div>



                </div>
                <!-- END:  Modif passord -->

                <!-- BEGIN: Supprimer compte -->
                <div class="intro-y box col-span-12 2xl:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Supprimer le compte</h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                                data-tw-toggle="dropdown">
                                <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                            </a>

                        </div>

                    </div>
                    <div class="p-5">
                        <form method="POST" action="{{ route('users.update') }}">

                            <div class="flex justify-end mt-4">
                                <button type="submit" class="btn btn-primary w-20 mr-auto bg-danger">Supprimer</button>


                            </div>
                        </form>
                    </div>

                </div>
                <!-- END: Supprimer compte -->




            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

@endsection
