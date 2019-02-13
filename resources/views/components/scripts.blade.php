{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/plugins/datatable/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/preloadinator/jquery.preloadinator.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{ asset('js/main.js') }}"></script>

{{-- CUSTOM MODULES --}}
<script src="{{ asset('js/modules/main-module.js') }}"></script>
<script src="{{ asset('js/modules/user-module.js') }}"></script>


{{-- Inital Call to Custom Modules On Load Page --}}
<script type="text/javascript">
  $(document).ready(function() {
    MODULE.Main.init();
  });
</script>
