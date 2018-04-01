<?php
/**
 * Created by PhpStorm.
 * User: sana
 * Date: 18/02/2018
 * Time: 18:36
 */

namespace App\Http\Controllers;
use App\Transport_type;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $types = Transport_type::all();

        return view('admin.types.index', compact('types'));

    }

    public function create() {

        return view('admin.types.create');

    }

    public function store(Request $request) {

        $this->validate($request, [
            'transport_name'=> 'required',


        ]);
        $type = Transport_type::create($request->all());


        return redirect()->route('types.show', $type);

    }

    public function show($id) {


        $type =  Transport_type::findOrFail($id);

        return view('admin.types.show', compact('type'));

    }

    public function edit($id) {

        $type =  Transport_type::findOrFail($id);

        return view('admin.types.edit', compact('type'));

    }

    public function update(Request $request, $id) {

        $type =  Transport_type::findOrFail($id);

        $type->fill($request->all());
        $type->save();

        return redirect()->route('types.show', $type->id);

    }

    public function delete($id) {

        $type =  Transport_type::findOrFail($id);
        $type->delete();

        return redirect()->route('types.index');

    }



}