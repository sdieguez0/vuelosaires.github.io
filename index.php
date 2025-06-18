<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulario de registro e inicio de sesión.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>FORMULARIO DE REGISTRO E INICIO SESIÓN</title>
    <style>
        .alerta-error,
        .alerta-exito {
            display: none;
            margin-top: 10px;
            padding: 8px;
            border-radius: 5px;
            color: white;
            font-size: 0.9em;
        }
        .alerta-error {
            background-color: crimson;
        }
        .alerta-exito {
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Para unirte a nuestra comunidad por favor Inicia Sesión con tus datos</p>
                <input type="button" value="Iniciar Sesión" id="sign-in">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Crear una Cuenta</h2>
                <form action="/php/register.php" class="form form-register" method="POST" novalidate>
                    <div>
                        <label>
                            <i class='bx bx-user' ></i>
                            <input type="text" placeholder="Nombre Usuario" name="userName">
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-envelope' ></i>
                            <input type="email" placeholder="Correo Electronico" name="userEmail">
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-lock-alt' ></i>
                            <input type="password" placeholder="Contraseña" name="userPassword">
                        </label>
                    </div>
                    <input type="submit" value="Registrarse" id="btn-register">
                    <div class="alerta-error">Todos los campos son obligatorios</div>
                    <div class="alerta-exito">Te registraste correctamente</div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-form login hide">
        <div class="information">
            <div class="info-childs">
                <h2>¡¡Bienvenido nuevamente!!</h2>
                <p>Para unirte a nuestra comunidad por favor Inicia Sesión con tus datos</p>
                <input type="button" value="Registrarse" id="sign-up">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <div class="icons">
                    <i class='bx bxl-google'></i>
                    <i class='bx bxl-github'></i>
                    <i class='bx bxl-linkedin' ></i>
                </div>
                <p>o Iniciar Sesión con una cuenta</p>
                <form action="/login.html" class="form form-login" method="POST" novalidate>
                    <div>
                        <label>
                            <i class='bx bx-envelope' ></i>
                            <input type="email" placeholder="Correo Electronico" name="userEmail">
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-lock-alt' ></i>
                            <input type="password" placeholder="Contraseña" name="userPassword">
                        </label>
                    </div>
                    <input type="submit" value="Iniciar Sesión" id="btn-login">
                    <div class="alerta-error">Todos los campos son obligatorios</div>
                    <div class="alerta-exito">Iniciaste sesión correctamente</div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script type="module" src="js/register.js"></script>
    <script src="js/login.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const formRegister = document.querySelector('.form-register');
        const formLogin = document.querySelector('.form-login');

        const showError = (form) => {
          form.querySelector('.alerta-error').style.display = 'block';
          form.querySelector('.alerta-exito').style.display = 'none';
        };

        const showSuccess = (form) => {
          form.querySelector('.alerta-error').style.display = 'none';
          form.querySelector('.alerta-exito').style.display = 'block';
        };

        const areFieldsFilled = (inputs) => {
          return Array.from(inputs).every(input => input.value.trim() !== '');
        };

        formRegister.addEventListener('submit', (e) => {
          e.preventDefault();
          const inputs = formRegister.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
          if (!areFieldsFilled(inputs)) {
            showError(formRegister);
            return;
          }
          showSuccess(formRegister);
          setTimeout(() => {
            window.location.href = 'index.html';
          }, 1000);
        });

        formLogin.addEventListener('submit', (e) => {
          e.preventDefault();
          const inputs = formLogin.querySelectorAll('input[type="email"], input[type="password"]');
          if (!areFieldsFilled(inputs)) {
            showError(formLogin);
            return;
          }
          showSuccess(formLogin);
          setTimeout(() => {
            window.location.href = 'index.html';
          }, 1000);
        });
      });
    </script>
</body>
</html>