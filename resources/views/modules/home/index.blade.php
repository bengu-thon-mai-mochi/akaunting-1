@extends('layouts.modules')

@section('content')
@endsection

@section('footer')
@endsection

@push('scripts_start')
    <script src="{{ asset('public/js/modules/apps.js?v=' . version('short')) }}"></script>
@endpush
