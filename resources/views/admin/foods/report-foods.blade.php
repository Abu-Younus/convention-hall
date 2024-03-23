@extends('admin.master')

@section('title')
   Monthly report
@endsection

@section('body')
    @include('admin.navber')
    <div id="layoutSidenav">
        @include('admin.sidebar')

        <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
       


        <div class="container" style="margin-top: 80px; margin-left: 220px;">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div>
                        
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody><tr>
                            <td>Year:</td>
                            <td><input type="text" name="datep" id="annee" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Month</td>
                            <td><input type="text" name="datep" id="mois" class="form-control"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-secondary" type="submit">Search</button></td> 
                        </tr>
                    </tbody></table>    
                    <div class="card">
                        <div class="card-header text-primary">Order details Table</div>
                        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                 

                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Days</th>
                                            <th>Date</th>
                                            <th>People</th>
                                            <th>Foods</th>
                                            <th>Seats</th>
                                            <th>Total</th> 	
                                         </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @php($s=0)
                                    @foreach($ord as $od)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                             <td>{{ $od->hall_name }}</td> 
                                            <td><img src="{{asset($od->hall_image)}}" alt="" width="60px" height="40px" /></td>
                                            <td>{{ $od->hall_price }}</td> 
                                            <td>{{ $od->booking_days }}</td>  
                                            <td>{{ $od->order_date }}</td> 
                                            <td>{{ $od->total_people }}</td>
                                            <td>{{ $od->food_list }}</td>
                                            <td>{{ $od->seat_type }}</td> 
                                            <td style="text-align: right;">{{ $od->booking_days * $od->hall_price}}</td> 
                                         </tr>
                                    @endforeach
                                    </tbody> 
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div> 
        </div>
    </div>

    



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script> 

    <script>

        $(document).ready(function() {
     $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ]
    } );
} );
    </script>

    <script>
       $(document).ready(function() {
        var table = $('#example').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        $('#mois, #annee').keyup(function() {
            table.draw();
        });
        
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var month = parseInt( $('#mois').val(), 10 );
                var year = parseInt( $('#annee').val(), 10 );
                var date = data[5].split('-');
                console.log(year)
                if ( ( isNaN( year ) && isNaN( month ) ) ||
                    ( isNaN( month ) && year == date[0] ) ||
                    ( date[1] == month && isNaN( year ) ) ||
                    ( date[1] == month && year == date[0] ) 
                    )
                {
                    return true;
                }
                return false;
            }
        );
        });

    </script>
@endsection



