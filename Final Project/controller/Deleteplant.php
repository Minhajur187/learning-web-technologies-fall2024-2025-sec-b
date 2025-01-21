elseif ($action === 'delete') {
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