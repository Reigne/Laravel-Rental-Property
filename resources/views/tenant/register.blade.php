<!-- Modal Signup Customer -->
<div id="mySModal" class="modal fade">
    <div class="modal-dialog modal-login">
      <div class="modal-content">
        <div class="modal-header">				
          <h4 class="modal-title">Register as tenant</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>

        </div>
        <div class="modal-body">
          
        <form id="regform" method="POST" action="{{ url('/register-tenant') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- <div class="form-group">
              <i class="fa-solid fa-file-signature"></i>
                
                <input type="text" name="title" id="title" class="form-control" placeholder="title" >
            </div> --}}
            <div class="form-group">
              <i class="fa fa-user" aria-hidden="true"></i>

                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="firstname">
            </div>
            <div class="form-group">
              <i class="fa fa-user" aria-hidden="true"></i>
                
                <input type="text" name="last_name" id="last_name" class="form-control"  placeholder="lastname" >
            </div>
            <div class="form-group">
              <i class="fa-solid fa-envelope"></i>
                
                <input type="text" name="email" id="email" class="form-control"  placeholder="email" >
            </div>
            <div class="form-group">
              <i class="fa-solid fa-address-card"></i>
                
                <input type="text" name="address" id="address" class="form-control"  placeholder="address" >
            </div>
            {{-- <div class="form-group">
              <i class="fa-solid fa-house"></i>

                <input type="text" name="town" id="town" class="form-control"  placeholder="town" >
            </div> --}}
            {{-- <div class="form-group">
              <i class="fa-solid fa-hashtag"></i>

                <input type="text" name="zipcode" id="zipcode" class="form-control"  placeholder="zipcode" >
            </div> --}}
            <div class="form-group">
              <i class="fa-sharp fa-solid fa-phone"></i>
                
                <input type="text" name="phone" id="phone" class="form-control"  placeholder="phone" >
            </div>
            <div class="form-group">
              <i class="fa-solid fa-lock"></i>
                
                <input type="password" name="password" id="password" class="form-control"  placeholder="password" >
            </div>

            <div class="form-group">
              <i class="fa-solid fa-hashtag"></i>
              <input type="file" class="form-control" id="imagePath" name="imagePath">
            </div>
                        
                        <div class="p-t-15">
                            {{-- <button id ="btnregister" class="btn btn--radius-2 btn--blue">Submit</button> --}}


                              <button id ="btnregister" type="submit" class="w-100 btn btn-lg btn-primary">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
        </div>
        <div class="modal-footer">
          <p>welcome to my website!</p>
        </div>
      </div>
    </div>
  </div>