$(document).ready(function(){
    $(".info").hide();
    $("main").hide();  
    $(".bonus_main").hide();
    $(".discount_main").hide();
    $(".remove_main").hide();
    $(".receive_salary").hide();
    $(".choose_date").fadeOut();
  
    $("header").hover(function(){
      $(".choose_date").show();
    });
  
    
    $("#Register_Attende").click(function(){
    $("main").show(); //$('main').css('display', 'none');
    $(".info").show();
    $(".choose_date").hide();
    $(".main_view").hide();
    $(".main_attendance_view").hide();
    $(".bonus_main").hide();
    $(".discount_main").hide();
    $(".remove_main").hide();
    $(".receive_salary").hide();
    }); 
      
    $("#bonus").click(function(){
    $("main").hide(); //$('main').css('display', 'none');
    $(".bonus_main").show();
    $(".info").show();
    $(".choose_date").hide();
    $(".main_view").hide();
    $(".main_attendance_view").hide();
    $(".discount_main").hide();
    $(".remove_main").hide();
    $(".receive_salary").hide();
    });
  
    $("#discount").click(function(){
    $("main").hide(); //$('main').css('display', 'none');
    $(".choose_date").hide();
    $(".main_view").hide();
    $(".main_attendance_view").hide();
    $(".bonus_main").hide();
    $(".discount_main").show();
    $(".info").show();
    $(".remove_main").hide();
    $(".receive_salary").hide();
    });
  
    $("#remove").click(function(){
    $(".main_attendance_view").hide();
    $(".choose_date").hide();
    $(".main_view").hide();
    $("main").hide(); //$('main').css('display', 'none');
    $(".bonus_main").hide();
    $(".discount_main").hide();
    $(".receive_salary").hide();
    $(".remove_main").show();
    $(".info").show();
    });
  
    $("#receive_salary").click(function(){
    $(".main_attendance_view").hide();
    $(".choose_date").hide();
    $(".main_view").hide();
    $("main").hide(); //$('main').css('display', 'none');
    $(".bonus_main").hide();
    $(".discount_main").hide();
    $(".receive_salary").show();
    $(".info").show();
    $(".remove_main").hide();
    });
    });