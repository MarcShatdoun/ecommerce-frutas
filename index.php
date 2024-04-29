<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <h1>tutti Frutti</h1>
    </header>
    <main>
        <section id="signin">
            <h2>Formaluario de acceso</h2>
            <form action="php/signin.php" autocomplete="off" method="post">   
                <div>
                    <label for="email">email: </label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="password">Contraseña: </label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <button type="submit">Acceder</button>
                    <button type="reset">Borrar</button>
                    <button type="button" onclick="mostrarFormularioAlta()">Nuevo Usuario</button>
                </div>
            </form>
        </section>

        <section id="signup">
            <h2>Por favor, Introduszca sus datos</h2>
            <form id="signupForm">
                <fieldset>
                    <legend>Datos personales</legend>
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" required min="2" max="20" />
                    </div>
                    <div>
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" id="apellido" required min="2" max="50" />
                    </div>
                    <div>
                        <label for="password1">Contraseña elegida:</label>
                        <input type="password" name="password1" id="password1" required min="6" max="20">
                    </div>
                    <div>
                        <label for="password2">Confrime contraseña:</label>
                        <input type="text" name="password2" id="password2">
                    </div>
                    <div id="errorPassword"></div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Datos de la compra</legend>
                    <div>
                        <label for="nif">Su NIF</label>
                        <input type="text" name="nif" id="nif">
                    </div>
                    <div>
                        <label for="telefono">Teléfono: </label>
                        <input type="text" name="telefono" id="telefono">
                    </div>
                    <div>
                        <label for="ciudad">Ciudad: </label>
                        <input type="text" name="ciudad" id="ciudad" required>
                    </div>
                    <div>
                        <label for="direccion">Direccion:</label>
                        <input type="text" name="direccion" id="direccion" min="2" max="20">
                    </div>

                </fieldset>
                <div>
                    <button type="submit">Enviar Datos</button>
                    <button type="reset">Borrar Datos</button>
                    <button type="button" onclick="volverinicio()">Cancelar</button>
                </div>
            </form>
        </section>
        

    </main>

    <script src="js/app.js"></script>
    
    
</body>
</html>