<?php
class caja
{
    private $db;
    private $nombre;
    private $id_agencia;
    private $id_usuario;
    private $date;
    private $datetime;

    public function __construct($conexion)
    {
        $this->db = $conexion;
        $this->nombre = $_SESSION["nombre"] . ' ' . $_SESSION["nombre"];
        $this->id_agencia = $_SESSION["idAgencia"];
        $this->id_usuario = $_SESSION['usuario_id'];
        $this->date = date("Y-m-d");
        $this->datetime = date("Y-m-d h:i:s");
    }

    public function apertura()
    {
        $db = $this->db;
        $cantidad = $_POST['cantidad']; // el correo electrónico proporcionado por el usuario
        $transacion = 1;
        $estado = 1;
        try {
            $query = "SELECT count(*) 
                FROM transacciones
                WHERE estado_transacion_id = ?
                AND tipo_transaccion_id = ?
                AND DATE(fecha_creacion) = ?
                AND usuario = ?";

            $stmt = $db->prepare($query);
            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $db->error);
            }

            // Bind de parámetros
            $stmt->bind_param('iisi', $estado, $transacion, $this->date, $this->id_usuario);

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
                    $stmt->bind_param('iiids', $estado, $transacion, $this->id_usuario, $cantidad, $this->datetime);

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
        $transacion = 1;
        $estado = 1;
        try {
            $query = "SELECT count(*) as apertura
            FROM transacciones
            WHERE estado_transacion_id = ?
            AND tipo_transaccion_id = ?
            AND date(fecha_creacion) = ?
            AND usuario = ?";

            $stmt = $db->prepare($query);
            if ($stmt === false) {
                throw new Exception('Error al preparar la consulta SQL: ' . $db->error);
            }

            // Bind de parámetros
            $stmt->bind_param('iisi', $estado, $transacion, $this->date, $this->id_usuario);

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
        try {
            $query = "SELECT count(*) as transaciones
                FROM transacciones
                WHERE estado_transacion_id = ?
                AND tipo_transaccion_id not in (1, 2)
                AND date(fecha_creacion) = ?
                AND usuario = ?";
            $stmt = $db->prepare($query);
            // Bind de parámetros
            $stmt->bind_param('isi', $estado, $this->date, $this->id_usuario);
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
        try {
            $query = "SELECT count(*) as transaciones
                FROM transacciones
                WHERE estado_transacion_id = 1
                AND tipo_transaccion_id = ?
                AND date(fecha_creacion) = ?
                AND usuario = ?";
            $stmt = $db->prepare($query);
            // Bind de parámetros
            $stmt->bind_param('isi', $transacion, $this->date, $this->id_usuario);
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
            $stmt->bind_param('iiidsss', $estado, $transacion, $this->id_usuario, $efectivo, $comentario, $boleta, $this->datetime);

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
            $stmt->bind_param('iiidsss', $estado, $transacion, $this->id_usuario, $efectivo, $comentario, $boleta, $this->datetime);

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
        try {
            $consulta = "SELECT ti.nombre, t.total as monto, t.boleta, t.fecha_creacion AS fechaHora, e.estado AS estado 
                    FROM transacciones t
                    inner join estado_transaccion e on t.estado_transacion_id = e.id
                    inner join tipo_transaccion ti on ti.id = t.tipo_transaccion_id
                    where date(t.fecha_creacion) = '$this->date'
                    AND t.usuario = '$this->id_usuario'
                    AND t.tipo_transaccion_id in (5,6)
                    ";

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
                // Encabezado para indicar que se enviará JSON
                header('Content-Type: application/json');

                // Simular respuesta JSON según tu ejemplo
                echo json_encode(array(
                    array(
                        'nombre' => 'No se encontraron transacciones.',
                        'monto' => '',
                        'boleta' => '',
                        'fechaHora' => '',
                        'estado' => ''
                    )
                ));
            }
        } catch (Exception $e) {
            // Manejo de la excepción
            echo "Error: " . $e->getMessage();
        }
    }
    public function buscar_nombre()
    {
        // Establecer el encabezado para devolver JSON
        header('Content-Type: application/json');

        // Conexión a la base de datos
        $db = $this->db;

        try {
            // Obtener y limpiar los datos enviados por POST
            $p_nombre = isset($_POST['p_nombre']) ? rtrim($_POST['p_nombre']) : '';
            $s_nombre = isset($_POST['s_nombre']) ? rtrim($_POST['s_nombre']) : '';
            $p_apellido = isset($_POST['p_apellido']) ? rtrim($_POST['p_apellido']) : '';
            $s_apellido = isset($_POST['s_apellido']) ? rtrim($_POST['s_apellido']) : '';

            // Construir la cláusula WHERE en función de los valores recibidos
            $whereClause = '';
            if (!empty($p_nombre)) {
                $whereClause .= "s.p_nombre = '" . $db->real_escape_string($p_nombre) . "' AND ";
            }
            if (!empty($s_nombre)) {
                $whereClause .= "s.s_nombre = '" . $db->real_escape_string($s_nombre) . "' AND ";
            }
            if (!empty($p_apellido)) {
                $whereClause .= "s.p_apellido = '" . $db->real_escape_string($p_apellido) . "' AND ";
            }
            if (!empty($s_apellido)) {
                $whereClause .= "s.s_apellido = '" . $db->real_escape_string($s_apellido) . "' AND ";
            }

            // Eliminar el último 'AND ' sobrante
            $whereClause = rtrim($whereClause, ' AND ');

            // Construir la consulta SQL
            $consulta = "SELECT
                c.id, 
                0 as saldo,
                DATE(c.fechaInicio) as fecha_desembolso, 
                e.descripcion as estado, 
                s.dpi as socios_dpi,
                CONCAT(s.p_nombre, ' ',
                s.s_nombre, ' ',
                s.p_apellido, ' ',
                s.s_apellido) as nombre	
            FROM
                credito AS c
                INNER JOIN
                estado_credito AS e
                ON 
                    c.estado_id = e.id
                INNER JOIN
                socios AS s
                ON 
                    c.socios_dpi = s.dpi
        ";
            if (!empty($whereClause)) {
                $consulta .= " WHERE " . $whereClause;
            }

            // Registrar la consulta para depuración
            error_log("Consulta SQL: " . $consulta);

            // Ejecutar la consulta SQL
            $resultado = $db->query($consulta);

            if ($db->error) {
                throw new Exception("Error en la consulta SQL: " . $db->error);
            }

            if ($resultado->num_rows > 0) {
                // Array para almacenar las transacciones
                $transacciones = array();

                // Obtener y almacenar los resultados de la consulta
                while ($fila = $resultado->fetch_assoc()) {
                    $transacciones[] = $fila;
                }

                // Devolver datos como JSON
                echo json_encode($transacciones);
            } else {
                // Devolver un mensaje de no se encontraron resultados
                echo json_encode(array(
                    array(
                        'id' => 'No se encontraron transacciones.',
                        'monto' => '',
                        'boleta' => '',
                        'fechaHora' => '',
                        'estado' => ''
                    )
                ));
            }
        } catch (Exception $e) {
            // Manejo de la excepción
            error_log("Error: " . $e->getMessage());
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
    public function buscar_dpi()
    {
        // Establecer el encabezado para devolver JSON
        header('Content-Type: application/json');

        // Conexión a la base de datos
        $db = $this->db;
        if (!isset($_POST['dpi'])) {
            return;
        }
        $dpi = $_POST['dpi'];

        try {

            // Construir la consulta SQL
            $consulta = "SELECT
                c.id, 
                0 as saldo,
                DATE(c.fechaInicio) as fecha_desembolso, 
                e.descripcion as estado, 
                s.dpi as socios_dpi,
                CONCAT(s.p_nombre, ' ',
                s.s_nombre, ' ',
                s.p_apellido, ' ',
                s.s_apellido) as nombre	
            FROM
                credito AS c
                INNER JOIN
                estado_credito AS e
                ON 
                    c.estado_id = e.id
                INNER JOIN
                socios AS s
                ON 
                    c.socios_dpi = s.dpi
                WHERE s.dpi = '$dpi'
        ";

            // Registrar la consulta para depuración
            error_log("Consulta SQL: " . $consulta);

            // Ejecutar la consulta SQL
            $resultado = $db->query($consulta);

            if ($db->error) {
                throw new Exception("Error en la consulta SQL: " . $db->error);
            }

            if ($resultado->num_rows > 0) {
                // Array para almacenar las transacciones
                $transacciones = array();

                // Obtener y almacenar los resultados de la consulta
                while ($fila = $resultado->fetch_assoc()) {
                    $transacciones[] = $fila;
                }

                // Devolver datos como JSON
                echo json_encode($transacciones);
            } else {
                // Devolver un mensaje de no se encontraron resultados
                echo json_encode(array(
                    array(
                        'id' => 'No se encontraron transacciones.',
                        'monto' => '',
                        'boleta' => '',
                        'fechaHora' => '',
                        'estado' => ''
                    )
                ));
            }
        } catch (Exception $e) {
            // Manejo de la excepción
            error_log("Error: " . $e->getMessage());
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
}
