<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Haal de data op
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalProducts = Product::count();

        // Data van vorige maand voor vergelijking
        $lastMonthUsers = User::where('created_at', '<=', now()->subMonth())->count();
        $lastMonthOrders = Order::where('created_at', '<=', now()->subMonth())->count();

        // Bereken groei percentages
        $userGrowth = $lastMonthUsers > 0
            ? round((($totalUsers - $lastMonthUsers) / $lastMonthUsers) * 100, 1)
            : 0;

        $orderGrowth = $lastMonthOrders > 0
            ? round((($totalOrders - $lastMonthOrders) / $lastMonthOrders) * 100, 1)
            : 0;

        // Sessions data
        $activeSessions = DB::table('sessions')
            ->where('last_activity', '>=', now()->subMinutes(5))
            ->count();
        $totalSessions = DB::table('sessions')->count();
        $sessionPercentage = $totalSessions > 0
            ? round(($activeSessions / $totalSessions) * 100, 1)
            : 0;

        return view('dashboard', compact(
            'totalUsers',
            'totalOrders',
            'totalProducts',
            'lastMonthUsers',
            'lastMonthOrders',
            'userGrowth',
            'orderGrowth',
            'activeSessions',
            'totalSessions',
            'sessionPercentage'
        ));
    }
}
