$(document).ready(function(){
  

  
  $("#loginForm").hide();
  $("#login").click(function(){
    $("#RegistreForm").hide();
    $("#ddt").hide();
    $("#loginForm").show();
  });
  $("#RegistreForm").hide();
  $("#Registre").click(function(){
    $("#loginForm").hide();
    $("#ddt").hide();
    $("#RegistreForm").show();
  });
  $("#cancelForm1").click(function(){
    $("#loginForm").hide();
  
    $("#RegistreForm").hide();
    $("#ddt").show();
    
   
  });
  $("#cancelForm2").click(function(){
    $("#loginForm").hide();
   
    $("#RegistreForm").hide();
    $("#ddt").show();
   
   
  });
  
  

});