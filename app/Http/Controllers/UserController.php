<?php
/**
 * Created by PhpStorm.
 * User: sana
 * Date: 18/02/2018
 * Time: 13:21
 */

namespace App\Http\Controllers;


use App\User;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    public function create() {

        return view('admin.users.create');

    }

    public function store(Request $request) {

        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required'


        ]);
        //     $manager = Manager::findOrFail($id);


        $user = new user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('users.show', $user);

    }

    public function show($id) {


        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));

    }

    public function edit($id) {

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));

    }

    public function update(Request $request, $id) {

        $user = User::findOrFail($id);

        $user->fill($request->all());
        $user->save();

        return redirect()->route('users.show', $user->id);

    }

    public function delete($id) {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');

    }

}