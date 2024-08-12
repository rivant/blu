<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Release;

class ReleaseApiController extends Controller
{
  public function index()
  {
    $releases = Release::with('empires')->get();
    return response()->json($releases);
  }
}
