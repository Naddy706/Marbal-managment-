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
              <h6 class="m-0 font-weight-bold text-primary">Invoice Records</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
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
                      <th></th>
                    </tr>
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
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($d as $item)
                    <tr>
                      <td>{{ $item-> Invoice_No }}</td>
                      <td>{{$item->Product_Name}}</td>
                      <td>{{$item->Customer_Name}}</td>
                      <td>{{ $item-> Invoice_Date }}</td>
                      <td>{{ $item-> marbal_length }}</td>
                      <td>{{ $item-> price }}</td>
                      <td>{{ $item-> SubTotal }}</td>
                      <td>{{ $item-> VAT_Per }}</td>
                      <td>{{ $item-> VAT_Amount }}</td>
                      <td>{{$item->Discount_Per}}</td>
                      <td>{{ $item->Discount_Amount}}</td>
                      <td>{{ $item->Grand_Total}}</td>
                      <td>{{ $item->Total_Payment}}</td>
                      <td>{{ $item->PaymentDue}}</td>
                      <td>{{ $item->PaymentType}}</td>
                      <td>

                      <a class="btn btn-primary" href="Invoices/{{ $item->id }}/{{ $item->Customer_Id }}/{{ $item->Product_Id }}">Update</a> 
                      <form method="POST" action="/Invoice/{{ $item->id }}" >
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
    
                            <button type="submit" class="btn btn-danger"> Delete</button>
                            </form>
                      <button class="btn btn-primary" onclick="print()"></button>
                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>

                {{ $d->links() }}
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
   url:"/fetchdataInvoice/",
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

<script>

@endsection