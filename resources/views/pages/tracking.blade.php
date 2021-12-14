@extends('layouts.app')

@section('content')
 

<div class="contact_form">
	<div class="container">
		<div class="row">
 
  <div class="col-5 offset-lg-1">
   <div class="contact_form_title"> <h4>お客様のご注文</h4></div>


   <div class="progress">
 
    @if($track->status == 0)
<div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

   @elseif($track->status == 1)
  <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

  <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

  @elseif($track->status == 2)
  <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
  
  <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

  <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

  @elseif($track->status == 3)
  <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

  <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

  <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

  <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

    @else

  <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
    @endif
  
</div><br>

 @if($track->status == 0)
 <h4>Note : お客様のご注文は、承認されています。  </h4>

 @elseif($track->status == 1)
  <h4>Note : お支払い処理中です。  </h4>

   @elseif($track->status == 2)
  <h4>Note : 梱包完了  </h4>

  @elseif($track->status == 3)
  <h4>Note : 発送完了  </h4>

 @else

 <h4>Note : 注文キャンセル  </h4>

 @endif




  </div>









  <div class="col-5 offset-lg-1">
   <div class="contact_form_title"><h4> ご注文内容</h4> </div>
 
  <ul class="list-group col-lg-12">
  	<li class="list-group-item"> <b>お支払い方法:</b> {{ $track->payment_type  }} </li>
  	<li class="list-group-item"> <b>ID:</b> {{ $track->payment_id  }}</li>
  	<li class="list-group-item"> <b>Balance ID:</b> {{ $track->blnc_transection  }}</li>
  	<li class="list-group-item"> <b>小計:</b> ￥ {{ $track->subtotal  }}</li>
  	<li class="list-group-item"> <b>送料:</b> ￥ {{ $track->shipping  }}</li>
  	<li class="list-group-item"> <b>消費税:</b> ￥ {{ $track->vat  }}</li>
  	<li class="list-group-item"> <b>合計:</b> ￥ {{ $track->total  }}</li>
  	<li class="list-group-item"> <b>付き:</b> {{ $track->month  }}</li>
  	<li class="list-group-item"> <b>日付:</b> {{ $track->date  }}</li>
  	<li class="list-group-item"> <b>年:</b> {{ $track->year  }}</li>
  	 

  	
  </ul>

  	
  </div>



			
		</div>
		
	</div>
	
</div>









 
@endsection