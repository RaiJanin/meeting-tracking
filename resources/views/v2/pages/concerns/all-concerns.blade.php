@extends('v2.layout.app')


@section('title', 'All Concerns')

@section('styles')
    
@endsection

@section('main-content')
    @include('v2.ui.concerns.all-concerns')
@endsection

@section('scripts')
    <script src="{{ asset('js/modules/concernLoad.js') }}"></script>
@endsection