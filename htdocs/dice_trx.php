<?php include 'dicetrxapi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tron Dice Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Chat box container */
        #chat-container {
            position: fixed;
            bottom: 40px; /* Adjusted to allow space for the button */
            right: 20px;
            width: 300px;
            height: 400px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            display: block; /* Chat box is open by default */
            z-index: 1000;
        }

        /* Chat iframe */
        #chat-iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px 10px 0 0;
        }

        /* Chat toggle button */
        #chat-toggle {
            position: fixed;
            bottom: 0;
            right: 20px;
            width: 300px;
            height: 40px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            line-height: 40px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px 10px 0 0;
            z-index: 1001;
        }
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5CCTVBRLDZ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-5CCTVBRLDZ');
    </script>
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
<br><br><br><br>
    <div class="container bg-white p-4 rounded shadow" style="max-width: 600px;">
        <h1 class="text-center mb-4">Tron Dice Game</h1>
        
        <!-- TRX Balance -->
        <p class="text-center fs-5">Current TRX Balance: <strong id="trx-balance"><?= number_format((float)$trx_balance, 2) ?></strong> TRX</p>
        
        <!-- Dice Roll Animation -->
        <div class="dice-roll display-1 text-center mb-4 fw-bold" id="dice-roll">0000</div>
        
        <!-- Messages -->
        <div id="message-container">
            <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?= htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php elseif (!empty($errorMessage)): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Dice Game Form -->
        <form method="POST" id="dice-form" class="mb-4" onsubmit="return preventDoubleSubmit()">
            <div class="mb-3">
                <label for="bet_amount" class="form-label">Bet Amount (TRX):</label>
                <input type="number" name="bet_amount" id="bet_amount" class="form-control" step="0.01" min="0.01" value="0.01" required>
            </div>
            <div class="mb-3">
                <label for="bet_choice" class="form-label">Bet Choice:</label>
                <select name="bet_choice" id="bet_choice" class="form-select" required>
                    <option value="">-- Select Choice --</option>
                    <option value="low">Low (0000 - 4999)</option>
                    <option value="high">High (5000 - 9999)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="client_seed" class="form-label">Client Seed:</label>
                <input type="text" name="client_seed" id="client_seed" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Roll the Dice</button>
        </form>

        <!-- Back to Dashboard Button -->
        <div class="text-center mb-4">
            <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>

        <!-- Tab Buttons for Betting History -->
        <ul class="nav nav-tabs mb-3" id="historyTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="user-bets-tab" data-bs-toggle="tab" data-bs-target="#user-bets" type="button" role="tab" aria-controls="user-bets" aria-selected="true">Last 10 Bets (You)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="all-bets-tab" data-bs-toggle="tab" data-bs-target="#all-bets" type="button" role="tab" aria-controls="all-bets" aria-selected="false">Last 10 Bets (All Users)</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="historyTabContent">
            <!-- User Betting History -->
            <div class="tab-pane fade show active" id="user-bets" role="tabpanel" aria-labelledby="user-bets-tab">
                <h3>Last 10 Bets (You):</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Bet Amount (TRX)</th>
                            <th>Choice</th>
                            <th>Result</th>
                            <th>Change (TRX)</th>
                            <th>Roll</th>
                        </tr>
                    </thead>
                    <tbody id="user-bets-body">
                        <!-- Updated dynamically via JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- All Users Betting History -->
            <div class="tab-pane fade" id="all-bets" role="tabpanel" aria-labelledby="all-bets-tab">
                <h3>Last 10 Bets (All Users):</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Bet Amount (TRX)</th>
                            <th>Choice</th>
                            <th>Result</th>
                            <th>Change (TRX)</th>
                            <th>Roll</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody id="all-bets-body">
                        <!-- Updated dynamically via JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Chat Container -->
    <div id="chat-container">
        <iframe id="chat-iframe" src="<?= htmlspecialchars($chatbox_url, ENT_QUOTES, 'UTF-8') ?>"></iframe>
    </div>

    <div id="chat-toggle">Hide Chat</div> <!-- Added chat toggle button -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            updateBalance();
            updateHistory();
            document.getElementById('client_seed').value = "<?= htmlspecialchars($_SESSION['client_seed'], ENT_QUOTES, 'UTF-8') ?>";

            // Set interval to update history every 5 seconds
            setInterval(updateHistory, 5000);
        });

        let diceRollElement = document.getElementById('dice-roll');
        let rollInterval = setInterval(function() {
            let randomRoll = ('0000' + Math.floor(Math.random() * 10000)).slice(-4);
            diceRollElement.textContent = randomRoll;
        }, 100);

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($dice_roll)): ?>
            setTimeout(function() {
                clearInterval(rollInterval);
                diceRollElement.textContent = ('0000' + <?= (int)$dice_roll ?>).slice(-4);  // Cast to int for safety
            }, 1000);
        <?php endif; ?>

        function updateBalance() {
            fetch('fetch_balance.php')
                .then(response => response.json())
                .then(data => {
                    if (data.trx_balance !== undefined) { // Check if data exists
                        document.getElementById('trx-balance').textContent = parseFloat(data.trx_balance).toFixed(2);
                    }
                })
                .catch(error => console.error('Error fetching balance:', error));
        }

        function updateHistory() {
            fetch('fetch_history.php')
                .then(response => response.json())
                .then(data => {
                    let userBetsBody = document.getElementById('user-bets-body');
                    let allBetsBody = document.getElementById('all-bets-body');
                    
                    // Update User Bets Table
                    userBetsBody.innerHTML = '';
                    data.user_bets.forEach(bet => {
                        userBetsBody.innerHTML += `
                            <tr>
                                <td>${parseFloat(bet.bet_amount).toFixed(2)}</td>
                                <td>${htmlEscape(bet.bet_choice)}</td>
                                <td>${htmlEscape(bet.result)}</td>
                                <td>${parseFloat(bet.amount_change).toFixed(2)}</td>
                                <td>${parseInt(bet.dice_roll)}</td>
                            </tr>
                        `;
                    });

                    // Update All Bets Table
                    allBetsBody.innerHTML = '';
                    data.all_bets.forEach(bet => {
                        allBetsBody.innerHTML += `
                            <tr>
                                <td>${parseFloat(bet.bet_amount).toFixed(2)}</td>
                                <td>${htmlEscape(bet.bet_choice)}</td>
                                <td>${htmlEscape(bet.result)}</td>
                                <td>${parseFloat(bet.amount_change).toFixed(2)}</td>
                                <td>${parseInt(bet.dice_roll)}</td>
                                <td>${htmlEscape(bet.username)}</td>
                            </tr>
                        `;
                    });
                })
                .catch(error => console.error('Error fetching history:', error));
        }

        function htmlEscape(str) {
            return String(str)
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function preventDoubleSubmit() {
            const button = document.querySelector('button[type="submit"]');
            if (button.disabled) {
                return false;
            }
            button.disabled = true;
            return true;
        }

        // Toggle chat visibility
        var chatToggle = document.getElementById('chat-toggle');
        var chatContainer = document.getElementById('chat-container');

        chatToggle.addEventListener('click', function() {
            if (chatContainer.style.display === "none") {
                chatContainer.style.display = "block";
                chatToggle.innerHTML = "Hide Chat";
                chatToggle.style.bottom = "410px";  // Moves the button up when the chat box is open
            } else {
                chatContainer.style.display = "none";
                chatToggle.innerHTML = "Chat with us!";
                chatToggle.style.bottom = "0";  // Moves the button back down when the chat box is closed
            }
        });
    </script>
</body>
</html>
