<?php
class caja
{
    private $db;
    private $nombre;
    private $id_agencia;
    private $id_usuario;

    public function __construct($conexion)
    {
        $this->db = $conexion;
        $this->nombre = $_SESSION["nombre"] . ' ' . $_SESSION["nombre"];
        $this->id_agencia = $_SESSION["idAgencia"];
        $this->id_usuario = $_SESSION['usuario_id'];
    }

    public function apertura()
    {
        $db = $this->db;
        $cantidad = $_POST['cantidad']; // el correo electrónico proporcionado por el usuario
        $date = date("Y-m-d");
        $transacion = 1;
        $estado = 1;

        try {
            $query = "SELECT count(*) 
                FROM transacciones
                WHERE estado_transacion_id = ?
                AND tipo_transaccion_id = ?
                AND fecha_creacion = ?
                AND usuario = ?";

            $stmt = $db->prepare($query);
            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $db->error);
            }

            // Bind de parámetros
            $stmt->bind_param('iisi', $estado, $transacion, $date, $this->id_usuario);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener resultados
            $result = $stmt->get_result();

            // Cerrar sentencia
            $stmt->close();

            if ($result) {
                $row = $result->fetch_assoc();
                if ($row['count(*)'] > 0) {
                    //throw new Exception($row['count(*)']);
                    throw new Exception("Ya existe una apertura de caja para el día de hoy.");
                } else {
                    $query = "INSERT INTO `transacciones` 
                    (`estado_transacion_id`, `tipo_transaccion_id`, `usuario`, `total`, fecha_creacion) 
                    VALUES (?, ?, ?, ?, ?)";

                    $stmt = $db->prepare($query);
                    if (!$stmt) {
                        throw new Exception("Error al preparar la consulta: " . $db->error);
                    }
                    // Bind de parámetros
                    $stmt->bind_param('iiids', $estado, $transacion, $this->id_usuario, $cantidad, $date);

                    // Ejecutar la consulta
                    $stmt->execute();

                    // Verificar si la inserción fue exitosa
                    if ($stmt->affected_rows > 0) {
                        echo "Listo";
                        // Aquí puedes realizar acciones adicionales si la inserción fue exitosa
                    } else {
                        throw new Exception("Error: No se pudo insertar la transacción.");
                    }

                    // Cerrar sentencia
                    $stmt->close();
                }
                // Aquí puedes procesar $row según sea necesario
            } else {
                throw new Exception("Error al obtener resultados de la consulta.");
            }
        } catch (Exception $e) {
            // Manejo de la excepción
            echo "Error: " . $e->getMessage();
        }
        // Cerrar conexión
        $db->close();
    }
    public function cierre()
    {
        $db = $this->db;
        echo 'Listo';
        // Cerrar conexión
        $db->close();
    }
    public function estado_apertura()
    {
        $db = $this->db;
        $date = date("Y-m-d");
        $transacion = 1;
        $estado = 1;
        try {
            $query = "SELECT count(*) as apertura
            FROM transacciones
            WHERE estado_transacion_id = ?
            AND tipo_transaccion_id = ?
            AND fecha_creacion = ?
            AND usuario = ?";

            $stmt = $db->prepare($query);
            if ($stmt === false) {
                throw new Exception('Error al preparar la consulta SQL: ' . $db->error);
            }

            // Bind de parámetros
            $stmt->bind_param('iisi', $estado, $transacion, $date, $this->id_usuario);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener resultados
            $result = $stmt->get_result();

            // Obtener la fila de resultados
            $row = $result->fetch_assoc();

            // Cerrar sentencia y resultado
            $stmt->close();
            $result->close();

            return $row['apertura'];
        } catch (Exception $e) {
            // Manejo de la excepción
            echo "Error: " . $e->getMessage();
        }
    }

    public function transaciones($estado)
    {
        $db = $this->db;
        $date = date('Y-m-d');
        try {
            $query = "SELECT count(*) as transaciones
                FROM transacciones
                WHERE estado_transacion_id = ?
                AND tipo_transaccion_id not in (1, 2)
                AND fecha_creacion = ?
                AND usuario = ?";
            $stmt = $db->prepare($query);
            // Bind de parámetros
            $stmt->bind_param('isi', $estado, $date, $this->id_usuario);
            // Ejecutar la consulta
            $stmt->execute();
            // Obtener resultados
            $result = $stmt->get_result();
            // Cerrar sentencia
            $stmt->close();
            $row = $result->fetch_assoc();
            //$db->close();
            return $row['transaciones'];
        } catch (Exception $e) {
            // Manejo de la excepción
            echo "Error: " . $e->getMessage();
        }
    }
    public function cantidad_tran($transacion)
    {
        $db = $this->db;
        $date = date('Y-m-d');
        try {
            $query = "SELECT count(*) as transaciones
                FROM transacciones
                WHERE estado_transacion_id = 1
                AND tipo_transaccion_id = ?
                AND fecha_creacion = ?
                AND usuario = ?";
            $stmt = $db->prepare($query);
            // Bind de parámetros
            $stmt->bind_param('isi', $transacion, $date, $this->id_usuario);
            // Ejecutar la consulta
            $stmt->execute();
            // Obtener resultados
            $result = $stmt->get_result();
            // Cerrar sentencia
            $stmt->close();
            $row = $result->fetch_assoc();
            //$db->close();
            return $row['transaciones'];
        } catch (Exception $e) {
            // Manejo de la excepción
            echo "Error: " . $e->getMessage();
        }
    }
    public function pedido()
    {
        $estado_apertura = $this->estado_apertura();
        if ($estado_apertura == 0) {
            echo 'Caja Cerrada Realice la Apetura';
            return;
        }
        $db = $this->db;
        $date = date("Y-m-d");
        $transacion = 5;
        $estado = 3;
        $efectivo = $_POST['efectivo'];
        $boleta = $_POST['boleta'];
        $comentario = $_POST['comentario'];
        try {
            $query = "INSERT INTO `transacciones` 
                    (`estado_transacion_id`, `tipo_transaccion_id`, `usuario`, `total`, comentario, boleta, fecha_creacion) 
                    VALUES (?, ?, ?, ?, ?, ?,?)";

            $stmt = $db->prepare($query);
            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $db->error);
            }            // Bind de parámetros
            $stmt->bind_param('iiidsss', $estado, $transacion, $this->id_usuario, $efectivo, $comentario, $boleta, $date);

            // Ejecutar la consulta
            $stmt->execute();

            // Verificar si la inserción fue exitosa
            if ($stmt->affected_rows > 0) {
                echo "Listo";
                // Aquí puedes realizar acciones adicionales si la inserción fue exitosa
            } else {
                throw new Exception("Error: No se pudo insertar la transacción.");
            }

            // Cerrar sentencia
            $stmt->close();
        } catch (Exception $e) {
            // Manejo de la excepción
            echo "Error: " . $e->getMessage();
        }
    }
    public function envio()
    {
        $estado_apertura = $this->estado_apertura();
        if ($estado_apertura == 0) {
            echo 'Caja Cerrada Realice la Apetura';
            return;
        }
        $db = $this->db;
        $date = date("Y-m-d");
        $transacion = 6;
        $estado = 3;
        $efectivo = $_POST['efectivo'];
        $boleta = $_POST['boleta'];
        $comentario = $_POST['comentario'];
        try {
            $query = "INSERT INTO `transacciones` 
                    (`estado_transacion_id`, `tipo_transaccion_id`, `usuario`, `total`, comentario, boleta, fecha_creacion) 
                    VALUES (?, ?, ?, ?, ?, ?,?)";

            $stmt = $db->prepare($query);
            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $db->error);
            }            // Bind de parámetros
            $stmt->bind_param('iiidsss', $estado, $transacion, $this->id_usuario, $efectivo, $comentario, $boleta, $date);

            // Ejecutar la consulta
            $stmt->execute();

            // Verificar si la inserción fue exitosa
            if ($stmt->affected_rows > 0) {
                echo "Listo";
                // Aquí puedes realizar acciones adicionales si la inserción fue exitosa
            } else {
                throw new Exception("Error: No se pudo insertar la transacción.");
            }

            // Cerrar sentencia
            $stmt->close();
        } catch (Exception $e) {
            // Manejo de la excepción
            echo "Error: " . $e->getMessage();
        }
    }
    public function pedidos()
    {
        $db = $this->db;
        $date = date("Y-m-d");
        try {
            $consulta = "SELECT ti.nombre, t.total as monto, t.boleta, t.fecha_creacion AS fechaHora, e.estado AS estado 
                    FROM transacciones t
                    inner join estado_transaccion e on t.estado_transacion_id = e.id
                    inner join tipo_transaccion ti on ti.id = t.tipo_transaccion_id
                    where t.fecha_creacion = '$date'";

            // Ejecutar la consulta SQL
            $resultado = $db->query($consulta);

            if ($resultado->num_rows > 0) {
                // Array para almacenar las transacciones
                $transacciones = array();

                // Obtener y almacenar los resultados de la consulta
                while ($fila = $resultado->fetch_assoc()) {
                    $transacciones[] = $fila;
                }

                // Devolver datos como JSON
                header('Content-Type: application/json');
                echo json_encode($transacciones);
            } else {
                echo json_encode(array('mensaje' => 'No se encontraron transacciones.'));
            }
        } catch (Exception $e) {
            // Manejo de la excepción
            echo "Error: " . $e->getMessage();
        }
    }
}
