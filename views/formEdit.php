<div class="container">
    <div class="col-md-6 mx-auto">

        <?php
        require 'controllers/connection.php';
        $con = new Connect;
        $con->conn('localhost', 'cadastro', 'root', '');
        $data = $con->select();

        foreach ($data as $value) { }                                
        ?>

        <form method="POST" action="models/update.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" value="<?php if(isset($data)){echo $value['email'];}; ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputUser1">Usuario</label>
                <input name="user" value="<?php if(isset($data)){echo $value['user'];}; ?>" type="text" class="form-control" id="exampleInputUser1">
            </div>
            <button class="btn btn-outline-secondary" type="submit">Atualizar</button>
        </form>
    </div>
</div>