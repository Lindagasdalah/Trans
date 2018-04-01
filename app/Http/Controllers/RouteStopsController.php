<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 12/03/2018
 * Time: 10:41
 */

namespace App\Http\Controllers;


use App\RouteStops;
use App\Stop;

class RouteStopsController extends Controller
{
    public function index() {

        $routeStops = RouteStops::all();

        return view('admin.routeStops.index', compact('routeStops'));

    }

    public function getStopsByTransport(Request $request)
    {
        $transport_id = $request->transport_id;
        $s= Stop::where('transport_id',$transport_id)->get();
        $Rs= RouteStops::wehre('stop_id',$s);
        $html ='';
        foreach($Rs as $routeStop) {
            $html.='<th>'.$routeStop->stop->stop_name.'</th>';
        }

        return response()->json(['html' =>$html ]);
    }

    public function show($id) {


        $routeStop = RouteStops::findOrFail($id);

        return view('admin.routeStops.show', compact('routeStop'));

    }

}