@section('content')
@endsection

@push('scripts_start')
    <script src="{{ asset('public/js/modules/apps.js?v=' . version('short')) }}"></script>
@endpush
