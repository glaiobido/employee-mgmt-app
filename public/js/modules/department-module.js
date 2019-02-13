MODULE.Department = (function() {

  var $data = {
    department_id: 0,
    action: 'add'
  };

  function init() {
    $('table#departments-tbl').DataTable();
    triggerModal();
     removedepartment();
  }

  // Show modal
  function triggerModal() {
    // click
    $('.new-department-btn').on('click', function(e) {
      e.preventDefault();
      $data.action = $(this).attr('data-action');


      $.ajax({
        url: 'ajax-get-department-form',
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
        url: 'departments',
        type: 'POST',
        data: $('form#department-form').serialize(),
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
    $('form#department-form input.form-control').removeClass('is-invalid');
    $('form#department-form span.invalid-feedback').empty();
    for (var e in error.errors) {
      console.log(error.errors[e])
      $('form#department-form').find('input#'+ e).addClass('is-invalid');
      $('form#department-form').find('input#'+ e).next().text(error.errors[e][0])

    }
  }

  function removedepartment() {
    $('.remove-department-btn').on('click', function() {
      $data.department_id = $(this).attr('data-id');
      Swal.fire({
          title: 'Are you sure?',
          text: 'You are about to remove this department.',
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
