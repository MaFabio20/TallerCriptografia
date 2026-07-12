<?php
function generarClave($password)
{
    return hash('sha256', $password, true);
}
$resultado = "";
$titulo = "";
$tipo = "success";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensaje = trim($_POST["mensaje"]);
    $password = $_POST["clave"];
    $accion = $_POST["accion"];
    if (empty($mensaje) || empty($password)) {
        $titulo = "Error";
        $resultado = "Debe ingresar un mensaje y una clave.";
        $tipo = "error";
    } else {
        $clave = generarClave($password);
        $iv = substr(hash('sha256', 'AES256CBC'), 0, 16);
        if ($accion == "cifrar") {
            $resultado = openssl_encrypt(
                $mensaje,
                "AES-256-CBC",
                $clave,
                0,
                $iv
            );
            $titulo = "Mensaje Cifrado";
        } else {
            $resultado = openssl_decrypt(
                $mensaje,
                "AES-256-CBC",
                $clave,
                0,
                $iv
            );
            if ($resultado == "") {
                $resultado = "No fue posible descifrar el mensaje. Verifique la clave.";
                $titulo = "Error";
                $tipo = "error";
            } else {
                $titulo = "Mensaje Descifrado";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Resultado</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="background">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="container">
        <div class="card">
            <div class="logo">
                <i class="fa-solid fa-lock"></i>
                <h1><?php echo $titulo; ?></h1>
                <p>Resultado del proceso criptográfico</p>
            </div>
            <label>
                <i class="fa-solid fa-file-lines"></i>
                Resultado
            </label>
            <textarea id="resultado" readonly><?php echo htmlspecialchars($resultado); ?></textarea>
            <button type="button" onclick="copiarTexto()">
                <i class="fa-solid fa-copy"></i>
                Copiar Resultado
            </button>
            <button type="button" onclick="descargarTexto()">
                <i class="fa-solid fa-download"></i>
                Descargar TXT
            </button>
            <button onclick="location.href='index.php'">
                <i class="fa-solid fa-arrow-left"></i>
                Volver
            </button>
        </div>
    </div>
    <script>
        Swal.fire({
            icon: '<?php echo $tipo; ?>',
            title: '<?php echo $titulo; ?>',
            text: 'Proceso realizado correctamente.',
            confirmButtonColor: '#2563eb'
        });
        function copiarTexto() {
            const texto = document.getElementById("resultado");
            texto.select();
            document.execCommand("copy");
            Swal.fire({
                icon: 'success',
                title: 'Copiado',
                text: 'El resultado fue copiado al portapapeles.'
            });
        }

        function descargarTexto() {
            let texto = document.getElementById("resultado").value;
            let archivo = new Blob([texto], { type: 'text/plain' });
            let enlace = document.createElement("a");
            enlace.href = URL.createObjectURL(archivo);
            enlace.download = "resultado.txt";
            enlace.click();
        }
    </script>
</body>

</html>