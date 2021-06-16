<?php

require_once "config.php";

$TovarName = $kolichestvo = $Gruppa = $Edizmer = $Price = " ";
$TovarName_err = $kolichestvo_err = $Gruppa_err = $Edizmer_err = $Price_err = "";
if(isset($_POST["id"]) && !empty($_POST["id"])){
   
    $id = $_POST["id"];
    
   
     $input_TovarName = trim($_POST["TovarName"]);
    if(empty($input_TovarName)){
        $TovarName_err = "Пожалуйста введите товар.";
    } else{
        $TovarName = $input_TovarName;
    }
    
   
    $input_kolichestvo = trim($_POST["kolichestvo"]);
    if(empty($input_kolichestvo)){
        $kolichestvo_err = "Пожалуйста введите количество.";     
    } elseif(!ctype_digit($input_kolichestvo)){
      $kolichestvo_err = "Пожалуйста введите положительное число";
    } else{
        $kolichestvo = $input_kolichestvo;
    }
    
   
    $input_Gruppa = trim($_POST["Gruppa"]);
    if(empty($input_Gruppa)){
        $Gruppa_err = "Пожалуйста введите группу товара";     
    } else{
        $Gruppa = $input_Gruppa;
    }
    $input_Edizmer = trim($_POST["Edizmer"]);
    if(empty($input_Edizmer)){
        $Edizmer_err = "Пожалуйста введите единицу измерения";     
    } else{
        $Edizmer = $input_Edizmer;
    }
    $input_Price = trim($_POST["Price"]);
    if(empty($input_Price)){
        $Price_err = "Пожалуйста введите цену";     
    } else{
        $Price = $input_Price;
    }  
    
   
        if(empty($TovarName_err) && empty($kolichestvo_err) && empty($Gruppa_err) && empty($input_Edizmer) &&empty($Price_err)){
        
       $sql = ("UPDATE `sklad` SET `TovarName` = '?', `kolichestvo` = '?', `Gruppa` = '?', `Edizmer` = '?', `Price` = '?' WHERE `sklad`.`id` = ?");
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_TovarName, $param_kolichestvo, $param_Gruppa, $param_Edizmer, $param_id);
            
            // Set parameters
            $param_TovarName = $TovarName;
            $param_kolichestvo = $kolichestvo;
            $param_Gruppa = $Gruppa;
            $param_Edizmer = $Edizmer;
            $param_Price = $Price;
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt)){
               
                header("location: index.php");
                exit();
            }
        }
         
 
        mysqli_stmt_close($stmt);
    }
    
   
    mysqli_close($link);
    } else{
    
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
       
        $id =  trim($_GET["id"]);
        
      
        $sql = "SELECT * FROM sklad WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            
            $param_id = $id;
            
         
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                   
                    $TovarName = $row["TovarName"];
                    $kolichestvo = $row["kolichestvo"];
                    $Gruppa = $row["Gruppa"];
                    $Edizmer = $row["Edizmer"];
                    $Price = $row["Price"];
                } else{
                    
                    header("location: error.php");
                    exit();
                }
                
            } 
        }
        
        
        mysqli_stmt_close($stmt);
        
      
        mysqli_close($link);
    }  else{
     
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Радактирование</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Редактировать записть</h2>
                    <p>Пожалуйста измените данные и подтвердите для изменения.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Название товара</label>
                            <input type="text" name="TovarName" class="form-control <?php echo (!empty($TovarName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $TovarName; ?>">
                            <span class="invalid-feedback"><?php echo $TovarName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Количество</label>
                            <input type="text" name="kolichestvo" class="form-control <?php echo (!empty($kolichestvo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kolichestvo; ?>">
                            <span class="invalid-feedback"><?php echo $kolichestvo_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Группа</label>
                            <input type="text" name="Gruppa" class="form-control <?php echo (!empty($Gruppa_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Gruppa; ?>">
                            <span class="invalid-feedback"><?php echo $Gruppa_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Единица измерения</label>
                            <input type="text" name="Edizmer" class="form-control <?php echo (!empty($Edizmer_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Edizmer; ?>">
                            <span class="invalid-feedback"><?php echo $Edizmer_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Цена</label>
                            <input type="text" name="Price" class="form-control <?php echo (!empty($Price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Price; ?>">
                            <span class="invalid-feedback"><?php echo $Price_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary mt-3" value="Обновить">
                        <a href="index.php" class="btn btn-secondary mt-3">Назад</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>