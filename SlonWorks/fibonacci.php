<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 0); // не показывает ошибки клиентовской стороне
    ini_set('log_errors',1);   
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    ini_set('error_log', dirname(__FILE__). '/logs/main_error.log');   // сюда в лог файл записывается ошибки 

    // в случае ошибки записываю в лог файл и остановливается скрипт.
    try{
        $connect = mysqli_connect("localhost", "root", "", "test"); 
    }
    catch(Exception $e){
        error_log($e->getMessage()."\n", 3, dirname(__FILE__). "/logs/main_error.log");
        exit("Упс ошибка, напишите разработчику");
    }

    $output =  $_POST['fib_number']." число фибоначчи: ";
    $id =  $_POST['fib_number'];   // получаю с фронта порядок числа фибоначчи, обработка на позитивное целое -
    // - число на фронте в инпуте 

    if($id == 0) die("Введите число");

    // функция для расчета фиббоначи
    function fib($n){
        return $n < 3 ? 1 : fib($n - 1) + fib($n - 2);
    }

    // в случае ошибки записываю в лог файл и остановливается скрипт.
    try{
        $sql = "SELECT value from fibonacci where number = $id";
        $data_bd = mysqli_query($connect, $sql);
    }
    catch(Exception $e){
        error_log($e->getMessage()."\n", 3, dirname(__FILE__). "/logs/main_error.log");
        exit("Упс ошибка, напишите разработчику");
    }

    // cмотрю есть ли такой уже в mysql , если ЕСТЬ берем его значение, если НЕТ то делаем расчет по функцию
    if(mysqli_num_rows($data_bd)){
        $row = mysqli_fetch_assoc($data_bd);
        $output .=$row["value"];
    }
    else{
        // запускаем функцию fib для расчета 
        $value = fib($id);
        $output .= $value;
    
        $query = "INSERT INTO `fibonacci` (`number`, `value`) 
                         VALUES ('".$id."', '".$value."')";
        try{
            mysqli_query($connect, $query);
        }
        catch(Exception $e){
            error_log($e->getMessage()."\n", 3, dirname(__FILE__). "/logs/main_error.log");
            exit("Упс ошибка, напишите разработчику");
        } 
    }

    
    echo $output;

?>