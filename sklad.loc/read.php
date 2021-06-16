<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM sklad WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $TovarName = $row["TovarName"];
                $kolichestvo = $row["kolichestvo"];
                $Gruppa = $row["Gruppa"];
                $Edizmer = $row["Edizmer"];
                $Price = $row["Price"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            echo "Ой,что то пошло не так.Пожалуйста попробуйдет позже";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Просмотр товара</title>
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
                    <h1 class="mt-5 mb-3">Товар</h1>
                    <div class="form-group">
                        <label>Название товара</label>
                        <p><b><?php echo $row["TovarName"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Количество</label>
                        <p><b><?php echo $row["kolichestvo"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Группа</label>
                        <p><b><?php echo $row["Gruppa"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Единица измерения</label>
                        <p><b><?php echo $row["Edizmer"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Цена</label>
                        <p><b><?php echo $row["Price"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Назад</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
