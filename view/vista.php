<?php 
include ("header.php");
?>

<body>
    <!-- header inicio -->
    <header class="header">
        <div class="header__container">
            <img src="../video/loo1.png" class="header__img" alt="">
            <div class="header__search">
                <input type="search" placeholder="Buscar ....." class="header__input">
                <!-- <i class="bx bx_search"></i> -->
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="header__toggle">
                <i class="bx bx menu" id="header-toggle"></i>
            </div>
        </div>
    </header>
    <!-- header fin -->
    <!-- nav inicio -->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <span class="nav__logo-name">SISTEMAS</span>
                </a>
                <div class="nav__list">
                    <div class="nav__items">
                        <h1 class="nav_subtitle">Profile</h1>
                        <a href="#" class="nav_link active">
                            <!-- <i class="bx bx-home nav__icon"></i> -->
                            <i class="fa-solid fa-house"></i>
                            <span class="nav_name">Inicio</span>
                        </a>
                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <!-- <i class="bx bx-user nav__icon"></i> -->
                                <i class="fa-solid fa-user"></i>
                                <span class="nav__name">Perfil</span>
                                <i class="bx bx-chevron-down nav__icon nav__dropdown-icon"></i>
                            </a>
                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="#" class="nav__dropdown-item">Contraseña</a>
                                    <a href="#" class="nav__dropdown-item">Corrreo</a>
                                    <a href="#" class="nav__dropdown-item">Cuentas</a>
                                </div>
                            </div>

                        </div>
                        <a href="#" class="nav__link">
                            <!-- <i class="bx bx-mail-send nav__icon"></i> -->
                            <i class="fa-solid fa-envelope"></i>
                            <span class="nav__name">Correos</span>
                        </a>
                    </div>
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Menu</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <!-- <i class="bx bx-bell nav__icon"></i> -->
                                <i class="fa-sharp fa-solid fa-bell"></i>
                                <span class="nav__name">Notificaciones</span>
                                <i class="bx bx-chevron-down nav__icon nav__dropdown-icon"></i>
                            </a>
                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="#" class="nav__dropdown-item">Bloqueados</a>
                                    <a href="#" class="nav__dropdown-item">Silenciados</a>
                                    <a href="#" class="nav__dropdown-item">Activos</a>
                                </div>
                            </div>   
                        </div>
                        <a href="#" class="nav__link">
                            <!-- <i class="bx bx-compass nav__icon"></i> -->
                            <i class="fa-solid fa-compass"></i>
                            <span class="nav__name">Explorar</span>
                        </a>
                        <a href="#" class="nav__link">
                            <!-- <i class="bx bx-analyse nav__icon"></i> -->
                            <i class="fa-solid fa-chart-mixed"></i>
                            <span class="nav__name">Análisis</span>
                        </a>
                    </div>
                </div>
            </div>
            <a href="#" class="nav__link nav__logout">
                <!-- <i class="bx bx-log-out nav__icon"></i> -->
                <i class="fa-solid fa-door-closed"></i>
                <span class="nav__name">Cerrar Sesión</span>
            </a>
        </nav>
    </div>

<!--     contenido -->
    
    <main>
        <section>
            <p>Menú  -  Barra Lateral</p>
        </section>
    </main>
