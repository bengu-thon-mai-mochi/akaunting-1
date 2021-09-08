@extends('layouts.modules')

@section('title', trans('modules.api_key'))

@section('content')
@endsection

@push('scripts_start')
    <script src="{{ asset('public/js/modules/apps.js?v=' . version('short')) }}"></script>
@endpush
