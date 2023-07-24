<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showGuestProfile()
    {
        $id = Auth::user()->id;
        $data = User::all()->where('id', $id)->first();
        return view('user.userProfile', compact('data'));
    }
    public function editProfile(){
        $id = Auth::user()->id;
        $users = User::find($id);
        $gender = User::select('gender')->where('id',$id)->get();
        $data=RoleUser::where('user_id',$id)->first();
        // return $id;
        $cc = $data['role_id'];
        $data = Role::where('id',$cc)->first();
        $rolenam = $data['role'];
        $role = Role::all();
        return view('user.updateProfile',['data'=>$users],['role'=>$role])->with('rolenam',$rolenam)->with('id',$cc)->with('gender',$gender);
    }
    public function updateProfile(Request $req)
    {
        $image = $req->file('avatar');
        if(!empty($image))
        {
            $dest=public_path('/uploads');
            $filename="Image-".rand()."-".time().".".$image->extension();
            if($image->move($dest,$filename))
            {
                User::where('id',$req->pid)->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'username' => $req->username,
                    'password' => Hash::make($req->password),
                    'birthdate' => $req->birthdate,
                    'address' => $req->address,
                    'gender' => $req->gender,
                    'hobbies' => $req->hobbies,
                    'avatar' => $filename,
                 ]);
            }
            else
            {
                    $path=public_path()."uploads/".$filename;
                    unlink($path);
                    return back()->with('error','Image Not Added');
            }
        }
        else{
            User::where('id',$req->pid)->update([
                'name' => $req->name,
                'email' => $req->email,
                'username' => $req->username,
                'password' => Hash::make($req->password),
                'birthdate' => $req->birthdate,
                'address' => $req->address,
                'gender' => $req->gender,
                'hobbies' => $req->hobbies,
             ]);
        }
        return redirect('/showGuestProfile');
    }


    // admin side
    public function show()
    {
        $data = User::all();
        return view('user.show', compact('data'));
    }

    public function adduser()
    {
        $data = Role::all();
        return view('User.add', compact('data'));
    }
    // name, email, password, avatar, birthdate, address, gender, hobbies
    public function addUserinsert(Request $req)
    {
        // return $req;
        $valid = $req->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required',
            'username' => 'required|min:3|max:30',
            'password' => 'required',
            'cpassword' => 'required',
            'avatar' => 'required',
            'birthdate' => 'required',
            'address' => 'required|min:3|max:30',
            'gender' => 'required',
            'hobbies' => 'required|min:3|max:30',
        ]);
        if ($valid) {
            $filename = "Image-" . time() . "." . $req->avatar->extension();
            if ($req->password == $req->cpassword) {
                if ($req->avatar->move(public_path('/uploads'), $filename)) {
                    $data = new User();
                    $data->name = $req->name;
                    $data->email = $req->email;
                    $data->username = $req->username;
                    $data->password = Hash::make($req->password);
                    $data->avatar = $filename;
                    $data->birthdate = $req->birthdate;
                    $data->address = $req->address;
                    $data->gender = $req->gender;
                    $data->hobbies = $req->hobbies;
                    if ($data->save()) {
                        $id = User::where('email', $req->email)->first();
                        $roledata = new RoleUser();
                        $roledata->user_id = $id['id'];
                        $roledata->role_id = $req->role_id;

                        $roledata->save();
                        return back()->with("success", "your User is store");
                        // return redirect('/showProduct');
                    } else {
                        return back()->with("error", "Data not addded.");
                    }
                } else {
                    return back()->with("success", "image not uploaded.");
                }
            } else {
                return back()->with("error", "password and confirm password should match.");
            }
        }
    }

    public function edit($id)
    {       
        $users = User::find($id);
        $gender = User::select('gender')->where('id',$id)->get();
        $data=RoleUser::where('user_id',$id)->first();
        // return $id;
        $cc = $data['role_id'];
        $data = Role::where('id',$cc)->first();
        $rolenam = $data['role'];
        $role = Role::all();
        return view('user.edit',['data'=>$users],['role'=>$role])->with('rolenam',$rolenam)->with('id',$cc)->with('gender',$gender);
    }
    public function update(Request $req)
    {
        $image = $req->file('avatar');
        if(!empty($image))
        {
            $dest=public_path('/uploads');
            $filename="Image-".rand()."-".time().".".$image->extension();
            if($image->move($dest,$filename))
            {
                User::where('id',$req->pid)->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'username' => $req->username,
                    'password' => Hash::make($req->password),
                    'birthdate' => $req->birthdate,
                    'address' => $req->address,
                    'gender' => $req->gender,
                    'hobbies' => $req->hobbies,
                    'avatar' => $filename,
                 ]);
            }
            else
            {
                    $path=public_path()."uploads/".$filename;
                    unlink($path);
                    return back()->with('error','Image Not Added');
            }
        }
        else{
            User::where('id',$req->pid)->update([
                'name' => $req->name,
                'email' => $req->email,
                'username' => $req->username,
                'password' => Hash::make($req->password),
                'birthdate' => $req->birthdate,
                'address' => $req->address,
                'gender' => $req->gender,
                'hobbies' => $req->hobbies,
             ]);
        }
        return redirect('/showuser');
    }


    public function delete($id)
    {
        $user=User::find($id);
        RoleUser::where('user_id',$id)->delete();
        if($user->delete())
        {
            return back()->with('success',' User deleted successfully');
        }
        else
        {
          return "User not deleted";
        }
    }  
}
