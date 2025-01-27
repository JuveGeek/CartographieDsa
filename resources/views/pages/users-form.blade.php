@extends('../layout/' . $layout)

@section('subhead')
    <title>Formulaire d'enregistrement des utilisateurs</title>
@endsection

@section('subcontent')
    <form action="{{ route('users.store') }}" method="POST">
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
                            <input id="name" type="text" name="name" class="form-control" placeholder="John" required>
                        </div>

                        <div class="input-form mt-3">
                            <label for="firstname" class="form-label">Prénom</label>
                            <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Doe" required>
                        </div>

                        <div class="input-form mt-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" type="password" name="password" class="form-control" placeholder="secret" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div class="p-5">
                        <div class="input-form">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                        </div>

                        <div class="input-form mt-3">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input id="tel" type="number" name="tel" class="form-control" placeholder="62745337" required>
                        </div>

                        <div class="input-form mt-3">
                            <label for="role" class="form-label">Rôle</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Sélectionner un rôle</option>
                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
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
