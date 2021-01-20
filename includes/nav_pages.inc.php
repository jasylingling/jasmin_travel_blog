<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="../">Jasmin's Travel Blog <i class="fas fa-globe-africa"></i></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                </li>
                <li class="nav-item" id="loginIcon">
                    <a class="nav-link" href="login" title="login" aria-label="login or register to the cms"><i
                            class="far fa-user" style="font-size: large;"></i></a>
                </li>
                <?php
                if(sessionIsValid()) {
                    echo "<li class=\"nav-item\"><a class=\"nav-link rounded btn btn-primary mr-2 ml-2\" href=\"../cms/dashboard\"><i class=\"fas fa-cog\" style=\"font-size: medium;\"></i> Dashboard</a></li>";
                    echo "<style>#loginIcon{display: none !important;}</style>";
                    echo "<li class=\"nav-item\"><a class=\"nav-link border border-white rounded\" href=\"../includes/logout\"><i class=\"fas fa-sign-out-alt\" style=\"font-size: medium;\"></i> Logout</a></li>";                   
                }
                ?>
            </ul>
        </div>
    </div>
</nav>