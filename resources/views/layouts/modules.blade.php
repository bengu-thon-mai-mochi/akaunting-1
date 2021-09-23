<html lang="{{ app()->getLocale() }}">

    @include('partials.modules.head')

    <body id="leftMenu" class="g-sidenav-show g-sidenav-pinned">
        @stack('body_start')

        @include('partials.admin.menu')

        <div class="main-content" id="panel">

            @include('partials.admin.navbar')
            <div id="main-body">
            </div>

            <div class="container-fluid content-layout">
                @include('partials.admin.footer')
            </div>
        </div>
        @stack('body_end')
        @include('partials.admin.scripts')
    </body>
</html>
