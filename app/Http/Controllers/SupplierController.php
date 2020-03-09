<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('Suppliers')->Paginate(1);
        return view('Supplier/Show')->with('d',$data);
    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data=DB::table('Suppliers')
        ->where('Supplier_Id', 'like', '%'.$query.'%')
        ->orWhere('Supplier_Name', 'like', '%'.$query.'%')
        ->orWhere('Address', 'like', '%'.$query.'%')
        ->orWhere('City', 'like', '%'.$query.'%')
        ->orWhere('Contact_No', 'like', '%'.$query.'%')
        ->orWhere('Contact_No2', 'like', '%'.$query.'%')
        ->orWhere('email', 'like', '%'.$query.'%')
        ->get();
         
      }
      else
      {
        $data=DB::table('Suppliers')->get();
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->Supplier_Id.'</td>
         <td>'.$row->Supplier_Name.'</td>
         <td>'.$row->Address.'</td>
         <td>'.$row->City.'</td>
         <td>'.$row->Contact_No.'</td>
         <td>'.$row->Contact_No2.'</td>
         <td>'.$row->email.'</td>
         <td><a class="btn btn-primary" href="Supplier/'.$row->id.'/edit">Update</a> 
         <form method="POST" action="/Supplier/'.$row->id.'">
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
        return view('Supplier/AddSupplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $sid=$request->Supplier_Id;
     $sname=$request->Supplier_Name;
     $a=$request->Address;
     $c=$request->City;
     $c1=$request->Contact_No;
     $c2=$request->Contact_No2;
     $e=$request->email;


     $obj=new Supplier();
     $obj->Supplier_Id=$sid;
     $obj->Supplier_Name=$sname;
     $obj->Address=$a;
     $obj->City=$c;
     $obj->Contact_No=$c1;
     $obj->Contact_No2=$c2;
     $obj->email=$e;
     
     $obj->save();

                


     echo "<script> alert('Supplier Added') </script>";
     return redirect('/Supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Supplier::find($id);
        return view('Supplier/Edit')->with('data',$data);
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
     $sid=$request->Supplier_Id;
     $sname=$request->Supplier_Name;
     $a=$request->Address;
     $c=$request->City;
     $c1=$request->Contact_No;
     $c2=$request->Contact_No2;
     $e=$request->email;


     $obj = Supplier::find($id);
     $obj->Supplier_Id=$sid;
     $obj->Supplier_Name=$sname;
     $obj->Address=$a;
     $obj->City=$c;
     $obj->Contact_No=$c1;
     $obj->Contact_No2=$c2;
     $obj->email=$e;
     
     $obj->save();
     return redirect('/Supplier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $obj = Supplier::find($id);
        $obj->delete();

        // redirect
        return redirect('/Supplier');
    }
}
