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
              <th scope="col">決済方法</th>
              <th scope="col">決済 ID </th>
              <th scope="col">金額 </th>
              <th scope="col">日付 </th>
              <th scope="col">状態  </th>
              <th scope="col">ｽﾃｰﾀｽｺｰﾄﾞ</th>
              <th scope="col">実行 </th>

            </tr>
          </thead>
          <tbody>
            @foreach($order as $row)
            <tr>
              <td scope="col">{{ $row->payment_type }} </td>
              <td scope="col">{{ $row->payment_id }} </td>
              <td scope="col">{{ number_format($row->total) }}円  </td>
              <td scope="col">{{ $row->date }}  </td>

               <td scope="col">
          @if($row->status == 0)
          <span class="badge badge-warning">ご注文受付</span>
          @elseif($row->status == 1)
          <span class="badge badge-info">お支払確認</span>
            @elseif($row->status == 2)
            <span class="badge badge-warning">発送準備中</span>
            @elseif($row->status == 3)
            <span class="badge badge-success">発送済み</span>
            @else
            <span class="badge badge-danger">キャンセル</span>

          @endif  

                </td>

              <td scope="col">{{ $row->status_code }}  </td>
              <td scope="col">
             <a href="" class="btn btn-sm btn-info">詳細</a>
               </td>
            </tr>
             @endforeach

          </tbody>
          
        </table>
        
      </div>

      <div class="col-4">
        <div class="card">
          <img src="{{ asset('frontend/images/avatarDefault.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;">
          <div class="card-body">
            <h5 class="card-title text-center">{{ Auth::user()->name }}様</h5>
            
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"> <a href="{{ route('password.change') }}">パスワード変更</a>  </li>
             {{-- <li class="list-group-item">Edit Profile</li> --}}
              <li class="list-group-item"><a href="{{ route('success.orderlist') }}">返品する</a> </li> 
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
