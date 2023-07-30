<?php
include('./DB_conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="comments">
        <?php
        $sql = "SELECT * FROM users LIMIT 2";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['Fname'];
                echo $row['Email'];
            }
        } else {
            echo "There are no comments!";
        }
        ?>
    </div>


    <script>
        $(document).ready(function() {
            var commentsCount = 2;
            $("button").click(function() {
                commentsCount = commentsCount + 2;
                $("#comments").load("load-comments.php",{
                    commentNewCount: commentsCount
                });
            })
        });
    </script>
</body>

</html>