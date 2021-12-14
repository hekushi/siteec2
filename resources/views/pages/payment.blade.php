@extends('layouts.app')

@section('content')
@include('layouts.menubar')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge; 
$vat = $setting->vat; 
@endphp
       
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">カート内商品</div>

          
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
                    <div class="cart_item_title"><b>商品価格</b></div>
                    <div class="cart_item_text">￥{{ number_format($row->price) }}</div>
                </div>
                <div class="cart_item_total cart_info_col">
                    <div class="cart_item_title"><b>合計</b></div>
                    <div class="cart_item_text">￥{{ number_format($row->price*$row->qty) }}</div>
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
             <li class="list-group-item">Coupon : ({{ Session::get('coupon')['name'] }} )
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
                        <div class="contact_form_title text-center">発送先</div>

         <form action="{{ route('payment.process') }}" id="contact_form" method="post">
             @csrf
                            
          <div class="form-group">
    <label for="exampleInputEmail1">お名前</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Full Name " name="name" required="">
         </div>


         <div class="form-group">
    <label for="exampleInputEmail1">電話番号</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Phone " name="phone" required="">
         </div>


         <div class="form-group">
    <label for="exampleInputEmail1">メールアドレス</label>
    <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Email " name="email" required="">
         </div>


         <div class="form-group">
            <label for="exampleInputEmail1">郵便番号</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="zip"  required="" onKeyUp="AjaxZip3.zip2addr('zip', '', 'address', 'address');">
          </div>
    
          <div class="form-group">
            <label for="exampleInputEmail1">住所</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address"  required="">
          </div>



         <div class="form-group">
    <label for="exampleInputEmail1">町名/番地</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your City" name="city" required="">
         </div>

         <div class="form-group">
            <label for="exampleInputEmail1">建物・部屋番号・その他</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your City" name="building">
                 </div>



    <!--====================================================-->
    <p>
        <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          発送先が異なる場合はこちら
        </a>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <div class="form-group">
    <label for="exampleInputEmail1">発送先のお名前</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Full Name " name="name2">
     </div>
    
    
     <div class="form-group">
    <label for="exampleInputEmail1">電話番号</label>
    <input type="tel" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Phone " name="phone2">
     </div>
    
    
    
     <div class="form-group">
    <label for="exampleInputEmail1">郵便番号</label>
    <input type="number" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Address" name="zip2" onKeyUp="AjaxZip3.zip2addr('zip2', '', 'address2', 'address2');">
     </div>
    
    
    
     <div class="form-group">
    <label for="exampleInputEmail1">発送先の住所</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your City" name="address2">
     </div>
    
     <div class="form-group">
      <label for="exampleInputEmail1">町名/番地</label>
      <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your City" name="city2">
       </div>
    
       <div class="form-group">
        <label for="exampleInputEmail1">建物・部屋番号・その他</label>
        <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your City" name="building2">
         </div>
    
     </div>
     </div>

    <div class="contact_form_title text-center">決済方法</div>
    <div class="form-group">
        <ul class="logos_list">
            <li><input type="radio" name="payment" value="stripe"><img src="{{ asset('frontend/images/mastercard.png') }}" style="width: 100px; height: 60px;"> </li>

             <li><input type="radio" name="payment" value="oncash"><img src="{{ asset('frontend/images/bank.png') }}" style="width: 100px; height: 60px;"> </li>

              <li><input type="radio" name="payment" value="cashondelivery"><img src="{{ asset('frontend/images/daibiki.jpg') }}" style="width: 100px; height: 60px;"> </li>
            
        </ul>
        
    </div>
 
  
                            <div class="contact_form_button text-center">
        <button type="submit" class="btn btn-info">確定する</button>
                            </div>
                        </form>

                    </div>
                </div>







            </div>
        </div>
        <div class="panel"></div>
    </div>












@endsection
