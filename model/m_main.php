<?php
class main
{
    private $conexion;
    private $nombre;
    private $email;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    public function sesion()
    {
        $db = db();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }        
        $correo = $_POST['email']; // el correo electrónico proporcionado por el usuario
        $clave = md5($_POST['password']); // la clave proporcionada por el usuario

        $query = "CALL IniciarSesion(?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $correo, $clave);

        // Ejecutar la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        // Cerrar sentencia
        $stmt->close();

        // Verificar si se encontraron datos o si se devolvió un mensaje de error
        if ($row = $result->fetch_assoc()) {
            if (isset($row['mensaje'])) {
                echo $row['mensaje']; // Mostrar mensaje de error
            } else {
                // Establecer variables de sesión
                $_SESSION['usuario_id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['idAgencia'] = $row['idAgencia'];
                $_SESSION['idPerfil'] = $row['idPerfil'];
                $_SESSION['fechaCreacion'] = $row['fechaCreacion'];
                echo "Listo";
                $query2 = "SET time_zone = '-06:00'";
                $stmt2 = $db->prepare($query2);

                // Ejecutar la consulta
                $stmt2->execute();

                // Cerrar sentencia
                $stmt2->close();
            }
        }

        // Cerrar conexión
        $db->close();
    }
}
