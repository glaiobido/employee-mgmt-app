<div class="modal-header bg-info text-light">
  <h5 class="modal-title" id="exampleModalLongTitle">Add Country</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<div class="modal-body">

  <div class="container-fluid">

    <form method="POST" action="{{ route('countries.store') }}" id="country-form">
        @csrf

        <div class="form-group row">
            <label for="country_code" class="col-md-5 col-form-label text-md-right">{{ __('Country Code') }}</label>

            <div class="col-md-7">
                <input id="country_code" type="text" maxlength="3"
                  class="form-control{{ $errors->has('country_code') ? ' is-invalid' : '' }}"
                  name="country_code" value="{{ old('country_code') }}" required autofocus>


                    <span class="invalid-feedback" role="alert">

                    </span>

            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-7">
                <input id="name" type="text"
                  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                  name="name" value="{{ old('name') }}" required autofocus>


                    <span class="invalid-feedback" role="alert">

                    </span>

            </div>
        </div>
    </form>

  </div>


</div>


<div class="modal-footer">  
  <button type="button" class="btn btn-info modal-submit">Save</button>
  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
</div>
