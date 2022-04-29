<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;

/**
 * Class ExamenController
 * @package App\Http\Controllers
 */
class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examens = Examen::paginate();

        return view('examen.index', compact('examens'))
            ->with('i', (request()->input('page', 1) - 1) * $examens->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examen = new Examen();
        return view('examen.create', compact('examen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Examen::$rules);

        $examen = Examen::create($request->all());

        return redirect()->route('examens.index')
            ->with('success', 'Examen created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examen = Examen::find($id);

        return view('examen.show', compact('examen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examen = Examen::find($id);

        return view('examen.edit', compact('examen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Examen $examen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examen $examen)
    {
        request()->validate(Examen::$rules);

        $examen->update($request->all());

        return redirect()->route('examens.index')
            ->with('success', 'Examen updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $examen = Examen::find($id)->delete();

        return redirect()->route('examens.index')
            ->with('success', 'Examen deleted successfully');
    }
}
