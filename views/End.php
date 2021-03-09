<html>
    <?php include "views/header.php"; ?>
    <body class="d-flex align-items-center">
        <div class="container d-flex justify-content-center">
            <div class="pt-2 text-center">
                <h2> Exam End! </h2>
                <h2> Your score: <?php echo $_SESSION["correctanswers"] . " / " . ($exam->getQuestion_number());?> </h2>
                <?php $status = ($_SESSION["correctanswers"] / $exam->getQuestion_number()) >= 0.5 ? "you pass the exam" : "you fail in exam" ?>
                <h3><?php echo $status ?></h3>
            </div>
        </div>
    </body>
</html>
