$(document).ready(function(){
    $(".main").show();
    $(".selling_section").hide();
    $(".add_box_section").hide();
    $(".do_edit_box_section").hide();
    $(".edit_box_section").show();
    $(".remove_section").hide();

$("#selling_box").click(function(){
    $(".main").hide();
    $(".add_box_section").hide();
    $(".do_edit_box_section").hide();
    $(".edit_box_section").hide();
    $(".remove_section").hide();
    $(".selling_section").show();
});

$("#add_box").click(function(){
    $(".main").hide();
    $(".add_box_section").show();
    $(".selling_section").hide();
    $(".do_edit_box_section").hide();
    $(".remove_section").hide();
    $(".edit_box_section").hide();
});

 $("#edit_box").click(function(){
    $(".main").hide();
    $(".add_box_section").hide();
    $(".selling_section").hide();
    $(".remove_section").hide();
    $(".do_edit_box_section").show();
    $(".edit_box_section").show();
});

$("#doing_edit_box").click(function(){
    $(".edit_box_section").show();
    $(".do_edit_box_section").show();
    $(".main").hide();
    $(".add_box_section").hide();
    $(".selling_section").hide();
    $(".remove_section").hide();
    
}); 

$("#view_to_edit").click(function(){
    $(".main").hide();
    $(".add_box_section").hide();
    $(".selling_section").hide();
    $(".remove_section").hide();
    $(".do_edit_box_section").show();
    $(".edit_box_section").show();
});

$("#remove_box").click(function(){
    $(".main").hide();
    $(".add_box_section").hide();
    $(".selling_section").hide();
    $(".remove_section").show();
    $(".do_edit_box_section").hide();
    $(".edit_box_section").hide();
});

});