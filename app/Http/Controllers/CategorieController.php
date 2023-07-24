<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function show()
    {
        $data = Categorie::all();
        return view('categorie.show', compact('data'));
    }
    public function add()
    {
        return view('categorie.add');
    }
    public function addCategorie(Request $req)
    {
        $valid = $req->validate([
            'title' => 'required|min:3|max:30',
        ]);
        if ($valid) {
            $data = new Categorie();
            $data->title = $req->title;
            $data->save();
            return redirect('/showCategorie');
        } else {
            return back()->with("error", "some error is their");
        }
        return redirect('/showCategorie');
    }
    public function edit($id)
    {       
        $data = Categorie::all()->where('id', $id)->first();
        return view('categorie.edit', compact('data'));
    }
    public function update(Request $req){
        $validateass = $req->validate([
            'title' => 'required',
        ]);
        if ($validateass) {
            $data = Categorie::where('id', $req->pid)->update([
                'title' => $req->title,
            ]);
        }
        return redirect('/showCategorie');
    }

    public function delete($id)
    {
        
        $data = Product::where('category_id',$id)->get();
        //return $data;
        if($data->count() > 0)
        {
            return back()->with('error','Category cannot be deleted as products available');
        }
        else
        {
            Categorie::where('id',$id)->delete();
            return back()->with('success','Category deleted');
        }
        
    }
}
