<style>
    .div{
        border:1px solid red;
        width:300px;
        margin-top:20px;
        float: left;
        margin-inline: 20px;
        text-align: center;
    }
</style>


<?php
include('admin/settings/database.php');

try {

    $id = isset($_POST['idx']) ? trim($_POST['idx']) : '';

    $prodct = "SELECT * FROM itembox WHERE title LIKE :search OR para LIKE :search";
    $prepare = $pdo->prepare($prodct);

    $searchTerm = '%' . $id . '%';
    $prepare->bindParam(':search', $searchTerm, PDO::PARAM_STR);
    $prepare->execute();

    $fetch_data = $prepare->fetchAll(PDO::FETCH_ASSOC);

    if (count($fetch_data) > 0) {
        
        foreach ($fetch_data as $value) {
            ?>
            <div class='div'>
                <h3><?php echo htmlspecialchars($value['title']); ?></h3>
                <p><?php echo htmlspecialchars($value['para']); ?></p>
                <p><?php echo htmlspecialchars($value['price']); ?></p>
            </div>
            <?php
        }
    } else {
        echo "No Data Found";
    }
} catch (PDOException $e) {

    error_log('Database Error: ' . $e->getMessage());

    echo "An error occurred while retrieving data. Please try again later.";
}
?>
