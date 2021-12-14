@extends('admin.admin_layouts')

 

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        
        <span class="breadcrumb-item active">サイト設定</span>
      </nav>

      <div class="sl-pagebody">

 
 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">サイト設定</h6>
           

       <form method="post" action="{{ route('update.sitesetting')  }}" >    
        @csrf

       <input type="hidden" name="id" value="{{ $setting->id }}"> 

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">電話番号1: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_one" required="" value="{{ $setting->phone_one }}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">電話番号2: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_two" required="" value="{{ $setting->phone_two }}">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">メールアドレス: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email" required="" value="{{ $setting->email }}">
                </div>
              </div><!-- col-4 -->




<div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">会社名: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_name" required="" value="{{ $setting->company_name }}">
                </div>
              </div><!-- col-4 -->
 
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">会社住所: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_address" required="" value="{{ $setting->company_address }}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Facebook: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="facebook" required="" value="{{ $setting->facebook }}">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Youtube: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="youtube" required="" value="{{ $setting->youtube }}">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Instagram: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="instagram" required="" value="{{ $setting->instagram }}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">twitter: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="twitter" required="" value="{{ $setting->twitter }}">
                </div>
              </div><!-- col-4 -->


 

            </div><!-- row -->

  <hr>
 
 

          </div><!-- end row --> 
<br><br>


            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">更新する</button>
           
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        </form> 



        
        </div><!-- row -->

  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
 
 
 
 

@endsection
