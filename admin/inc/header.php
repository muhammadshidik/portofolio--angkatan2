<?php
$id_level = isset($_SESSION['LEVEL']) ? $_SESSION['LEVEL'] : '';


?>

<header class="shadow">
    <nav class="navbar navbar-expand-lg bg-body-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CMS Siddiq</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Page
                        </a>
                        <ul class="dropdown-menu">
                            <!-- jika level sama dengan admin maka bisa dapat halaman user, bukan adamin jangan atau hilang -->
                             <?php if ($id_level == 1): ?>
                                <li><a class="dropdown-item" href="?page=user">User</a></li>
                            <?php endif ?>
                            <li><a class="dropdown-item" href="?page=manage-profile">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=about">About</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">Summary</a></li>
                            <li><a class="dropdown-item" href="">Education</a></li>
                            <li><a class="dropdown-item" href="">Professional Experience</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resume
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=summary">Summary</a></li>
                            <li><a class="dropdown-item" href="?page=education">Education</a></li>
                            <li><a class="dropdown-item" href="">Professional Experience</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Portofolio
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">Summary</a></li>
                            <li><a class="dropdown-item" href="">Education</a></li>
                            <li><a class="dropdown-item" href="">Professional Experience</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?page=contact">Contact</a>


                </ul>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            ?>
                            
                            <?php echo $_name ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="php/keluar.php">Keluar</a></li>
                        </ul>
                    </li>
                </ul>



            </div>
        </div>
    </nav>
</header>