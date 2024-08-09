<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empire;

class EmpireController extends Controller
{
  public function index()
  {
    $empires = Empire::with('release')->get();
    return response()->json($empires);
  }
  
  public function show($id)
  {
      $empire = Empire::findOrFail($id);
      return response()->json($empire);
  }
  
  public function store(Request $request)
  {
      $empire = Empire::create($request->all());
      return response()->json($empire, 201);
  }
  
  public function update(Request $request, $id)
  {
      $empire = Empire::findOrFail($id);
      $empire->update($request->all());
      return response()->json($empire);
  }
  
  public function destroy($id)
  {
      Empire::destroy($id);
      return response()->json(null, 204);
  }
}
