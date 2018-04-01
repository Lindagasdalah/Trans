<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 07/03/2018
 * Time: 10:49
 */

namespace App\Http\Controllers;


use App\Ligne;
use Illuminate\Http\Request;


class LigneController extends Controller
{

    public function index() {

        $lignes = Ligne::all();
        return view('admin.lignes.index', compact('lignes'));

    }

    public function create() {

        return view('admin.lignes.create');

    }
    public function getLignesByTransport(Request $request)
    {
        $transport_id = $request->transport_id;
       $l= Ligne::where('transport_id',$transport_id)->get();
        $html='<option value="">Select</option>';
       foreach($l as $ligne) {
           $html.='<option value="'.$ligne->id.'">'.$ligne->ligne_name.'</option>';
       }

        return response()->json(['html' =>$html ]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'ligne_name'=> 'required',

        ]);


       $ligne= new Ligne();
        $ligne->ligne_name=$request->ligne_name;
        $ligne->transport_id=$request->transport_id;
        $ligne->agence_id=$request->agence_id;
        //$ligne= Ligne::created($request->all());
       $ligne->save();
        return redirect()->route('lignes.show',$ligne);

    }

    public function show($id) {


        $ligne = Ligne::findOrFail($id);

        return view('admin.lignes.show', compact('ligne'));

    }

    public function edit($id) {

        $ligne = Ligne::findOrFail($id);

        return view('admin.lignes.edit', compact('ligne'));

    }

    public function update(Request $request, $id) {

        $ligne = Ligne::findOrFail($id);

        $ligne->fill($request->all());
        $ligne->transport_id=$request->transport_id;
        $ligne->agence_id=$request->agence_id;
        $ligne->save();

        return redirect()->route('lignes.show', $ligne->id);

    }

    public function delete($id) {

        $ligne = Ligne::findOrFail($id);
        $ligne->delete();

        return redirect()->route('lignes.index');

    }

}