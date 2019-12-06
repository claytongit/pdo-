<div class="container">
    <div class="col-md-6 mx-auto">
        <form method="POST" action="models/register.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputUser1">Usuario</label>
                <input name="user" type="text" class="form-control" id="exampleInputUser1">
            </div>               

            <?php if(isset($_SESSION['user_isset'])): ?>
                     <div class="alert alert-danger" role="alert">
                        Usuario já existe
                    </div>
            <?php endif; ?>
            <?php unset($_SESSION['user_isset']); ?>

            <?php if(isset($_SESSION['not_success'])): ?>
                <div class="alert alert-danger" role="alert">
                    Erro, Preencha todos os campos e Tente novamente
                </div>
            <?php endif; ?>
            <?php unset($_SESSION['not_success']); ?>


            <button type="submit" class="btn btn-outline-success">Enviar</button>
            <a href="index.php" class="btn btn-outline-success"> << Voltar </a>
        </form>
    </div>
</div>