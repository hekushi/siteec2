@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>CONTACT</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">contact message</h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">名前</th>
                  <th class="wd-15p">電話番号</th>
                  <th class="wd-15p">メールアドレス</th>
                  <th class="wd-20p">メッセージ</th> 
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($message as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>{{ $row->email }}  </td>
                  <td>{{ $row->message }}  </td>
                  

                  <td>
                    <a href=" " class="btn btn-sm btn-info">詳細</a>
                    
                  </td>
                   
                </tr>
                @endforeach
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        

 
    </div><!-- sl-mainpanel -->


 
 

@endsection