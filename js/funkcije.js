$(document).ready(function(){
$(function () {
    $("#datepicker").datepicker({ 
          autoclose: true, 
          todayHighlight: true
    })
  });

  $(function () {
    $("#datepicker2").datepicker({ 
          autoclose: true, 
          todayHighlight: true
    })
  });

  
  
  $('#ddlJedinica').on('change', function() {
    if ( this.value == '1'|| this.value=='2' || this.value=='3' || this.value=='4')
   
    {
      $(".tbKomad").show();
   
    }
    else
    {
      $(".tbKomad").hide();
    }
  });

    



  $('#ddlJedinica').on('load', function() {
    if ( this.value != '1'|| this.value!='2' || this.value!='3' || this.value!='4')
   
    {
      $(".tbKomad").hide();
    }
    else
    {
      $(".tbKomad").show();
    }
  });

  $('#ddlJedinicaNovo').on('load', function() {
    if ( this.value != '1'|| this.value!='2' || this.value!='3' || this.value!='4')
   
    {
      $(".tbKomadNovo").hide();
    }
    else
    {
      $(".tbKomadNovo").show();
    }
  });

  $('#ddlJedinicaNovo').on('change', function() {
    if ( this.value == '1'|| this.value=='2' || this.value=='3' || this.value=='4')
   
    {
      $(".tbKomadNovo").show();
     /* $(".ostalooDijagnoza").show();*/
    }
    else
    {
      $(".tbKomadNovo").hide();
    }
  });




});