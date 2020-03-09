<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data=DB::table('Products')
        ->join('Categories','Categories.id','=','Products.Category_Id')
        ->join('Sub_Categories','Sub_Categories.id','=','Products.Sub_Category_Id')
        ->select('Products.id','Products.Product_Id','Products.Product_Name','Products.Features','Products.Price','Products.Sell_Price','Products.Category_Id','Products.Sub_Category_Id','Categories.Category_Name','Sub_Categories.SubCategory_Name')->Paginate(1);
        return view('Product/Show')->with('d',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Category::all();
        return view('Product/Addproduct')->with('d',$data);
    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data=DB::table('Products')
        ->join('Categories','Categories.id','=','Products.Category_Id')
        ->join('Sub_Categories','Sub_Categories.id','=','Products.Sub_Category_Id')
        ->select('Products.id','Products.Product_Id','Products.Product_Name','Products.Features','Products.Price','Products.Sell_Price','Products.Category_Id','Products.Sub_Category_Id','Categories.Category_Name','Sub_Categories.SubCategory_Name')
         ->where('Products.Product_Name', 'like', '%'.$query.'%')
         ->orWhere('Products.Price', 'like', '%'.$query.'%')
         ->orWhere('Products.Features', 'like', '%'.$query.'%')
         ->orWhere('Products.Product_Id', 'like', '%'.$query.'%')
         ->orderBy('Products.id', 'desc')
         ->get();
         
      }
      else
      {
        $data=DB::table('Products')
        ->join('Categories','Categories.id','=','Products.Category_Id')
        ->join('Sub_Categories','Sub_Categories.id','=','Products.Sub_Category_Id')
        ->select('Products.id','Products.Product_Id','Products.Product_Name','Products.Features','Products.Price','Products.Sell_Price','Products.Category_Id','Products.Sub_Category_Id','Categories.Category_Name','Sub_Categories.SubCategory_Name')->get();
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->Product_Id.'</td>
         <td>'.$row->Product_Name.'</td>
         <td>'.$row->Category_Name.'</td>
         <td>'.$row->SubCategory_Name.'</td>
         <td>'.$row->Features.'</td>
         <td>'.$row->Price.'</td>
         <td>'.$row->Sell_Price.'</td>
         <td><a class="btn btn-primary" href="Products/'.$row->id .'/'.$row->Category_Id.'/'. $row->Sub_Category_Id.'">Update</a> 
         <form method="POST" action="Product/'.$row->id.'">
                   '.method_field("DELETE").'
                   '.csrf_field().'

               <button type="submit" class="btn btn-danger"> Delete</button>
               </form>
         
        </td> 
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pid=$request->Product_Id;
        $pname=$request->Product_Name;
        $cid=$request->Category_Id;
        $sid=$request->Sub_Category_Id2;
        $f=$request->Features;
        $p=$request->Price;
        $sp=$request->Sell_Price;

        $obj=new Product();
     $obj->Product_Id=$pid;
     $obj->Product_Name=$pname;
     $obj->Category_Id=$cid;
     $obj->Sub_Category_Id=$sid;
     $obj->Features=$f;
     $obj->Price=$p;
     $obj->Sell_Price=$sp;
     
     $obj->save();

                


     echo "<script> alert('Product Added') </script>";
     return redirect('/Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d=Category::all();
        $di=SubCategory::all();
        $data=Product::find($id);
       return view('Product/Edit')->with('data',['a'=>$data, 'c'=>$d , 's'=>$di]);
    }


    public function ed($id,$idd,$iddd)
    {

        $d=Category::all();
        $ci=Category::find($idd);
        $di=SubCategory::all();
        $si=SubCategory::find($iddd);
        $data=Product::find($id);
       return view('Product/Edit')->with('data',['a'=>$data, 'c'=>$d , 's'=>$di, 'ci'=>$ci, 'si'=>$si]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $pid=$request->Product_Id;
        $pname=$request->Product_Name;
        $cid=$request->Category_Id;
        $sid=$request->Sub_Category_Id2;
        $f=$request->Features;
        $p=$request->Price;
        $sp=$request->Sell_Price;

        $obj = Product::find($id);
        $obj->Product_Id=$pid;
        $obj->Product_Name=$pname;
        $obj->Category_Id=$cid;
        $obj->Sub_Category_Id=$sid;
        $obj->Features=$f;
        $obj->Price=$p;
        $obj->Sell_Price=$sp;
        $obj->save();
        return redirect('/Product');   
    }





    
    public function myform()
    {
        $states = DB::table("sub_categories")->lists("SubCategory_Name","id");
        return view('myform',compact('states'));
    }

    public function myformAjax($id)
    {
        
        $q=SubCategory::where('Category_Id','=',$id)->get();
        return $q;

      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $obj = Product::find($id);
        $obj->delete();

        // redirect
        return redirect('/Product');
    }
}
