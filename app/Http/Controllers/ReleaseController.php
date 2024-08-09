<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Release;
use Inertia\Inertia;
use Inertia\Response;

class ReleaseController extends Controller
{
  public function index()
  {
    $releases = Release::with('empires')->get();
    return response()->json($releases);
  }

  public function show($id)
  {
      $release = Release::findOrFail($id);
      return response()->json($release);
  }

  public function store(Request $request)
  {
      $release = Release::create($request->all());
      return response()->json($release, 201);
  }

  public function update(Request $request, $id)
  {
      $release = Release::findOrFail($id);
      $release->update($request->all());
      return response()->json($release);
  }

  public function destroy($id)
  {
      Release::destroy($id);
      return response()->json(null, 204);
  }
}
