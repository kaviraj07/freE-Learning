<?php
    require("includes/classes/Header.php");

    $header = new Header("Courses","courses.css");
    $header->output();
?>

<body>

    <?php

    require 'includes/config.php';
    require 'includes/components/navbar.php';

    function fetchCourse($category)
    {
        $query = "SELECT * FROM course WHERE category = '$category'";
        $result = mysqli_query($GLOBALS['con'], $query);
        $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (sizeof($courses) > 0) {

            $courseOutput = "";

            foreach ($courses as $row) {

                // Card html template for a course
                $courseOutput .= "
                    <div class='ui link card'>
                        <a class='image' href='details.php?id=" . $row['id'] . "'>
                            <img  src='assets/courses/" . $row['title'] . "/" . $row['title'] . ".jpg'>
                        </a>
                        
                        <div class='content'>
                            <div class='header'>" . $row['title'] . "</div>
                            <div class='meta'>
                                <a>" . $row['category'] . "</a>
                            </div>
                            <div class='description'>" .
                                $row['teaser'] . "
                            </div>
                        </div>

                        <div class='extra content'>" .
                            $row['numofvideos'] . " videos
                        </div>
                    </div>";
            }
            ;
            echo $courseOutput;
        }
    }
?>

    <!-- CS courses -->
    <section id="computer-science" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Computer Science</h1>
                <div class="ui link cards" id="computer-science-cards">
                    <?php
                        fetchCourse('computer-science');
                    ?>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Photography courses -->
    <section id="photography" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Photography</h1>
                <div class="ui link cards" id="photography-cards">
                    <?php
                        fetchCourse('photography');
                    ?>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Music courses -->
    <section id="music" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Music</h1>
                <div class="ui link cards" id="music-cards">
                    <?php
                        fetchCourse('music');
                    ?>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Health & fitness courses -->
    <section id="health" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Health & Fitness</h1>
                <div class="ui link cards" id="health-and-fitness-cards">
                    <?php
                        fetchCourse('health-and-fitness');
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("includes/components/footer.php"); ?>

    <?php 
        require("includes/classes/FooterLinks.php");

        $footerLinks = new FooterLinks("");
        $footerLinks->output();
    ?>

</body>

</html>