<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApartmentController extends Controller
{
    public function index()
    {
        return view('select')->with('list', Apartment::paginate(6));
    }
}
