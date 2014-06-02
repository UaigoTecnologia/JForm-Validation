jQuery('document').ready(function(){
   document.formvalidator.setHandler('tel', function(value) {
      regex=/(\()?(10)|([1-9]){2}\)?((-|\s)?)([2-9][0-9]{3}((-|\s)?)[0-9]{4,5})/;
      var is_valid = regex.test(value);
      if(!is_valid){          
          alert(message_wrong_tel_format);          
      }
       return is_valid
   });
});
