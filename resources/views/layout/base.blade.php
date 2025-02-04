<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="{{ $dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.png') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />

    <!-- Autres liens CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Personnaliser le bouton "OK" avec un fond noir et du texte blanc */
        .swal2-confirm.btn-black {
            background-color: #000 !important; /* Fond noir */
            color: #fff !important; /* Texte blanc */
            border: none; /* Enlever la bordure */
        }

        .swal2-confirm.btn-black:hover {
            background-color: #333 !important; /* Fond gris foncé au survol */
        }
    </style>


    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

</html>
