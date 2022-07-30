<div class="modal leread-modal fade" id="login-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="login-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Read Each Sign In</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.giris.post') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="linkbox">
                        <a href="#">Forgot password ?</a>
                        <span>No account ? <a href="#" id="register-btn" data-toggle="modal"
                                data-target="#register-form">Sign Up.</a></span>
                        <span class="form-warning"><i class="fa fa-exclamation"></i>Fill the require.</span>
                    </div>
                    <div class="linkbox">
                        <label><input type="checkbox"><span>Remember me</span><i class="fa"></i></label>
                        <button type="submit" class="btn btn-golden btn-signin">LOGIN</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="provider">
                    <span>Sign In With</span>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="modal-content" id="register-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-lock"></i>Read Each Sign Up</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.kayit.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" type="password" placeholder="Password"
                            name="password">
                    </div>
                    <div class="linkbox">
                        <span>Already got account? <a href="#" id="login-btn" data-target="#login-form">Sign
                                In.</a></span>
                    </div>
                    <div class="linkbox">

                        {{-- <label><input type="checkbox"><span>Remember me</span><i class="fa"></i></label> --}}
                        <button type="submit" class="btn btn-golden btn-signin">SIGN IN.</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if($errors->Any())
    @foreach($errors->all() as $error)
        <script>
            Swal.fire(
                'HATA!',
                ' {{ $errors }}</br>',
                'error'
            )
        </script>
    @endforeach
@endif
