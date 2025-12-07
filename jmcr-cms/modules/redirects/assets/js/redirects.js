(function(w, d, $) {

  var REQUEST_URI   = jsVars.baseUrl+'modules/redirects/ajax/redirects.php',
      MOD_BASE_PATH = jsVars.modBasePath;
  

  // Action methods

  function saveRedirects() {
    $(d).on('click', '#import-csv-btn', function(e){
      e.preventDefault();

      var parentElm = $('#import-warning'),
        _tmpl       = _.template( $('#redirect-tmpl').html() ),
        csvFilePath = $('#csv_file_path').val();
      
      if (csvFilePath) {
      
        var params = 'action=import-data';
            params += '&file='+csvFilePath;

        $.post(REQUEST_URI, params , function(response){
          
          parentElm.empty();

          if (response.isValid) {
            var importWarning = '';

            importWarning += (response.invalid.length > 0) 
              ? _tmpl({'items':response.invalid,'itemMsg' : response.invalidNote}) 
              : '';

            importWarning += (response.available.length > 0) 
              ? _tmpl({'items':response.available,'itemMsg': response.availableNote}) 
              : '';
            
            parentElm.html(importWarning);        
          }

          showFlashMsg(response.message, response.state);

        }, 'json');
      } else {
      
        showFlashMsg('Please select redirects csv file.', 'danger');
      
      }     
    });
  }

  function downloadSampleCsvFile () {
  
    $(d).on('click', '#btn-download-csv-file', function(e){
      e.preventDefault();
      
      document.location = jsVars.baseUrl+'modules/redirects/assets/csv/sample-csv-file.csv';
      
      return false;
    });
  }

  function showFlashMsg (msg, state) {
  
    if( msg && state ) {

        $('#import-csv-msg').text('').removeAttr('class').addClass('#import-csv-msg'.substr(1)).show().addClass('alert alert-'+state).text(msg);

        setTimeout(function(){
            $('#import-csv-msg').fadeOut();
        }, 9000);

    }
  }

  function init() {
    saveRedirects();
    downloadSampleCsvFile();
  }  

  $(window).on('load', init);

})(window, document, jQuery);