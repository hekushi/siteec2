@extends('layouts.app')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_responsive.css') }}">

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">サブカテゴリー商品</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">カテゴリー</div>
							<ul class="sidebar_categories">
								@foreach($categorys as $cat)
								<li><a href="#">{{ $cat->category_name }}</a></li>
								@endforeach
								 
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">検索</div>
							<div class="sidebar_subtitle">価格</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>範囲: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						 
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">ブランド</div>
							<ul class="brands_list">
								@foreach($brands as $row)
								@php
                                $brand = DB::table('brands')->where('id',$row->brand_id)->first();
								@endphp
								<li class="brand"><a href="#">{{ $brand->brand_name }}</a></li>
								@endforeach
								 
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>186</span> 見つかった商品</div>
							<div class="shop_sorting">
								<span>並び替え:</span>
								<ul>
									<li>
										<span class="sorting_text">最高評価<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>最高評価</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>商品名</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>価格</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid row">
							<div class="product_grid_border"></div>

                     @foreach($products as $pro)
							<!-- Product Item -->
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($pro->image_one) }}" alt="" style="height: 100px; width: 100px;"></div>
								<div class="product_content">
									
					  @if($pro->discount_price == NULL)
<div class="product_price discount">￥{{ $pro->selling_price }}<span> </div>
      @else
<div class="product_price discount">￥{{ $pro->discount_price }}<span>${{ $pro->selling_price }}</span></div>
      @endif				

 <div class="product_name"><div><a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}" tabindex="0">{{ $pro->product_name  }} </a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								

								 <ul class="product_marks">
       @if($pro->discount_price == NULL)
       <li class="product_mark product_new" style="background: blue;">New</li>
       @else
                       <li class="product_mark product_new" style="background: red;">
                       @php
                         $amount = $pro->selling_price - $pro->discount_price;
                         $discount = $amount/$pro->selling_price*100;

                       @endphp
                       
                       {{ intval($discount) }}%

                      </li>  
                        @endif     
            </ul> 
							</div>
                          @endforeach

						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							 
							 
                               {{ $products->links() }}
							  
							 
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>




@endsection