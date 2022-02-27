<?php
require_once "./controllers/ContactController.php";
$contactController = new ContactController;
$contacts = $contactController->readData();
?>
<hr style="margin:10px">
<h1 style="text-align:center;">Mesazhet</h1>
<hr style="margin:10px">

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Email</th>
            <th>Mesazhi</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contacts as $contact) : ?>
            <tr>
                <td><?php echo $contact['id']; ?></td>
                <td><?php echo $contact['emri']; ?></td>
                <td><?php echo $contact['mbiemri'] ?></td>
                <td><?php echo $contact['email'] ?></td>
                <td><?php echo $contact['message'] ?></td>
                <td><a href="./deleteContact.php?id=<?php echo $contact['id']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>