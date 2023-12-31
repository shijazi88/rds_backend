<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Subscription;
use Carbon\Carbon;
use App\Models\ClientUser;



class CancellationController extends Controller
{

    public function index(Request $request)
    {
        $branches = Branch::select('name_en', 'id')->get();
        $clientUsers = ClientUser::select('name', 'id')->get();
        // Add the search query to your query builder logic
        $cancelledSubscriptions = Subscription::whereNotNull('cancelled_by')
            ->where('status', 'cancelled')
            ->get()
            ->groupBy('cancelled_by')
            ->map(fn ($group) => $group->count());

        $createdSubscriptions = Subscription::whereNotNull('created_by')
            ->get()
            ->groupBy('created_by')
            ->map(fn ($group) => $group->count());

            $users = ClientUser::whereIn('id', $cancelledSubscriptions->keys())
            ->orWhereIn('id', $createdSubscriptions->keys())
            ->pluck('name', 'id');

        // Pass the data to your view
        return view('cancel-dashboard', compact('cancelledSubscriptions','users', 'createdSubscriptions','branches','clientUsers'));
    }
    
    public function getCancellationReport(Request $request)
    {
        $branches = Branch::select('name_en', 'id')->get();
        $clientUsers = ClientUser::select('name', 'id')->get();

        $cancelledSubscriptions = Subscription::whereNotNull('cancelled_by')
            ->where('status', 'cancelled');

            if ($request->filled('date-filter')) {
                // Apply date range filter
                $dateRange = $request->input('date-filter');
            
                if ($dateRange === 'today') {
                    $cancelledSubscriptions =  $cancelledSubscriptions->whereDate('created_at', Carbon::today());
                } elseif ($dateRange === 'last_week') {
                    $cancelledSubscriptions = $cancelledSubscriptions->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                } elseif ($dateRange === 'last_month') {
                    $cancelledSubscriptions=  $cancelledSubscriptions->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year);
                } elseif ($dateRange === 'last_year') {
                    $cancelledSubscriptions =$cancelledSubscriptions->whereYear('created_at', Carbon::now()->year);
                }
            }

            if ($request->filled('branch-filter')) {
                $branch = $request->input('branch-filter');
                // Apply date range filter
                $cancelledSubscriptions =  $cancelledSubscriptions->where('branch_id', $branch);
            }

            if ($request->filled('client-user-filter')) {
                // Apply date range filter
                $client_user_id = $request->input('client-user-filter');
                $cancelledSubscriptions = $cancelledSubscriptions->where('cancelled_by', $client_user_id);
            }
            $cancelledSubscriptions =  $cancelledSubscriptions->get()
            ->groupBy('cancelled_by')
            ->map(fn ($group) => $group->count());

        $createdSubscriptions = Subscription::whereNotNull('created_by');

        if ($request->filled('date-filter')) {
            // Apply date range filter
            $dateRange = $request->input('date-filter');
        
            if ($dateRange === 'today') {
                $createdSubscriptions = $createdSubscriptions->whereDate('created_at', Carbon::today());
            } elseif ($dateRange === 'last_week') {
                $createdSubscriptions = $createdSubscriptions->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            } elseif ($dateRange === 'last_month') {
                $createdSubscriptions =$createdSubscriptions->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year);
            } elseif ($dateRange === 'last_year') {
                $createdSubscriptions = $createdSubscriptions->whereYear('created_at', Carbon::now()->year);
            }
        }

        if ($request->filled('branch-filter')) {
            // Apply date range filter
            $branch = $request->input('branch-filter');
            $createdSubscriptions= $createdSubscriptions->where('branch_id', $branch);
        }

        if ($request->filled('client-user-filter')) {
            // Apply date range filter
            $client_user_id = $request->input('client-user-filter');
            $createdSubscriptions = $createdSubscriptions->where('created_by', $client_user_id);
        }
        $createdSubscriptions = $createdSubscriptions->get()
            ->groupBy('created_by')
            ->map(fn ($group) => $group->count());
        $users = ClientUser::whereIn('id', $cancelledSubscriptions->keys())
            ->orWhereIn('id', $createdSubscriptions->keys())
            ->pluck('name', 'id');
        return view('cancel-dashboard', compact('cancelledSubscriptions', 'createdSubscriptions', 'users','branches', 'clientUsers' ));
    }

}
