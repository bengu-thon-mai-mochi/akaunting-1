@extends('layouts.modules')

@section('content')
@endsection

@push('scripts_start')
        <script>
         var app_categories = {!! $categories !!};
        </script>
    <script src="{{ asset('public/js/modules/apps.js?v=' . version('short')) }}"></script>
@endpush
