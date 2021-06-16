<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$TovarName = $_POST['TovarName'] ?? '';
$kolichestvo = $_POST['kolichestvo'] ?? '';
$Gruppa = $_POST['Gruppa'] ?? '';
$Edizmer = $_POST['Edizmer'] ?? '';
$Price = $_POST['Price'] ?? '';



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_TovarName = trim($_POST["TovarName"]);
    if(empty($input_TovarName)){
        $Tovar_err = "Пожалуйста введите имя товара.";
    } else{
        $TovarName = $input_TovarName;
    }

    // Validate address
    $input_kolichestvo = trim($_POST["kolichestvo"]);
    if(empty($input_kolichestvo)){
        $kolichestvo_err = "Пожалуйста введите количество.";
    } else{
        $kolichestvo = $input_kolichestvo;
    }

    // Validate salary
    $input_Price = trim($_POST["Price"]);
    if(empty($input_Price)){
        $Price_err = "Пожалуйста введите цену";
    } elseif(!ctype_digit($input_Price)){
        $Price_err = "Пожалуйста введите положительно число.";
    } else{
        $Price = $input_Price;
    }

    // Check input errors before inserting in database
    if(empty($TovarName_err) && empty($kolichestvo_err) && empty($Price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO sklad (TovarName, kolichestvo, Gruppa, Edizmer, Price) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_TovarName, $param_kolichestvo, $param_Gruppa, $param_Edizmer, $param_Price);

            // Set parameters
            $param_TovarName = $TovarName;
            $param_kolichestvo = $kolichestvo;
            $param_Gruppa = $Gruppa;
            $param_Edizmer = $Edizmer;
            $param_Price = $Price;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить</title>
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
                    <h2 class="mt-5">Создание записи</h2>
                    <p>Внесите данные и подтвертиде для добавление в базу данных</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Название Товара</label>
                            <input type="text" name="TovarName" class="form-control <?php echo (!empty($TovarName_err)) ? 'is-invalid' : ''; ?>"value="<?php echo $TovarName; ?>">
                            <span class="invalid-feedback"><?php echo $TovarName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Количество</label>
                            <input type="number" name="kolichestvo" class="form-control <?php echo (!empty($kolichestvo_err)) ? 'is-invalid' : ''; ?>"value="<?php echo $kolichestvo; ?>">
                            <span class="invalid-feedback"><?php echo $kolichestvo_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Группа</label>
                            <input type="text" name="Gruppa" class="form-control <?php echo (!empty($Gruppa_err)) ? 'is-invalid' : ''; ?>"value="<?php echo $Gruppa; ?>">
                            <span class="invalid-feedback"><?php echo $Gruppa_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Ед.измерения</label>
                            <input type="text" name="Edizmer" class="form-control <?php echo (!empty($Edizmer_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Edizmer; ?>">
                            <span class="invalid-feedback"><?php echo $Edizmer_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Цена</label>
                            <input type="number" name="Price" class="form-control <?php echo (!empty($Price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Price; ?>">
                            <span class="invalid-feedback"><?php echo $Price_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                        <a href="index.php" class="btn btn-secondary mt-3">Назад</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
