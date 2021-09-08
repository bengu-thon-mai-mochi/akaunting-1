@extends('layouts.modules')
@section('title', trans_choice('general.modules', 2))

@section('content')
@endsection

@push('scripts_start')
    <script src="{{ asset('public/js/modules/apps.js?v=' . version('short')) }}"></script>
@endpush
