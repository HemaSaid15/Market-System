@extends('layouts.app')

@section('title' , 'Market - New Bill ')


@section('StyleLinks')
    <script src="{{ asset('assets/js/jQuery-3.6.1.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            
            $("select[name=product]").on('change' , function () {

                let product = $(this).val();
                // console.log(productName);
                let url = "{{ URL::to('/bill/total')}}/" + product ;
                if(product)
                {
                    $.ajax({
                        url:url,
                        type:"GET",
                        datatype:"json",
                        success: function (data)
                        {
                            $('select[name=price]').empty();

                            for (price of data)
                            {
                                $('select[name=price]').append(`<option value="${ price.Price} ">${ price.Price }</option>`);
                                let amount = $("input[name=amount]").val();
                                let Catchedprice = $('select[name=price]').val();
                                $("input[name=total]").val(amount * Catchedprice);
                            }
                        },
                        error: function (data) { console.log("Error")} ,
                    });
                }
            });

            $("input[name=amount]").on('change' , function () {

                var amount = $(this).val();
                // alert(amount);
                let price = $("select[name=price]").val();
                // alert(price);
                $("input[name=total]").val(amount * price);

            });     
        });
    </script>

@endsection

@section('content')

    <form class="row g-3" method="POST" action="{{ route('bill.store') }}">

        @csrf

        @php
            $BillNumber = "00" . mt_rand(0 , 50);
        @endphp

        <h3> Bill Information </h3>

        <hr>

        <div class="col-md-6">
            <label class="form-label">Bill Number</label>
            <input type="text" name="BillNumber" readonly class="form-control" value="{{ $BillNumber }}">
            <span class="text-danger">{{ $errors->first('BillNumber') }}</span>
        </div>

        <div class="col-md-6">
            <label class="form-label">Select User</label>
            <select name ="user_id" class="form-select" >
                <option selected>{{ old('user_id') }}</option>
                @foreach ($users as $user )
                    <option value="{{ $user->id }}">{{ $user->name }} </option>
                @endforeach
                <option>Null</option>
            </select>
            <span class="text-danger">{{ $errors->first('user_id') }}</span>
        </div>
        
        <div class="col-md-6">
            <label class="form-label">Select Product</label>
            <select name ="product" class="form-select" >
                <option selected>{{ old('product') }}</option>
                @foreach ($products as $product )
                    <option>{{ $product->ProductName }} </option>
                @endforeach
                <option>Null</option>
            </select>
            <span class="text-danger">{{ $errors->first('product') }}</span>
        </div>
        
        <div class="col-md-6">
            <label class="form-label">Price</label>
            <select name ="price" class="form-select" >

            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Amount</label>
            <input type="number" name="amount" class="form-select" value="{{ old('amount') }}">
            <span class="text-danger">{{ $errors->first('amount') }}</span>
        </div>

        <div class="col-md-6">
            <label class="form-label">Total</label>
            <input type="number" class="form-control" name="total" value="{{ old('total') }}" readonly>
            <span class="text-danger">{{ $errors->first('total') }}</span>
        </div>

        <h4> For More Products</h4>
        <hr>

        @foreach ($products as $product )
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="product_ids[]" value="{{ $product->id }}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ $product->ProductName }}
                </label>
            </div>
        @endforeach
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-success">Clear</button>
        </div>
    </form>

@endsection