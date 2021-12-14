@extends('layouts.app')
@section('content')

@php
$order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp 

<div class="contact_form">
  <div class="container"> 
    <div class="row">
      <div class="col-8 card">
        <table class="table table-response">
          <thead>
            <tr>
              <th scope="col">支払い方法</th>
              <th scope="col">返品について </th>
              <th scope="col">金額 </th>
              <th scope="col">日付 </th>
              <th scope="col">状態</th>
              
              <th scope="col">Action </th>

            </tr>
          </thead>
          <tbody>
            @foreach($order as $row)
            <tr>
              <td scope="col">{{ $row->payment_type }} </td>

              <td scope="col">

              @if($row->return_order == 0)
              <span class="badge badge-warning">依頼なし</span>
              @elseif($row->return_order == 1)
              <span class="badge badge-info">保留中</span>
                @elseif($row->return_order == 2)
                <span class="badge badge-warning">完了</span>
                 
              @endif   
        </td>

              <td scope="col">￥{{ $row->total }}</td>
              <td scope="col">{{ $row->date }}  </td>

               <td scope="col">
          @if($row->status == 0)
          <span class="badge badge-warning">保留</span>
          @elseif($row->status == 1)
          <span class="badge badge-info">お支払い方法</span>
            @elseif($row->status == 2)
            <span class="badge badge-warning">進捗状況</span>
            @elseif($row->status == 3)
            <span class="badge badge-success">お届け</span>
            @else
            <span class="badge badge-danger">キャンセル</span>

          @endif  

                </td> 
              
              <td scope="col">
             @if($row->return_order == 0)
  <a href="{{ url('request/return/'.$row->id) }}" class="btn btn-sm btn-danger" id="return"> Return</a>
              @elseif($row->return_order == 1)
              <span class="badge badge-info">未決定</span>
                @elseif($row->return_order == 2)
                <span class="badge badge-warning">成功</span>
                 
              @endif    
              
               </td>
            </tr>
             @endforeach

          </tbody>
          
        </table>
        
      </div>

      <div class="col-4">
        <div class="card">
          <img src="{{ asset('frontend/images/kaziariyan.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;">
          <div class="card-body">
            <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
            
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"> <a href="{{ route('password.change') }}">パスワードを変更する</a>  </li>
             {{-- <li class="list-group-item">Edit Profile</li> --}}
              <li class="list-group-item"><a href="{{ route('success.orderlist') }}"> 返品</a> </li> 
          </ul>

          <div class="card-body">
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">ログアウト</a>
            
          </div>
          
        </div>
        
      </div>

    </div>

  </div>
  

</div>





@endsection
