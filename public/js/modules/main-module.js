MODULE.Main = (function() {

  var $data = {
    page: 'dashboard' // default to dashboard
  };

  function init() {
    $data.page = location.hash.substr(1) || 'dashboard'; // get hash page from url to load specific page
    loadContent();
    sidebar();
  }

  // Ajax Content to Load Page
  function loadContent() {
    $.ajax({
      url: 'ajax-get-page-content',
      type: 'GET',
      data: $data,
      beforeSend: function() {},
      success: function(response) {
        $('div#main-content').html(response);
        location.hash = $data.page || '';
      },
      complete: function(response) {
        loadModuleScript();
      }
    });
  }

  function loadModuleScript() {
    switch ($data.page) {
      case 'department':
        MODULE.Department.init();
        break;
      case 'division':
        MODULE.Division.init();
        break;
      case 'country':
        MODULE.Country.init();
        break;
      case 'state':
        MODULE.State.init();
        break;
      case 'city':
        MODULE.City.init();
        break;
      case 'user-list':
        MODULE.User.init();
        break;
      default:

    }
  }
  // sidebar menu Events
  var sidebar = function() {
    $('div#user-menu-list a.list-group-item').on('click', function(e) {
        e.preventDefault();
        $data.page = $(this).attr('data-page');
        loadContent();
    });
  }

  return {
    init: init,
    loadContent: loadContent,
    data: $data
  }

})();
