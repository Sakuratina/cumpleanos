<?php

namespace App\Http\Controllers;

use App\Models\Invitado;
use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    public function index()
    {
        $invitados = Invitado::with('user')->paginate(100);

        $asiste = Invitado::where('user_id', auth()->id())->exists();

        return view('invitados.index', ['invitados' => $invitados, 'asiste' => $asiste]);
    }


    public function apuntarse()
    {
        $invite = new Invitado();
        $invite->user_id = auth()->id();
        $invite->save();

        return redirect()->route('invitados.index');
    }

    public function desapuntarse()
    {
        $user = auth()->user();
        Invitado::where('user_id', $user->id)->delete();

        return redirect()->route('invitados.index');
    }
}
