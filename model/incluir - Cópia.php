
</br>
  <h3>Formulário de Registro</h3>

<form>
  <div class="form-group">
    <label for="textinput">Nome</label>
    <input type="text" class="form-control" id="$user" aria-describedby="nameHelp" placeholder="Digite seu nome">
    <small id="namelHelp" class="form-text text-muted">Verifique se você já está cadastrado.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" id="$senha" placeholder="Digite uma senha">
  </div>

  <div class="form-group">
    <label for="textinput">Tipo</label>
    <input type="text" class="form-control" id="$tipo" aria-describedby="tipoHelp" placeholder="Digite 1 2 ou 3">
    <small id="tipoHelp" class="form-text text-muted"> 1-Adm 2-usuarios 3-Vendedor.</small>
  </div>

   <button type="submit" id="button1id" name="registrar" class="btn btn-primary">+ Registrar</button>


<?php
$con = mysqli_connect("127.0.0.1", "root", "", "server");
$result = $con->query("SELECT * FROM usuario");
$sql = "INSERT INTO usuario VALUES";
$sql .= "('$user','$senha','$tipo')";

$user   = $_POST['user'];
$senha  = $_POST['senha'];
$tipo   = $_POST['tipo'];
  
       
    //$sql = "INSERT INTO usuario VALUES(null,'".$user."','".$senha."','".$tipo."')";
    //echo $sql;
      
    if(mysqli_query($sql,$con)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
    mysqli_close($con);    
?>
<?php
  if (isset($_POST['submit'])) {

  $con = mysqli_connect("127.0.0.1", "root", "", "server");
  //$result = $con->query("SELECT * FROM usuario");


    $sql = $con->prepare("INSERT INTO usuario (user,senha,tipo) VALUES (?, ?, ?)");  
    $user=$_POST['user'];
    $senha = $_POST['senha'];
    $tipo= $_POST['tipo'];
    $sql->bind_param("sss", $user, $senha, $tipo); 
    if($sql->execute()) {
      $success_message = "Added Successfully";
    } else {
      $error_message = "Problem in Adding New Record";
    }
    $sql->close();   
    $con->close();
  } 
?>

</form>

</br>
</br>
