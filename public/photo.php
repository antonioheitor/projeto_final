<?php
require_once "connections/connection.php";


?>

<form method="post" role="form" id="new-tribe-form" action="scripts/sc_teste.php"
      enctype="multipart/form-data">
    <div>
        <p class="text-center mt-4">Escolhe uma imagem</p>
        <input type="file" class="form-control w-50 mx-auto bg-light border-0" name="teste"
               id="teste"/>
    </div>
    <div class="row justify-content-center">
        <button class="btnlogin w-50 text-center col-4 mt-2" type="submit">Submeter dados</button>
    </div>
</form>
