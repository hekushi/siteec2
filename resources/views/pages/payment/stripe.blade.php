@extends('layouts.app')

@section('content')
@include('layouts.menubar')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge; 
$vat = $setting->vat; 
$cart = Cart::Content();
@endphp


<style>
  /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;
  width: 100%;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>









       
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

<div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">カート商品</div>

          
                          <div class="cart_items">
                            <ul class="cart_list">
                              
                              @foreach($cart as $row)

        <li class="cart_item clearfix">
             


            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                 <div class="cart_item_name cart_info_col">
                    <div class="cart_item_title"><b>商品画像</b></div>
                    <div class="cart_item_text"><img src="{{ asset($row->options->image) }} " style="width: 70px; width: 70px;" alt=""></div>
                </div>


                <div class="cart_item_name cart_info_col">
                    <div class="cart_item_title"><b>商品名</b></div>
                    <div class="cart_item_text">{{ $row->name  }}</div>
                </div>

                @if($row->options->color == NULL)

                @else
                <div class="cart_item_color cart_info_col">
                    <div class="cart_item_title"><b>色</b></div>
                    <div class="cart_item_text"> {{ $row->options->color }}</div>
                </div>
                 @endif
 

                @if($row->options->size == NULL)

                @else
                <div class="cart_item_color cart_info_col">
                    <div class="cart_item_title"><b>サイズ</b></div>
                    <div class="cart_item_text"> {{ $row->options->size }}</div>
                </div>
                @endif
                  

                <div class="cart_item_quantity cart_info_col">
                    <div class="cart_item_title"><b>数量</b></div> 
                 <div class="cart_item_text"> {{ $row->qty }}</div>
           
                </div>



                <div class="cart_item_price cart_info_col">
                    <div class="cart_item_title"><b>価格</b></div>
                    <div class="cart_item_text">￥{{ $row->price }}</div>
                </div>
                <div class="cart_item_total cart_info_col">
                    <div class="cart_item_title"><b>合計</b></div>
                    <div class="cart_item_text">￥{{ $row->price*$row->qty }}</div>
                </div>

                 
            </div>
        </li>
                                @endforeach
                            </ul>
                        </div>

        <ul class="list-group col-lg-8" style="float: right;">
            @if(Session::has('coupon'))
            <li class="list-group-item">小計 : <span style="float: right;">
            ￥{{ Session::get('coupon')['balance'] }} </span> </li>
             <li class="list-group-item">クーポン: ({{ Session::get('coupon')['name'] }} )
              <a href="{{ route('coupon.remove') }}" class="btn btn-danger btn-sm">X</a>
           <span style="float: right;">￥{{ Session::get('coupon')['discount'] }} </span> </li>
            @else
            <li class="list-group-item">小計 : <span style="float: right;">
            ￥{{  Cart::Subtotal() }} </span> </li>
            @endif
            
          

            <li class="list-group-item">送料 : <span style="float: right;">￥{{ $charge  }} </span> </li>
            <li class="list-group-item">消費税 : <span style="float: right;">￥{{ Cart::Subtotal()*$vat }} </span> </li>
            @if(Session::has('coupon'))
            <li class="list-group-item">合計 : <span style="float: right;">￥{{ Session::get('coupon')['balance'] + $charge + $vat }} </span> </li>
            @else
      <li class="list-group-item">合計 : <span style="float: right;">￥{{ Cart::Subtotal() + $charge + (Cart::Subtotal()*$vat) }} </span> </li>
            @endif
           
          </ul> 

           

                    </div>
                </div>

 
 


<div class="col-lg-5" style="border: 1px solid grey; padding: 20px; border-radius: 25px;"> 
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">配送先住所</div>

            <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
              @csrf
              <div class="form-row">
                <label for="card-element">
                  クレジットカードまたはデビットカード
                </label>
                <div id="card-element">
                  <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
              </div><br>

      <input type="hidden" name="shipping" value="{{ $charge }} ">
       <input type="hidden" name="vat" value="{{ Cart::Subtotal()*$vat }} ">
       <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge + (Cart::Subtotal()*$vat) }} ">

       <input type="hidden" name="ship_name" value="{{ $data['name'] }} ">
       <input type="hidden" name="ship_phone" value="{{ $data['phone'] }} ">
       <input type="hidden" name="ship_email" value="{{ $data['email'] }} ">
       <input type="hidden" name="ship_zip" value="{{ $data['zip'] }} ">
       <input type="hidden" name="ship_address" value="{{ $data['address'] }} ">
       <input type="hidden" name="ship_city" value="{{ $data['city'] }} ">
       <input type="hidden" name="ship_building" value="{{ $data['building'] }} ">
       <input type="hidden" name="payment_type" value="{{ $data['payment'] }} ">
       <input type="hidden" name="ship_name2" value="{{ $data['name2'] }} ">
       <input type="hidden" name="ship_phone2" value="{{ $data['phone2'] }} ">
       <input type="hidden" name="ship_zip2" value="{{ $data['zip2'] }} ">
       <input type="hidden" name="ship_address2" value="{{ $data['address2'] }} ">
       <input type="hidden" name="ship_city2" value="{{ $data['city2'] }} ">
       <input type="hidden" name="ship_building2" value="{{ $data['building2'] }} ">




              <button class="btn btn-info">今すぐ支払う</button>
            </form>
         

                    </div>
                </div>







            </div>
        </div>
        <div class="panel"></div>
    </div>



 <script type="text/javascript">
   
// Create a Stripe client.
var stripe = Stripe('pk_test_51IN6N6EP0Z7OfSlg4mHoX9DToBawg724IdfFENV2AdPqyeudXfLy1kGUhUGw3EB2XsD9V9Hro1yiN10BmbuzJIDh00Bx7jhN4O');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style, hidePostalCode: true});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}


 </script>








@endsection