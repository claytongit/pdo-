<div class="container mt-5">
    <ul class="list-group">
        <li class="list-group-item active bg-dark">Lista de pessoas</li>
        <?php 
            require 'controllers/connection.php';
            $con = new Connect;
            $con->conn('localhost', 'cadastro', 'root', '');
            $con->select();

            foreach ($con->select() as $value) {
                echo "<li class='list-group-item'>
                        <a class='' href='editar.php?id=".$value['id']."'>".$value['user']."</a>  
                        <a class='btn btn-outline-danger btn-sm ml-2' href='models/delete.php?id=".$value['id']."'>Excluir</a>
                     </li>";
            }                    
        ?>
    </ul>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success mt-5" role="alert">
            Usuario cadastrado com sucesso
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['success']); ?> 

    
    <a  class="btn btn-outline-success mt-5" href="cadastro.php">Cadastrar</a>
</div>