<?php

?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<!--Popper -->

<div class="dash">
    <div class="dash-nav dash-nav-dark">
        <header>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="/" class="spur-logo"><i class="fas fa-bolt"></i> <span>S-Power</span></a>
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

                <a href="#!" class="tools-item">
                    <i class="fas fa-bell"></i>
                    <i class="tools-item-count">4</i>
                </a>

                <div class="dropdown tools-item">
                    <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        if(isset( $model['user']['name'])){
                            echo '<img src="/css/user.png" alt="">
                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                     <a class="dropdown-item" href="/user/logout">Logout</a>

                    </div>';
                        }else{
                            echo '  <i class="fas fa-user"></i>
                                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                     <a class="dropdown-item" href="/user/login">Login</a>

                    </div>';
                        }
                         ?>
                    </a>


                </div>
                <a href="#!" class="tools-item">
                    <?= $model['user']['name'] ?? '' ?>
                </a>


            </div>
        </header>