$(document).ready(function() {
  $('.btnMinus').click(function(event) {
    var id = $(this).attr('id');
    var quantity = $(this).parent().find(".quantity").val();
    $.get("updateQty/"+id, function(data){
      $("#qty"+id).val(data);
    });
  });  

  $('.btnPlus').click(function(event) {
    var id = $(this).attr('id');
  });
});

