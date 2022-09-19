<!DOCTYPE html>
<html lang="en">

<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Bootstrap Core CSS -->
     <link href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="<?=base_url();?>assets/jquery-2.2.2.min.js"></script>
     <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
     <script>
     $(document).on('submit', '#login', function(e){
      e.preventDefault();
      $('#notifLogin').html('Loading..');
      var data = $('#login').serialize();
      $.ajax({
        url: '<?=base_url()?>login/login',
        type:'POST',
        data: data,
        success: function(msg){
          $('#notifLogin').html(msg);
        }
      });
    });
    </script>

</head>