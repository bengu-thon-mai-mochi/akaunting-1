<head>
    @stack('head_start')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8; charset=ISO-8859-1"/>

     <style>
            .menu-scroll::-webkit-scrollbar {
                width: 6px;
            }

            .menu-scroll::-webkit-scrollbar-track {
                border-radius: 10px;
                background-color: gray;
            }

            .menu-scroll::-webkit-scrollbar-thumb {
                border-radius: 10px;
                background-color: #EDF0FC;
            }

            .js-menu.fixed-left+.main-content {
                margin-left: 0 !important;
            }

            details[open] summary ~ * {
                animation-name: bounce;
                animation-duration: 0.7s;
              // animation: cubic-bezier(0.4, 0, 0.2, 1) 0.20s ease-in-out
            }

            @keyframes rotate {
            0% {
                transform: rotate(0);
            }
            100% {
                transform: rotate(360deg);
            }
}
        </style>

    <title>@yield('title') - @setting('company.name')</title>

    <base href="{{ config('app.url') . '/' }}">

    @include('partials.pwa.pwa')

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('public/img/favicon.ico') }}" type="image/png">

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}" type="text/css">

    @stack('css')

    @stack('stylesheet')

    @livewireStyles

    <script type="text/javascript"><!--
        var url = '{{ url("/" . company_id()) }}';
        var app_url = '{{ config("app.url") }}';
        var aka_currency = {!! !empty($currency) ? $currency : 'false' !!};
    //--></script>

    @stack('js')

    <script type="text/javascript"><!--
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;

        var flash_notification = {!! (session()->has('flash_notification')) ? json_encode(session()->get('flash_notification')) : 'false' !!};
    //--></script>

    {{ session()->forget('flash_notification') }}

    @stack('scripts')
       <script  src="node_modules/ionicons/dist/ionicons.js"></script>
    @stack('head_end')
</head>
