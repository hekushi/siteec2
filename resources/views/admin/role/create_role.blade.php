@extends('admin.admin_layouts')

 

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        
        <span class="breadcrumb-item active">権限者欄</span>
      </nav>

      <div class="sl-pagebody">

 
 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">新しい権限者</h6>
          <p class="mg-b-20 mg-sm-b-30">新しい管理者追加</p>

       <form method="post" action="{{ route('store.admin') }}" >    
        @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> 名前: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  placeholder="Enter User Name" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">電話番号: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  placeholder="Enter Phone" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">メールアドレス: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  placeholder="Enter Your Email" required="">
                </div>
              </div><!-- col-4 -->


               <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">パスワード: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="password"  placeholder="Enter Password" required="">
                </div>
              </div><!-- col-4 -->

                
 

            </div><!-- row -->

  <hr>
  <br><br>

          <div class="row">

        <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="category" value="1">
          <span>カテゴリー</span>
        </label>

        </div> <!-- col-4 --> 

         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="coupon" value="1">
          <span>クーポン</span>
        </label>

        </div> <!-- col-4 --> 



         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="product" value="1">
          <span>商品</span>
        </label>

        </div> <!-- col-4 --> 


         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="blog" value="1">
          <span>ブログ</span>
        </label>

        </div> <!-- col-4 --> 

 <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="order" value="1">
          <span>注文</span>
        </label>

        </div> <!-- col-4 --> 

<div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="other" value="1">
          <span>その他</span>
        </label>

        </div> <!-- col-4 --> 


        <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="report" value="1">
          <span>レポート</span>
        </label>

        </div> <!-- col-4 --> 


         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="role" value="1">
          <span>権限</span>
        </label>

        </div> <!-- col-4 --> 


         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="return" value="1">
          <span>返品</span>
        </label>

        </div> <!-- col-4 --> 



         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="contact" value="1">
          <span>お問い合わせ</span>
        </label>

        </div> <!-- col-4 --> 


         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="comment" value="1">
          <span>レビュー</span>
        </label>

        </div> <!-- col-4 --> 


         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="setting" value="1">
          <span>設定</span>
        </label>

        </div> <!-- col-4 --> 


         <div class="col-lg-4">
        <label class="ckbox">
          <input type="checkbox" name="stock" value="1">
          <span>在庫</span>
        </label>

        </div> <!-- col-4 --> 



 

          </div><!-- end row --> 
<br><br>


            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">決定</button>
           
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        </form> 



        
        </div><!-- row -->

  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
 
 
 
 

@endsection
