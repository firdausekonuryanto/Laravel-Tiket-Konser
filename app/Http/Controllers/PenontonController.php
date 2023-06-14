<?php

namespace App\Http\Controllers;

use App\Models\Penonton;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class PenontonController extends Controller
{
    public function index()
    {
        $penonton = Penonton::all();

        return View::make('penonton.index')
            ->with('penonton', $penonton, 'title', 'Halaman Penonton');
    }

    public function create()
    {
        return View::make('penonton.create');
    }

    public function store(Request $request)
    {
        $validationData_Penonton =  $request->validate([
            'name'       => 'required',
            'gender'       => 'required',
            'address'       => ['required', 'min:3'],
            'phone'       => 'required:numeric',
            'email'      => 'required|email',
            'username'      => 'required',
            'password'      => 'required',
        ]);

        $id = DB::select("SHOW TABLE STATUS LIKE 'users'");
        $next_id = $id[0]->Auto_increment;

        $validationData_Penonton['id_user'] = $next_id;
        $validationData_Penonton['level_user'] = 0;

        Penonton::create($validationData_Penonton);
        User::create(
            [
                'username'      => $validationData_Penonton['username'],
                'password'      => $validationData_Penonton['password']
            ]
        );

        Session::flash('message', 'Successfully created penonton!');
        return Redirect::to('login');
    }

    public function show($id)
    {
        $penonton = Penonton::find($id);

        return View::make('penonton.show')
            ->with('penonton', $penonton);
    }

    public function edit($id)
    {
        $penonton = Penonton::find($id);

        return View::make('penonton.edit')
            ->with('penonton', $penonton);
    }

    public function update(Request $request, string $id)
    {
        $validationData =  $request->validate([
            'name'       => 'required',
            'gender'       => 'required',
            'address'       => ['required', 'min:3'],
            'phone'       => 'required:numeric',
            'email'      => 'required|email'
        ]);

        Penonton::where('id', $id)->update($validationData);

        Session::flash('message', 'Successfully updated shark!');
        return Redirect::to('penonton');
    }

    public function destroy($id)
    {
        $penonton = Penonton::find($id);
        $penonton->delete();

        Session::flash('message', 'Successfully deleted the penonton!');
        return Redirect::to('penonton');
    }
}
