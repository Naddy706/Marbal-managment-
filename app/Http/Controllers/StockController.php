<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Product;
use App\Stock;
use App\Supplier;
use DB;



class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('Stocks')
        ->join('Products','Products.id','=','Stocks.Product_Id')
        ->join('Suppliers','Suppliers.id','=','Stocks.Supplier_Id')
        ->select('Stocks.id','Stocks.Stock_Id','Stocks.Stock_date','Products.id as Pid','Products.Product_Name','Suppliers.id as Sid','Suppliers.Supplier_Name','Stocks.Box_Quantity','Stocks.Box_Pieces','Stocks.Toatl_Pieces','Stocks.Marbal_Length','Stocks.Total_Length')->Paginate(1);
        return view('Stock/Show')->with('d',$data);
    }




    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data=DB::table('Stocks')
        ->join('Products','Products.id','=','Stocks.Product_Id')
        ->join('Suppliers','Suppliers.id','=','Stocks.Supplier_Id')
        ->select('Stocks.id','Stocks.Stock_Id','Stocks.Stock_date','Products.id as Pid','Products.Product_Name','Suppliers.id as Sid','Suppliers.Supplier_Name','Stocks.Box_Quantity','Stocks.Box_Pieces','Stocks.Toatl_Pieces','Stocks.Marbal_Length','Stocks.Total_Length')
         ->where('Products.Product_Name', 'like', '%'.$query.'%')
         ->orWhere('Products.Price', 'like', '%'.$query.'%')
         ->orWhere('Suppliers.Supplier_Name', 'like', '%'.$query.'%')
         ->orWhere('Products.Product_Id', 'like', '%'.$query.'%')
         ->orWhere('Stocks.Stock_Id', 'like', '%'.$query.'%')
         ->orderBy('Products.id', 'desc')
         ->get();
         
      }
      else
      {
        $data=DB::table('Stocks')
        ->join('Products','Products.id','=','Stocks.Product_Id')
        ->join('Suppliers','Suppliers.id','=','Stocks.Supplier_Id')
        ->select('Stocks.id','Stocks.Stock_Id','Stocks.Stock_date','Products.id as Pid','Products.Product_Name','Suppliers.id as Sid','Suppliers.Supplier_Name','Stocks.Box_Quantity','Stocks.Box_Pieces','Stocks.Toatl_Pieces','Stocks.Marbal_Length','Stocks.Total_Length')->get();
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->Stock_Id.'</td>
         <td>'.$row->Stock_date.'</td>
         <td>'.$row->Product_Name.'</td>
         <td>'.$row->Supplier_Name.'</td>
         <td>'.$row->Box_Quantity.'</td>
         <td>'.$row->Box_Pieces.'</td>
         <td>'.$row->Toatl_Pieces.'</td>
         <td>'.$row->Marbal_Length.'</td>
         <td>'.$row->Total_Length.'</td>
         <td><a class="btn btn-primary" href="Stocks/'.$row->id.'/'.$row->Pid.'/'.$row->Sid.'">Update</a> 
         <form method="POST" action="Stock/'.$row->id.'">
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d=Product::all();
        $di=Supplier::all();
       return view('Stock/AddStock')->with('data',['p'=>$d , 's'=>$di]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sid=$request->Stock_Id;
        $sd=$request->Stock_date;
        $pid=$request->Product_Id;
        $suid=$request->Supplier_Id;
        $bq=$request->Box_Quantity;
        $bp=$request->Box_Pieces;
        $tp=$request->Toatl_Pieces;
        $ml=$request->Marbal_Length;
        $tl=$request->Total_Length;

        $obj=new Stock();
        $obj->Stock_Id=$sid;
        $obj->Stock_date=$sd;
        $obj->Product_Id=$pid;
        $obj->Supplier_Id=$suid;
        $obj->Box_Quantity=$bq;
        $obj->Box_Pieces=$bp;
        $obj->Toatl_Pieces=$tp;
        $obj->Marbal_Length=$ml;
        $obj->Total_Length=$tl;

        $obj->save();

        echo "<script> alert('Stock Added') </script>";
        return redirect('/Stock');

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
        
        $d=Product::all();
        $di=Supplier::all();
        $st=Stock::find($id);
       return view('Stock/Edit')->with('data',['p'=>$d , 's'=>$di, 'st'=>$st ]);
    }


    public function ed($id,$proid,$supid)
    {
        
        $d=Product::all();
        $pro=Product::find($proid);
        $di=Supplier::all();
        $sup=Supplier::find($supid);
        $st=Stock::find($id);
       return view('Stock/Edit')->with('data',['p'=>$d , 's'=>$di, 'st'=>$st , 'pid'=>$pro ,'sid'=>$sup]);
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
        $sid=$request->Stock_Id;
        $sd=$request->Stock_date;
        $pid=$request->Product_Id;
        $suid=$request->Supplier_Id;
        $bq=$request->Box_Quantity;
        $bp=$request->Box_Pieces;
        $tp=$request->Toatl_Pieces;
        $ml=$request->Marbal_Length;
        $tl=$request->Total_Length;


        $obj = Stock::find($id);
        $obj->Stock_Id=$sid;
        $obj->Stock_date=$sd;
        $obj->Product_Id=$pid;
        $obj->Supplier_Id=$suid;
        $obj->Box_Quantity=$bq;
        $obj->Box_Pieces=$bp;
        $obj->Toatl_Pieces=$tp;
        $obj->Marbal_Length=$ml;
        $obj->Total_Length=$tl;

        $obj->save();

        echo "<script> alert('Stock updated') </script>";
        return redirect('/Stock');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $obj = Stock::find($id);
        $obj->delete();

        // redirect
        return redirect('/Stock');
    }
}
