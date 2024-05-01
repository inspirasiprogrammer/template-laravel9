<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Smstransaction;
use App\Models\Schedulemessage;
use App\Models\Contact;
use Carbon\Carbon;
use Auth;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
}
