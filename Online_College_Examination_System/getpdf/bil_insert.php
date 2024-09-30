<?php
include 'dbcon.php';

if(isset($_POST['add_faculty'])){
    
    $name = $_POST['name'];  // names in [] should be exactly same as names in form i.e <input type="text" name="f_name" class="form-control">
    $category = $_POST['category'];
    $dept = $_POST['dept'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $pto = $_POST['p_t_o'];
    $nostud = $_POST['no_stud'];
    //$total = ($nostud * 5);

    if($year=='FE' & $pto=='PR')
    {
        $total = $nostud * 26;
    }
    elseif($year=='FE' & $pto=='TW'){
        $total = $nostud * 16;
    }
    elseif($year=='FE' & $pto=='OR'){
        $total = $nostud * 16;
    }
    elseif($year=='SE' & $pto=='PR'){
        $total = $nostud * 26;
    }
    elseif($year=='SE' & $pto=='TW'){
        $total = $nostud * 16;
    }
    elseif($year=='SE' & $pto=='OR'){
        $total = $nostud * 16;
    }
    elseif($year=='TE' & $pto=='PR'){
        $total = $nostud * 30;
    }
    elseif($year=='TE' & $pto=='TW'){
        $total = $nostud * 22;
    }
    elseif($year=='TE' & $pto=='OR'){
        $total = $nostud * 22;
    }
    elseif($year=='BE' & $pto=='PR'){
        $total = $nostud * 30;
    }
    elseif($year=='BE' & $pto=='TW'){
        $total = $nostud * 22;
    }
    elseif($year=='BE' & $pto=='OR'){
        $total = $nostud * 22;
    }
    else{
        $total = 0;
    }

    // if($pract<=10)
    // {
    //     $pract = 100;
    // }
    // else{
    //     $pract = $pract*$practrate;
    // }

    // $tw = $_POST['tw'];
    // if($tw<=10)
    // {
    //     $tw = 100;
    // }
    // else{
    //     $tw = $tw*10;
    // }

    // $oral = $_POST['oral'];
    // if($oral<=10)
    // {
    //     $oral = 100;
    // }
    // else{
    //     $oral = $oral*10;
    // }
    
    // $total = ($pract + $tw+ $oral);

    if($name == "" || empty($name)){
        header('location:form.php?message=fill the first name !'); //form validation
    }

    else{
        $query = "INSERT INTO `billing` (`NAME`, `CATEGORY`, `DEPARTMENT`, `SUBJECT`, `CLASS`, `DATE_FROM`, `DATE_TO`, `PR/OR/TW`, `NO_OF_STUDENTS`, `TOTAL`) VALUES ('$name', '$category', '$dept', '$subject', '$year', '$date_from', '$date_to', '$pto', '$nostud', '$total')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:form.php?insert_msg=your data has been added successfully'); //to redirect user 
        }
    }
}
?>