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
              <h6 class="m-0 font-weight-bold text-primary">Supplier Records</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Supplier ID</th>
                      <th>Supplier Name</th>
                      <th>Address</th>
                      <th>City</th>
                      <th> Contact</th>
                      <th>Contact 2</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Supplier ID</th>
                      <th>Supplier Name</th>
                      <th>Address</th>
                      <th>City</th>
                      <th> Contact</th>
                      <th>Contact 2</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($d as $item)
                    <tr>
                      <td>{{ $item-> Supplier_Id }}</td>
                      <td>{{ $item-> Supplier_Name }}</td>
                      <td>{{ $item-> Address }}</td>
                      <td>{{ $item-> City }}</td>
                      <td>{{ $item-> Contact_No }}</td>
                      <td>{{ $item-> Contact_No2 }}</td>
                      <td>{{ $item-> email }}</td>
                      <td>

                      <a class="btn btn-primary" href="Supplier/{{ $item->id }}/edit">Update</a> 
                      <form method="POST" action="/Supplier/{{ $item->id }}" >
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
   url:"/fetchdatasup/",
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