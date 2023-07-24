<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show()
    {
        $data = Role::all();
        return view('Role.show', compact('data'));
    }
    public function add()
    {
        return view('Role.add');
    }
    public function addRole(Request $req)
    {
        $valid = $req->validate([
            'role' => 'required|min:3|max:30',
        ]);
        if ($valid) {
            $data = new Role();
            $data->role = $req->role;
            $data->save();
            return redirect('/showRole');
        } else {
            return back()->with("error", "some error is their");
        }
        return redirect('/showRole');
    }
    public function edit($id)
    {       
        $data = Role::all()->where('id', $id)->first();
        return view('Role.edit', compact('data'));
    }
    public function update(Request $req){
        $validateass = $req->validate([
            'role' => 'required',
        ]);
        if ($validateass) {
            $data = Role::where('id', $req->pid)->update([
                'role' => $req->role,
            ]);
        }
        return redirect('/showRole');
    }

    public function delete($id)
    {
        
        $data = RoleUser::where('role_id',$id)->get();
        //return $data;
        if($data->count() > 0)
        {
            return back()->with('error','Role cannot be deleted as User available');
        }
        else
        {
            Role::where('id',$id)->delete();
            RoleUser::where('role_id',$id)->delete();
            return back()->with('success','Role deleted');
        }
        
    }
}
