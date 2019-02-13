<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">{{ ucfirst($action) }} Employee</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<div class="modal-body">

  <div class="container-fluid">

    <form id="employee-form">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-">
          <label for="inputEmail4">First Name</label>
          <input type="text" class="form-control" name="firstname" id="firstname">
          <span class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group col-md-">
          <label for="inputPassword4">Last Name</label>
          <input type="text" class="form-control" name="lastname" id="lastname">
          <span class="invalid-feedback" role="alert"></span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-">
          <label for="inputEmail4">Middle Name</label>
          <input type="text" class="form-control" name="middlename" id="middlename">
          <span class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group col-md-">
          <label for="inputPassword4">Age</label>
          <input type="number" class="form-control" name="age" id="age">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-">
          <label for="inputEmail4">Birth Date</label>
          <input type="text" class="form-control" name="birthdate" id="birthdate">
        </div>
        <div class="form-group col-md-">
          <label for="inputPassword4">Date Hired</label>
          <input type="text" class="form-control" name="date_hired" id="date_hired">
        </div>
      </div>

      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address">
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputState">Department</label>
          <select id="department" name="department" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>

        <div class="form-group col-md-4">
          <label for="inputState">Division</label>
          <select id="division" name="division" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>

        <div class="form-group col-md-4">
          <label for="inputState">Country</label>
          <select id="country" name="country" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <select id="city" name="city" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">State</label>
          <select id="state" name="state" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputZip">Zip</label>
          <input type="text" class="form-control" id="zip" name="zip">
        </div>
      </div>

    </form>

  </div>


</div>


<div class="modal-footer">
  <button type="button" class="btn btn-info modal-submit">Save</button>
  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
</div>
