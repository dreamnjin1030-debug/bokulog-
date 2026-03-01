<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        $gyms = Gym::withCount('boxers')->get();

        return view('gyms.index', compact('gyms'));
    }

    public function show(Gym $gym)
    {
        $gym->load('boxers');

        return view('gyms.show', compact('gym'));
    }
}
