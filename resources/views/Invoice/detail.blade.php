@extends('layouts.app')
@section('content')


<input tpye="text" id="dd"  value="{{$data['s']->Invoice_Date}}"><br>
<input type="text" hidden id="pt" value="{{$data['s']->PaymentType}}">

<div class="container-fluid">
<!-- 
          Page Heading 
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4" id="GFG">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Invoice Detail Record</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr> <th>Invoice_No</th>
                    <th>Product Name</th>
                    <th>Customer Name</th>
                      <th>Invoice_Date</th>
                      <th>marbal_length</th>
                      <th>price</th>
                      <th> SubTotal</th>
                      <th>VAT_Per</th>
                      <th>VAT_Amount</th>
                      <th>Discount_Per</th>
                      <th>Discount_Amount</th>
                      <th>Grand_Total</th>
                      <th>Total_Payment</th>
                      <th>PaymentDue</th>
                      <th>PaymentType</th>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Invoice_No</th>
                    <th>Product Name</th>
                    <th>Customer Name</th>
                      <th>Invoice_Date</th>
                      <th>marbal_length</th>
                      <th>price</th>
                      <th> SubTotal</th>
                      <th>VAT_Per</th>
                      <th>VAT_Amount</th>
                      <th>Discount_Per</th>
                      <th>Discount_Amount</th>
                      <th>Grand_Total</th>
                      <th>Total_Payment</th>
                      <th>PaymentDue</th>
                      <th>PaymentType</th>
                  </tfoot>
                  <tbody>
                  
                    <tr>
                    <td>{{ $data['s']-> Invoice_No }}</td>
                    <td> {{$data['pi']}}</td>
                    <td>  {{$data['ci']}} </td>
                      <td>{{ $data['s']-> Invoice_Date }}</td>
                      <td>{{ $data['s']-> marbal_length }}</td>
                      <td>{{ $data['s']-> price }}</td>
                      <td>{{ $data['s']-> SubTotal }}</td>
                      <td>{{ $data['s']-> VAT_Per }}</td>
                      <td>{{ $data['s']-> VAT_Amount }}</td>
                      <td>{{$data['s']->Discount_Per}}</td>
                      <td>{{ $data['s']->Discount_Amount}}</td>
                      <td>{{ $data['s']->Grand_Total}}</td>
                      <td>{{ $data['s']->Total_Payment}}</td>
                      <td>{{ $data['s']->PaymentDue}}</td>
                      <td>{{ $data['s']->PaymentType}}</td>
                      
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
            a.document.write('<table border="1px" align="center" height="80" width="600" >');  
            
            a.document.write('<tr align="center"> <th>Invoice_No</th><th>Product Name</th><th>Customer Name</th></tr>');
            a.document.write('<tr align="center">  <td>{{ $data["s"]-> Invoice_No }}</td> <td>{{ $data["pi"]}}</td><td> {{$data["ci"]}}   </td></tr>');

            a.document.write('<tr align="center"> <th>Invoice_Date</th><th>marbal_length</th><th>price</th></tr>');
            a.document.write('<tr align="center"> <td>{{ $data["s"]-> Invoice_Date }}</td> <td>{{ $data["s"]-> marbal_length }}</td><td>{{ $data["s"]-> price }}</td></tr>');

            a.document.write('<tr align="center"> <th>SubTotal</th><th>VAT_Per</th><th>VAT_Amount</th> </tr>');
            a.document.write('<tr align="center"> <td>{{ $data["s"]-> SubTotal }}</td><td>{{ $data["s"]-> VAT_Per }}</td><td>{{ $data["s"]-> VAT_Amount }}</td> </tr>');

            a.document.write('<tr align="center"> <th>Discount_Per</th><th>Discount_Amount</th><th>Grand_Total</th> </tr>');
            a.document.write('<tr align="center"> <td>{{$data["s"]->Discount_Per}}</td><td>{{ $data["s"]->Discount_Amount}}</td><td>{{ $data["s"]->Grand_Total}}</td> </tr>');

            a.document.write('<tr align="center"> <th>Total_Payment</th><th>PaymentDue</th><th>PaymentType</th> </tr>');
            a.document.write('<tr align="center">   <td>{{ $data["s"]->Total_Payment}}</td><td>{{ $data["s"]->PaymentDue}}</td><td>{{ $data["s"]->PaymentType}}</td> </tr>');
            a.document.write('</table> <br> <center> <h3> Developed by Esleeks Global </h3> </center> <br></body></html>'); 
            a.document.close(); 
            a.print(); 
        }
      

document.getElementById('pit').value=document.getElementById('pt').value;
document.getElementById('Invoice_Date').value=document.getElementById('dd').value; 
    </script> 

@endsection

 

