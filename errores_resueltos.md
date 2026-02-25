<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    // Método 1, error al paginar linea 13, no existe paginate en eloquent con all(), hay que usar uno que permita la paginacion
    public function index()
    {
        $albums = Album::orderByDesc('created_at')->paginate(10);
        return view('albums.index', compact('albums'));
    }
    // Método 2, aqui hay un error en la condicion de autorizacion linea 20, falta negar que no sea el isAdmin
    public function update(Request $request, Album $album)
    {                               
        if (auth()->id() !== $album->user_id || !auth()->user()->isAdmin()) {
            abort(403);
        }

        $album->update($request->validated());

        return redirect()->route('albums.show', $album)
            ->with('success', 'Álbum actualizado.');
    }

    // Método 3, error con devolver, hay que incluir el tipo que vuelve en este caso Veiw linea 32
    public function show(Album $album): View
    {
        $reviews = $album->reviews()->orderBy('created_at', 'desc')->get();
        return view('albums.show', compact('album'));
    }
}

//error 1: se encuentra en metodo 1
//error 2: se encuentra en metodo 2
//error 3: se encunetra en metodo 3
