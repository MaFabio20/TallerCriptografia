<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifrado Simétrico AES-256</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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
                <i class="fa-solid fa-shield-halved"></i>
                <h1>Cifrado Simétrico</h1>
                <p>AES-256 CBC</p>
            </div>
            <form action="procesar.php" method="POST">
                <label>
                    <i class="fa-solid fa-keyboard"></i>
                    Mensaje
                </label>
                <textarea name="mensaje" id="mensaje" maxlength="500" required
                    placeholder="Escriba aquí el mensaje..."></textarea>
                <div class="contador">
                    <div class="barra">
                        <div id="progreso"></div>
                    </div>
                    <span id="contador">0 / 500</span>
                </div>
                <label>
                    <i class="fa-solid fa-key"></i>
                    Clave Simétrica
                </label>
                <div class="password">
                    <input type="password" name="clave" id="clave" required>
                    <i class="fa-solid fa-eye" id="ver"></i>
                </div>
                <label>
                    <i class="fa-solid fa-gear"></i>
                    Acción
                </label>
                <select name="accion">
                    <option value="cifrar">
                        🔒 Cifrar
                    </option>
                    <option value="descifrar">
                        🔓 Descifrar
                    </option>
                </select>
                <button>
                    <i class="fa-solid fa-bolt"></i>
                    Procesar
                </button>
            </form>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>