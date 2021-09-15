@extends('layouts.modules')

@section('content')
@endsection

@push('scripts_start')
    <script src="{{ asset('public/js/modules/apps.js?v=' . version('short')) }}"></script>


        <script>
         var app_categories = {{ json_encode($categories) }};
        </script>
@endpush
