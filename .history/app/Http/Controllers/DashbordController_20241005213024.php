<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InfoCom;
use App\Models\Residence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function index()
    {
        return view('dashboard.index'); // Assurez-vous que le chemin de la vue est correct
    }


}