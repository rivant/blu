<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empire;
use App\Models\Release;
use Inertia\Inertia;

class EmpireController extends Controller
{
  public function index()
  {
    $empires = Empire::with('release')->orderBy('name')->get();

    return Inertia::render('Empires/Index', [
      'empires' => $empires,
      'success' => session('success')
    ]);
  }
  
  public function show(Empire $empire)
  {
    $empire->load('release');

    return Inertia::render('Empires/Show', [
      'empire' => $empire,
      'success' => session('success')
    ]);
  }

  public function create()
{
    $releases = Release::select('id', 'name', 'release_date')->get();

    return Inertia::render('Empires/Create', [
      'releases' => $releases,
    ]);
}

  public function store(Request $request)
  {
    $empire = Empire::create([
      'name' => $request['name'],
      'architecture' => $request['architecture'],
      'continent' => $request['continent'],
      'focus' => $request['focus'],
      'unique_units' => $request['unique_units'],
      'unique_technologies' => $request['unique_technologies'],
      'unique_buildings' => $request['unique_buildings'],
      'release_id' => $request['release_id'],
    ]);

    return redirect()->route('empires.show', ['empire' => $empire->id])->with('success', "Empire {$empire['name']} added");
  }

  public function edit(Empire $empire)
  {
      return Inertia::render('Empires/Edit', [
        'empire' => $empire,
      ]);
  }
  
  public function update(Request $request, Empire $empire)
  {
    $empire->update([
      'name' => $request['name'],
      'architecture' => $request['architecture'],
      'continent' => $request['continent'],
      'focus' => $request['focus'],
      'unique_units' => $request['unique_units'],
      'unique_technologies' => $request['unique_technologies'],
      'unique_buildings' => $request['unique_buildings'],
      'release_id' => $request['release_id'],
    ]);

    return redirect()->route('empires.show', ['empire' => $empire->id])->with('success', "{$empire['name']} Empire updated");
  }
  
  public function destroy(Empire $empire)
  {
    Empire::destroy($empire->id);

    return redirect()->route('empires.index')->with('success', "{$empire['name']} Empire removed");
  }
}

