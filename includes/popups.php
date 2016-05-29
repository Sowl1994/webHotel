
<?php

  function alertwarning($mensaje){
    echo "
    <div class='alert-container warning'>
      <i class='icon-w fa fa-exclamation-triangle' aria-hidden='true'></i>
      <p class='alert-message a-w'>" . $mensaje . "</p>
    </div>";
    echo "
        <script type='text/javascript'>
          $('.warning').addClass('active');
          setTimeout(function(){
            $('.warning').removeClass('active');
          }, 3000);
        </script>";
  }

  function alertsucess($mensaje){
    echo "
    <div class='alert-container sucess'>
      <i class='icon-s fa fa-check' aria-hidden='true'></i>
      <p class='alert-message'>" . $mensaje . "</p>
    </div>";
    echo "
        <script type='text/javascript'>
          $('.sucess').addClass('active');
          setTimeout(function(){
            $('.sucess').removeClass('active');
          }, 3000);
        </script>";
  }


  function alertError($mensaje){
    echo "
    <div class='alert-container error'>
      <i class='icon-e fa fa-times' aria-hidden='true'></i>
      <p class='alert-message a-e'>" . $mensaje . "</p>
      <div class='extra'><a id='calert-e'>cerrar</a></div>
    </div>";
    echo "
        <script type='text/javascript'>
          $('.error').addClass('active');
          setTimeout(function(){
            $('.error').removeClass('active');
          }, 90000);
        </script>";

    echo" 
    <script type='text/javascript'>
    $('#calert-e').click(function(){
    $('.error').removeClass('active');
    });
    </script>";
  }



?>


