MODULE.Division = (function() {

  var $data = {
    division_id: 0,
    action: 'add'
  };

  function init() {
    $('table#divisions-tbl').DataTable();
    triggerModal();
     removedivision();
  }

  // Show modal
  function triggerModal() {
    // click
    $('.new-division-btn').on('click', function(e) {
      e.preventDefault();
      $data.action = $(this).attr('data-action');


      $.ajax({
        url: 'ajax-get-division-form',
        type: 'GET',
        data: $data,
        beforeSend: function() {
          // $('div.js-preloader').removeClass('invisible');
        },
        success: function(response) {
          $('div.modal-content').html(response);
          $('div#mainModal').modal('show');
        },
        complete: function(response) {
          modalSubmit();
        }
      });

    });
  }

  function modalSubmit() {
    $('.modal-submit').unbind();
    $('.modal-submit').on('click', function(e) {
      e.preventDefault();

      $.ajax({
        url: 'divisions',
        type: 'POST',
        data: $('form#division-form').serialize(),
        beforeSend: function() {
          // $('div.js-preloader').removeClass('invisible');
        },
        success: function(response) {
          if (response.status == 200) {
            $('div#mainModal').modal('hide');
            $('div#mainModal .modal-body').empty();
            MODULE.Main.loadContent();
          }
        },
        complete: function(response) {

        },
        error: function(xhr, status, error) {
          errorMessages(xhr.responseJSON)
          console.log(xhr.responseJSON)
        }
      });
    })
  }

  function errorMessages(error) {
    $('form#division-form input.form-control').removeClass('is-invalid');
    $('form#division-form span.invalid-feedback').empty();
    for (var e in error.errors) {
      console.log(error.errors[e])
      $('form#division-form').find('input#'+ e).addClass('is-invalid');
      $('form#division-form').find('input#'+ e).next().text(error.errors[e][0])

    }
  }

  function removedivision() {
    $('.remove-division-btn').on('click', function() {
      $data.division_id = $(this).attr('data-id');
      Swal.fire({
          title: 'Are you sure?',
          text: 'You are about to remove this division.',
          type: 'error',
          showConfirmButton: true,
          showCancelButton: true,
          confirmButtonColor: '#17a2b8',
          cancelButtonColor: '#343a40',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        })
    });
  }

  return {
    init: init,
    data: $data
  }
})();
