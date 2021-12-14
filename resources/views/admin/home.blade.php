@extends('admin.admin_layouts')

@section('admin_content')

@php

$date = date('d-m-y');
$today = DB::table('orders')->where('date',$date)->sum('total');

$month = date('F');
$month = DB::table('orders')->where('month',$month)->sum('total');

$year = date('Y');
$year = DB::table('orders')->where('year',$year)->sum('total');

$delevery = DB::table('orders')->where('date',$date)->where('status',3)->sum('total');

$return = DB::table('orders')->where('return_order',2)->sum('total');

$product = DB::table('products')->get();
$brand = DB::table('brands')->get();
$user = DB::table('users')->get();

@endphp




  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <span class="breadcrumb-item active">ダッシュボード</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 bg-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">本日の注文</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">￥ {{ number_format($today) }}</h3>
              </div><!-- card-body -->
               
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 bg-info">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">今月の売上</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">￥ {{ number_format($month) }}</h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-purple">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">今年のセールス</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">￥ {{ number_format($year) }}</h3>
              </div><!-- card-body -->
             
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-sl-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">本日発送済み</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">￥ {{ number_format($delevery) }} </h3>
              </div><!-- card-body -->
             
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->

        <br><br>



  <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 bg-danger">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">返品トータル</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">￥ {{ number_format($return) }}</h3>
              </div><!-- card-body -->
               
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 bg-info">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">商品数</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">  {{ count($product)  }}</h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-purple">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">ブランド数</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">  {{ count($brand)  }}</h3>
              </div><!-- card-body -->
             
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-sl-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">会員数</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                {{-- <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span> --}}
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">  {{ count($user)  }} </h3>
              </div><!-- card-body -->
             
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->




  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection