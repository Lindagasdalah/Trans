<?php
/**
 * Created by PhpStorm.
 * User: sana
 * Date: 09/03/2018
 * Time: 10:22
 */

namespace App\Http\Controllers;
use App\Feries;
use Illuminate\Http\Request;

class FeriesController extends Controller
{
    public function index() {

        $feries = Feries::all();

        return view('admin.feries.index', compact('feries'));

    }

    public function create() {

        return view('admin.feries.create');

    }

    public function store(Request $request) {

        $this->validate($request, [
            'ferie_name'=> 'required',
            'ferie_date'=> 'required'
        ]);

        $ferie = Feries::create($request->all());

        return redirect()->route('feries.show', $ferie->id);

    }

    public function show($id) {


        $ferie = Feries::findOrFail($id);

        return view('admin.feries.show', compact('ferie'));

    }

    public function edit($id) {

        $ferie = Feries::findOrFail($id);

        return view('admin.feries.edit', compact('ferie'));

    }

    public function update(Request $request, $id) {

        $ferie = Feries::findOrFail($id);
        $ferie->fill($request->all());
        $ferie->save();

        return redirect()->route('feries.show', $ferie->id);

    }

    public function delete($id) {

        $ferie = Feries::findOrFail($id);
        $ferie->delete();

        return redirect()->route('feries.index');

    }
}