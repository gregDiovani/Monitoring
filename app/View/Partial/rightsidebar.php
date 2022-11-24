<?php

?>

<div class="dash-nav dash-nav-dark">
    <header>
        <a href="#" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
        <a href="/" class="spur-logo"><i class="fas fa-bolt"></i> <span>SPower</span></a>
    </header>
    <nav class="dash-nav-list">
        <a href="/" class="dash-nav-item">
            <i class="fas fa-home"></i> Dashboard </a>
        <div class="dash-nav-dropdown">
            <a href="#" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-chart-bar"></i> History </a>
            <div class="dash-nav-dropdown-menu">
                <a href="/history" class="dash-nav-dropdown-item">Transaksi</a>
            </div>
        </div>
        <a href="/tambah" class="dash-nav-item">
            <i class="fas fa-plus-circle"></i>Tambah Pulsa
        </a>
        <!-- <div class="dash-nav-dropdown ">
             <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                 <i class="fas fa-cube"></i> Components </a>
             <div class="dash-nav-dropdown-menu">
                 <a href="cards.html" class="dash-nav-dropdown-item">Cards</a>
                 <a href="forms.html" class="dash-nav-dropdown-item">Forms</a>
                 <div class="dash-nav-dropdown ">
                     <a href="#" class="dash-nav-dropdown-item dash-nav-dropdown-toggle">Icons</a>
                     <div class="dash-nav-dropdown-menu">
                         <a href="icons.html" class="dash-nav-dropdown-item">Solid Icons</a>
                         <a href="icons.html#regular-icons" class="dash-nav-dropdown-item">Regular Icons</a>
                         <a href="icons.html#brand-icons" class="dash-nav-dropdown-item">Brand Icons</a>
                     </div>
                 </div>
                 <a href="stats.html" class="dash-nav-dropdown-item">Stats</a>
                 <a href="tables.html" class="dash-nav-dropdown-item">Tables</a>
                 <a href="typography.html" class="dash-nav-dropdown-item">Typography</a>
                 <a href="userinterface.html" class="dash-nav-dropdown-item">User Interface</a>
             </div>
         </div>
         <div class="dash-nav-dropdown">
             <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                 <i class="fas fa-file"></i> Layouts </a>
             <div class="dash-nav-dropdown-menu">
                 <a href="blank.html" class="dash-nav-dropdown-item">Blank</a>
                 <a href="content.html" class="dash-nav-dropdown-item">Content</a>
                 <a href="login.html" class="dash-nav-dropdown-item">Log in</a>
                 <a href="signup.html" class="dash-nav-dropdown-item">Sign up</a>
             </div>
         </div> -->

    </nav>
</div>

<div class="dash-app">
    <header class="dash-toolbar">
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
        <a href="#!" class="searchbox-toggle">
            <i class="fas fa-search"></i>
        </a>

        <div class="tools">
            <!-- <a href="https://github.com/HackerThemes/spur-template" target="_blank" class="tools-item">
               <i class="fab fa-github"></i>
           </a>
           <a href="#!" class="tools-item">
               <i class="fas fa-bell"></i>
               <i class="tools-item-count">4</i>
           </a> -->
            <div class="dropdown tools-item">
                <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="#!">Profile</a>
                    <a class="dropdown-item" href="../routes.php">Logout</a>
                </div>
            </div>
        </div>
    </header>