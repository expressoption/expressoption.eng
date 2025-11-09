<?php
include 'db.php';

session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        // Check user credentials
        $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Expert Option
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="sign-up.html" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
          <style>
          :root{
      --bg: #0b0b0b;
      --card: #0f0f10;
      --muted: #bdbdbd;
      --white: #ffffff;
      --accent: #ff7a18;
      --accent-2: #ff9a3a;
      --glass: rgba(255,255,255,0.03);
      --glass-2: rgba(255,255,255,0.02);
      font-family: Inter, "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
       .cta{background:linear-gradient(90deg,var(--accent),var(--accent-2));padding:9px 14px;border-radius:10px;color:var(--bg);font-weight:800;cursor:pointer}
    .chat-toggle{position:fixed;right:20px;bottom:20px;z-index:200}
    .chat-btn{width:64px;height:64px;border-radius:999px;background:linear-gradient(135deg,var(--accent),#ffb47a);display:flex;align-items:center;justify-content:center;box-shadow:0 10px 40px rgba(255,122,24,0.15);border:none;cursor:pointer;font-size:26px}
    .chat-window{position:fixed;right:20px;bottom:96px;width:340px;max-height:520px;background:linear-gradient(180deg,#0d0d0d,#0b0b0b);border-radius:12px;border:1px solid rgba(255,255,255,0.03);box-shadow:0 10px 40px rgba(0,0,0,0.6);overflow:hidden;display:none;flex-direction:column}
    .chat-header{display:flex;align-items:center;justify-content:space-between;padding:12px 14px;background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));border-bottom:1px solid rgba(255,255,255,0.02)}
    .chat-body{padding:12px;overflow:auto;flex:1;display:flex;flex-direction:column;gap:8px}
    .msg{max-width:78%;padding:10px;border-radius:10px}
    .msg.user{align-self:flex-end;background:linear-gradient(90deg,var(--accent),#ff9a3a);color:var(--bg)}
    .msg.bot{align-self:flex-start;background:rgba(255,255,255,0.02);color:var(--muted)}
    .chat-input{display:flex;padding:10px;border-top:1px solid rgba(255,255,255,0.02);gap:8px}
    .chat-input input{flex:1;padding:10px;border-radius:10px;border:1px solid rgba(255,255,255,0.03);background:transparent;color:var(--white)}
  </style>
    <div class="chat-toggle">
    <button class="chat-btn" id="chat-open" title="Live Chat">💬</button>
  </div>

  <div class="chat-window" id="chat-window" role="dialog" aria-hidden="true">
    <div class="chat-header">
      <div style="display:flex;gap:10px;align-items:center">
        <div style="width:36px;height:36px;border-radius:8px;background:linear-gradient(135deg,var(--accent),#ffb47a);display:flex;align-items:center;justify-content:center;color:var(--bg);font-weight:800">EO</div>
        <div>
          <div style="color:var(--white);font-weight:800">Live Chat</div>
          <div style="font-size:12px;color:var(--muted)">Online •</div>
        </div>
      </div>
      <div style="display:flex;gap:8px;align-items:center">
        <button style="background:transparent;border:1px solid rgba(255,255,255,0.03);padding:6px;border-radius:8px;color:var(--muted)" id="chat-minimize">_</button>
        <button style="background:transparent;border:1px solid rgba(255,255,255,0.03);padding:6px;border-radius:8px;color:var(--muted)" id="chat-close">×</button>
      </div>
    </div>

    <div class="chat-body" id="chat-body">
      <div class="msg bot">Hey! 👋 How can I help you with trading or copy trading today?</div>
    </div>

    <div class="chat-input">
      <input id="chat-input" placeholder="Type your message..." aria-label="Chat input">
        <a  href="mailto:expressoptionofficial@gmail.com"><button class="cta" id="chat-send">Send</button></a>
    </div>
  </div>

  <script>
   /* --- Chat logic (demo) --- */
    const chatOpen = document.getElementById('chat-open');
    const chatWindow = document.getElementById('chat-window');
    const chatClose = document.getElementById('chat-close');
    const chatMin = document.getElementById('chat-minimize');
    const chatSend = document.getElementById('chat-send');
    const chatBody = document.getElementById('chat-body');
    const chatInput = document.getElementById('chat-input');

    chatOpen.addEventListener('click', ()=>{ chatWindow.style.display='flex'; chatOpen.style.display='none'; scrollChat(); });
    chatClose.addEventListener('click', ()=>{ chatWindow.style.display='none'; chatOpen.style.display='inline-flex'; });
    chatMin.addEventListener('click', ()=>{ chatWindow.style.display='none'; chatOpen.style.display='inline-flex'; });

    function appendMessage(text, from='bot'){
      const d = document.createElement('div'); d.className='msg ' + (from==='user'?'user':'bot'); d.textContent = text; chatBody.appendChild(d); scrollChat();
    }
    function scrollChat(){ chatBody.scrollTop = chatBody.scrollHeight; }
    chatSend.addEventListener('click', sendChat);
    chatInput.addEventListener('keydown', (e)=>{ if(e.key==='Enter') sendChat(); });

    function sendChat(){
      const v = chatInput.value.trim(); if(!v) return; appendMessage(v,'user'); chatInput.value=''; setTimeout(()=>{ appendMessage('Steeve: Thanks — we received your message: "'+v+'". An agent will reply shortly.','bot'); }, 900);
    }

  </script>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by Express-Option
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>