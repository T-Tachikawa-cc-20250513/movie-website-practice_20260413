<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cast;

class CastController extends Controller
{
    public function search(Request $request)
{
    return Cast::where('name', 'like', '%' . $request->keyword . '%')->get();
}
}
