<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 15/02/2018
 * Time: 13:25
 */

namespace App\Http\Controllers;

use App\Route;
use App\Stop;
use Illuminate\Http\Request;

class RouteController extends Controller

{

    public function index() {

        $routes = Route::all();

        return view('admin.routes.index', compact('routes'));

    }

    public function create() {

        $stops = Stop::all();
        $latlng = Stop::get(['stop_name','stop_lat','stop_lon']);

        return view('admin.routes.create',['stops'=>$stops,'latlng'=>json_encode($latlng)]);
    }

    public function getRoutesByLigne(Request $request)
    {
        $ligne_id = $request->ligne_id;
        $r=Route::where('ligne_id',$ligne_id)->get();
        $html='<option value="">Select</option>';
        foreach ($r as $route){
            $html.='<option value="'.$route->id.'">'.$route->route_name.'</option>';
        }
        return response()->json(['html'=>$html]);

    }


    public function store(Request $request) {

        $this->validate($request, [
            'route_name'=> 'required',
            'route_color'=> 'required',
            'coordonne'=> 'required',

        ]);
        //     $manager = Manager::findOrFail($id);


        $route = new Route();

        $route->route_name = $request->route_name;
        $route->route_color = $request->route_color;
        $route->coordonne = $request->coordonne;
        $route->ligne_id = $request->ligne_id;
        $route->save();

        return redirect()->route('routes.show', $route);

    }

    public function show($id) {


        $route = Route::findOrFail($id);

        return view('admin.routes.show', compact('route'));

    }

    public function edit($id) {

        $route = Route::findOrFail($id);

        return view('admin.routes.edit', compact('route'));

    }

    public function update(Request $request, $id) {

        $route = Route::findOrFail($id);

        $route->fill($request->all());
        $route->ligne_id=$request->ligne_id;
        $route->save();

        return redirect()->route('routes.show', $route->id);

    }

    public function delete($id) {

        $route = Route::findOrFail($id);
        $route->delete();

        return redirect()->route('routes.index');

    }


}