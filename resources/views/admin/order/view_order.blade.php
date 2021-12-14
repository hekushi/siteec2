@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel"> 
      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">注文詳細</h6>


  <div class="row">
  	<div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>注文</strong>詳細</div>
         <div class="card-body">
         	<table class="table">
         		<tr>
         	<th> 名前: </th>
         	<th> {{ $order->name }} </th>		
         		</tr>

         		<tr>
         	<th> 電話番号: </th>
         	<th> {{ $order->phone }} </th>		
         		</tr>



         		<tr>
         	<th> 支払い方法: </th>
         	@if($order->payment_type == "oncash")
                <th> <p>銀行振込</p></th> 
                @elseif($order->payment_type == "cashondelivery")
                <th> <p>代金引換</p></th> 
            @else
                <th> {{ $order->payment_type }} </th>		
            </tr>
            @endif



         		<tr>
         	<th> 支払い Id: </th>
         	<th> {{ $order->payment_id }} </th>		
         		</tr>


         		<tr>
         	<th> 合計 : </th>
         	<th> {{ number_format($order->total) }} 円 </th>		
         		</tr>

         		<tr>
         	<th> 月: </th>
         	<th> {{ $order->month }} </th>		
         		</tr>

         			<tr>
         	<th> 日付: </th>
         	<th> {{ $order->date }} </th>		
         		</tr>
         		
         	</table>
         	

         </div>



         </div>     
    </div>



	<div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>発送</strong>詳細</div>
         <div class="card-body">
         	<table class="table">
         		<tr>
         	<th> 名前: </th>
         	<th> {{ $shipping->ship_name }} </th>		
         		</tr>

         		<tr>
         	<th> 電話番号: </th>
         	<th> {{ $shipping->ship_phone }} </th>		
         		</tr>



         		<tr>
         	<th> メールアドレス: </th>
         	<th>{{ $shipping->ship_email }} </th>		
         		</tr>


             <tr>
              <th> 郵便番号: </th>
              <th> {{ $shipping->ship_zip }} </th>		
                </tr>
         		<tr>
         	<th> 住所: </th>
         	<th> {{ $shipping->ship_address }}<br>{{ $shipping->ship_city }}<br>{{ $shipping->ship_building }} </th>		
         		</tr>

             @if($shipping->ship_name2 == NULL)
            @else
            
            <div class="alert alert-danger" role="alert">
                発送先が異なります。
              </div>
            <tr>
                <th> 発送先の名前: </th>
                <th> {{ $shipping->ship_name2 }} </th>		
            </tr>
            @endif

            @if($shipping->ship_phone2 == NULL)
            @else
            <tr>
                <th> 発送先の電話番号: </th>
                <th> {{ $shipping->ship_phone2 }} </th>		
            </tr>
            @endif

            @if($shipping->ship_zip2 == NULL)
            @else
            <tr>
                <th> 発送先の郵便番号: </th>
                <th> {{ $shipping->ship_zip2 }} </th>		
            </tr>
            @endif

            @if($shipping->ship_address2 == NULL)
            @else
            <tr>
                <th> 発送先の住所: </th>
                <th> {{ $shipping->ship_address2}}<br>{{ $shipping->ship_city2}}<br>{{ $shipping->ship_building2}} </th>		
            </tr>
            @endif


         		

         		<tr>
         	<th> 状態: </th>
         	<th>
         	@if($order->status == 0)
         	<span class="badge badge-warning">新規注文</span>
         	@elseif($order->status == 1)
         	<span class="badge badge-info">支払い確認</span>
            @elseif($order->status == 2)
            <span class="badge badge-warning">準備中</span>
            @elseif($order->status == 3)
            <span class="badge badge-success">発送完了</span>
            @else
            <span class="badge badge-danger">キャンセル</span>

         	@endif  

         	 </th>	

         		</tr>
 
         		
         	</table> 
         </div> 

         </div>     
    </div>

 

  </div>


 <div class="row">

 <div class="card pd-20 pd-sm-40 col-lg-12">
          <h6 class="card-body-title">商品詳細</h6>
           

          <div class="table-wrapper">
            <table class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">商品 ID</th>
                  <th class="wd-15p">商品名</th>
                  <th class="wd-15p">画像</th>
                  <th class="wd-15p">色</th>
                  <th class="wd-15p">サイズ</th>
                  <th class="wd-15p">数量</th>
                  <th class="wd-15p">単価</th>
                  <th class="wd-20p">合計</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($details as $row)
                <tr>
                  <td>{{ $row->product_code }}</td>
                  <td>{{ $row->product_name }}</td>

             <td> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"> </td>
                 <td>{{ $row->color }}</td>
                 <td>{{ $row->size }}</td>
                 <td>{{ $row->quantity }}</td>
                 <td>{{ $row->singleprice }}</td>
                 <td>{{ $row->totalprice }}</td>
 
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

 	
 </div>


  @if($order->status == 0)
  <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info">支払い確認</a>
  <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger">注文キャンセル</a>
  @elseif($order->status == 1)
  <a href="{{ url('admin/delevery/process/'.$order->id) }}" class="btn btn-info">配送</a>
  @elseif($order->status == 2)
  <a href="{{ url('admin/delevery/done/'.$order->id) }}" class="btn btn-success">配達完了</a>
  @elseif($order->status == 4)
  <strong class="text-danger text-center"> この注文は無効</strong>
  @else
  <strong class="text-success text-center">この商品は配達まで完了しています</strong>
  @endif


  



     </div>
   </div>
</div>
 @endsection
      	