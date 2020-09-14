<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"> </script>
</head>

<?php

echo '
<script type="text/javascript">

$(document).ready(function(){

    var Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000
    })

    Toast.fire({
        icon: "success",
        title: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr."
      })
});

</script>
';
 ?>

 </html>