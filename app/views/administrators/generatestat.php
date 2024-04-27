<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-stat.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
  <div class="container_body">
    <div class="adminsidebar">
      <?php require APPROOT . '/views/inc/admin-sidebar.php'; ?>
    </div>
    <div class="right-component">
        <div class="container">
        <h1>Revenue Report Generation | Admin#<?php echo $data['admin_data']->admin_id ; ?></h1>
            <form id="reportForm" action="<?php echo URLROOT; ?>/administrators/generateStatReport" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fromDate">From:</label>
                <input type="date" id="fromDate" name="fromDate" required>
            </div>
            <div class="form-group">
                <label for="toDate">To:</label>
                <input type="date" id="toDate" name="toDate" disabled required>
            </div>
            <div class="form-group">
                <label for="selection">Report type Selection:</label>
                <select id="timeSlot" name="selection" required>
                <option value="byOrder">By Order</option>
                <option value="byDay">By Day</option>
                <option value="byWeek">By Week</option>
                <option value="byMonth">By Month</option>
                <option value="byYear">By Year</option>
                </select>
            </div>
            <button type="submit" id="submitButton">Submit</button>
            </form>
        </div>
        <div id="users" class="tabcontent" <?php echo ($data['data'] === 'NA') ? 'style="display: none;"' : ''; ?>>
            <h1>Generating Revenue reports sorted by <?php echo $data['type']; ?></h1>
            <table class="data-table">
                <?php if ($data['type'] != 'Order') : ?>
                <tr>
                    <th><?php echo $data['type']; ?></th>
                    <th>Revenue</th>
                </tr>
                <?php foreach ($data['datalist'] as $key => $value) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <th><?php echo $data['type']; ?></th>
                    <th>User ID</th>
                    <th>Service Provider ID</th>
                    <th>Product Type/ID</th>
                    <th>Quantity</th>
                    <th>Revenue</th>
                </tr>
                <?php foreach ($data['datalist'] as $value) : ?>
                <tr class="data-table-tr">
                    <td><?php echo $value->sorder_id ; ?></td>
                    <td><?php echo $value->user_id; ?></td>
                    <td><?php echo $value->serviceprovider_id; ?></td>
                    <td><?php echo $value->type; ?> - <?php echo $value->product_id; ?></td>
                    <td><?php echo $value->qty; ?></td>
                    <td><?php echo $value->total; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
            </div>
            <button id="printButton">Print PDF</button>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const fromDateInput = document.getElementById('fromDate');
  const toDateInput = document.getElementById('toDate');
  const timeSlotSelect = document.getElementById('timeSlot');

  fromDateInput.addEventListener('change', function() {
    toDateInput.disabled = false;
    toDateInput.min = fromDateInput.value;
  });

  toDateInput.addEventListener('change', function() {
    timeSlotSelect.disabled = false;
  });

  timeSlotSelect.addEventListener('change', function() {
    submitButton.disabled = false;
  });

});

document.addEventListener('DOMContentLoaded', function() {
  const printButton = document.getElementById('printButton');

  printButton.addEventListener('click', function() {
    // Get the HTML content of the table
    const tableContent = document.getElementById('users').innerHTML;

    // Create a hidden iframe
    const iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    document.body.appendChild(iframe);

    // Open a new window inside the iframe
    const printWindow = iframe.contentWindow;

    // Write the HTML content to the new window
    printWindow.document.write('<html><head>');
    printWindow.document.write('<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/mod-index.css">');
    printWindow.document.write('<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin-stat.css">');
    printWindow.document.write('</head><body>');
    printWindow.document.write(tableContent);
    printWindow.document.write('</body></html>');

    // Close the document after writing
    printWindow.document.close();

    // Print the content
    printWindow.print();
  });
});
</script>
</body>
</html>