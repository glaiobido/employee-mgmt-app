<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">{{ ucfirst($action) }} User</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<div class="modal-body">

  <div class="container-fluid">

    <form method="POST" action="{{ route('register') }}" id="user-form">
        @csrf
        <input type="hidden" name="user_id" value="{{(isset($user->id)) ? $user->id : '0' }}">
        <div class="form-group row">
            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

            <div class="col-md-7">
                <input id="firstname" type="text"
                  class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                  name="firstname" value="{{ (isset($user->firstname)) ? $user->firstname : '' }}" required autofocus>


                    <span class="invalid-feedback" role="alert">

                    </span>

            </div>
        </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

            <div class="col-md-7">
                <input id="lastname" type="text"
                      class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                      name="lastname" value="{{ (isset($user->lastname)) ? $user->lastname : '' }}" required autofocus>


                    <span class="invalid-feedback" role="alert">

                    </span>

            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

            <div class="col-md-7">
                <input id="username" type="text"
                      class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                      name="username" value="{{ (isset($user->username)) ? $user->username : '' }}" required autofocus>


                    <span class="invalid-feedback" role="alert">

                    </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-7">
                <input id="email" type="email"
                      class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                      name="email" value="{{ (isset($user->email)) ? $user->email : '' }}" required>


                    <span class="invalid-feedback" role="alert">

                    </span>

            </div>
        </div>
        @if ($action == 'add')
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-7">
                <input id="password" type="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    <span class="invalid-feedback" role="alert">

                    </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-7">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
      @endif
    </form>

  </div>


</div>


<div class="modal-footer">
  <button type="button" class="btn btn-info modal-submit">Save</button>
  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
</div>
