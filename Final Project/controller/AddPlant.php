<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'add') {
            $name = $_POST['name'] ?? '';  
            $price = $_POST['price'] ?? ''; 
            $quantity = $_POST['quantity'] ?? ''; 

            if ($name && $price && $quantity) {
                $query = "INSERT INTO plants (name, price, quantity) VALUES ('$name', '$price', '$quantity')";
                if (mysqli_query($con, $query)) {
                    echo "Plant '$name' added successfully!";
                } else {
                    echo "Failed to add plant.";
                }
            } else {
                echo "Please provide all plant details.";
            }
        } elseif ($action === 'delete') {
            $id = $_POST['id'] ?? '';
            if ($id) {
                $query = "DELETE FROM plants WHERE id='$id'";
                if (mysqli_query($con, $query)) {
                    echo "Plant deleted successfully!";
                } else {
                    echo "Failed to delete plant.";
                }
            } else {
                echo "Invalid plant ID.";
            }
        } elseif ($action === 'edit') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';  
            $price = $_POST['price'] ?? ''; 
            $quantity = $_POST['quantity'] ?? ''; 

            if ($id && $name && $price && $quantity) {
                $query = "UPDATE plants SET name='$name', price='$price', quantity='$quantity' WHERE id='$id'";
                if (mysqli_query($con, $query)) {
                    echo "Plant updated successfully!";
                } else {
                    echo "Failed to update plant.";
                }
            } else {
                echo "Please provide all plant details.";
            }
        } elseif ($action === 'load') {
        
            $plants = mysqli_query($con, "SELECT * FROM plants");

            while ($row = mysqli_fetch_assoc($plants)):
                ?>
                <div class="card" id="plant_<?php echo $row['id']; ?>">
                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p>Price: $<?php echo number_format($row['price'], 2); ?></p>
                    <p>Quantity: <?php echo $row['quantity']; ?></p>
                    <button onclick="editPlant(<?php echo $row['id']; ?>)">Edit</button>
                    <button class="delete-btn" onclick="deletePlant(<?php echo $row['id']; ?>)">Delete</button>
                </div>
                <?php
            endwhile;
            exit();
        }
    }
}

$plants = mysqli_query($con, "SELECT * FROM plants");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Plants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #007BFF;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input[type="text"], form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="button"] {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form input[type="button"]:hover {
            background-color: #218838;
        }
        .plant-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            background-color: white;
            padding: 20px;
            margin: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
        }
        .card h3 {
            margin-bottom: 10px;
            color: #007BFF;
        }
        .card p {
            margin: 5px 0;
            font-size: 1rem;
        }
        .card button {
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .card button:hover {
            background-color: #0056b3;
        }
        .card .delete-btn {
            background-color: #dc3545;
        }
        .card .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <h1>Manage Plants</h1>
    <div class="container">
        <form id="plantForm">
            <label for="name">Plant Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" required>

            <input type="button" value="Add Plant" onclick="addPlant()">
        </form>
    </div>

    <div class="plant-list" id="plantList">
        <?php while ($row = mysqli_fetch_assoc($plants)): ?>
            <div class="card" id="plant_<?php echo $row['id']; ?>">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p>Price: $<?php echo number_format($row['price'], 2); ?></p>
                <p>Quantity: <?php echo $row['quantity']; ?></p>
                <button onclick="editPlant(<?php echo $row['id']; ?>)">Edit</button>
                <button class="delete-btn" onclick="deletePlant(<?php echo $row['id']; ?>)">Delete</button>
            </div>
        <?php endwhile; ?>
    </div>

    <script>
        function addPlant() {
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;
            let quantity = document.getElementById('quantity').value;

            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "addplant.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            let data = "action=add&name=" + encodeURIComponent(name) + "&price=" + encodeURIComponent(price) + "&quantity=" + encodeURIComponent(quantity);

            xhttp.send(data);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    loadPlants(); 
                }
            };
        }

        function deletePlant(id) {
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "addplant.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            let data = "action=delete&id=" + id;

            xhttp.send(data);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    document.getElementById("plant_" + id).remove(); 
                }
            };
        }

        function editPlant(id) {
            let name = prompt("Enter new name:");
            let price = prompt("Enter new price:");
            let quantity = prompt("Enter new quantity:");

            if (name && price && quantity) {
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", "addplant.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                let data = "action=edit&id=" + id + "&name=" + encodeURIComponent(name) + "&price=" + encodeURIComponent(price) + "&quantity=" + encodeURIComponent(quantity);

                xhttp.send(data);

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        loadPlants(); 
                    }
                };
            }
        }

        function loadPlants() {
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "addplant.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send("action=load");

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                    document.getElementById('plantList').innerHTML = this.responseText;
                }
            };
        }
    </script>

</body>
</html>
