<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instructor Panel</title>
    <style>
        .instructor-card {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }
        .instructor-card img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Instructor Panel</h1>

    <?php
    // Sample data array
    $lectures = [
        [
            "name" => "Mr.charuka gamage",
            "education" => "PhD in Computer Science",
            "image" => "../image/22.jpg"
        ],
        [
            "name" => "Mrs.Sadali akashi",
            "education" => "MSc in Mathematics",
            "image" => "../image/31.jpeg"
        ],
        [
            "name" => "Mr.sadun perera",
            "education" => "Msc in IT & software in university of colombo",
            "image" => "../image/32.jpeg"
        ],
        [
            "name" => "Mr.Raju",
            "education" => "PhD in Computer Science",
            "image" => "../image/34.jpeg"
        ],
        [
            "name" => "Mrs.Sadu Rajapaksha",
            "education" => "Msc in network engineering in university of colombo",
            "image" => "../image/33.jpeg"
        ],
        [
            "name" => "Mr.chameera dahanayaka",
            "education" => "Msc in information system in university of colombo",
            "image" => "../image/35.jpeg"
        ],
        [
            "name" => "Mr.kusal Perera",
            "education" => "MSc in Mathematics",
            "image" => "../image/36.jpeg"
        ],
        [
            "name" => "Mr.Danushka Gunatilaka",
            "education" => "Msc in IT & software in university of colombo",
            "image" => "../image/37.jpeg"
        ],







    ];

    foreach ($lectures as $lecture) {
        echo "<div class='instructor-card'>";
        echo "<img src='{$lecture['image']}' alt='Instructor Image'>";
        echo "<h2>{$lecture['name']}</h2>";
        echo "<p>{$lecture['education']}</p>";
        echo "</div>";
    }
    ?>
</body>
</html>
