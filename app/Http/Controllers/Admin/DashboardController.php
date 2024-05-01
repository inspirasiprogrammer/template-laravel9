<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Support;
use App\Models\User;
use App\Models\Device;
use App\Models\Plan;
use App\Models\Smstransaction;
use Carbon\Carbon;
use Http;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
