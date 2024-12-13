<?php
$secret = "1cKsFI7qogLAYbun";

// Assuming $user['username'] contains the logged-in user's username
$params = array(
    'boxid' => 953445,
    'boxtag' => '5KfazJ', 
    'nme' => isset($user['username']) ? htmlspecialchars($user['username']) : 'Guest',
    'lnk' => '',		// Replace with profile URL (optional)
    'pic' => ''		// Replace with avatar URL (optional)
);

$arr = array();
foreach ($params as $k => $v) {
    if (!$v) {
        continue;
    }
    $arr[] = $k.'='.urlencode($v);
}

$path = '/box/?'.implode('&', $arr);
$sig = urlencode(base64_encode(hash_hmac("sha256", $path, $secret, true)));
$url = 'https://www5.cbox.ws'.$path.'&sig='.$sig;
?>
<div id="chat-container">
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
            display: none; /* Initially hidden */
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
    <iframe id="chat-iframe" src="<?php echo $url; ?>"></iframe>
</div>
<center><p><div id="ad_unit" data-unit-id="6625"></div><script src="https://api.fpadserver.com/static/js/advert_renderer.js"></script></p></center>
<br>
<div id="chat-toggle">Chat Room!</div>

<div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="nk-refwg">
                                        <div class="nk-refwg-invite card-inner">
                                            <div class="nk-refwg-head g-3">
                                                <div class="nk-refwg-title">
                                                    <h5 class="title">Refer Us & Earn</h5>
                                                    <div class="title-sub">Use the bellow link to invite your friends. You can earn 2% from their deposit and daily claim that they made for lifetime!</div>
                                                </div>
                                            </div>
                                            <div class="nk-refwg-url">
                                                <div class="form-control-wrap">
                                                    <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div>
                                                    <div class="form-icon">
                                                        <em class="icon ni ni-link-alt"></em>
                                                    </div>
                                                    <input type="text" class="form-control copy-text" id="refUrl" value="<?php echo htmlspecialchars($referral_link); ?>">
                                                </div>
                                            </div>
                                        </div><!-- .nk-refwg-invite -->
                                        <div class="nk-refwg-stats card-inner bg-lighter">
                                            <div class="nk-refwg-group g-3">
                                                <div class="nk-refwg-name">
                                                    <h6 class="title">My Referral <em class="icon ni ni-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Referral Informations"></em></h6>
                                                </div>
                                                <div class="nk-refwg-info g-3">
                                                    <div class="nk-refwg-sub">
                                                        <div class="title"><?php echo number_format($total_joined); ?></div>
                                                        <div class="sub-text">Total Joined</div>
                                                    </div>
                                                    <div class="nk-refwg-sub">
                                                        <div class="title"><?php echo number_format($total_referral_earnings); ?></div>
                                                        <div class="sub-text">Referral Earn</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-refwg-ck">
                                                <canvas class="chart-refer-stats" id="refBarChart"></canvas>
                                            </div>
                                        </div><!-- .nk-refwg-stats -->
                                    </div><!-- .nk-refwg -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-inner card-inner-lg">
                                        <div class="align-center flex-wrap flex-md-nowrap g-4">
                                            <div class="nk-block-image w-120px flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                                    <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff" />
                                                    <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                                                    <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                    <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                    <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                    <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                    <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                    <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff" />
                                                    <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff" />
                                                    <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                    <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                    <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                    <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                    <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                    <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                                    <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                                </svg>
                                            </div>
                                            <div class="nk-block-content">
                                                <div class="nk-block-content-head px-lg-4">
                                                    <h5>We’re here to help you!</h5>
                                                    <p class="text-soft">Ask a question or file a support ticket, manage request, report an issues. Our team support team will get back to you by email.</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-content flex-shrink-0">
                                                <a href="#" class="btn btn-lg btn-outline-primary">Get Support Now</a>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
<script>
    function startTime() {
        // Get server time from PHP and parse it
        let serverTime = new Date("<?php echo date('Y-m-d H:i:s'); ?>");

        setInterval(function() {
            serverTime.setSeconds(serverTime.getSeconds() + 1);
            let hours = serverTime.getHours().toString().padStart(2, '0');
            let minutes = serverTime.getMinutes().toString().padStart(2, '0');
            let seconds = serverTime.getSeconds().toString().padStart(2, '0');
            document.getElementById('server-time').innerHTML = `Server Time : ${hours}:${minutes}:${seconds} GMT+7`;
        }, 1000);
    }

    // Call the startTime function once the page loads
    window.onload = function() {
        startTime();
    };
</script>
<script>
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
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js"></script>
    <script src="./assets/js/scripts.js"></script>
    <script src="./assets/js/charts/chart-crypto.js"></script>
</body>

</html>