@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<style>label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}</style>
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                    <a href="{{route('admin.categories')}}"> < Kembali ke Daftar Kategori</a>
                    <br><br>
                      <h4 class="card-title">Edit Kategori</h4>
                      <br>
                      <form class="forms-sample" method="post"  id="cat_form">
                      {{csrf_field()}}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Kategori</label>
                          <input type="text" class="form-control" id="Name" name="Name" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tipe Kategori</label>
                          <textarea type="textarea" class="form-control" id="Type" name="Type" >{{$category->type}}</textarea>
                        </div>
                        <input  type="submit" name="updateButton"  class="btn btn-success mr-2" id="updateButton" value="UBAH" />
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
    
    
    <!--JQUERY Validation-->
<script>
	
	$(document).ready(function() {
		// validate the comment form when it is submitted
		//$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#cat_form").validate({
			rules: {
				Name: "required",
				Type: "required",
				
				
				
			},
			messages: {
				Name: "Nama kategori wajib diisi",
				Type: "Tipe kategori wajib diisi",
                	
			}
		});

		
	});
	</script>
<!--/JQUERY Validation-->
@endsection