<html>
    <head>
        <style>
            table{
                border: solid 1px black;
            }

            table tr td{
                border: solid 1px black;
            }

            table th{
                font-size: 20px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    </head>
    <body>
        {{-- <div> --}}
            {{-- <div style="width: 100%"> --}}
                <div style="width: 100%">
                    <div style="width: 50%">
                        {{-- <img class="mb-2 width-50" src="../../../app-assets/images/logo/materialize-logo-big.png" alt="company logo"> --}}
                        <h4 style="margin-bottom: 5px">125, ABC Street, New Yourk, USA</h4>
                        <h4 style="margin-top: 0">888-555-2311</h4>
                    </div>
                    <div style="width: 50%; font-size: 30px">
                        <h2>Our Company Name</h2>
                    </div>
                </div>
                <div style="width: 100%">
                    <div style="width: 50%">-
                        @if(isset($data->customer))
                            <h6 class="text-uppercase strong mb-2 mt-3">Recipient</h6>
                            <p class="text-uppercase">Jonathan Doe</p>
                            <p>125, ABC Street, New Yourk, USA</p>
                            <p>VAT no.: 18012384</p>
                        @endif
                    </div>
                    <div style="width: 50%">
                        <div>
                            <p><span class="text-uppercase strong">Order No.</span> 324/2019</p>
                        </div>
                        <div>
                            <p><span class="text-uppercase strong">Order Date</span> {{ Carbon\Carbon::now()}}</p>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
            <table style="width: 100%; margin-top: 20px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Unit Price</th>
                        <th>Unit</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @php($total = 0)
                    @foreach($data->detailorder as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->price->first()->price }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->product->price->first()->price * $item->qty }}</td>
                        </tr>
                        @php($total = $total + ($item->price * $item->qty))
                    @endforeach
                <tr class="border-none">
                    <td colspan="3"></td>
                    <td>Total:</td>
                    <td>Rp.{{ number_format($total) }}</td>
                </tr>
                @php($disc = ($data->discount_percentage/100)*$total)
                <tr class="border-none">
                    <td colspan="3"></td>
                    <td>Discount:</td>
                    <td>{{ isset($data->discount_percentage) || $data->discount_percentage != null ? $data->discount_percentage : '0' }}% Rp.{{ number_format($disc) }}</td>
                </tr>
                @php($tax = (10/100)*($total-$disc))
                <tr class="border-none">
                    <td colspan="3"></td>
                    <td>Tax:</td>
                    <td>Rp.{{ number_format($tax) }}</td>
                </tr>
                <tr class="border-none">
                    <td colspan="3"></td>
                    <td class="cyan white-text pl-1">Grand Total</td>
                    <td class="cyan strong white-text">Rp.{{ number_format($total-$disc+$tax) }}</td>
                </tr>
                </tbody>
            </table>
            <script>
                $(document).ready(function(){
                    window.print();
                    setTimeout(window.close, 0);
                });
            </script>
        {{-- </div> --}}
    {{-- {{-- </body> --}}
</html>
