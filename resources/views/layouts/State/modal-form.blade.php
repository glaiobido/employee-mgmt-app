<div class="modal-header bg-info text-light">
  <h5 class="modal-title" id="exampleModalLongTitle">Add State</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<div class="modal-body">

  <div class="container-fluid">

    <form method="POST" action="{{ route('states.store') }}" id="state-form">
        @csrf

        <div class="form-group row">
            <label for="country" class="col-md-3 col-form-label text-md-right">{{ __('Country') }}</label>

            <div class="col-md-9">
                
                
                <select class="form-control" name="country">
                    <option value=""></option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
                    
                <input id="country" type="text" class="d-none form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ old('country') }}" required autofocus>
                <span class="invalid-feedback" role="alert">

                    </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-9">
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
