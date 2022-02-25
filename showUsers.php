<?php 
    require_once "./controllers/UserController.php";
    $userController = new UserController;
    $users = $userController ->readData();
    ?> 
    <h1>Users</h1>
    
    <table class = "table">
        <thead>
            <tr>
              <th>Emri</th>
              <th>Mbiemri</th>
              <th>Data Lindjes</th>
              <th>Gjinia</th>
              <th>Email</th>
              <th>Username</th>
              <th>Roli</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user):?>
            <tr>
                <td><?php echo $user['emri'];?></td>
                <td><?php echo $user['mbiemri'];?></td>
                <td><?php echo $user['dataLindjes'];?></td>
                <td><?php echo $user['gjinia'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><?php echo $user['username'];?></td>
                <td><?php echo ($user['roli'] == 0) ? "User" : "Admin";?></td>
                <td><a href="views/editUser.php?roli=<?php echo $user['roli'];?>&username=<?php echo $user['username'];?>">Edit</a></td>
                <td><a href="views/deleteUser.php?username=<?php echo $user['username'];?>">Delete</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>