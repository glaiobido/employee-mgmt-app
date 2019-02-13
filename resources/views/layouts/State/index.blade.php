<div class="row m-0 pt-2">
  <div class="col-9">
    <h1 class="display-4">States</h1>
    
  </div>

  <div class="col-3 text-right mt-4">
    <button type="button"
            data-id="0"
            data-action="add"
            class="btn btn-outline-dark new-state-btn"><i class="fas fa-plus"></i></button>
  </div>
</div>

<div class="row m-0 pt-2">
  <div class="col-12" id="page-content">

    {{-- table --}}
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
