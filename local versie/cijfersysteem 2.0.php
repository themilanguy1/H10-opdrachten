<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cijfersysteem</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
            font-size: 35px;
            margin: auto;
        }

        td {
            border: 1px solid black;
            width: 100px;
        }
        .jemoeder {
            font-size: 35px;
            margin: auto;
        }
    </style>
</head>
<body>
    <?php
        try {
            $db = new PDO("mysql:host=localhost; dbname=cijfersysteem", "root", "");
            $query = $db->prepare("SELECT leerling, cijfer FROM  cijfersysteem");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            
            $query2 = $db->prepare("SELECT MAX(cijfer) as topcijfer, MIN(cijfer) as mincijfer, AVG(cijfer) as gemcijfer FROM cijfersysteem");
            $query2->execute();
            $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    
            echo "<table>";
                foreach($result as $data) {
                    echo "<tr>";
                        echo "<td>" . $data['leerling'] . "</td>";
                        echo "<td>" . $data['cijfer'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";


            echo "<div class='jemoeder'>";     
            echo "Hoogste cijfer: ".$result2[0]['topcijfer']."<br>";
            echo "Laagste cijfer: ".$result2[0]['mincijfer']."<br>";
            echo "Gemiddelde cijfer: ".round($result2[0]['gemcijfer'], 1)."<br>";
            echo "</div>";

        } catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }



    ?>
</body>
</html>