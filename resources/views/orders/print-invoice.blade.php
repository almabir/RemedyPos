<!DOCTYPE html>
<html lang="en">
<head>
    <title>Remedy Health Care, Voucher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice/fonts/font-awesome/css/font-awesome.min.css') }}">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice/css/style.css') }}">
</head>
<body>

<!-- BEGIN: Invoice -->
<div class="invoice-16 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner-9" id="invoice_wrapper">
                    <div class="invoice-top" style="padding: 10px 20px 5px;">
                        <div class="row" style="border: 2px; border-style: dashed;">
                            <div class="col-lg-6 col-sm-6">
                                <div class="logo1">
                                <img src="{{asset('images')}}/{{$company->logo}}" width="300" height="100"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                            <div class="col-sm-6 text-end mb-50" style="margin-bottom:1px; width:100%">
                                <p class="inv-from-1" style="margin-bottom: 0px; font-size:35px; font-family: fantasy;color: #ff0000;">{{ $company->company }}</p>
                                <p class="inv-from-1" style="margin-bottom: 0px;">Marketing & Dristribution Company</p>
                                <p class="inv-from-2" style="margin-bottom: 0px;">{{ $company->address }}</p>
                                <p class="inv-from-1" style="margin-bottom: 0px;">{{ $company->email }}</p>
                                <p class="inv-from-1" style="margin-bottom: 0px;">{{ $company->website }}</p>
                                <p class="inv-from-1" style="margin-bottom: 0px;">(+88) {{ $company->mobile }}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-top" style="padding: 10px 20px 5px;">
                    <div class="row">
                        <div class="col-sm-6 mb-50" style="margin-bottom:0px;">
                                <h4 class="inv-title-1">To Customer</h4>
                                <p class="inv-from-1" style="margin-bottom: 0px;">{{ $order->customer->name }}</p>
                                <p class="inv-from-1" style="margin-bottom: 0px;">{{ $order->customer->phone }}</p>
                                <p class="inv-from-1" style="margin-bottom: 0px;">{{ $order->customer->email }}</p>
                                <p class="inv-from-2" style="margin-bottom: 0px;">{{ $order->customer->address }}</p>
                        </div>
                        <div class="col-sm-6 mb-50" style="margin-bottom:0px; text-align: right;">
                                    <h4 class="inv-title-1">Invoice date: {{  \Carbon\Carbon::parse($order->order_date)->format('d-m-Y') }}</h4>
                                    <h4>Invoice # <span>{{ $order->invoice_no }}</span></h4>
                        </div>
                    

                    </div>
                    </div>

                    <hr style="margin-top:0px;">
                    
                    <div class="order-summary">
                        <div class="table-outer">
                            <table class="default-table invoice-table">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th style="min-width:250px;">Item</th>
                                    <th style="max-width:100px;">Price</th>
                                    <th style="max-width:100px;">Qty.</th>
                                    <th style="max-width:130px;">Subtotal</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($orderDetails as $key=> $item)
                                <tr>
                                    <td>{{++$key}}.</td>
                                    <td >{{ $item->product->product_name }}</td>
                                    <td>{{ $item->unitcost }}</td>
                                    <td >{{ $item->quantity }}</td>
                                    <td>{{ $item->total }}</td>
                                </tr>
                                @endforeach

                                <tr style="border:none;">
                                    
                                    <td  rowspan="5" colspan="2"> 
                                    <table style="border: 2px; border-style: dashed;line-height: 20px;">
                                        <tr>
                                            <td>Due in this Bill</td>
                                            <td style="min-width:70px;"><strong>{{$order->due}}</strong></td>
                                        </tr>
                                        <tr onclick="myFunction()">
                                            <td>Previous Due</td>
                                            <td><strong><span id="myDIV">{{ $due-$order->due }}</span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Balance</td>
                                            <td><strong>{{  $due }}</strong></td>
                                        </tr>
                                    </table>
                                    </td>
                                    <td colspan="2"><strong>Subtotal</strong></td>                                    
                                    <td><strong>{{ $order->sub_total }}</strong></td>
                                </tr>
                                <tr style="border:none;">
                                    <td colspan="2"><strong>Discount</strong></td>
                                    <td><strong>{{ $order->discount }} </strong></td>
                                </tr>
                                <tr style="border:none;">
                                    <td colspan="2"><strong>Tax</strong></td>
                                    <td><strong>{{ $order->vat }}</strong></td>
                                </tr>

                                <tr style="border:none;">
                                    <td colspan="2"><strong>Cash Pay</strong></td>
                                    <td><strong>{{ $order->pay }}</strong></td>
                                </tr>
                               
                                <tr style="border:none;">
                                    <td colspan="2"><strong>Due Amount</strong></td>
                                    <td><strong>{{ $order->due }}</strong></td>
                                </tr>
                                
                                </tbody>
                            </table>
                            <table class="default-table invoice-table" pt-3>
                                
                                <tr>
                                    <td style="text-align: center;"><br><br><br><strong><hr style="margin:1px;">Customer Sign</strong></td>
                                    <td style="text-align: center;"><br><br><br><strong><hr style="margin:1px;">M.P.O Sign</strong></td>
                                    <td style="text-align: center;"><br><br><br><strong><hr style="margin:1px;">Authorized Sign</strong></td>
                                </tr>
                                
                            </table>
                             </div>
                        </div>

                    </div>
                     <!-- <div class="invoice-informeshon-footer">
                        <ul>
                            <li>Genereted by: <a href="http://www.etutorpro.com">www.etutorpro.com</a></li>
                            <li>Email: <a href="mailto:abir43tee@gmail.com">abir43tee@gmail.com</a></li>
                            <li>Mobile: <a href="tel:+88-01711427737">(+88)01711427737</a></li>
                        </ul> 
                    </div> -->
                </div>
                <div class="invoice-btn-section clearfix d-print-none">
                    <a href="javascript:window.print()" class="btn btn-lg btn-print">
                        <i class="fa fa-print"></i> Print Invoice
                    </a>
                    <a id="invoice_download_btn" class="btn btn-lg btn-download">
                        <i class="fa fa-download"></i> Download Invoice
                    </a>
                    <a href="{{ route('pos.index') }}" id="" class="btn btn-lg btn-info">
                        <i class="fa fa-download"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Invoice -->

<script src="{{ asset('assets/invoice/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/invoice/js/jspdf.min.js') }}"></script>
<script src="{{ asset('assets/invoice/js/html2canvas.js') }}"></script>
<script src="{{ asset('assets/invoice/js/app.js') }}"></script>

<script>
    function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

</body>
</html>
