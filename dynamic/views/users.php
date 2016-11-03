<main>

    <h1>Users</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
              <td><?php echo $user['username']; ?></td>
              <td><form action="." method="post">
                  <input type="hidden" name="action" value="delete_user">
                  <input type="hidden" name="user_id"
                         value="<?php echo $user['user_id']; ?>">
                  <input type="submit" value="Delete">
              </form></td>
            </tr>
        <?php endforeach; ?>
    </table>


</main>
