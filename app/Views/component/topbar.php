<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="#">W-<span class="span-navbar">CLASSROOM</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item ">
                    <a class="nav-link <?= $title=='W-Clashroom | Home'  ? 'activeLink' : ''?>" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title=='W-Clashroom | Learning'  ? 'activeLink' : ''?>"
                        href="/home/learning">Learning</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= $title=='W-Clashroom | Profile'  ? 'activeLink' : ''?>"
                        href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Setting
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/home/profile">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" id="logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</nav>