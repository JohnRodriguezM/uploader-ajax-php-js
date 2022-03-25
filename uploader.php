<?php
echo "hola desde el servidor";

/*el var_dump es una especie de console.log pero en php */
var_dump($_FILES);

/* ese files que paso en el var_dump es un archivo que me muestra la informacion del file(archivo) */

/*el nombre del file lo saco del formData definido en js */
// isset evalua si una variable en php existe o no
if(isset($_FILES["file"])){
    $name = $_FILES["file"]["name"];
    $file = $_FILES["file"]["tmp_name"];
    $error = $_FILES["file"]["error"];
    $size = $_FILES["file"]["size"];
    $destination = "./files/$name";
    $upload = move_uploaded_file($file, $destination);

    /* la funcion move_uploaded_file recibe el archivo y ademas de eso recibe el destino */
    if($upload){
        $res = array(
            "status" => "success",
            "error" => false,
            "name" => $name,
            "size" => $size,
        );
    }else{
        $res = array(
        "status" => "error",
        "error" => true,
        "message" => "Error al subir el archivo",
        );

    }
    echo json_encode($res);
}
