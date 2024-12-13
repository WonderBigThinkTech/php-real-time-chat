<?php
include 'headerlogged.php';
?>
?>
<!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-head-sub"><span>Welcome!</span>
                                </div>
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h2 class="nk-block-title fw-normal"><?php echo "Lv." . htmlspecialchars($level) . " " . strtoupper(htmlspecialchars($username)); ?></h2>
                                        <div class="nk-block-des">
                                            <p>Reffer your friend to receive 2% from their deposits or their daily claims!</p>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                            <li><a href="deposit" class="btn btn-primary"><span>Deposit</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
                                            <li><a href="staking" class="btn btn-white btn-light"><span>Stake Now</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a></li>
                                        </ul>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row gy-gs">
                                    <div class="col-lg-5 col-xl-4">
                                        <div class="nk-block">
                                            <div class="nk-block-head-xs">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Overview</h5>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="nk-block">
                                                <div class="card card-bordered text-light is-dark h-100">
                                                    <div class="card-inner">
                                                        <div class="nk-wg7">
                                                            <div class="nk-wg7-stats">
                                                                <div class="nk-wg7-title">Available balance in USD</div>
                                                                <div class="number-lg amount"><?php echo number_format($total_usd_balance, 4); ?></div>
                                                            </div>
                                                            <div class="nk-wg7-foot">
                                                                <span class="nk-wg7-note">Last activity at <span><?php echo date("d M, Y", strtotime($user['last_active'])); ?></span></span>
                                                                <p><div id="ad_unit" data-unit-id="6624"></div><script src="https://api.fpadserver.com/static/js/advert_renderer.js"></script></p>
                                                            </div>
                                                        </div><!-- .nk-wg7 -->
                                                    </div><!-- .card-inner -->
                                                </div><!-- .card -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .col -->
                                    <div class="col-lg-7 col-xl-8">
                                        <div class="nk-block">
                                            <div class="nk-block-head-xs">
                                                <div class="nk-block-between-md g-2">
                                                    <div class="nk-block-head-content">
                                                        <h5 class="nk-block-title title">Your Balance</h5>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="row g-2">
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/bitcoin">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/btc.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Bitcoin</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                        <span id="btc-balance"><?php echo number_format($user['btc_balance'], 10); ?></span>
                                                                        <span class="currency currency-nio">BTC</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['btc_balance'] * $crypto_rates['bitcoin'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/ethereum">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/eth.svg" alt="Eth Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Ethereum</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="eth-balance"><?php echo number_format($user['eth_balance'], 10); ?></span>
                                                                    <span class="currency currency-btc">ETH</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['eth_balance'] * $crypto_rates['ethereum'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/dogecoin">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/doge.svg" alt="doge Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Dogecoin</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="doge-balance"><?php echo number_format($user['doge_balance'], 10); ?>
                                                                    <span class="currency currency-eth">DOGE</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['doge_balance'] * $crypto_rates['dogecoin'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div><!-- .nk-block -->
                                        <div class="nk-block nk-block-md">
                                            <div class="nk-block-head-xs">
                                            </div><!-- .nk-block-head -->
                                            <div class="row g-2">
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/litecoin">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/ltc.svg" alt="ltc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Litecoin</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="ltc-balance"><?php echo number_format($user['ltc_balance'], 10); ?>
                                                                    <span class="currency currency-nio">LTC</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['ltc_balance'] * $crypto_rates['litecoin'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/bitcoin-cash">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/bch.svg" alt="bch Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Bitcoin Cash</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="bch-balance"><?php echo number_format($user['bch_balance'], 10); ?></span>
                                                                    <span class="currency currency-btc">BCH</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['bch_balance'] * $crypto_rates['bitcoin-cash'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/dash">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/dash.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Dash</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="dash-balance"><?php echo number_format($user['dash_balance'], 10); ?></span>
                                                                    <span class="currency currency-eth">DASH</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['dash_balance'] * $crypto_rates['dash'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div> <!-- .nk-block -->
                                        <div class="nk-block nk-block-md">
                                            <div class="nk-block-head-xs">
                                            </div><!-- .nk-block-head -->
                                            <div class="row g-2">
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/tron">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/trx.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Tron</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="trx-balance"><?php echo number_format($user['trx_balance'], 10); ?></span>
                                                                    <span class="currency currency-nio">TRX</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['trx_balance'] * $crypto_rates['tron'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/tether">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/usdt.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Tether USDT</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                        <span id="usdt-balance"><?php echo number_format($user['usdt_balance'], 10); ?></span>
                                                                        <span class="currency currency-btc">USDT</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['usdt_balance'] * $crypto_rates['tether'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/digibyte">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/dgb.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Digibyte</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="dgb-balance"><?php echo number_format($user['dgb_balance'], 10); ?></span>
                                                                    <span class="currency currency-eth">DGB</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['dgb_balance'] * $crypto_rates['digibyte'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div> <!-- .nk-block -->
                                        <div class="nk-block nk-block-md">
                                            <div class="nk-block-head-xs">
                                            </div><!-- .nk-block-head -->
                                            <div class="row g-2">
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/zcash">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/zec.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Zcash</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="zec-balance"><?php echo number_format($user['zec_balance'], 10); ?></span>
                                                                    <span class="currency currency-nio">ZEC</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['zec_balance'] * $crypto_rates['zcash'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/bnb">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/bnb.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Binance Coin</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="bnb-balance"><?php echo number_format($user['bnb_balance'], 10); ?></span>
                                                                    <span class="currency currency-btc">BNB</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['bnb_balance'] * $crypto_rates['binancecoin'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/solana">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/sol.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Solana</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="sol-balance"><?php echo number_format($user['sol_balance'], 10); ?></span>
                                                                    <span class="currency currency-eth">SOL</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['sol_balance'] * $crypto_rates['solana'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div> <!-- .nk-block -->
                                        <div class="nk-block nk-block-md">
                                            <div class="nk-block-head-xs">
                                            </div><!-- .nk-block-head -->
                                            <div class="row g-2">
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/xrp">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/xrp.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Ripple</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="xrp-balance"><?php echo number_format($user['xrp_balance'], 10); ?></span>
                                                                    <span class="currency currency-nio">XRP</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['xrp_balance'] * $crypto_rates['ripple'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/polygon">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/matic.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Polygon</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="matic-balance"><?php echo number_format($user['matic_balance'], 10); ?></span>
                                                                    <span class="currency currency-btc">MATIC</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['matic_balance'] * $crypto_rates['matic-network'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/cardano">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/ada.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Cardano</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="ada-balance"><?php echo number_format($user['ada_balance'], 10); ?></span>
                                                                    <span class="currency currency-eth">ADA</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['ada_balance'] * $crypto_rates['cardano'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div> <!-- .nk-block -->
                                        <div class="nk-block nk-block-md">
                                            <div class="nk-block-head-xs">
                                            </div><!-- .nk-block-head -->
                                            <div class="row g-2">
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/toncoin">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/ton.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Toncoin</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="ton-balance"><?php echo number_format($user['ton_balance'], 10); ?></span>
                                                                    <span class="currency currency-nio">TON</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['ton_balance'] * $crypto_rates['the-open-network'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/stellar">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/xlm.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Stellar</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="xlm-balance"><?php echo number_format($user['xlm_balance'], 10); ?></span>
                                                                    <span class="currency currency-btc">XLM</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['xlm_balance'] * $crypto_rates['stellar'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/usdc">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/usdc.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">USD Coin</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="usdc-balance"><?php echo number_format($user['usdc_balance'], 10); ?></span>
                                                                    <span class="currency currency-eth">USDC</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['usdc_balance'] * $crypto_rates['usd-coin'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div> <!-- .nk-block -->
                                        <div class="nk-block">
                                            <div class="row g-2">
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/monero">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/xmr.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Monero</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="xmr-balance"><?php echo number_format($user['xmr_balance'], 10); ?></span>
                                                                    <span class="currency currency-nio">XMR</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['xmr_balance'] * $crypto_rates['monero'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="https://www.coingecko.com/en/coins/taraxa">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/tara.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Taraxa</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                    <span id="tara-balance"><?php echo number_format($user['tara_balance'], 10); ?></span>
                                                                    <span class="currency currency-btc">TARA</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['tara_balance'] * $crypto_rates['taraxa'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-sm-4">
                                                    <div class="card bg-light">
                                                        <div class="nk-wgw sm">
                                                            <a class="nk-wgw-inner" href="faucetpay.com">
                                                                <div class="nk-wgw-name">
                                                                    <div class="nk-wgw-icon">
                                                                        <img src="assets/icons/fey.svg" alt="btc Icon" width="32" height="32">
                                                                    </div>
                                                                    <h5 class="nk-wgw-title title">Feyorra</h5>
                                                                </div>
                                                                <div class="nk-wgw-balance">
                                                                    <div class="amount">
                                                                        <span id="fey-balance"><?php echo number_format($user['fey_balance'], 10); ?></span>
                                                                        <span class="currency currency-eth">FEY</span></div>
                                                                </div>
                                                                <div class="amount-sm">
                                                                    <?php echo '$' . number_format($user['fey_balance'] * $crypto_rates['feyorra'], 4); ?>
                                                                    <span class="currency currency-usd">USD</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
                <!-- content @e -->

    <script>
    	// Function to fetch updated balances every second and mark the user as active
    	function updateBalances() {
    		$.ajax({
    			url: 'update_balance.php', // PHP script that calculates rewards and updates balances
    			method: 'GET',
    			dataType: 'json',
    			success: function(response) {
    				if (response.success) {
    					// Update the balance display for all supported cryptocurrencies
    					$('#btc-balance').text(response.btc_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#eth-balance').text(response.eth_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#doge-balance').text(response.doge_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#ltc-balance').text(response.ltc_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#bch-balance').text(response.bch_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#dash-balance').text(response.dash_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#trx-balance').text(response.trx_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#usdt-balance').text(response.usdt_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#fey-balance').text(response.fey_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#zec-balance').text(response.zec_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#bnb-balance').text(response.bnb_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#sol-balance').text(response.sol_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#xrp-balance').text(response.xrp_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#matic-balance').text(response.matic_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#ada-balance').text(response.ada_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#ton-balance').text(response.ton_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#xlm-balance').text(response.xlm_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#usdc-balance').text(response.usdc_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#xmr-balance').text(response.xmr_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#tara-balance').text(response.tara_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});
    					$('#dgb-balance').text(response.dgb_balance).css({
    						'font-weight': 'bold',
    						'color': 'black'
    					});


    					console.log('Balance updated. Reward added: ' + response.reward_added);

    					// Mark the user as active every time the balance is updated
    					markUserAsActive();
    				} else {
    					console.log('Error updating balance:', response.error);
    				}
    			},
    			error: function() {
    				console.log('Error fetching balance update.');
    			}
    		});
    	}

    // Function to mark the user as active
    function markUserAsActive() {
    	$.ajax({
    		url: 'update_last_active.php', // Server-side script to update the last active timestamp
    		method: 'POST',
    		success: function(response) {
    			console.log('User marked as active.');
    		},
    		error: function() {
    			console.log('Error marking user as active.');
    		}
    	});
    }

    // Call updateBalances every second (1000 milliseconds)
    setInterval(updateBalances, 1000); 
    </script>

<?php
include 'footerlogged.php';
?>
