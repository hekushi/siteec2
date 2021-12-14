@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>権限者</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">権限者一覧
  <a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning" style="float: right;">追加</a>
          </h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">名前</th>
                  <th class="wd-15p">電話番号</th>
                  <th class="wd-15p">権限</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($user as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>

                  @if($row->category == 1)
                   <span class="badge btn-danger">カテゴリー</span> 
                  @else
                  @endif  


                   @if($row->coupon == 1)
                   <span class="badge btn-info">クーポン</span> 
                  @else
                  @endif  


                   @if($row->product == 1)
                   <span class="badge btn-warning">商品</span> 
                  @else
                  @endif  



                   @if($row->blog == 1)
                   <span class="badge btn-primary">ブログ</span> 
                  @else
                  @endif  



                   @if($row->order == 1)
                   <span class="badge btn-success">注文</span> 
                  @else
                  @endif  



                   @if($row->other == 1)
                   <span class="badge btn-danger">その他</span> 
                  @else
                  @endif  


                   @if($row->report == 1)
                   <span class="badge btn-info">レポート</span> 
                  @else
                  @endif  



                   @if($row->role == 1)
                   <span class="badge btn-warning">権限</span> 
                  @else
                  @endif  


                   @if($row->return == 1)
                   <span class="badge btn-primary">返品</span> 
                  @else
                  @endif  


                    @if($row->contact == 1)
                   <span class="badge btn-success">お問い合わせ</span> 
                  @else
                  @endif 


                    @if($row->comment == 1)
                   <span class="badge btn-danger">レビュー</span> 
                  @else
                  @endif 

                    @if($row->setting == 1)
                   <span class="badge btn-info">設定</span> 
                  @else
                  @endif 

                   @if($row->stock == 1)
                   <span class="badge btn-info">在庫</span> 
                  @else
                  @endif 

                   


                  </td>
                  <td>
                    <a href="{{ URL::to('edit/admin/'.$row->id) }} " class="btn btn-sm btn-info">編集</a>
                    <a href="{{ URL::to('delete/admin/'.$row->id) }}" class="btn btn-sm btn-danger">削除</a>
                  </td>
                   
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->



 

 

@endsection