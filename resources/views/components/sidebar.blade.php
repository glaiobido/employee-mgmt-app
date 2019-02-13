<div class="col-xl-2 col-lg-3 col-md-4 bg-dark text-white px-0" id="side-menu">
  <div class="side-menu-wrapper">
    <div class="user-content mb-3 pt-3 px-3">
      <label class="mb-0 d-block">{{Auth::user()->firstname . ' ' . Auth::user()->lastname}}</label>
    </div>

    <div class="list-group" id="user-menu-list">
      <a href="#"
         data-page="dashboard"
         class="list-group-item list-group-item-action bg-info text-white border-0 rounded-0">
        <small>Dashboard</small> <i class="fas fa-fw fa-home float-right mt-1"></i>
      </a>

      <a href="#employees"
         data-page="employees"
         class="list-group-item list-group-item-action bg-dark text-white border-0">
        <small>Employees</small> <i class="fas fa-fw fa-users float-right mt-1"></i>
      </a>

      <a href="#system-management-sub-list" class="list-group-item list-group-item-action bg-dark text-white border-0"
      data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
        <small>System Management</small> <i class="fas fa-fw fa-database float-right mt-1"></i>
      </a>

      <div class="collapse" id="system-management-sub-list" data-parent="#user-menu-list" style="border-left: 5px solid #6C757D;">
        <a href="#"
           data-page="department"
           class="list-group-item list-group-item-action bg-dark text-white border-0 rounded-0 pl-4">
          <small>Department</small> <i class="far fa-fw fa-hdd float-right mt-1"></i>
        </a>
        <a href="#"
           data-page="division"
           class="list-group-item list-group-item-action bg-dark text-white border-0 pl-4">
          <small>Division</small> <i class="fas fa-fw fa-cogs float-right mt-1"></i>
        </a>
        <a href="#"
           data-page="country"
           class="list-group-item list-group-item-action bg-dark text-white border-0 pl-4">
          <small>Country</small> <i class="fas fa-fw fa-globe-americas float-right mt-1"></i>
        </a>
        <a href="#"
           data-page="state"
           class="list-group-item list-group-item-action bg-dark text-white border-0 pl-4">
          <small>State</small> <i class="fas fa-fw fa-landmark float-right mt-1"></i>
        </a>
        <a href="#"
           data-page="city"
           class="list-group-item list-group-item-action bg-dark text-white border-0 pl-4">
          <small>City</small> <i class="fas fa-fw fa-city float-right mt-1"></i>
        </a>
      </div>

      {{-- User Mgt Dropdown --}}
      <a href="#user-management-sub-list" class="list-group-item list-group-item-action bg-dark text-white border-0"
      data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
        <small>Users</small> <i class="fas fa-fw fa-user-cog float-right mt-1"></i>
      </a>


      <div class="collapse" id="user-management-sub-list" data-parent="#user-menu-list" style="border-left: 5px solid #6C757D;">
        <a href="#"
          data-page="user-profile"
          class="list-group-item list-group-item-action bg-dark text-white border-0 rounded-0 pl-4">
          <small>User Profile</small> <i class="fas fa-fw fa-users-cog float-right mt-1"></i>
        </a>

        <a href="#"
          data-page="user-list"
          class="list-group-item list-group-item-action bg-dark text-white border-0 rounded-0 pl-4">
          <small>User List</small> <i class="fas fa-fw fa-users float-right mt-1"></i>
        </a>

      </div>

    </div>
  </div>
</div>
