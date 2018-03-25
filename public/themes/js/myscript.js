$(document).ready(function() {
  function format(x) {
    return isNaN(x)?"":x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }
    var id = $(this).attr('id');

  $('.btnMinus').click(function(event) {
    var id = $(this).attr('id');
    var quantity = $(this).parent().find(".quantity").val();
    var vnd = "VND";
    $.get("updateQtyMinus/"+id, function(data){
      data = JSON.parse(data);
      $("#qty"+id).val(data.qty);
      $("#price"+id).text(format(data.price) + " VND");
      $.get("ajaxTotal", function(data){
         $("#total").html(format(data) + " VND");
      });
      $.get("ajaxCount", function(data){
        $("#count").html(data + " Item(s) ");
     });
    });
  });  



  $('.btnPlus').click(function(event) {
    var id = $(this).attr('id');
    var vnd = "VND";
    var item = "Item(s)";
    $.get("updateQtyPlus/"+id, function(data){
      data = JSON.parse(data);
      $("#qty"+id).val(data.qty);
      $("#price"+id).text(format(data.price) + " VND");
      $.get("ajaxTotal", function(data){
         $("#total").html(format(data) + " VND");
      });
      $.get("ajaxCount", function(data){
        $("#count").html(data + " Item(s) ");
     });
    });
  });
});
