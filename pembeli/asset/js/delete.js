$(document).ready(function(){
 $('.delete_pesan').click(function(e){
  e.preventDefault();
  var id_pesan = $(this).attr('data-pesan-id');
  var parent = $(this).parent("td").parent("tr");
  bootbox.dialog({
   message: "Are you sure you want to Delete ?",
   title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
   buttons: {
    success: {
     label: "No",
     className: "btn-success",
     callback: function() {
      $('.bootbox').modal('hide');
      }
      },
      danger: {
       label: "Delete!",
       className: "btn-danger",
       callback: function() {
        $.ajax({
         type: 'POST',
         url: 'pesan/aksi_hapus.php',
         data: 'id_pesan='+id_pesan
        })
        .done(function(response){
         bootbox.alert(response);
         parent.fadeOut('slow');
        })
        .fail(function(){
         bootbox.alert('Error....');
         })
       }
      }
    }
  });
 });
});