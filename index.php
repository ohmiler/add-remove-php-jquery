<?php 
    include('config.php');

    if (isset($_POST['submit'])) {
        // Counting Number of skills
        $count = count($_POST['skill']);
        $skills = $_POST['skill'];

        if ($count > 1) {
            for ($i = 0; $i < $count; $i++) {
                if (trim($_POST['skill'][$i]) != '') {
                    $sql = mysqli_query($dbcon, "INSERT INTO tblskills(skill) VALUES('$skills[$i]')");
                }
            }
            echo "<script>alert('Skills inserted successfully!')</script>";
        } else {
            echo "<script>alert('Please enter your skills!')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamically Add / Remove with PHP & jQuery</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="display-2 mt-3">Dynamically Add / Remove</div>
        <hr>
        <form action="" name="add_name" id="add_name" method="post">
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td>
                            <input type="text" name="skill[]" placeholder="Enter your skill" class="form-control name_list">
                        </td>
                        <td>
                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </td>
                    </tr>
                </table>

                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit">
            </div>
        </form>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            let i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="skill[]" placeholder="Enter your skill" class="form-control name_list"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
            })
            $(document).on('click', '.btn_remove', function() {
                let button_id = $(this).attr('id');
                $('#row'+button_id+'').remove();
            })
        })
    </script>
</body>
</html>



