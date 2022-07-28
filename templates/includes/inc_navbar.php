<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Punto de Venta para Farmacia
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a <?php if ($d->nameModule == 'home') : ?> class="nav-link active" <?php else : ?> class="nav-link" <?php endif; ?> href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a <?php if ($d->nameModule == 'colaboradores') : ?> class="nav-link active" <?php else : ?> class="nav-link" <?php endif; ?> href="./colaboradores">Colaboradores</a>
                </li>
                <li class="nav-item">
                    <a <?php if ($d->nameModule == 'reportes') : ?> class="nav-link active" <?php else : ?> class="nav-link" <?php endif; ?>href="./reportes">Reportes</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hola, <?php echo ($_SESSION['user_session_shouxin']['user']['name']); ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Administrar cuenta</a></li>
                    <li><a class="dropdown-item" href="logout">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>