MODULE.User = (function() {

  var $data = {
    user_id: 0,
    action: 'add'
  };

  function init() {
    $('table#users-tbl').DataTable();
    triggerModal();
     removeUser();
  }

  // Show modal
  function triggerModal() {
    // click
    $('.new-user-btn, .edit-user-btn').on('click', function(e) {
      e.preventDefault();
      $data.action = $(this).attr('data-action');
      $data.user_id = $(this).attr('data-id');

      $.ajax({
        url: 'ajax-get-user-form',
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
      var submitURL = ($data.action == 'add') ? 'users' : 'ajax-update-user' ;
      $.ajax({
        url: submitURL,
        type: 'POST',
        data: $('form#user-form').serialize(),
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
                text: 'User has been successfully '+ text,
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
    $('form#user-form input.form-control').removeClass('is-invalid');
    $('form#user-form span.invalid-feedback').empty();
    for (var e in error.errors) {
      console.log(error.errors[e])
      $('form#user-form').find('input#'+ e).addClass('is-invalid');
      $('form#user-form').find('input#'+ e).next().text(error.errors[e][0])

    }
  }

  function removeUser() {
    $('.remove-user-btn').on('click', function() {
      $data.user_id = $(this).attr('data-id');
      Swal.fire({
          title: 'Are you sure?',
          text: 'You are about to remove this user.',
          type: 'error',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
              $.ajax({
                url: 'ajax-delete-user/'+$data.user_id,
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
