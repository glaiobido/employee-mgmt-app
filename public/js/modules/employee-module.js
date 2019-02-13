MODULE.Employee = (function() {

  var $data = {
    employee_id: 0,
    action: 'add'
  };

  var $form = "";

  function init() {
    $('table#employees-tbl').DataTable();
    triggerModal();
    removeEmployee();
  }

  // Show modal
  function triggerModal() {
    // click
    $('.new-employee-btn, .edit-employee-btn').on('click', function(e) {
      e.preventDefault();
      $data.action = $(this).attr('data-action');
      $data.employee_id = $(this).attr('data-id');


      $.ajax({
        url: 'ajax-get-employee-form',
        type: 'GET',
        data: $data,
        beforeSend: function() {
          // $('div.js-preloader').removeClass('invisible');
        },
        success: function(response) {
          $('div.modal-content').html(response);
          $('div#mainModal').modal('show');
          $form = $('form#employee-form');
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

      console.log($form.serialize())
      var submitURL = ($data.action == 'add') ? 'employees' : 'ajax-update-employee' ;
      $.ajax({
        url: submitURL,
        type: 'POST',
        data: $form.serialize(),
        beforeSend: function() {
          // $('div.js-preloader').removeClass('invisible');
        },
        success: function(response) {
          if (response.status == 200) {
            $('div#mainModal').modal('hide');
            $('div#mainModal .modal-body').empty();
            MODULE.Main.loadContent();
            var text = ($data.action == 'add') ? 'added' : 'edited';
            Swal.fire({
                title: 'Success!',
                text: 'Employee has been successfully '+ text,
                type: 'success',
              })
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
    $('form#employee-form input.form-control').removeClass('is-invalid');
    $('form#employee-form span.invalid-feedback').empty();
    for (var e in error.errors) {
      console.log(error.errors[e])
      $form.find('input#'+ e).addClass('is-invalid');
      $form.find('input#'+ e).next().text(error.errors[e][0])

    }
  }

  function removeEmployee() {
    $('.remove-employee-btn').on('click', function() {
      $data.employee_id = $(this).attr('data-id');
      Swal.fire({
          title: 'Are you sure?',
          text: 'You are about to remove this employee.',
          type: 'error',
          showCancelButton: true,
          confirmButtonColor: '#17a2b8',
          cancelButtonColor: '#343a40',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
              $.ajax({
                url: 'ajax-delete-employee/'+$data.employee_id,
                type: 'GET',
                data: $data,
                success: function(response) {
                  console.log(response);
                  if (response.status == 200) {
                    MODULE.Main.loadContent();
                    Swal.fire({
                      title: 'Successfully Removed',
                      type: 'success'
                    })

                  }
                }
              });
            }
        });
    });
  }

  return {
    init: init,
    data: $data
  }
})();
