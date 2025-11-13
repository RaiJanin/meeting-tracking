<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Concern;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Filters
        $agendaFilter = $request->input('agenda_id');
        $responsibleFilter = $request->input('responsible_person_id');

        // Base query for concerns
        $concernQuery = Concern::query()
            ->with(['agenda', 'responsible']);

        if ($agendaFilter) {
            $concernQuery->where('agenda_id', $agendaFilter);
        }

        if ($responsibleFilter) {
            $concernQuery->where('responsible_person_id', $responsibleFilter);
        }

        // Fetch data
        $totalAgendas = Agenda::count();
        $totalConcerns = $concernQuery->count();
        $openConcerns = $concernQuery->where('status', '!=', 'closed')->count();
        $closedConcerns = $concernQuery->where('status', 'closed')->count();

        // Concerns by status summary
        $concernsByStatus = Concern::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        // Dropdown data
        $agendas = Agenda::select('agenda_id', 'title')->get();
        $responsiblePersons = User::select('id', 'name')->get();

        return view('dashboard.index', compact(
            'totalAgendas',
            'totalConcerns',
            'openConcerns',
            'closedConcerns',
            'concernsByStatus',
            'agendas',
            'responsiblePersons'
        ));
    }
}
