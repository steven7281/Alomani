// Fungsi untuk validasi email
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Fungsi untuk registrasi
function register(e) {
    e.preventDefault();
    
    const name = document.getElementById('registerName').value;
    const email = document.getElementById('registerEmail').value;
    const password = document.getElementById('registerPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    // Validasi input
    if (!name || !email || !password || !confirmPassword) {
        alert('Semua field harus diisi!');
        return;
    }
    
    if (!validateEmail(email)) {
        alert('Email tidak valid!');
        return;
    }
    
    if (password.length < 6) {
        alert('Password harus minimal 6 karakter!');
        return;
    }
    
    if (password !== confirmPassword) {
        alert('Password tidak cocok!');
        return;
    }

    alert('Registrasi berhasil! Silakan login.');
    window.location.href = 'login.html';
}

// Fungsi untuk login
function login(e) {
    e.preventDefault();
    
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    
    // Validasi input dasar
    if (!email || !password) {
        alert('Email dan password harus diisi!');
        return;
    }
    
    // Set session langsung tanpa validasi
    sessionStorage.setItem('currentUser', email);
    alert('Login berhasil!');
    window.location.href = 'index.html';
}

// Fungsi untuk logout
function logout() {
    sessionStorage.removeItem('currentUser');
    sessionStorage.removeItem('userName');
    alert('Logout berhasil!');
    window.location.href = 'login.html';
}

// Fungsi untuk cek status login
function checkLoginStatus() {
    const currentUser = sessionStorage.getItem('currentUser');
    const loginButtons = document.querySelectorAll('.login-btn');
    const registerButtons = document.querySelectorAll('.register-btn');
    const logoutButtons = document.querySelectorAll('.logout-btn');
    const userInfo = document.querySelectorAll('.user-info');
    
    if (currentUser) {
        // User sudah login
        loginButtons.forEach(btn => btn.style.display = 'none');
        registerButtons.forEach(btn => btn.style.display = 'none');
        logoutButtons.forEach(btn => btn.style.display = 'inline-block');
        userInfo.forEach(info => {
            info.style.display = 'inline-block';
            info.textContent = currentUser;
        });
    } else {
        // User belum login
        loginButtons.forEach(btn => btn.style.display = 'inline-block');
        registerButtons.forEach(btn => btn.style.display = 'inline-block');
        logoutButtons.forEach(btn => btn.style.display = 'none');
        userInfo.forEach(info => info.style.display = 'none');
    }
}

// Fungsi untuk login dengan Google
function loginWithGoogle() {
    // Simulasi login dengan Google
    const randomEmail = 'user' + Math.floor(Math.random() * 1000) + '@gmail.com';
    sessionStorage.setItem('currentUser', randomEmail);
    alert('Login dengan Google berhasil!');
    window.location.href = 'index.html';
}

// Jalankan cek status login saat halaman dimuat
document.addEventListener('DOMContentLoaded', checkLoginStatus);