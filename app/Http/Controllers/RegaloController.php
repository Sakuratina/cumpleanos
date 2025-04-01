<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegaloRequest;
use App\Models\Regalo;
use Illuminate\Http\Request;

class RegaloController extends Controller
{
    public function index()
    {
        $regalos = Regalo::with('user')->paginate();
        return view('regalo.index', ['regalos' => $regalos]);
    }

    public function create()
    {
        return view('regalo.edit-add');
    }

    public function store(RegaloRequest $request)
    {
        $regalo = new Regalo();
        $regalo->fill($request->validated());
        $regalo->user()->associate($request->user());
        $regalo->lista_regalo_id = 1; //TODO: Usar una lista de verdad o no usar listas
        $regalo->save();

        return redirect()->route('regalo.index')->withInput();
    }

    public function regalar(Regalo $regalo)
    {
        $regalo->user()->associate(auth()->user());
        $regalo->save();
        return redirect()->route('regalo.index')->withInput();
    }

    public function edit(Regalo $regalo)
    {
        return view('regalo.edit-add', compact('regalo'));
    }

    public function update(Request $request, Regalo $regalo)
    {
        $regalo->update($request->all());
        return redirect()->route('regalo.index')->withInput();
    }

    public function destroy(Regalo $regalo)
    {
        $regalo->delete();

        return redirect()->route('regalo.index')->withInput();
    }
}
