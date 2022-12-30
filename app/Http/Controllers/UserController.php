<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(){
        $dataUser = User::paginate(10);
        return view('user.index', compact('dataUser'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nim' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'hak_akses' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
        ]);

        $user = User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'hak_akses' => $request->hak_akses,
            'status' => $request->status,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(User $user){
        return view('user.show',compact('user'));
    }

    public function edit(User $user){
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'hak_akses' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->hak_akses = $request->hak_akses;
        $user->no_hp = $request->no_hp;
        $user->status = $request->status;
        $user->update();

        return redirect()->route('user.index')
            ->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }
}

