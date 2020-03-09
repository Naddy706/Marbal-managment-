<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Customer;
use App\ProductSold;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('product_solds')
         ->join('customers','customers.id','=','product_solds.Customer_Id')
         ->join('products','products.id','=','product_solds.Product_Id')
         ->select('product_solds.id','customers.Customer_Name','product_solds.Customer_Id','product_solds.Product_Id','products.Product_Name','product_solds.Invoice_No','product_solds.Invoice_Date','product_solds.marbal_length','product_solds.price','product_solds.SubTotal','product_solds.VAT_Per','product_solds.VAT_Amount','product_solds.Discount_Per','product_solds.Discount_Amount','product_solds.Grand_Total','product_solds.Total_Payment','product_solds.PaymentDue','product_solds.PaymentType')->Paginate(3);
         
         return view('Invoice/Show')->with('d',$data);


    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data=DB::table('product_solds')
         ->join('customers','customers.id','=','product_solds.Customer_Id')
         ->join('products','products.id','=','product_solds.Product_Id')
         ->select('product_solds.id','customers.Customer_Name','product_solds.Customer_Id','product_solds.Product_Id','products.Product_Name','product_solds.Invoice_No','product_solds.Invoice_Date','product_solds.marbal_length','product_solds.price','product_solds.SubTotal','product_solds.VAT_Per','product_solds.VAT_Amount','product_solds.Discount_Per','product_solds.Discount_Amount','product_solds.Grand_Total','product_solds.Total_Payment','product_solds.PaymentDue','product_solds.PaymentType')
         ->where('Products.Product_Name', 'like', '%'.$query.'%')
         ->orWhere('Products.Price', 'like', '%'.$query.'%')
         ->orWhere('customers.Customer_Name', 'like', '%'.$query.'%')
         ->orWhere('product_solds.Invoice_Date', 'like', '%'.$query.'%')
         ->orWhere('product_solds.Invoice_No', 'like', '%'.$query.'%')
         ->orderBy('product_solds.id', 'desc')
         ->get();
         
      }
      else
      {
      $data=DB::table('product_solds')
         ->join('customers','customers.id','=','product_solds.Customer_Id')
         ->join('products','products.id','=','product_solds.Product_Id')
         ->select('product_solds.id','customers.Customer_Name','product_solds.Customer_Id','product_solds.Product_Id','products.Product_Name','product_solds.Invoice_No','product_solds.Invoice_Date','product_solds.marbal_length','product_solds.price','product_solds.SubTotal','product_solds.VAT_Per','product_solds.VAT_Amount','product_solds.Discount_Per','product_solds.Discount_Amount','product_solds.Grand_Total','product_solds.Total_Payment','product_solds.PaymentDue','product_solds.PaymentType')->get();
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->Invoice_No.'</td>
         <td>'.$row->Product_Name.'</td>
         <td>'.$row->Customer_Name.'</td>
         <td>'.$row->Invoice_Date.'</td>
         <td>'.$row->marbal_length.'</td>
         <td>'.$row->price.'</td>
         <td>'.$row->SubTotal.'</td>
         <td>'.$row->VAT_Per.'</td>
         <td>'.$row->VAT_Amount.'</td>
         <td>'.$row->Discount_Per.'</td>
         <td>'.$row->Discount_Amount.'</td>
         <td>'.$row->Grand_Total.'</td>
         <td>'.$row->Total_Payment.'</td>
         <td>'.$row->PaymentDue	.'</td>
         <td>'.$row->PaymentType.'</td>
         <td><a class="btn btn-primary" href="Invoices/'.$row->id.'/'.$row->Customer_Id.'/'.$row->Product_Id.'">Update</a> 
         <form method="POST" action="/Invoice/'.$row->id.'">
                   '.method_field("DELETE").'
                   '.csrf_field().'
               <button type="submit" class="btn btn-danger">Delete</button>
               </form>
               <a class="btn btn-primary" href="In/'.$row->id.'/'.$row->Customer_Name.'/'.$row->Product_Name.'">Print</a> 
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

    

    public function myformAjax($id)
    {
        
        $q=Product::where('id','=',$id)->get();
        return $q;

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        $p=Product::all();
        $c=Customer::all();
        return View('Invoice/AddInvoice')->with('data',['pro'=>$p ,'cus'=>$c ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cid=$request->Customer_Id;
        $pid=$request->ppid;
        $in=$request->Invoice_No;
        $id=$request->Invoice_Date;
        $ml=$request->marbal_length;
        $pr=$request->price;
        $st=$request->SubTotal;
        $vp=$request->VAT_Per;
        $vt=$request->VAT_Amount;
        $dp=$request->Discount_Per;
        $da=$request->Discount_Amount;
        $gt=$request->Grand_Total;
        $tp=$request->Total_Payment;
        $pd=$request->PaymentDue;
        $pt=$request->PaymentType;


        $obj=new ProductSold();
        $obj->Customer_Id=$cid;
        $obj->Product_Id=$pid;
        $obj->Invoice_No=$in;
        $obj->Invoice_Date=$id;
        $obj->marbal_length=$ml;
        $obj->price=$pr;
        $obj->SubTotal=$st;
        $obj->VAT_Per=$vp;
        $obj->VAT_Amount=$vt;
        $obj->Discount_Per=$dp;
        $obj->Discount_Amount=$da;
        $obj->Grand_Total=$gt;
        $obj->Total_Payment=$tp;
        $obj->PaymentDue=$pd;
        $obj->PaymentType=$pt;

        $obj->save();
        echo "<script> Product Sold </script>";
        return redirect('/Invoice');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function abcd($id,$idd,$iddd)
    {
        //name Customer below
       $ci=$idd;
        //echo "".$ci;
    // name  Product below
     $si=$iddd;
        $data=ProductSold::find($id);       
       
        return view('Invoice/detail')->with('data',['s'=>$data, 'ci'=>$ci, 'pi'=>$si]);   
   
    }



    public function edc($id,$idd,$iddd)
    {
//echo " PS".$id." CI".$idd." PI".$iddd;
        $d=Customer::all();
        $ci=Customer::find($idd);
        $di=Product::all();
        $si=Product::find($iddd);
        $data=ProductSold::find($id);       
       
        return view('Invoice/Edit')->with('data',['a'=>$di, 'c'=>$d , 's'=>$data, 'ci'=>$ci, 'pi'=>$si]);   
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $cid=$request->Customer_Id;
         $pid=$request->ppid;
        $in=$request->Invoice_No;
        $idd=$request->Invoice_Date;
        $ml=$request->marbal_length;
        $pr=$request->price;
        $st=$request->SubTotal;
        $vp=$request->VAT_Per;
        $vt=$request->VAT_Amount;
        $dp=$request->Discount_Per;
        $da=$request->Discount_Amount;
        $gt=$request->Grand_Total;
        $tp=$request->Total_Payment;
        $pd=$request->PaymentDue;
        $pt=$request->PaymentType;


        $obj=ProductSold::find($id);
        $obj->Customer_Id=$cid;
        $obj->Product_Id=$pid;
        $obj->Invoice_No=$in;
        $obj->Invoice_Date=$idd;
        $obj->marbal_length=$ml;
        $obj->price=$pr;
        $obj->SubTotal=$st;
        $obj->VAT_Per=$vp;
        $obj->VAT_Amount=$vt;
        $obj->Discount_Per=$dp;
        $obj->Discount_Amount=$da;
        $obj->Grand_Total=$gt;
        $obj->Total_Payment=$tp;
        $obj->PaymentDue=$pd;
        $obj->PaymentType=$pt;

        $obj->save();
        echo "<script> Product Sold updated </script>";
        return redirect('/Invoice');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = ProductSold::find($id);
        $obj->delete();

        // redirect
        return redirect('/Invoice');
    }
}
