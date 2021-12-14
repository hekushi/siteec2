@extends('layouts.app')

@section('content')
       
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

<div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">ログイン</div>

          <form action="{{ route('login') }}" id="contact_form" method="post">
            @csrf
                            
                             <div class="form-group">
    <label for="exampleInputEmail1">メールアドレス</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp"  required="">
             @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
         </div>

      <div class="form-group">
    <label for="exampleInputEmail1">パスワード</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror"  aria-describedby="emailHelp" name="password" required="">
               @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    
                     </div>


                            <div class="contact_form_button">
              <button type="submit" class="btn btn-info">ログイン</button>
                            </div>
                        </form>
                        <br>
            <a href="{{ route('password.request') }}">パスワードを忘れてしまった場合</a>   <br> <br>          

   <button type="submit" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Login with Facebook </button>
   
    <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login with Google </a>          

                    </div>
                </div>


<div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;"> 
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">新規登録</div>

         <form action="{{ route('register') }}" id="contact_form" method="post">
             @csrf
                            
          <div class="form-group">
    <label for="exampleInputEmail1">お名前</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="" name="name" required="">
         </div>


        <div class="form-group">
    <label for="exampleInputEmail1">電話番号</label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  aria-describedby="emailHelp" placeholder="" required="">
         </div>


         <div class="form-group">
    <label for="exampleInputEmail1">メールアドレス</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="" required="">
         </div>



         <div class="form-group">
    <label for="exampleInputEmail1">パスワード</label>
    <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="パスワードの入力 " name="password" required="">
         </div>

         <div class="form-group">
    <label for="exampleInputEmail1">パスワードの確認</label>
    <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="パスワードの再入力" name="password_confirmation" required="">
         </div>

 



                            <div class="contact_form_button">
        <button type="submit" class="btn btn-info">新規作成</button>
                            </div>
                        </form>

                    </div>
                </div>







            </div>
        </div>
        <div class="panel"></div>
    </div>












@endsection
