@extends('layout.app')


@section('title', 'Calendar')

@section('styles')
    
@endsection

@section('main-content')
    @include('ui.calendar.calendar-ui')
@endsection

@section('scripts')
    <script src="{{ asset('js/modules/calendar.js') }}"></script>
@endsection