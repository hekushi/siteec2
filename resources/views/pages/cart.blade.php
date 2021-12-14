@extends('layouts.app')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">ショッピングカート</div>
						<div class="cart_items">
							<ul class="cart_list">
                              
                              @foreach($cart as $row)

		<li class="cart_item clearfix">
			<div class="cart_item_image text-center"><br><img src="{{ asset($row->options->image) }} " style="width: 70px; width: 70px;" alt=""></div>
			<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
				<div class="cart_item_name cart_info_col">
					<div class="cart_item_title">商品名</div>
					<div class="cart_item_text">{{ $row->name  }}</div>
				</div>

				@if($row->options->color == NULL)

                @else
				<div class="cart_item_color cart_info_col">
					<div class="cart_item_title">色</div>
					<div class="cart_item_text"> {{ $row->options->color }}</div>
				</div>
				 @endif
 

                @if($row->options->size == NULL)

                @else
                <div class="cart_item_color cart_info_col">
					<div class="cart_item_title">サイズ</div>
					<div class="cart_item_text"> {{ $row->options->size }}</div>
				</div>
                @endif
                  

				<div class="cart_item_quantity cart_info_col">
					<div class="cart_item_title">数量</div><br> 

           <form method="post" action="{{ route('update.cartitem') }}">
           	@csrf
           	<input type="hidden" name="productid" value="{{ $row->rowId }}">
           	<input type="number" name="qty" value="{{ $row->qty }}" style="width: 50px;">
           	<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check-square"></i> </button>
 
           </form>  
				</div>



				<div class="cart_item_price cart_info_col">
					<div class="cart_item_title">価格</div>
					<div class="cart_item_text">￥{{ number_format($row->price )}}</div>
				</div>
				<div class="cart_item_total cart_info_col">
					<div class="cart_item_title">合計</div>
					<div class="cart_item_text">￥{{ number_format($row->price*$row->qty) }}</div>
				</div>

                <div class="cart_item_total cart_info_col">
					<div class="cart_item_title">取り消し</div><br>
	 <a href="{{ url('remove/cart/'.$row->rowId ) }}" class="btn btn-sm btn-danger">x</a>
				</div>



			</div>
		</li>
								@endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">ご注文合計:</div>
								<div class="order_total_amount">￥{{ number_format(Cart::total()) }}</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">取り消し</button>
	 <a href="{{ route('user.checkout') }}"  class="button cart_button_checkout">お支払いに進む</a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
@endsection