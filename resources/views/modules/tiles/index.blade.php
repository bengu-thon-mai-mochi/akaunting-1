@extends('layouts.modules')

@section('content')
@endsection

@push('scripts_start')
 <script type="text/javascript">
         var app_categories = {!! json_encode($categories) !!};
         var module_translations = {!! json_encode($translations) !!};
    </script>

    <script src="{{ asset('public/js/modules/apps.js?v=' . version('short')) }}"></script>
    <script src="{{ asset('public/js/modules/apps.js?v=' . version('short')) }}"></script>
@endpush
