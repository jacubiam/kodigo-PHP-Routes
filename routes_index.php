<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge #1</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <h1>Set Route</h1>
        <input type="number" name="id" placeholder="Id"><br /><br />
        <input type="text" name="route_name" placeholder="Name"><br /><br />
        <input type="text" name="origin" placeholder="Origin"><br /><br />
        <input type="text" name="destination" placeholder="Destination"><br /><br />
        <input type="number" name="distance" placeholder="Distance"><br /><br />
        <input type="number" step="0.01" min="0" name="price" placeholder="Price"><br /><br />
        <button type="submit">Set Route</button><br />

        <?php
        include("./services/routes.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $route = new Routes($_POST['id'], $_POST['route_name'], $_POST['origin'], $_POST['destination'], $_POST['distance'], $_POST['price']);
            $route->set_route();
        }
        ?>
    </form>

    <h1>Routes</h1>
    <table>
        <?php
        $res = Routes::get_all();
        echo "<tr>";
        echo
        "<th>ID</th>
        <th>Name</th>
        <th>Origin</th>
        <th>Destination</th>
        <th>Distance</th>
        <th>Price</th>";
        echo "</tr>";
        foreach (json_decode($res, true) as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value['id'] . "</td>";
            echo "<td>" . $value['route_name'] . "</td>";
            echo "<td>" . $value['origin'] . "</td>";
            echo "<td>" . $value['destination'] . "</td>";
            echo "<td>" . $value['distance'] . "</td>";
            echo "<td>" . $value['price'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>