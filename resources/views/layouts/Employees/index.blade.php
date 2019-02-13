<div class="row m-0 pt-2">
  <div class="col-9">
    <h1 class="display-4">Employees</h1>

  </div>

  <div class="col-3 text-right mt-4">
    <button type="button"
            data-id="0"
            data-action="add"
            class="btn btn-outline-dark new-employee-btn"><i class="fas fa-user-plus"></i></button>
  </div>
</div>

<div class="row m-0 pt-2">
  <div class="col-12" id="page-content">

    {{-- table --}}
    <table class="table table-hover" id="employees-tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Middle</th>
          <th scope="col">Last</th>
          <th scope="col">Department</th>
          <th scope="col">Date Hired</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($employees as $key => $employee)
          <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->firstname }}</td>
            <td>{{ $employee->middlename }}</td>
            <td>{{ $employee->lastname }}</td>
            <td></td>
            <td></td>
            <td class="text-right">
              <button type="button"
                      data-id="{{ $employee->id }}"
                      data-action="edit"
                      class="btn btn-outline-info edit-employee-btn"><i class="fas fa-user-edit"></i></button>
              <button type="button"
                      data-id="{{ $employee->id }}"
                      class="btn btn-dark remove-employee-btn"><i class="fas fa-user-times"></i></button>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
