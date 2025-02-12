@extends('../layout/' . $layout)

@section('subhead')
    <title>Formulaire d'enregistrement des utilisateurs</title>
@endsection

@section('subcontent')
    <form action="{{ route('users.store') }}" method="POST" id="registration-form">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">Formulaire d'enregistrement des utilisateurs</h2>
        </div>


        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div class="p-5">
                        @csrf

                        <div class="input-form">
                            <label for="name" class="form-label">Nom</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="John"
                                required>
                            @if ($errors->has('name'))
                                <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="input-form mt-3">
                            <label for="firstname" class="form-label">Prénom</label>
                            <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Doe"
                                required>
                            @if ($errors->has('firstname'))
                                <div class="text-danger mt-2">{{ $errors->first('firstname') }}</div>
                            @endif
                        </div>

                        <div class="input-form mt-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" type="password" name="password" class="form-control"
                                placeholder="secret1234" required>
                        </div>

                        <div class="input-form mt-3">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="form-control" placeholder="secret1234" required>
                        </div>

                        <!-- Message d'erreur -->
                        <div id="password-error" class="text-danger mt-2" style="display: none;">
                            Les mots de passe ne correspondent pas.
                        </div>

                        @if ($errors->has('password'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('password') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div class="p-5">

                        <div class="input-form">
                            <label for="structure" class="form-label">Structure</label>
                            <input id="structure" type="text" name="structure" class="form-control" placeholder="ANPTIC"
                                required>
                            @if ($errors->has('structure'))
                                <div class="text-danger mt-2">{{ $errors->first('structure') }}</div>
                            @endif
                        </div>

                        <div class="input-form mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" class="form-control"
                                placeholder="example@gmail.com" required>
                            @if ($errors->has('email'))
                                <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                            @endif
                        </div>


                        <div class="input-form mt-3">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input id="tel" type="number" name="tel" class="form-control" placeholder="62745337"
                                required>
                            @if ($errors->has('tel'))
                                <div class="text-danger mt-2">{{ $errors->first('tel') }}</div>
                            @endif
                        </div>

                        <div class="input-form mt-3">
                            <label for="role" class="form-label">Rôle</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Sélectionner un rôle</option>
                                @foreach (\Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                                <div class="text-danger mt-2">{{ $errors->first('role') }}</div>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("registration-form");
        const password = document.getElementById("password");
        const passwordConfirmation = document.getElementById("password_confirmation");
        const errorMessage = document.getElementById("password-error");

        form.addEventListener("submit", function(event) {
            if (password.value !== passwordConfirmation.value) {
                event.preventDefault(); // Empêche l'envoi du formulaire
                errorMessage.style.display = "block";
            } else {
                errorMessage.style.display = "none";
            }
        });
    });
</script>
