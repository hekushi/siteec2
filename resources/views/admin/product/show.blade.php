@extends('admin.admin_layouts')

 

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        
        <span class="breadcrumb-item active">商品の種類</span>
      </nav>

      <div class="sl-pagebody">


 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">商品詳細ページ</h6>
           
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">商品名: <span class="tx-danger">*</span></label><br>
                 <strong>{{ $product->product_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">商品コード: <span class="tx-danger">*</span></label><br>
                 <strong>{{ $product->product_code }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">数量: <span class="tx-danger">*</span></label><br>
                  <strong>{{ $product->product_quantity }}</strong>
                  
                </div>
              </div><!-- col-4 -->
               
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">カテゴリー: <span class="tx-danger">*</span></label><br>
                  <strong>{{ $product->category_name }}</strong>
       
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">サブカテゴリー: <span class="tx-danger">*</span></label><br>
                  <strong>{{ $product->subcategory_name }}</strong>
       
                </div>
              </div><!-- col-4 -->



              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
          <label class="form-control-label">ブランド: <span class="tx-danger">*</span></label>
               <br>
                  <strong>{{ $product->brand_name }}</strong>
                </div>
              </div><!-- col-4 -->


<div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">サイズ: <span class="tx-danger">*</span></label>
                    <br>
                  <strong>{{ $product->product_size }}</strong>
                </div>
              </div><!-- col-4 -->

<div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">色: <span class="tx-danger">*</span></label>
                    <br>
                  <strong>{{ $product->product_color }}</strong>
 
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">値引き価格: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->selling_price }}</strong>
                 
                </div>
              </div><!-- col-4 -->


               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">商品説明: <span class="tx-danger">*</span></label>
                  <br>
                 <p>   {!! $product->product_details !!} </p>
    
                </div>
              </div><!-- col-4 -->

                <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">動画URL: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->video_link }}</strong>
                   
                </div>
              </div><!-- col-4 -->



 <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">画像1 ( Main Thumbnali): <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
           
            <img src="{{ URL::to($product->image_one) }}" style="height: 80px; width: 80px;">
            </label>

                </div>
              </div><!-- col-4 -->


               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">画像2: <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
           <img src="{{ URL::to($product->image_two) }}" style="height: 80px; width: 80px;">
            </label>

                </div>
              </div><!-- col-4 -->




 <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">画像3: <span class="tx-danger">*</span></label><br>
                 <label class="custom-file">
           <img src="{{ URL::to($product->image_three) }}" style="height: 80px; width: 80px;">

            </label>

                </div>
              </div><!-- col-4 --> 

            </div><!-- row -->

  <hr>
  <br><br>

          <div class="row">

        <div class="col-lg-4">
        <label class="">
         @if($product->main_slider == 1)
         <span class="badge badge-success">設定中</span>

         @else
       <span class="badge badge-danger">未設定</span>
         @endif 

          <span>Main Slider</span>
        </label>

        </div> <!-- col-4 --> 

         <div class="col-lg-4">
        <label class="">
         @if($product->hot_deal == 1)
         <span class="badge badge-success">設定中</span>

         @else
       <span class="badge badge-danger">未設定</span>
         @endif 
          
          <span>Hot Deal</span>
        </label>

        </div> <!-- col-4 --> 



         <div class="col-lg-4">
       <label class="">
         @if($product->best_rated == 1)
         <span class="badge badge-success">設定中</span>

         @else
       <span class="badge badge-danger">未設定</span>
         @endif 
          
          <span>Best Rated</span>
        </label>

        </div> <!-- col-4 --> 


         <div class="col-lg-4">
       <label class="">
         @if($product->trend == 1)
         <span class="badge badge-success">設定中</span>

         @else
       <span class="badge badge-danger">未設定</span>
         @endif 
        
          <span>Trend Product </span>
        </label>

        </div> <!-- col-4 --> 

 <div class="col-lg-4">
        <label class="">
         @if($product->mid_slider == 1)
         <span class="badge badge-success">設定中</span>

         @else
       <span class="badge badge-danger">未設定</span>
         @endif 
          
          <span>Mid Slider</span>
        </label>

        </div> <!-- col-4 --> 

<div class="col-lg-4">
       <label class="">
         @if($product->hot_new == 1)
         <span class="badge badge-success">設定中</span>

         @else
       <span class="badge badge-danger">未設定</span>
         @endif 
          
          <span>Hot New </span>
        </label>

        </div> <!-- col-4 --> 
 

          </div><!-- end row --> 
 
 

            
          </div><!-- form-layout -->
        </div><!-- card -->
 
        
        </div><!-- row -->

  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
 
 

 

 
@endsection
