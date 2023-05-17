<?php
    // session_start();
    // if(!isset($_SESSION['admin']))
    // {
    //   header('location:login.php');
    // }else{
    //     $ctrl='home';
    //     if (isset($_GET['ctrl'])) {
    //         $ctrl = $_GET['ctrl'];
    //     }
    //     include 'controller/'.$ctrl.'.php';
    // }
    session_start();
    if(!isset($_SESSION['admin']))
    {
      header('location:login.php');
      
    }else{
        $ctrl='home';
        if (isset($_GET['ctrl'])) {
            $ctrl = $_GET['ctrl'];
        }
        include 'controller/'.$ctrl.'.php';
    }
  ?>  