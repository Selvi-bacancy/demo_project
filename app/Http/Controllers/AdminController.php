<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     
    protected function basic(Request $req)
    {
        //Auth::user()->name;
    $email = Auth::user()->email; 
    $req->session()->put('email',$email);

    $admin = DB::select("select * from users where email= ? && role= 0",[$email]);
    $users = DB::select("select * from users where role= 1");
    $products = DB::select("select *from product");

    return view('admin',
    ['admin'=>$admin,
     'users'=>$users,
     'products'=>$products
    ]);

    }
    

    //edit admin 
    protected function edit_admin(Request $req)
    {
        $id = $req->id;
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
      
        $query = DB::insert("update users set name= ?, email=?, password=? where id = ?",[$name,$email,$password,$id] );
        if($query)
        {
            echo " <script>alert('Deatils updated');window.location.href='admin'</script> ";
            $req->session()->put('email',$email);

        }
        else
        {
            echo " <script>alert('details NOT updated');window.location.href='admin'</script> ";
        }
    }

    //add products
    protected function add_product(Request $req)
    {
        $name = $req->name;
        $colour = $req->colour;
        $quantity  = $req->quantity;
        $image = $req->file('image');
        $img = file_get_contents($image);
        $query = DB::insert("insert into product (name,colour,quantity,image) values(?,?,?,?)",[$name,$colour,$quantity,$img]);
        if($query)
        {
            echo " <script>alert('Product Added');window.location.href='admin'</script> ";
        }
        else
        {
            echo " <script>alert('Product NOT Added');window.location.href='admin'</script> ";
        }
    }

    //edit/delete products
    protected function delete_product(Request $req)
    {
        $pid = $req->pid;
        $query = DB::delete("delete from product where pid=?",[$pid]);
        if($query)
        {
            echo " <script>alert('Product deleted');window.location.href='admin'</script> ";
        }
        else
        {
            echo " <script>alert('Product NOT deleted');window.location.href='admin'</script> ";
        }
    }

    protected function edit_product(Request $req)
    {
        $pid = $req->pid;
        $product = DB::select("select *from product where pid = ?",[$pid]);
        return view("edit_product",
        [
            'product'=>$product
        ]);
    }
    
    protected function edit_product_submit(Request $req)
    {
        $pid = $req->pid;
        $name = $req->name;
        $colour = $req->colour;
        $quantity  = $req->quantity;
        $image = $req->file('image');
        $img = file_get_contents($image);
        $query = DB::insert("update product set name= ?, colour = ?, quantity = ?, image = ? where pid = ?",[$name,$colour,$quantity,$img, $pid] );
        if($query)
        {
            echo " <script>alert('Product updated');window.location.href='admin'</script> ";
        }
        else
        {
            echo " <script>alert('Product NOT updated');window.location.href='admin'</script> ";
        }
    }

    //disable user
}
