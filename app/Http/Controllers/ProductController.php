<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        $data = Product::all();
        return view('Product.show', compact('data'));
    }
    public function add()
    {
        return view('Product.add');
    }
    public function cat()
    {    
        $data = Categorie::all();
        return view('Product.add',compact('data'));
    }
    // id, category_id, name, price, image, description, sku, manufactured_date, expiry_date
    public function addProduct(Request $req)
    {
        $valid = $req->validate([
            'name' => 'required|min:3|max:30',
            'price' => 'required|min:3|max:20',
            'image' => 'required',
            'description' => 'required|min:3|max:30',
            'sku' => 'required|min:3|max:30',
            'manufactured_date' => 'required',
            'expiry_date' => 'required',
        ]);
        if ($valid) {
            $filename = "Image-" . time() . "." . $req->image->extension();
            if ($req->image->move(public_path('/uploads'), $filename)) {
                $data = new Product();
                $data->name = $req->name;
                $data->price = $req->price;
                $data->category_id = $req->category_id;
                $data->description = $req->description;
                $data->sku = $req->sku;
                $data->manufactured_date = $req->manufactured_date;
                $data->expiry_date = $req->expiry_date;
                $data->image = $filename;

                if($data->save()){
                //    return $req;
                    return back()->with("success", "your asset product is store");
                    // return redirect('/showProduct');
                }else{
                    return back()->with("error", "Data not addded.");
                }
            }else{
                return back()->with("success", "image not uploaded.");
            }
        } 
    }

    public function edit($id)
    {       
        $sel=Categorie::all();
        $data = Product::all()->where('id', $id)->first();
        return view('Product.edit', compact('sel','data'));
    }
    public function update(Request $req){
        $validate = $req->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'sku' => 'required',
            'manufactured_date' => 'required',
            'expiry_date' => 'required',
        ]);

        if ($validate) {
            $file = $req->file('image');
            $dest = public_path('/uploads');
           // $filename =  $req->image->getClientOriginalName();
            $filename = "Image-".rand()."-"  . time() . "." . $file->extension();
            $file->move($dest, $filename);

            $data = Product::where('id', $req->pid)->update([
                'name' => $req->name,
                'price' => $req->price,
                'category_id' => $req->category_id,
                'image' => $filename,
                'description' => $req->description,
                'sku' => $req->sku,
                'manufactured_date' => $req->manufactured_date,
                'expiry_date' => $req->expiry_date,
            ]);
        }
        return redirect('/showProduct');
    }

    public function delete($id)
    {
        $data = Product::find($id)->delete();
        return redirect('/showProduct');
    }
}
