<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('Customers')->Paginate(1);
        return view('Customer/Show')->with('d',$data);
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data=DB::table('Customers')
        ->where('Customer_Id', 'like', '%'.$query.'%')
        ->orWhere('Customer_Name', 'like', '%'.$query.'%')
        ->orWhere('Customer_Address', 'like', '%'.$query.'%')
        ->orWhere('City', 'like', '%'.$query.'%')
        ->orWhere('Contact_No', 'like', '%'.$query.'%')
        ->orWhere('Contact_No2', 'like', '%'.$query.'%')
        ->orWhere('Email', 'like', '%'.$query.'%')
        ->get();
         
      }
      else
      {
        $data=DB::table('Customers')->get();
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->Customer_Id.'</td>
         <td>'.$row->Customer_Name.'</td>
         <td>'.$row->Customer_Address.'</td>
         <td>'.$row->City.'</td>
         <td>'.$row->Contact_No.'</td>
         <td>'.$row->Contact_No2.'</td>
         <td>'.$row->Email.'</td>
         <td><a class="btn btn-primary" href="Customer/'.$row->id.'/edit">Update</a> 
         <form method="POST" action="/Customer/'.$row->id.'">
                   '.method_field("DELETE").'
                   '.csrf_field().'

               <button type="submit" class="btn btn-danger"> Delete</button>
               </form>
            <!-- <a class="btn btn-primary" href="Customer/'.$row->id.'">Show Detail</a> -->
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
        return view('Customer/AddCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $sid=$request->Customer_Id;
     $sname=$request->Customer_Name;
     $a=$request->Customer_Address;
     $c=$request->City;
     $c1=$request->Contact_No;
     $c2=$request->Contact_No2;
     $e=$request->Email;


     $obj=new Customer();
     $obj->Customer_Id=$sid;
     $obj->Customer_Name=$sname;
     $obj->Customer_Address=$a;
     $obj->City=$c;
     $obj->Contact_No=$c1;
     $obj->Contact_No2=$c2;
     $obj->Email=$e;
     
     $obj->save();

                


     echo "<script> alert('Supplier Added') </script>";
     return redirect('/Customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Customer::find($id);
        return view('Customer/deatil')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Customer::find($id);
        return view('Customer/Edit')->with('data',$data);
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
        $sid=$request->Customer_Id;
        $sname=$request->Customer_Name;
        $a=$request->Customer_Address;
        $c=$request->City;
        $c1=$request->Contact_No;
        $c2=$request->Contact_No2;
        $e=$request->Email;


     $obj = Customer::find($id);
     
     $obj->Customer_Id=$sid;
     $obj->Customer_Name=$sname;
     $obj->Customer_Address=$a;
     $obj->City=$c;
     $obj->Contact_No=$c1;
     $obj->Contact_No2=$c2;
     $obj->Email=$e;
     
     $obj->save();
     return redirect('/Customer');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $obj = Customer::find($id);
        $obj->delete();

        // redirect
        return redirect('/Customer');
    }
}
