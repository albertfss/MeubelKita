@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>


<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}


</style>
    <!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

        <form id="signupForm" method="post" >
            {{csrf_field()}}
            <div class="col-md-12">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Daftar</h3>
                    </div>
                    
                    <div class="form-group ">
                        <input class="input" type="text" name="name" id="name" placeholder="Nama Lengkap">
                    </div>
                   {!! $errors->first('name', '<label class="error">:message</label>') !!}
                    
                    <div class="form-group">
                        <input class="input" type="email" name="email" id="email" placeholder="Email" onkeyup="myFunction()">
                    </div>
                    <div id="for_duplicate-email"></div>
                     {!! $errors->first('email', '<label class="error">:message</label>') !!}
                    <div class="form-group">
                        <input class="input" type="text" name="address" id="address" placeholder="Alamat">
                    </div>
                     {!! $errors->first('address', '<label class="error">:message</label>') !!}
                    <div class="form-group">
                        <input class="input" type="text" name="city" id="city" placeholder="Kota">
                    </div>
                     {!! $errors->first('city', '<label class="error">:message</label>') !!}
                    <div class="form-group">
                        <input class="input" type="text" name="zip" id="zip" placeholder="Kode POS">
                    </div>
                     {!! $errors->first('zip', '<label class="error">:message</label>') !!}
                    <div class="form-group">
                        <input class="input" type="tel" name="tel" id="tel" placeholder="Nomor Handphone">
                    </div>
                     {!! $errors->first('tel', '<label class="error">:message</label>') !!}
                    <div class="form-group">
                        <input class="input" type="password" name="pass" id="pass" placeholder="Masukkan Kata Sandi">
                    </div>
                     {!! $errors->first('pass', '<label class="error">:message</label>') !!}
                    <div class="form-group">
                        <input class="input" type="password" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Kata Sani">
                    </div>
                    {!! $errors->first('confirm_password', '<label class="error">:message</label>') !!}


                    <br>
                        
                        <input type="submit"  name="signup" class="primary-btn order-submit" value="Daftar">
                </form>
                
                
                    
                </div>
                <!-- /Billing Details -->
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<!--JQUERY Validation-->
<script>
    
    
   
    
    
    
	$(document).ready(function() {
		// validate the comment form when it is submitted
		//$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
                address: "required",
                city: "required",
                zip: {
					required: true,
					number: true
				},
                tel: "required",
				pass: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#pass"
				}
				
				
				
			},
			messages: {
				name: "Masukkan Nama Lengkap",
				email: "Masukkan Email yang Valid",
                address: "Masukkan Alamat",
                city: "Masukkan Kota",
                address: "Masukkan Alamat",
				zip: {
					required: "Masukkan Kode POS",
					number: "Kode POS tidak valid"
				},
                tel: "Masukkan nomor handphone",
				pass: {
					required: "Masukkan kata sandi",
					minlength: "Panjang kata sandi minimal 5 karakter"
				},
				confirm_password: {
					required: "Masukkan kata sandi",
					minlength: "Panjang kata sandi minimal 5 karakter",
					equalTo: "Masukkan kata sandi yang sama dengan di atas"
				}
				
				
			}
            
            
        
		});

		
	});
	</script>
<!--/JQUERY Validation-->



<!--Duplicate Email Validation-->
<script>
function myFunction() {
    //var token={{ csrf_token() }};
    var email=$("#email").val();
    var token=$("input[name=_token]").val();
    var url="{{route('user.signup.check_email')}}";
    

            $.ajax({
                type:'post',
                url:url,
                dataType: "JSON",
                async: false,
                data:{email: email, _token: token},
                success:function(msg){
                        
                         
                        if(msg == "1")
                            {
                                document.getElementById("for_duplicate-email").innerHTML = "<label class='error'>This Email Address is Already taken</label>";
                                                    

                            }
                    else
                        {
                                                document.getElementById("for_duplicate-email").innerHTML = "";

                        }
                    }
             });
    
}
</script>
<!--/Duplicate Email Validation-->

<!-- /SECTION -->
@endsection

