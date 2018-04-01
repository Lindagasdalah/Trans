<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 15/02/2018
 * Time: 21:51
 */

namespace App\Http\Controllers;
use App\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{

    public function index() {

        $agences = Agence::all();

        return view('admin.agences.index', compact('agences'));

    }

    public function create() {

        return view('admin.agences.create');

    }

    public function store(Request $request) {

        $this->validate($request, [

            'agence_name'=> 'required',
            'agence_adresse'=> 'required'
        ]);

        $agence = Agence::create($request->all());

        return redirect()->route('agences.show', $agence->id);

    }

    public function show($id) {


        $agence = Agence::findOrFail($id);

        return view('admin.agences.show', compact('agence'));

    }

    public function edit($id) {

        $agence = Agence::findOrFail($id);

        return view('admin.agences.edit', compact('agence'));

    }

    public function update(Request $request, $id) {

        $agence = Agence::findOrFail($id);

        $agence->fill($request->all());
        $agence->save();

        return redirect()->agence('agences.show', $agence->id);

    }

    public function delete($id) {

        $agence = Agence::findOrFail($id);
        $agence->delete();
        return redirect()->route ('agences.index');

    }
}