<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <title>Orders</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/instrument.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user-orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>
</head>
<body>
<!------------nav-bar-------->
<?php require_once APPROOT . '/views/inc/user-orders-nav.php'; ?>

<div class="orders-container">
    <?php $index = 0; ?>
    <?php foreach($data['orders'] as $orders) : ?>
    <div class="invoice-card invoice-card-<?php echo $index; ?>">
        <div class="invoice-header">
            <h2>Order#<?php echo $orders['order']->order_id; ?></h2>
        </div>
        <div class="invoice-details">
            <div class="flex-container">
                <div class="flex-item">
                    <h3>User Details</h3>
                    <p><strong>Name:</strong> <?php echo $data['user_data']['name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $data['user_data']['email']; ?></p>
                    <!-- Add more user details as needed -->
                </div>

                <div class="flex-item">
                    <h3>SYMPHONY</h3>
                    <p>FOR ALL YOUR MUSICAL NEEDS</p>
                    <p><strong>Contact us:</strong> reach.dev.symphony@gmail.com</p>
                    <!-- Add more seller details as needed -->
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Diposit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach($orders['suborders'] as $suborder) : ?>
                <tbody>
                    <tr>
                        <?php $orderStatus = $suborder['status']; ?>
                        <td><img src="<?php echo URLROOT; ?>/img/serviceProvider/<?php echo $suborder['photo_1']; ?>" style="width:100px; height:100px;" alt="Item 1"></td>
                        <td><?php echo $suborder['category'] ?></td>
                        <td><?php echo $suborder['start_date'] ?></td>
                        <td><?php echo $suborder['end_date'] ?></td>
                        <td><?php echo $suborder['qty'] ?></td>
                        <td>LKR. <?php echo $suborder['unit_price'] ?></td>
                        <td>LKR. <?php echo $suborder['total'] ?></td>
                        <td>LKR. <?php echo $suborder['extra'] ?></td>
                        <td class="status-<?php echo $suborder['status'] ?>"><?php echo $suborder['status'] ?></td>
                        <td>
                            <div <?php echo $orderStatus == 'Pending' ? '' : 'style="display: none;"';?>>
                                <button order_id="<?php echo $orders['order']->order_id; ?>" sub_order_id="<?php echo $suborder['sorder_id'] ?>" class="cancel-btn" onclick="cancelOrder(this)">
                                    Cancel Order
                                </button>
                            </div>
                            <div <?php echo $orderStatus == 'In-Progress' ? '' : 'style="display: none;"';?>>
                                <button order_id="<?php echo $orders['order']->order_id; ?>" sub_order_id="<?php echo $suborder['sorder_id'] ?>" class="mark-complete-btn" onclick="completeOrder(this)">
                                    Complete Order
                                </button>
                            </div>
                            <div <?php echo $orderStatus == 'Completed' ? '' : 'style="display: none;"';?>>
                                <button product_id="<?php echo $suborder['product_id']; ?>" product_type="<?php echo $suborder['type']; ?>" class="review-btn" onclick="addReview(this)">
                                    Add Review
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
                <tfoot>
                    <tr>
                        <td colspan="6" style="text-align: right;"><strong>Total:</strong></td>
                        <td>LKR. <?php echo $orders['order']->total ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="action-buttons">
            <button class="download-button" onclick="downloadPDF(<?php echo $index; ?>)">Download</button>
            <button class="print-button" onclick="printInvoice(<?php echo $index; ?>)">Print</button>
        </div>

        <!-- Adjusted bottom-left text gap -->
        <div class="bottom-left-text">
            <h2><strong>SYMPHONY</strong></h2> <br>For all your musical needs
        </div>
    </div>
    <?php   $index = $index + 1;
            endforeach; ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://kit.fontawesome.com/3376ff6b83.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
$(document).ready(function () {
    $('#orderSearch').on('input', function () {
        const searchValue = $(this).val().toLowerCase().trim();

        $('.invoice-card').each(function () {
            let isVisible = false;
            $(this).find('tbody').each(function () {
                const textContent = $(this).text().toLowerCase();
                if (textContent.includes(searchValue)) {
                    isVisible = true; 
                }
            });
            isVisible ? $(this).show() : $(this).hide();
        });
    });
});

function printInvoice(cardIndex) {
    const iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    document.body.appendChild(iframe);
    const invoiceCard = $('.invoice-card').eq(cardIndex).clone();
    $(iframe.contentDocument.body).html(invoiceCard);
    const cssLink = '<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/user-orders.css">';
    $(iframe.contentDocument.head).append(cssLink);
    setTimeout(() => {
        iframe.contentWindow.print();
        document.body.removeChild(iframe);
    }, 1000);
}

function cancelOrder(button) {
    var orderId = $(button).attr('order_id');
    var subOrderId = $(button).attr('sub_order_id');
        var confirmationMessage = 'Are you sure you want to Cancel the order?';
        if (confirm(confirmationMessage)) {
            var url = '<?php echo URLROOT; ?>/users/cancelOrder/' + orderId + '/' + subOrderId;
            window.location.href = url;
        }
}

function completeOrder(button) {
    var orderId = $(button).attr('order_id');
    var subOrderId = $(button).attr('sub_order_id');
        var confirmationMessage = 'Are you sure you want to mark the order as completed?';
        if (confirm(confirmationMessage)) {
            var url = '<?php echo URLROOT; ?>/users/completeOrder/' + orderId + '/' + subOrderId;
            window.location.href = url;
        }
}

function addReview(button) {
    var productID = $(button).attr('product_id');
    var product_type = $(button).attr('product_type');
    if (product_type == 'Equipment') {
        var url = '<?php echo URLROOT; ?>/users/viewItem/' + productID;
        window.location.href = url;
    } else if (product_type == 'Studio') {
        var url = '<?php echo URLROOT; ?>/users/viewStudio/' + productID;
        window.location.href = url;
    } else if (product_type == 'Singer') {
        var url = '<?php echo URLROOT; ?>/users/viewSinger/' + productID;
        window.location.href = url;
    } else if (product_type == 'Musician') {
        var url = '<?php echo URLROOT; ?>/users/viewMusician/' + productID;
        window.location.href = url;
    } else if (product_type == 'Band') {
        var url = '<?php echo URLROOT; ?>/users/viewBand/' + productID;
        window.location.href = url;
    }
}
    
function downloadPDF(cardIndex) {
    const invoiceCard = $('.invoice-card-' + cardIndex).eq(cardIndex).clone();
    
    // Create a new jsPDF instance with A3 paper size
    window.jsPDF = window.jspdf.jsPDF;
    const pdf = new jsPDF({
        unit: 'mm',
        format: 'a3',  // Set the paper size to A3
        orientation: 'portrait'
    });

    // Convert the cloned invoice card to HTML
    const element = $(invoiceCard)[0];
    
    // Use html2pdf to generate a PDF from the HTML element
    html2pdf(element, {
        margin: 10,
        filename: `Invoice_${cardIndex + 1}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a3', orientation: 'portrait' }
    }).then(() => {
        console.log('PDF downloaded');
    });
}
</script>
<script src="<?php echo URLROOT; ?>/js/instrument.js"></script>
</body>
</html>