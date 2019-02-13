MODULE.Country = (function() {

  var $data = {
    country_id: 0,
    action: 'add'
  };

  function init() {
    $('table#countries-tbl').DataTable();
    triggerModal();
     removecountry();
  }

  // Show modal
  function triggerModal() {
    // click
    $('.new-country-btn').on('click', function(e) {
      e.preventDefault();
      $data.action = $(this).attr('data-action');


      $.ajax({
        url: 'ajax-get-country-form',
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
        url: 'countries',
        type: 'POST',
        data: $('form#country-form').serialize(),
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
    $('form#country-form input.form-control').removeClass('is-invalid');
    $('form#country-form span.invalid-feedback').empty();
    for (var e in error.errors) {
      console.log(error.errors[e])
      $('form#country-form').find('input#'+ e).addClass('is-invalid');
      $('form#country-form').find('input#'+ e).next().text(error.errors[e][0])

    }
  }

  function removecountry() {
    $('.remove-country-btn').on('click', function() {
      $data.country_id = $(this).attr('data-id');
      Swal.fire({
          title: 'Are you sure?',
          text: 'You are about to remove this country.',
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
