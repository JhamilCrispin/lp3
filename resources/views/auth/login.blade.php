<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
    ></script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <title>HuanuCorked</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Iniciar Session</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Usuario" />
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Contraseña" name="password" required autocomplete="current-password"/>
                </div>

                <input type="submit" value="Entrar" class="btn solid" />

                <p class="social-text">Iniciar Session en una red social</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
            <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                @csrf
                <h2 class="title">Registrate</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nombre" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" autofocus/>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Apellido" name="apellido" value="{{ old('apellido') }}" required autocomplete="name" autofocus/>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Dni" name="dni" value="{{ old('dni') }}" required autocomplete="name" autofocus/>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="date" name="fechaNa" value="{{ old('fechaNa') }}" required autocomplete="fechaNa"/>
                </div>

                    <select name="tipo" class="input-field" aria-label=".form-select-sm example">
                        <option selected>Seleccionar tipo</option>
                        <option value="empresa">empresa</option>
                        <option value="normal">normal</option>
                    </select>

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Nombre de una empresa" name="empresa"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="password" placeholder="Contraseña" name="password" required autocomplete="new-password"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Repita la contraseña" name="password_confirmation" required autocomplete="new-password"/>
                </div>
                <input type="submit" class="btn" value="Sign up" />
                <p class="social-text">O registrate en nuestras plataformas</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Eres nuevo?</h3>
                <p>
                   Inicia session con nosotros para conseguir un buen trabajo!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Registrarte
                </button>
            </div>
            <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Ya cuentas con una cuenta?</h3>
                <p>
                    Perfecto iniciemos session ya!.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Iniciar Session
                </button>
            </div>
            <img src="img/register.svg" class="image" alt="" />
        </div>
    </div>
</div>

<script src="{{ asset('js/login.js') }}"></script>
</body>
