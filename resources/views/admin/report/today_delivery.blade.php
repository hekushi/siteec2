@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>今日のレポート</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">今日の発送レポート</h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">決済方法</th>
                  <th class="wd-15p">Transction ID</th>
                  <th class="wd-15p">小計</th>
                  <th class="wd-20p">送料</th>
                  <th class="wd-20p">合計</th>
                  <th class="wd-20p">日付</th>
                  <th class="wd-20p">状態</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($order as $row)
                <tr>
                  <td>{{ $row->payment_type }}</td>
                  <td>{{ $row->blnc_transection }}</td>
                  <td>{{ $row->subtotal }} ￥</td>
                  <td>{{ $row->shipping }} ￥</td>
                  <td>{{ $row->total }} ￥</td>
                  <td>{{ $row->date }}  </td>

                  <td>
             @if($row->status == 0)
             <span class="badge badge-warning">新規注文</span>
             @elseif($row->status == 1)
             <span class="badge badge-info">支払い確認</span>
             @elseif($row->status == 2)
             <span class="badge badge-warning">準備中</span>
             @elseif($row->status == 3)
             <span class="badge badge-success">発送完了</span>
             @else
             <span class="badge badge-danger">キャンセル</span>

          @endif  

               </td>

                  <td>
                    <a href="{{ URL::to('admin/view/order/'.$row->id) }} " class="btn btn-sm btn-info">詳細</a>
                    
                  </td>
                   
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->


 
 

@endsection