<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 01/03/2018
 * Time: 10:19
 */

namespace App\Http\Controllers;
use App\Trip;
use Illuminate\Http\Request;


class TripController extends Controller
{

    public function index() {

        $trips= Trip::all();

        return view('admin.trips.index', compact('trips'));

    }

    public function create() {

        return view('admin.trips.create');

    }
    //:*
    public function getTripsByRoute(Request $request)
    {
        $this->validate($request, [
            'route_id' => 'required'
        ]);
        $trips = Trip::where('route_id',$request->route_id)->get();
        return response()->json(['trips' => $trips]);
    }
    public function store(Request $request) {

        $this->validate($request, [
            'trip_name'=> 'required',
            'sens'=> 'required',
        ]);
        $trip = new Trip();
        $trip->trip_name = $request->trip_name;
        $trip->sens = $request->sens;
        $trip->service_id = $request->service_id;
        $trip->route_id = $request->route_id;
        $trip->save();
        return redirect()->route('stops_time.create', $trip);


    }

    public function show($id) {

        $trip= Trip::findOrFail($id);
        return redirect()->route('trips.show', $trip->id);

    }

    public function edit($id) {

        $trip = Trip::findOrFail($id);
        return view('admin.trips.edit', compact('trip'));
    }

    public function update(Request $request, $id) {

        $trip = Trip::findOrFail($id);
        $trip->fill($request->all());
        $trip->service_id = $request->service_id;
        $trip->route_id = $request->route_id;
        $trip->save();

        return redirect()->route('trips.show',$trip->id);

    }

    public function delete($id) {

        $trip = Trip::findOrFail($id);
        $trip->delete();

        return response()->json(['status'=>true]);

    }

}