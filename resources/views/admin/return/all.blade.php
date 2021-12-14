@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>返品</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">返品一覧</h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">支払い方法</th>
                  <th class="wd-15p">Transction ID</th>
                  <th class="wd-15p">小計</th>
                  <th class="wd-20p">送料</th>
                  <th class="wd-20p">合計</th>
                  <th class="wd-20p">日付</th>
                  <th class="wd-20p">返品状況</th>
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
             @if($row->return_order == 1)
            <span class="badge badge-warning">保留中</span>
            @elseif($row->return_order == 2)
            <span class="badge badge-success">完了</span> 
          @endif  

               </td>

                  <td>
                   <span class="badge badge-success">返品完了</span> 
                    
                  </td>
                   
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->


 
 

@endsection