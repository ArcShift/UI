<?php
$selectedMonth = $_GET["month"] ?? date('n');
$selectedYear = $_GET["year"] ?? date('Y');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Calendar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            #container {
                margin: 0;
                display: flex;
                /*align-items: center;*/
                justify-content: center;
                min-height: 100vh;
                background-color: #f0f0f0;
            }
        </style>
    </head>
    <body>
        <form method="get">
            <nav class="navbar navbar-dark bg-dark ps-2">
                <div class="d-flex flex-row">
                    <div class="ps-2">
                        <label class="form-label text-white" for="month">Month</label>
                        <select name="month" id="month" class="form-control">
                            <?php
                            for ($m = 1; $m <= 12; $m++) {
                                echo '<option ' . ($selectedMonth == $m ? 'selected' : '') . ' value="' . $m . '">' . date("F", mktime(0, 0, 0, $m, 1)) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="ps-2">
                        <label class="form-label text-white" for="year">Year:</label>
                        <select class="form-control" name="year" id="year">
                            <?php
                            $currentYear = date("Y");
                            for ($y = $currentYear - 10; $y <= $currentYear + 10; $y++) {
                                echo '<option ' . ($selectedYear == $y ? 'selected' : '') . ' value="' . $y . '">' . $y . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="align-self-center ps-2">
                        <input type="submit" value="Generate Calendar">
                    </div>
                </div>
            </nav>
        </form>
        <div id="container">
            
        <?php

        // Function to get the number of days in a month
        function getDaysInMonth($month, $year) {
            return cal_days_in_month(CAL_GREGORIAN, $month, $year);
        }

        // Function to get the first day of the month
        function getFirstDayOfMonth($month, $year) {
            return date("w", strtotime("$year-$month-01"));
        }

        // Input month and year
        $input_month = isset($_GET['month']) ? intval($_GET['month']) : date('n');
        $input_year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

        // Get the number of days in the month and the first day of the month
        $days_in_month = getDaysInMonth($input_month, $input_year);
        $first_day_of_month = getFirstDayOfMonth($input_month, $input_year);

        // SVG Header
        // header("Content-type: image/svg+xml");
        echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>';
        echo '<svg width="400" height="400" xmlns="http://www.w3.org/2000/svg">';

        // Calendar Header
        echo '<text x="10" y="30" font-family="Arial" font-size="20">Calendar - ' . date("F Y", strtotime("$input_year-$input_month-01")) . '</text>';

        // Days of the Week Header
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($days as $key => $day) {
            echo '<text x="' . ($key * 50 + 10) . '" y="60" font-family="Arial" font-size="12">' . $day . '</text>';
        }

        // Displaying the Calendar Days
        $day_count = 1;
        for ($row = 0; $row < 6; $row++) {
            for ($col = 0; $col < 7; $col++) {
                $day_x = $col * 50 + 10;
                $day_y = $row * 30 + 80;
                // If it's a valid day, display it
                if ($day_count <= $days_in_month && ($row > 0 || $col >= $first_day_of_month)) {
                    echo '<text x="' . $day_x . '" y="' . $day_y . '" font-family="Arial" font-size="12">' . $day_count . '</text>';
                    $day_count++;
                }
            }
        }
        echo '</svg>';
        ?>
        </div>
    </body>

</html>