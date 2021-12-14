@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>サブカテゴリー欄</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">サブカテゴリー一覧
  <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">追加</a>
          </h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">サブカテゴリー名</th>
                  <th class="wd-15p">カテゴリー名</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($subcat as $key=>$row)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{ $row->subcategory_name }}</td>
                   <td>{{ $row->category_name }}</td>
                  <td>
                    <a href="{{ URL::to('edit/subcategory/'.$row->id) }} " class="btn btn-sm btn-info">編集</a>
                    <a href="{{ URL::to('delete/subcategory/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">削除</a>
                  </td>
                   
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->



  <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">サブカテゴリー追加</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
             
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
       <form method="post" action="{{ route('store.subcategory') }}">
        @csrf
         <div class="modal-body pd-20"> 
        <div class="form-group">
          <label for="exampleInputEmail1">サブカテゴリー名</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sub Category" name="subcategory_name">
          
        </div>



        <div class="form-group">
          <label for="exampleInputEmail1">カテゴリー名</label>
           <select class="form-control" name="category_id">
         
          @foreach($category as $row)
          <option value="{{ $row->id }}"> {{ $row->category_name }}  </option> 
          @endforeach  

           </select>
          
        </div>
          
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">決定</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">閉じる</button>
              </div>
                </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

 

@endsection