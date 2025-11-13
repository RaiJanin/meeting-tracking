@extends('v2.layout.content-layout')

    @section('content-head-text', 'Calendar')

    @section('content-head-buttons')
        
    @endsection

    @section('contents')
        <div class="grid grid-cols-3 gap-4">
            @include('v2.ui.calendar.months')
            <div class="border-2 border-gray-200 p-4 rounded-xl shadow-sm">
                <h2 class="text-xl font-bold text-gray-700 p-4">Today</h2>
            </div>
        </div>
    @endsection