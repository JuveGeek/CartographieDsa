@extends('../layout/' . $layout)

@section('subhead')
    <title>formulaire d'enregistremnte des instances</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto"> Instance Form</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- Bloc gauche -->
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Validation -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Informations personnelles</h2>
            </div>
            <div class="p-5">
                <!-- Commencez à ajouter des champs de formulaire pour le bloc gauche ici -->
                <form class="validate-form">
                <div class="input-form">
                                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                                    Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 2 characters</span>
                                                </label>
                                                <input id="validation-form-1" type="text" name="name" class="form-control" placeholder="John Legend" minlength="2" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row">
                                                    Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email address format</span>
                                                </label>
                                                <input id="validation-form-2" type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row">
                                                    Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 6 characters</span>
                                                </label>
                                                <input id="validation-form-3" type="password" name="password" class="form-control" placeholder="secret" minlength="6" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-4" class="form-label w-full flex flex-col sm:flex-row">
                                                    Age <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, integer only & maximum 3 characters</span>
                                                </label>
                                                <input id="validation-form-4" type="number" name="age" class="form-control" placeholder="21" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-5" class="form-label w-full flex flex-col sm:flex-row">
                                                    Profile URL <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Optional, URL format</span>
                                                </label>
                                                <input id="validation-form-5" type="url" name="url" class="form-control" placeholder="https://google.com">
                                            </div>
                                            <div id="radio" class="p-5">
                    <div class="preview">
                        <div>
                            <label>Vertical Radio Button</label>
                            <div class="form-check mt-2">
                                <input id="radio-switch-1" class="form-check-input" type="radio" name="vertical_radio_button" value="vertical-radio-chris-evans">
                                <label class="form-check-label" for="radio-switch-1">Chris Evans</label>
                            </div>
                            <div class="form-check mt-2">
                                <input id="radio-switch-2" class="form-check-input" type="radio" name="vertical_radio_button" value="vertical-radio-liam-neeson">
                                <label class="form-check-label" for="radio-switch-2">Liam Neeson</label>
                            </div>
                            <div class="form-check mt-2">
                                <input id="radio-switch-3" class="form-check-input" type="radio" name="vertical_radio_button" value="vertical-radio-daniel-craig">
                                <label class="form-check-label" for="radio-switch-3">Daniel Craig</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Horizontal Radio Button</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="horizontal_radio_button" value="horizontal-radio-chris-evans">
                                    <label class="form-check-label" for="radio-switch-4">Chris Evans</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="horizontal_radio_button" value="horizontal-radio-liam-neeson">
                                    <label class="form-check-label" for="radio-switch-5">Liam Neeson</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="radio-switch-6" class="form-check-input" type="radio" name="horizontal_radio_button" value="horizontal-radio-daniel-craig">
                                    <label class="form-check-label" for="radio-switch-6">Daniel Craig</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-radio" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-radio" class="source-preview">
                                <code class="html">
                                    {{ str_replace('>', 'HTMLCloseTag', str_replace('<', 'HTMLOpenTag', '
                                        <div>
                                            <label>Vertical Radio Button</label>
                                            <div class="form-check mt-2">
                                                <input id="radio-switch-1" class="form-check-input" type="radio" name="vertical_radio_button" value="vertical-radio-chris-evans">
                                                <label class="form-check-label" for="radio-switch-1">Chris Evans</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input id="radio-switch-2" class="form-check-input" type="radio" name="vertical_radio_button" value="vertical-radio-liam-neeson">
                                                <label class="form-check-label" for="radio-switch-2">Liam Neeson</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input id="radio-switch-3" class="form-check-input" type="radio" name="vertical_radio_button" value="vertical-radio-daniel-craig">
                                                <label class="form-check-label" for="radio-switch-3">Daniel Craig</label>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Horizontal Radio Button</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="horizontal_radio_button" value="horizontal-radio-chris-evans">
                                                    <label class="form-check-label" for="radio-switch-4">Chris Evans</label>
                                                </div>
                                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="horizontal_radio_button" value="horizontal-radio-liam-neeson">
                                                    <label class="form-check-label" for="radio-switch-5">Liam Neeson</label>
                                                </div>
                                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                                    <input id="radio-switch-6" class="form-check-input" type="radio" name="horizontal_radio_button" value="horizontal-radio-daniel-craig">
                                                    <label class="form-check-label" for="radio-switch-6">Daniel Craig</label>
                                                </div>
                                            </div>
                                        </div>
                                    ')) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                                    Comment <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span>
                                                </label>
                                                <textarea id="validation-form-6" class="form-control" name="comment" placeholder="Type your comments" minlength="10" required></textarea>
                                            </div>
                </form>
            </div>
        </div>
        <!-- END: Form Validation -->
    </div>

    <!-- Bloc droit -->
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Validation -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Informations supplémentaires</h2>
            </div>
            <div class="p-5">
                <!-- Commencez à ajouter des champs de formulaire pour le bloc droit ici -->
                <form class="validate-form">
                    <div class="input-form">
                                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                                    Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 2 characters</span>
                                                </label>
                                                <input id="validation-form-1" type="text" name="name" class="form-control" placeholder="John Legend" minlength="2" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row">
                                                    Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email address format</span>
                                                </label>
                                                <input id="validation-form-2" type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row">
                                                    Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 6 characters</span>
                                                </label>
                                                <input id="validation-form-3" type="password" name="password" class="form-control" placeholder="secret" minlength="6" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-4" class="form-label w-full flex flex-col sm:flex-row">
                                                    Age <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, integer only & maximum 3 characters</span>
                                                </label>
                                                <input id="validation-form-4" type="number" name="age" class="form-control" placeholder="21" required>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-5" class="form-label w-full flex flex-col sm:flex-row">
                                                    Profile URL <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Optional, URL format</span>
                                                </label>
                                                <input id="validation-form-5" type="url" name="url" class="form-control" placeholder="https://google.com">
                                            </div>

                                            <div class="mt-3">
                            <label>Horizontal Checkbox</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input id="checkbox-switch-4" class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label" for="checkbox-switch-4">Chris Evans</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="checkbox-switch-5" class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label" for="checkbox-switch-5">Liam Neeson</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="checkbox-switch-6" class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label" for="checkbox-switch-6">Daniel Craig</label>
                                </div>
                            </div>
                        </div>


                        <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Select Options</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-5">Show example code</label>
                        <input id="show-example-5" data-target="#select-options" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="select-options" class="p-5">
                    <div class="preview">
                        <div class="flex flex-col sm:flex-row items-center">
                            <select class="form-select form-select-lg sm:mt-2 sm:mr-2" aria-label=".form-select-lg example">
                                <option>Chris Evans</option>
                                <option>Liam Neeson</option>
                                <option>Daniel Craig</option>
                            </select>
                            <select class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                <option>Chris Evans</option>
                                <option>Liam Neeson</option>
                                <option>Daniel Craig</option>
                            </select>
                            <select class="form-select form-select-sm mt-2" aria-label=".form-select-sm example">
                                <option>Chris Evans</option>
                                <option>Liam Neeson</option>
                                <option>Daniel Craig</option>
                            </select>
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-select-options" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-select-options" class="source-preview">
                                <code class="html">
                                    {{ str_replace('>', 'HTMLCloseTag', str_replace('<', 'HTMLOpenTag', '
                                        <div class="flex flex-col sm:flex-row items-center">
                                            <select class="form-select form-select-lg sm:mt-2 sm:mr-2" aria-label=".form-select-lg example">
                                                <option>Chris Evans</option>
                                                <option>Liam Neeson</option>
                                                <option>Daniel Craig</option>
                                            </select>
                                            <select class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                                                <option>Chris Evans</option>
                                                <option>Liam Neeson</option>
                                                <option>Daniel Craig</option>
                                            </select>
                                            <select class="form-select form-select-sm mt-2" aria-label=".form-select-sm example">
                                                <option>Chris Evans</option>
                                                <option>Liam Neeson</option>
                                                <option>Daniel Craig</option>
                                            </select>
                                        </div>
                                    ')) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                                    Comment <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span>
                                                </label>
                                                <textarea id="validation-form-6" class="form-control" name="comment" placeholder="Type your comments" minlength="10" required></textarea>
                                            </div>
                </form>
            </div>
        </div>
        <!-- END: Form Validation -->
    </div>
</div>

<!-- Bouton d'enregistrement en bas -->
<div class="mt-5">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</div>


@endsection
