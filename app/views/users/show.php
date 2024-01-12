<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mod">
    <div class="mod-above">
        <h2>Users</h2>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php foreach ($data['users'] as $user) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->TelephoneNumber; ?></td>
                    <td><?php echo $user->gender; ?></td>
                    <td><?php echo $user->address; ?></td>
                    <td class="data-table-action">

                        <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $user->id; ?>" method="post">
                            <input type="submit" id="delete" value="Delete" style="display: none;">
                        </form>
                        <div class="mod-below-delete">
                            <i class='bx bx-trash' onclick="deleteAlert()"></i>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>
</div>
</div>
<script>
    function deleteAlert() {
        let valid = confirm('Delete');
        if (valid) {
            document.getElementById("delete").click();
        } else {
            alert('cancel delete');
        }
    }
</script>
</body>

</html>