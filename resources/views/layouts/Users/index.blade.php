<div class="row m-0 pt-2">
  <div class="col-12">
    <h1 class="display-4">User Profile</h1>
    <button type="button"
            data-id="0"
            data-action="add"
            class="btn btn-outline-dark new-user-btn"><i class="fas fa-user-plus"></i></button>
  </div>
</div>

<div class="row m-0 pt-2">
  <div class="col-12" id="page-content">

    {{-- table --}}
    <table class="table table-hover" id="users-tbl">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $key => $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <button type="button"
                      data-id="{{ $user->id }}"
                      data-action="edit"
                      class="btn btn-outline-primary edit-user-btn"><i class="fas fa-user-edit"></i></button>
              <button type="button"
                      data-id="{{ $user->id }}"
                      class="btn btn-outline-danger remove-user-btn"><i class="fas fa-user-times"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
