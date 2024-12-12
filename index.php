<?php
// Array mit den Inhalten für jedes Türchen
$contents = array(
    1 => 'images/1.jpg',
    2 => '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/0aZCn2K7hls" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
    3 => 'images/3.jpg',
    4 => 'images/4.jpg',
    5 => 'images/5.jpg',
    6 => 'images/6.jpg',
    7 => 'images/7.jpg',
    8 => 'images/8.jpg',
    9 => 'images/9.jpg',
    10 => 'images/10.jpg',
    11 => 'images/11.jpg',
    12 => 'images/12.jpg',
    13 => 'images/13.jpg',
    14 => 'images/14.jpg',
    15 => 'images/15.jpg',
    16 => 'images/16.jpg',
    17 => 'images/17.jpg',
    18 => '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/s3wNuru4U0I" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
    19 => 'images/19.jpg',
    20 => 'images/20.jpg',
    21 => 'images/21.jpg',
    22 => 'images/22.jpg',
    23 => 'images/23.jpg',
    24 => '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/9p97sxREC00" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventskalender</title>
    <!-- CSS einbinden -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Kalender-Hintergrundbild -->
    <div class="calendar" style="background-image: url('images/kalender.jpg');">

        <!-- Die 24 Türchen -->
        <div class="calendar-grid">
            <?php for ($i = 1; $i <= 24; $i++): ?>
                <div class="door" id="door-<?php echo $i; ?>" onclick="toggleDoor(<?php echo $i; ?>)">
                    <div class="door-number"><?php echo $i; ?></div>
                    <div class="content" id="content-<?php echo $i; ?>" style="display: none;">
                        <?php echo $contents[$i]; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- JavaScript einbinden -->
    <script src="js/script.js"></script>

</body>
</html>
