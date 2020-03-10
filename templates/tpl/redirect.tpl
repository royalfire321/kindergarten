<{* sweetalert2 *}>
  <{if $redirect}>
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
    <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
    <script>
      window.onload = function(){
        Swal.fire({
          //position: 'top-end',
          icon: 'success',
          title: "<{$message}>",
          showConfirmButton: false,
          timer: '<{$time}>'
        })
      }    
    </script>
  <{/if}>