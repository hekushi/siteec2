@extends('admin.admin_layouts')

 

@section('admin_content')

@php

 $blogcategory = DB::table('post_category')->get();
@endphp

  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        
        <span class="breadcrumb-item active">ブログ欄</span>
      </nav>

      <div class="sl-pagebody">


 <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">記事更新
 <a href="{{ route('all.blogpost')}}" class="btn btn-success btn-sm pull-right">全記事</a>
          </h6>
          

       <form method="post" action="{{ url('update/post/'.$post->id) }}" enctype="multipart/form-data">    
        @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">記事タイトル: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en" value="{{ $post->post_title_en }}"  >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (ENGLISH): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_in"  value="{{ $post->post_title_in }}">
                </div>
              </div><!-- col-4 -->
              
               
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">ブログカテゴリー: <span class="tx-danger">*</span></label>
       <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($blogcategory as $row)
                    <option value="{{ $row->id }}"
                  <?php if ($row->id == $post->category_id) {
                   echo "selected"; } ?> >
                      {{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

 
 

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">商品詳細: <span class="tx-danger">*</span></label>
  
            <textarea class="form-control" id="summernote"  name="details_en"> 

             {!! $post->details_en !!}
     
             </textarea>
                   
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details (ENGLISH): <span class="tx-danger">*</span></label>
  
            <textarea class="form-control" id="summernote1"  name="details_in"> 
                {!! $post->details_in !!}
             </textarea>
                   
                </div>
              </div><!-- col-4 -->


               



 <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">投稿画像: <span class="tx-danger">*</span></label>
                 <label class="custom-file">
          <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" >
          <span class="custom-file-control"></span>
          <img src="#" id="one">
            </label>

                </div>
              </div><!-- col-4 -->


               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">現在の画像: <span class="tx-danger">*</span></label>
                 <label class="custom-file">

               <img src="{{ URL::to($post->post_image) }}" style="height: 80px; width: 130px;">
               <input type="hidden" name="old_image" value="{{ $post->post_image }}">      
           
            </label>

                </div>
              </div><!-- col-4 -->

 

            </div><!-- row -->

  

          </div><!-- end row --> 
<br><br>


            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">編集する</button>
               
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        </form> 



        
        </div><!-- row -->

  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
 
 


 <script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

 

 

@endsection
