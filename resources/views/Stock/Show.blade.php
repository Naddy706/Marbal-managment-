@extends('layouts.app')
@section('content')
<div class="container-fluid">
<!-- 
          Page Heading 
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Product Records</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Stock Id</th>
                    <th>Stock date</th>
                      <th>Product Name</th>
                      <th>Supplier Name</th>
                      <th>Box Quantity</th>
                      <th>Box Pieces</th>
                      <th>Total Pieces</th>
                      <th>Marbal Length</th>
                      <th>Total Length</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Stock Id</th>
                    <th>Stock date</th>
                      <th>Product Name</th>
                      <th>Supplier Name</th>
                      <th>Box Quantity</th>
                      <th>Box Pieces</th>
                      <th>Total Pieces</th>
                      <th>Marbal Length</th>
                      <th>Total Length</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($d as $item)
                    <tr>
                    <td scope="row"> {{ $item->Stock_Id}} </td>
                    <td> {{ $item->Stock_date}} </td>
                    <td>{{ $item->Product_Name}}</td>
                    <td>{{ $item->Supplier_Name }}</td>
                    <td>{{ $item->Box_Quantity }}</td>
                    <td>{{ $item->Box_Pieces }}</td>
                    <td>{{ $item->Toatl_Pieces }}</td>
                    <td>{{ $item->Marbal_Length }}</td>
                    <td>{{ $item->Total_Length }}</td>
                    
                    <td>
                      <a class="btn btn-primary" href="Stocks/{{ $item->id }}/{{ $item->Pid}}/{{ $item->Sid }}">Update</a> 
                      
                      <form method="POST" action="Stock/{{ $item->id }}" >
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
    
                            <button type="submit" class="btn btn-danger"> Delete</button>
                            </form>
                      
                     </td> 
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>

                {{$d->links()}}
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->




        <script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"/fetchdataStock/",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
@endsection