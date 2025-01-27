@extends('../layout/base')

@section('body')

    <body class="py-5">
        @yield('content')
        @include('../layout/components/dark-mode-switcher')

        <!-- BEGIN: JS Assets-->

        <script src="{{ mix('dist/js/app.js') }}"></script>

        <!-- Includer le fichier JavaScript avec la logique des formulaires modaux -->

        <!-- END: JS Assets-->

        @yield('script')
    </body>
@endsection
