<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mod">
    <div class="mod-above">
        <h2>Service Providers</h2>
        <div class="mod-select-container">
                <select name="status" class="mod-select">
                <option value="pending">Pending</option>
                <option value="activated">Accepted</option>
                <option value="deactivated">Rejected</option>
            </select>
            
        </div>
    </div>
    <div class="mod-below">
        <table class="data-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Bussiness Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach ($data['serviceproviders'] as $serviceprovider) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $serviceprovider->serviceprovider_id; ?></td>
                    <td><?php echo $serviceprovider->owner_name; ?></td>
                    <td><?php echo $serviceprovider->owner_email; ?></td>
                    <td><?php echo $serviceprovider->business_name; ?></td>
                    <td><?php echo $serviceprovider->business_address; ?></td>
                    <td><?php echo $serviceprovider->business_contact_no; ?></td>
                    <td><?php if ($serviceprovider->verification == 1) {
                            echo 'pending';
                        } else if ($serviceprovider->verification == 2) {
                            echo 'activated';
                        } else if ($serviceprovider->verification == 3) {
                            echo 'deactivated';
                        } ?>
                    </td>
                    <td class="data-table-action">
                        <form action="<?php echo URLROOT; ?>/serviceproviders/delete/<?php echo $serviceprovider->serviceprovider_id; ?>" method="post">
                            <input type="submit" id="delete" value="Delete" style="display: none;">
                        </form>
                        <div class="mod-below-delete">
                            <i class='bx bx-trash' onclick="deleteAlert()"></i>
                        </div>
                        <a href="#" class="mod-below-edit">
                            <i class='bx bx-show'></i>
                        </a>

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