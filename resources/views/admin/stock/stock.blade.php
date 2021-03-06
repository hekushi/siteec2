@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>在庫覧</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">在庫一覧</h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">商品コード</th>
                  <th class="wd-15p">商品名</th>
                  <th class="wd-15p">画像</th>
                  <th class="wd-15p">カテゴリー</th>
                  <th class="wd-15p">ブランド</th>
                  <th class="wd-15p">数量</th>
                  <th class="wd-15p">状態</th>
                 
                  
                </tr>
              </thead>
              <tbody>
                @foreach($product as $row)
                <tr>
                  <td>{{ $row->product_code }}</td>
                  <td>{{ $row->product_name }}</td>

             <td> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"> </td>
                 <td>{{ $row->category_name }}</td>
                 <td>{{ $row->brand_name }}</td>
                 <td>{{ $row->product_quantity }}</td>
                 <td> 
                  @if($row->status == 1)
                <span class="badge badge-success">販売中</span>
                  @else
                <span class="badge badge-danger">休止中</span>
                  @endif                  

                </td>
 
                   
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->


 
 

@endsection