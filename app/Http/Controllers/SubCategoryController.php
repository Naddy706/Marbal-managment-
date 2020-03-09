<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=DB::table('Sub_Categories')
         ->join('Categories','Categories.id','=','Sub_Categories.Category_Id')
         ->select('Sub_Categories.id','Categories.Category_Name','Sub_Categories.Category_Id','Sub_Categories.SubCategory_Name')->Paginate(2);
         return view('SubCategory/Show')->with('d',$data);


    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        
        $data=DB::table('Sub_Categories')
        ->join('Categories','Categories.id','=','Sub_Categories.Category_Id')
        ->select('Sub_Categories.id','Categories.Category_Name','Sub_Categories.Category_Id','Sub_Categories.SubCategory_Name')
         ->where('Categories.Category_Name', 'like', '%'.$query.'%')
         ->orWhere('Sub_Categories.SubCategory_Name', 'like', '%'.$query.'%')
         ->orderBy('Sub_Categories.id', 'desc')
         ->get();
         
      }
      else
      {
        $data=DB::table('Sub_Categories')
        ->join('Categories','Categories.id','=','Sub_Categories.Category_Id')
        ->select('Sub_Categories.id','Categories.Category_Name','Sub_Categories.Category_Id','Sub_Categories.SubCategory_Name')->get();
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->SubCategory_Name.'</td>
         <td>'.$row->Category_Name.'</td>
         <td><a class="btn btn-primary" href="SubCategorys/'.$row->id.'/'.$row->Category_Id.'">Update</a> 
         <form method="POST" action="/SubCategory/'.$row->id.'">
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

        $data=Category::all();
        return view('SubCategory/AddSubCategory')->with('d',$data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scname=$request->SubCategory_Name;
        $idd=$request->Category_Id;
        
        

     $obj=new SubCategory();
     $obj->SubCategory_Name=$scname;
     $obj->Category_id=$idd;
     
    $obj->save();

                


     echo "<script> alert('SubCategory Added') </script>";
     return redirect('/SubCategory');
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
    public function edit($id,$idd)
    {

        // $d=DB::table('Sub_Categories')
        // ->join('Categories','Categories.id','=','Sub_Categories.Category_Id')
        // ->select('Categories.id','Categories.Category_Name','Sub_Categories.Category_Id','Sub_Categories.SubCategory_Name')->distinct()->get();
        $d=Category::all();
        $di=Category::find($idd);
        $data=SubCategory::find($id);
        

        return view('SubCategory/Edit')->with('data',['a'=>$data, 'd'=>$d , 'c'=>$di]);
    }

    public function ed($id,$idd)
    {

        // $d=DB::table('Sub_Categories')
        // ->join('Categories','Categories.id','=','Sub_Categories.Category_Id')
        // ->select('Categories.id','Categories.Category_Name','Sub_Categories.Category_Id','Sub_Categories.SubCategory_Name')->distinct()->get();
        $d=Category::all();
        $di=Category::find($idd);
        $data=SubCategory::find($id);
       return view('SubCategory/Edit')->with('data',['a'=>$data, 'd'=>$d , 'c'=>$di]);
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
        $scname=$request->SubCategory_Name;
        $idd=$request->Category_Id;

        $obj = SubCategory::find($id);
        $obj->SubCategory_Name=$scname;
        $obj->Category_id=$idd;
        $obj->save();
        return redirect('/SubCategory');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $obj = SubCategory::find($id);
        $obj->delete();

        // redirect
        return redirect('/SubCategory');
    }
}
