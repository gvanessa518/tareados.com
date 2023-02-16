<?php

    session_start();

    $cont = 0;

    if (!isset($_SESSION['total_est'])){
        $_SESSION['total_est'] = 0;
    }
    
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $math = $_POST['math'];
    $fis = $_POST['fis'];
    $prog = $_POST['prog'];

    //evaluamos si el valor ya esta creado en la sesion o no
    if (!isset($_SESSION['math_aprob'])){
        $_SESSION['math_aprob'] = 0;
    }
    if (!isset($_SESSION['math_rep'])){
        $_SESSION['math_rep'] = 0;
    }
    if (!isset($_SESSION['fis_aprob'])){
        $_SESSION['fis_aprob'] = 0;
    }
    if (!isset($_SESSION['fis_rep'])){
        $_SESSION['fis_rep'] = 0;
    }
    if (!isset($_SESSION['prog_aprob'])){
        $_SESSION['prog_aprob'] = 0;
    }
    if (!isset($_SESSION['prog_rep'])){
        $_SESSION['prog_rep'] = 0;
    }


    if (!isset($_SESSION['todas_materias'])){
        $_SESSION['todas_materias'] = 0;
    }
    if (!isset($_SESSION['una_materia'])){
        $_SESSION['una_materia'] = 0;
    }
    if (!isset($_SESSION['dos_materias'])){
        $_SESSION['dos_materias'] = 0;
    }


    if (!isset($_SESSION['prom_math'])){
        $_SESSION['prom_math'] = 0;
    }
    if (!isset($_SESSION['prom_fis'])){
        $_SESSION['prom_fis'] = 0;
    }
    if (!isset($_SESSION['prom_prog'])){
        $_SESSION['prom_prog'] = 0;
    }


    if (!isset($_SESSION['math_max'])){
        $_SESSION['math_max'] = 0;
    }
    if (!isset($_SESSION['fis_max'])){
        $_SESSION['fis_max'] = 0;
    }
    if (!isset($_SESSION['prog_max'])){
        $_SESSION['prog_max'] = 0;
    }

    //validaciones
    if ($math >= 9.5){
        $cont++;
        $_SESSION['math_aprob']++;

        if ($_SESSION['prom_math'] == 0){
            $_SESSION['prom_math'] = $math;
        }
        else {
            $_SESSION['prom_math'] = ( $_SESSION['prom_math'] + $math) / 2;
        }        
    }
    else {
        $_SESSION['math_rep']++;
        if ($_SESSION['prom_math'] == 0){
            $_SESSION['prom_math'] = $math;
        }
        else {
            $_SESSION['prom_math'] = ( $_SESSION['prom_math'] + $math) / 2;
        }
    }
    if ($fis >= 9.5){
        $cont++;
        $_SESSION['fis_aprob']++;

        if ($_SESSION['prom_fis'] == 0){
            $_SESSION['prom_fis'] = $fis;
        }
        else {
            $_SESSION['prom_fis'] = ( $_SESSION['prom_fis'] + $fis) / 2;
        }
    }
    else {
        $_SESSION['fis_rep']++;
        if ($_SESSION['prom_fis'] == 0){
            $_SESSION['prom_fis'] = $fis;
        }
        else {
            $_SESSION['prom_fis'] = ( $_SESSION['prom_fis'] + $fis) / 2;
        }
    }
    if ($prog >= 9.5){
        $cont++;
        $_SESSION['prog_aprob']++;

        if ($_SESSION['prom_prog'] == 0){
            $_SESSION['prom_prog'] = $prog;
        }
        else {
            $_SESSION['prom_prog'] = ( $_SESSION['prom_prog'] + $prog) / 2;
        }
    }
    else {
        $_SESSION['prog_rep']++;
        if ($_SESSION['prom_prog'] == 0){
            $_SESSION['prom_prog'] = $prog;
        }
        else {
            $_SESSION['prom_prog'] = ( $_SESSION['prom_prog'] + $prog) / 2;
        }
    }


    if ($_SESSION['math_max'] < $math) {
        $_SESSION['math_max'] = $math;
    }
    else {
        $_SESSION['math_max'] = $_SESSION['math_max'];
    }
    if ($_SESSION['fis_max'] < $fis) {
        $_SESSION['fis_max'] = $fis;
    }
    else {
        $_SESSION['fis_max'] = $_SESSION['fis_max'];
    }
    if ($_SESSION['prog_max'] < $prog) {
        $_SESSION['prog_max'] = $prog;
    }
    else {
        $_SESSION['prog_max'] = $_SESSION['prog_max'];
    }


    if ($cont == 1){
        $_SESSION['una_materia']++;
    }
    elseif ($cont ==2) {
        $_SESSION['dos_materias']++;
    }
    else{
        $_SESSION['todas_materias']++;
    }

    $_SESSION['total_est']++;

    //resultados mostrados en pantalla
    echo "Registrado alumno #".$_SESSION['total_est'];

    echo " / Nota promedio de cada materia: Matematicas: ". $_SESSION['prom_math']. " - Fisica: ".$_SESSION['prom_fis'] . " - Programacion: ". $_SESSION['prom_prog'] ; 

    echo " / Cantidad de alumnos aprobados en: Matematicas: ". $_SESSION['math_aprob']. " - Fisica: ".$_SESSION['fis_aprob'] . " - Programacion: ". $_SESSION['prog_aprob'] ; 
    echo " / Cantidad de alumnos reprobados en: Matematicas: ". $_SESSION['math_rep']. " - Fisica: ".$_SESSION['fis_rep'] . " - Programacion: ". $_SESSION['prog_rep'] ; 

    echo " / Cantidad de alumnos que aprobaron todas las materias: ". $_SESSION['todas_materias'] ; 
    " / Cantidad de alumnos que aprobaron una materia: ". $_SESSION['dos_materias'] ; 
    " / Cantidad de alumnos que aprobaron 2 materias: ". $_SESSION['una_materia'] ; 

    echo " / Nota maxima de cada materia: Matematicas: ". $_SESSION['math_max']. " - Fisica: ".$_SESSION['fis_max'] . " - Programacion: ". $_SESSION['prog_max'] ; 


?>




