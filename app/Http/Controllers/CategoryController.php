<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('Categories')->Paginate(2);
       
        return view('Category/Show')->with('d',$data);
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data=DB::table('categories')
        ->where('Category_Name', 'like', '%'.$query.'%')
        ->get();
         
      }
      else
      {
        $data=DB::table('Categories')->get();
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->Category_Name.'</td>
         <td><a class="btn btn-primary" href="Category/'.$row->id.'/edit">Update</a> 
         <form method="POST" action="/Category/'.$row->id.'">
                   '.method_field("DELETE").'
                   '.csrf_field().'

               <button type="submit" class="btn btn-danger"> Delete</button>
               </form>
              <!-- <a class="btn btn-primary" href="Category/'.$row->id.'">Show Detail</a> -->
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
        return view('Category/AddCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
     $sid=$request->Category_Name;


     $obj=new Category();
     $obj->Category_Name=$sid;
     
     $obj->save();

                


     echo "<script> alert('Category Added') </script>";
     return redirect('/Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Category::find($id);
        return view('Category/deatil')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Category::find($id);
        return view('Category/Edit')->with('data',$data);
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
        $sid=$request->Category_Name;


        $obj = Category::find($id);
        
        $obj->Category_Name=$sid;
        
        $obj->save();
        return redirect('/Category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $obj = Category::find($id);
        $obj->delete();

        // redirect
        return redirect('/Category');
    }
}
