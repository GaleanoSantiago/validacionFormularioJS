<?php

include("conexion.php");


if(isset($_POST['nombre'])){
    $DNI = $_POST['usuario'];           //Cambie de dni a usuario
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $campos = array();

    if($nombre==""){
        array_push($campos, "el nombre esta vacio");
    }
    if($password=="" || strlen($password)<6){
        array_push($campos, "la contraseña debe tener mar de 6 caracteres");
    }
    if($correo=="" || strpos($correo, "@")===false){
        array_push($campos, "Ingresa un correo electronico valido");
  
    }
    if(count($campos)>0){
        echo "<div class='error'>";
        for($i=0; $i< count($campos); $i++){
            echo "<li>".$campos[$i]."</div";
        }
    }
    else{
        echo "<div class='correcto'> Datos correctos";
        echo "<br>";
        echo $DNI;
        echo "<br>";
        echo $nombre;
        echo "<br>";
        echo $password;
        echo "<br>";
        echo $password2;
        echo "<br>";
        echo $correo;
        echo "<br>";
        echo $telefono;
		
		$consulta = "INSERT INTO usuarios (DNI, nombre, password, correo, telefono) VALUES ('$DNI','$nombre','$password','$correo','$telefono')";
        $resultado = mysqli_query($conex,$consulta);
        if($resultado){
            ?>
            <script>
                alert("Se guardaron los cambios");
            </script>
        <?php
        }else{
            ?>
            <script>
                alert("Se guardaron los cambios");
            </script>
        <?php
        }
		
    }
    echo"</div>";
    

}


?>