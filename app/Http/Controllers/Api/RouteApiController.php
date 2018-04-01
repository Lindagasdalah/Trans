<?php
/**
 * Created by PhpStorm.
 * User: khouloud
 * Date: 28/11/2017
 * Time: 20:38
 */

namespace App\Http\Controllers\Api;

use App\Route;
use Illuminate\Http\Request;

class RouteApiController
{

    public function index() {

        $routes =Route::all();
        return response()->json([
            "routes" => $routes
        ]);

    }


    public function store(Request $request) {

        $this->validate($request, [
            'route_Sname'=> 'required',
            'route_Lname'=> 'required',
            'route_desc'=> 'required',
            'route_type'=> 'required',
            'route_color'=> 'required|numeric',
            'route_txtColor'=> 'required'

        ]);

       // $manager = Manager::create($request->all());
        $route=Route::all($request->all());

        return response()->json([
            "message" => "route ajouté",
            "route" => $route
        ]);


    }

    public function show($id) {


        //$manager = Manager::findOrFail($id);
        $route= Route::findOrFail($id);

        return response()->json([
            "route" => $route
        ]);

        //return view('admin.products.show', compact('product'));

    }

    public function update(Request $request, $id) {

        $route = Route::findOrFail($id);

        $route->fill($request->all());
        $route->save();

        return redirect()->route('routes.show', $route->id);

    }

    public function delete($id) {

        $route = Route::findOrFail($id);
        $route->delete();

        return redirect()->route('routes.index');

    }
}

