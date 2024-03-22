<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            text-align: center;
        }
        th,td {
            border: 1px dashed grey;
        }
    </style>
    <title>Passenger Info</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <h1>Buy Tickets</h1>
        <input type="text" name="user_name" placeholder="Your Name"><br /><br />
        <select name="route_name" title="route select">
            <?php
            include("./services/routes.php");
            $res = Routes::get_all();
            foreach (json_decode($res, true) as $key => $value) {
                $route_name = $value['route_name'];
                $route_price = $value['price'];
                echo "<option value= '$route_name' >";
                echo "$route_name - $$route_price";
                echo "</option>";
            }
            ?>
        </select><br /><br />
        <input type="number" name="quantity" placeholder="Quantity" min="1"><br /><br />
        <input type="email" name="email" placeholder="Email"><br /><br />
        <button type="submit">Buy</button><br />

        <?php
        include("./services/passenger.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_user = random_int(0, 1000);
            $price = Routes::get_route($_POST['route_name']);
            $total = $_POST['quantity'] * $price["price"];
            $passenger = new Passengers($id_user, $_POST['user_name'], $_POST['route_name'], $_POST['email'], $_POST['quantity'], $total);
            $passenger->set_passenger();
        }
        ?>
    </form>

    <h1>Reservations</h1>
    <table>
        <?php
        $res =  Passengers::get_all();

        echo "<tr>";
        echo
        "<th>ID</th>
            <th>User Name</th>
            <th>Route</th>
            <th>Email</th>
            <th>Quantity</th>
            <th>Total Pay</th>";
        echo "</tr>";
        foreach (json_decode($res, true) as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value['id'] . "</td>";
            echo "<td>" . $value['user_name'] . "</td>";
            echo "<td>" . $value['route_name'] . "</td>";
            echo "<td>" . $value['email'] . "</td>";
            echo "<td>" . $value['quantity'] . "</td>";
            echo "<td>" . $value['total_pay'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>