<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Batik Alomani'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/nav-styles.css">
</head>

<style>
.site-footer {
    background: #814603;
    color: #fff;
    padding: 40px 0 0 0;
    font-family: 'Lato', sans-serif;
    margin-top: 40px;
}
.site-footer h5 {
    font-weight: bold;
    margin-bottom: 18px;
    letter-spacing: 1px;
}
.site-footer p, .site-footer li, .site-footer a {
    color: #fff;
    font-size: 1rem;
    opacity: 0.95;
}
.site-footer ul {
    padding-left: 0;
    list-style: none;
}
.site-footer .social-icons a {
    font-size: 1.6rem;
    margin-right: 18px;
    color: #fff;
    transition: color 0.2s;
}
.site-footer .social-icons a:hover {
    color: #ffd700;
}
.site-footer hr {
    border-top: 1.5px solid #fff;
    opacity: 0.2;
}
.site-footer .footer-bottom {
    background: #6a3702;
    padding: 18px 0 10px 0;
    margin-top: 18px;
    font-size: 0.97rem;
}
.site-footer .footer-bottom ul li a {
    color: #ffffff;
    font-weight: 500;
    margin-left: 18px;
    text-decoration: none;
}
.site-footer .footer-bottom ul li a:hover {
    text-decoration: underline;
}
@media (max-width: 768px) {
    .site-footer { padding: 30px 0 0 0; }
    .site-footer .col-md-4 { margin-bottom: 24px; }
    .site-footer .footer-bottom { font-size: 0.9rem; }
}
.live-chat-btn {
    position: fixed;
    right: 32px;
    bottom: 32px;
    z-index: 9999;
    background: #814603;
    color: #fff;
    border: none;
    border-radius: 30px;
    padding: 12px 28px 12px 20px;
    font-size: 1.1rem;
    font-weight: bold;
    box-shadow: 0 2px 12px rgba(0,0,0,0.13);
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    transition: background 0.2s;
}
.live-chat-btn:hover {
    background: #663702;
}
.live-chat-box {
    position: fixed;
    right: 32px;
    bottom: 90px;
    z-index: 10000;
    width: 340px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.13);
    overflow: hidden;
    display: none;
    flex-direction: column;
}
.live-chat-header {
    background: #814603;
    color: #fff;
    padding: 16px 20px;
    font-weight: bold;
    font-size: 1.1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.live-chat-close {
    background: none;
    border: none;
    color: #fff;
    font-size: 1.3rem;
    cursor: pointer;
}
.live-chat-body {
    padding: 18px 18px 0 18px;
    min-height: 90px;
    max-height: 220px;
    overflow-y: auto;
    background: #f8f6f2;
}
.live-chat-msg.admin {
    background: #eee;
    color: #222;
    border-radius: 10px;
    padding: 10px 16px;
    margin-bottom: 12px;
    max-width: 80%;
}
.live-chat-msg.user {
    background: #814603;
    color: #fff;
    border-radius: 10px;
    padding: 10px 16px;
    margin-bottom: 12px;
    margin-left: auto;
    max-width: 80%;
    text-align: right;
}
.live-chat-footer {
    display: flex;
    align-items: center;
    padding: 12px 14px;
    background: #fff;
    border-top: 1px solid #eee;
}
.live-chat-input {
    flex: 1;
    border: none;
    border-radius: 20px;
    background: #f3f0e9;
    padding: 10px 16px;
    font-size: 1rem;
    margin-right: 10px;
}
.live-chat-send {
    background: #814603;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    cursor: pointer;
    transition: background 0.2s;
}
.live-chat-send:hover {
    background: #663702;
}
</style>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>Batik Alomani</h5>
                <p>Fashion Berkualitas, Harga Bersahabat<br>Tampil Stylish Setiap Hari!</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Kontak Kami</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Tuktuk Sahur</li>
                    <li><i class="fas fa-phone me-2"></i> +62 812 8191 382</li>
                    <li><i class="fas fa-envelope me-2"></i> batikAlomani@gmail.com</li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Ikuti Kami</h5>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://wa.me/628129020382" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row footer-bottom align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <p class="mb-0">&copy; 2025 Batik Alomani. All rights reserved.</p>
            </div>
            <div class="col-md-6">
                <ul class="list-unstyled d-flex justify-content-center justify-content-md-end mb-0 gap-3">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Library JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</footer>
<!-- Live Chat Button -->
<button class="live-chat-btn" id="openLiveChat"><i class="fas fa-comments"></i> Service</button>
<div class="live-chat-box" id="liveChatBox">
    <div class="live-chat-header">
        Service
        <button class="live-chat-close" id="closeLiveChat">&times;</button>
    </div>
    <div class="live-chat-body" id="liveChatBody">
        <div class="live-chat-msg admin"><b>Admin:</b> Selamat datang, apa yang bisa saya bantu?</div>
    </div>
    <form class="live-chat-footer" id="liveChatForm" onsubmit="return false;">
        <input type="text" class="live-chat-input" id="liveChatInput" placeholder="Ketik detail kendalamu di sini, ya">
        <button class="live-chat-send" id="sendLiveChat"><i class="fas fa-paper-plane"></i></button>
    </form>
</div>
<script>
const openBtn = document.getElementById('openLiveChat');
const chatBox = document.getElementById('liveChatBox');
const closeBtn = document.getElementById('closeLiveChat');
const chatBody = document.getElementById('liveChatBody');
const chatForm = document.getElementById('liveChatForm');
const chatInput = document.getElementById('liveChatInput');
openBtn.onclick = () => { chatBox.style.display = 'flex'; };
closeBtn.onclick = () => { chatBox.style.display = 'none'; };
chatForm.onsubmit = function() {
    const val = chatInput.value.trim();
    if (!val) return false;
    const userMsg = document.createElement('div');
    userMsg.className = 'live-chat-msg user';
    userMsg.innerHTML = '<b>Anda:</b> ' + val;
    chatBody.appendChild(userMsg);
    chatInput.value = '';
    chatBody.scrollTop = chatBody.scrollHeight;
    return false;
};
</script>
</body>
</html>