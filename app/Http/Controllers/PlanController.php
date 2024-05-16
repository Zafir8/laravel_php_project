<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller {
    public function index() {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    public function home() {
        $plans = Plan::all();
        return view('home', compact('plans'));
    }
}
