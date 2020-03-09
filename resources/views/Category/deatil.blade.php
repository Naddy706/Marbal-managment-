@extends('layouts.app')
@section('content')

<div class="container-fluid">
<!-- 
          Page Heading 
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4" id="GFG">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category Detail Record</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Category ID</th>
                      <th>Category Name</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Category ID</th>
                      <th>Category Name</th>
                      
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  
                    <tr>
                    <td>{{ $data-> id }}</td>
                      <td>{{ $data-> Category_Name }}</td>
                      <td> <button onclick="printDiv()" class="btn btn-primary">Print</button> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <script> 
        function printDiv() {  
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body> <center> <h1> Marbal Shop </h1></center> <br>'); 
            a.document.write('<body> <center> <p> this receipt verify that this data has been stored in your databse </p> <br>'); 
            a.document.write('<table  align="center" height="80" width="300" ><tr align="center"><th>ID</th><th>Category Name </th></tr><tr align="center"><td>{{ $data-> id }}</td><td>{{ $data-> Category_Name }}</td></tr></table> <br> <center> <h3> Developed by Esleeks Global </h3> </center> <br>');  
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script> 

@endsection

 

