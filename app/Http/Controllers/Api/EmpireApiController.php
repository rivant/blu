<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empire;

class EmpireApiController extends Controller
{
  public function index()
  {
    $empires = Empire::with('release')->get();
    return response()->json($empires);
  }
}
