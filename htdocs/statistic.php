<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Latest Withdrawals and Deposits</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .stats-container {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .stats-box {
            padding: 10px;
            margin: 10px 0;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .pagination a {
            padding: 10px;
            margin: 0 5px;
            background-color: #ddd;
            border: 1px solid #ccc;
            text-decoration: none;
            color: black;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            pointer-events: none;
        }
    </style>
</head>
<body>

<div class="stats-container">
    <h1>Real-Time Withdrawals and Deposits</h1>

    <div class="stats-box">
        <p><strong>Total Deposits Served:</strong> <span id="total-deposits">0</span></p>
        <p><strong>Total Withdrawals Processed:</strong> <span id="total-withdrawals">0</span></p>
        <p><strong>Total Deposits in USD:</strong> $<span id="total-deposits-usd">0.00</span></p>
        <p><strong>Total Withdrawals in USD:</strong> $<span id="total-withdrawals-usd">0.00</span></p>
    </div>
<center><a href="dashboard">Click here to go back</a></center>
    <h2>Withdrawals</h2>
    <table id="withdrawals-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Completed At</th>
                <th>Payout Hash</th>
            </tr>
        </thead>
        <tbody>
            <!-- Withdrawals data will be inserted here -->
        </tbody>
    </table>

    <!-- Pagination for Withdrawals -->
    <div class="pagination" id="withdrawals-pagination"></div>

    <h2>Deposits</h2>
    <table id="deposits-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Completed At</th>
                <th>Transaction ID</th>
            </tr>
        </thead>
        <tbody>
            <!-- Deposits data will be inserted here -->
        </tbody>
    </table>

    <!-- Pagination for Deposits -->
    <div class="pagination" id="deposits-pagination"></div>
</div>

<script>
    // Function to fetch stats data from the server with pagination
    function fetchStats(page = 1, rowsPerPage = 10) {
        $.ajax({
            url: `statistic_api.php?page=${page}&rowsPerPage=${rowsPerPage}`, // Send the page number and rows per page to the backend
            method: 'GET',
            success: function(data) {
                // Update the total deposit and withdrawal stats
                $('#total-deposits').text(data.total_deposits);
                $('#total-withdrawals').text(data.total_withdrawals);
                $('#total-deposits-usd').text(data.total_deposits_usd);
                $('#total-withdrawals-usd').text(data.total_withdrawals_usd);

                // Clear and populate the withdrawals table
                let withdrawalsHtml = '';
                data.withdrawals.forEach(function(withdrawal) {
                    withdrawalsHtml += `<tr>
                        <td>${withdrawal.username}</td>
                        <td>${withdrawal.amount}</td>
                        <td>${withdrawal.currency}</td>
                        <td>${withdrawal.status}</td>
                        <td>${withdrawal.completed_at}</td>
                        <td>${withdrawal.payout_user_hash}</td>
                    </tr>`;
                });
                $('#withdrawals-table tbody').html(withdrawalsHtml);

                // Clear and populate the deposits table
                let depositsHtml = '';
                data.deposits.forEach(function(deposit) {
                    depositsHtml += `<tr>
                        <td>${deposit.username}</td>
                        <td>${deposit.amount}</td>
                        <td>${deposit.currency}</td>
                        <td>${deposit.status}</td>
                        <td>${deposit.completed_at}</td>
                        <td>${deposit.transaction_id}</td>
                    </tr>`;
                });
                $('#deposits-table tbody').html(depositsHtml);

                // Generate pagination controls for withdrawals and deposits
                generatePagination(data.total_withdrawals, '#withdrawals-pagination', page);
                generatePagination(data.total_deposits, '#deposits-pagination', page);
            }
        });
    }

    // Function to generate pagination links
    function generatePagination(totalItems, paginationContainer, currentPage) {
        let rowsPerPage = 10; // Adjust this to match the rows per page
        let totalPages = Math.ceil(totalItems / rowsPerPage);
        let paginationHtml = '';

        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `<a href="#" class="pagination-link" data-page="${i}">${i}</a> `;
        }

        $(paginationContainer).html(paginationHtml);

        // Highlight the current page
        $(paginationContainer).find(`[data-page="${currentPage}"]`).addClass('active');

        // Add event listener for pagination links
        $('.pagination-link').on('click', function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            fetchStats(page); // Fetch data for the clicked page
        });
    }

    // Initial fetch when the page loads
    $(document).ready(function() {
        fetchStats(); // Fetch page 1 by default
    });
</script>

</body>
</html>
