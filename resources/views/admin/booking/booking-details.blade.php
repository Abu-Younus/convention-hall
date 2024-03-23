@extends('admin.master')

@section('title')
    Booking Details
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar') 
        <div class="container "  id="divToExport"  style="margin-top: 80px; margin-left: 220px;"> 
            <button type="button" onclick="generatePDF()" class="btn-sm btn-danger pull-right">Export to PDF</button>
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-primary">Customer Info for this Booking Hall </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $customer->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $customer->address }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-primary">Shipping Info for this Booking Hall </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $shipping->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $shipping->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>{{ $shipping->email }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $shipping->city }}</td>
                                </tr>
                                <tr>
                                    <th>Post Code</th>
                                    <td>{{ $shipping->post_code }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $shipping->address }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-primary">Payment Info for this Booking Hall </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Payment Type</th>
                                    <td>{{ $payment->payment_type }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>{{ $payment->payment_status }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-primary">Hall Info for this Booking </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>Hall Id</th>
                                    <th>Hall Name</th>
                                    <th>Hall Image</th>
                                    <th>Hall Booking Price</th>
                                    <th>Booking Days</th>
                                    <th>Total People</th>
                                    <th>Shift</th>
                                    <th>Foods</th>
                                    <th>Seat type</th>
                                    <th>Total Price</th>
                                </tr>
                                @php($i=1)
                                @php($sum=0)
                                @foreach($orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $orderDetail->hall_id }}</td>
                                        <td>{{ $orderDetail->hall_name }}</td>
                                        <td><img src="{{asset($orderDetail->hall_image)}}" alt="" width="80px" height="60px" /></td>
                                        <td class="text-primary">TK. {{ $orderDetail->hall_price }}</td>
                                        <td>{{ $orderDetail->booking_days }}</td>
                                        <td>{{ $orderDetail->total_people }}</td>
                                        <td>{{ $orderDetail->hall_shift }}</td>
                                        <td>{{ $orderDetail->food_list }}</td>
                                        <td>{{ $orderDetail->seat_type }}</td>
                                        <td class="text-primary">TK. {{ $total = $orderDetail->hall_price * $orderDetail->booking_days }}</td>
                                    </tr>
                                    <?php $sum = $sum + $total ?>
                                @endforeach()
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-primary">Grand Total Price for this Order </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sub Total Price</th>
                                    <td class="text-primary">TK. {{ $sum }}</td>
                                </tr>
                                <tr>
                                    <th>Vat Total Price</th>
                                    <td class="text-primary">TK. {{ $vat = ($sum*3)/100 }}</td>
                                </tr>
                                <tr>
                                    <th>Grand Total Price</th>
                                    <td class="text-primary">TK. {{ $grandTotal = $sum + $vat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
        
        </div>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
         <script>
          function generatePDF() { 
        // Choose the element id which you want to export.
        var element = document.getElementById('divToExport');
        element.style.width = '100%';
        element.style.height = 'auto';
        element.style.marginLeft = "-10px";
        element.style.marginTop = "-33px";  
        var opt = {
            margin:       0.5, 
            filename:     'myfile.pdf',
            image:        { type: 'jpeg', quality: 1 },
            html2canvas:  { scale: 1 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait',precision: '12' }
          };
        // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
        html2pdf().set(opt).from(element).save(); 
        setTimeout(function(){
            window.location.reload(1);
        }, 1000);
      } 
        </script>
    </div>
@endsection
