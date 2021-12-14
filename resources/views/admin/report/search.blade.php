@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>レポート検索</h5>
         
        </div><!-- sl-page-title -->

  <div class="row">
    <div class="col-lg-4">

             <div class="card pd-20 pd-sm-40"> 
              <div class="table-wrapper"> 
           <form method="post" action="{{ route('search.by.date') }}" >
            @csrf
             <div class="modal-body pd-20"> 
            <div class="form-group">
              <label for="exampleInputEmail1">日付検索</label>
              <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date">
              
            </div> 
                  </div><!-- modal-body -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">決定</button>
                     
                  </div>
                    </form> 
              </div><!-- table-wrapper -->
            </div><!-- card -->


    </div>



     <div class="col-lg-4">

             <div class="card pd-20 pd-sm-40"> 
              <div class="table-wrapper"> 
           <form method="post" action="{{ route('search.by.month') }}" >
            @csrf
             <div class="modal-body pd-20"> 
            <div class="form-group">
              <label for="exampleInputEmail1">月次検索</label>
              
              <select class="form-control" name="month">
               <option value="january">1月</option>
               <option value="february">2月</option> 
               <option value="march">3月</option> 
               <option value="april">4月</option> 
               <option value="may">5月</option> 
               <option value="jun">6月</option> 
               <option value="july">7月</option> 
               <option value="august">8月</option> 
               <option value="september">9月</option> 
               <option value="october">10月</option>  
               <option value="november">11月</option> 
               <option value="december">12月</option> 
               
              </select>
              
            </div> 
                  </div><!-- modal-body -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">決定</button>
                     
                  </div>
                    </form> 
              </div><!-- table-wrapper -->
            </div><!-- card -->


    </div>



     <div class="col-lg-4">

             <div class="card pd-20 pd-sm-40"> 
              <div class="table-wrapper"> 
           <form method="post" action="{{ route('search.by.year') }}" >
            @csrf
             <div class="modal-body pd-20"> 
            <div class="form-group">
              <label for="exampleInputEmail1">年次検索</label>
              
               <select class="form-control" name="year">

                 <option value="2018">2018</option>
                 <option value="2019">2019</option>
                 <option value="2020">2020</option>
                 <option value="2021">2021</option>
                 <option value="2022">2022</option>
                 <option value="2023">2023</option>
                 <option value="2024">2024</option>
                 <option value="2025">2025</option>
                 
                
              </select>
              
            </div> 
                  </div><!-- modal-body -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">決定</button>
                     
                  </div>
                    </form> 
              </div><!-- table-wrapper -->
            </div><!-- card -->


    </div>


    
  </div>







     

        

 
    </div><!-- sl-mainpanel -->


 
 

@endsection