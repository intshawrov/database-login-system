<!-- ===== FILE: index.html ===== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-toggle">
                <button id="login-toggle" class="active">Login</button>
                <button id="register-toggle">Register</button>
            </div>

            <!-- Login Form -->
            <form id="login-form" class="form active">
                <h2>Welcome Back</h2>
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                <div class="form-options">
                    <label class="checkbox">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div id="login-message" class="message"></div>
            </form>

            <!-- Register Form -->
            <form id="register-form" class="form">
                <h2>Create Account</h2>
                <div class="form-group">
                    <label for="register-name">Full Name</label>
                    <input type="text" id="register-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="register-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="register-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="register-confirm">Confirm Password</label>
                    <input type="password" id="register-confirm" name="confirm_password" required>
                </div>
                <button type="submit" class="btn">Register</button>
                <div id="register-message" class="message"></div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>


<!-- ===== FILE: script.js ===== -->
<script>
// Form toggle functionality
const loginToggle = document.getElementById('login-toggle');
const registerToggle = document.getElementById('register-toggle');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');

loginToggle.addEventListener('click', () => {
    loginToggle.classList.add('active');
    registerToggle.classList.remove('active');
    loginForm.classList.add('active');
    registerForm.classList.remove('active');
});

registerToggle.addEventListener('click', () => {
    registerToggle.classList.add('active');
    loginToggle.classList.remove('active');
    registerForm.classList.add('active');
    loginForm.classList.remove('active');
});

// Login form submission
loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    const messageDiv = document.getElementById('login-message');
    
    try {
        const response = await fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
        });
        
        const result = await response.json();
        
        if (result.success) {
            messageDiv.textContent = result.message;
            messageDiv.className = 'message success';
            
            // Redirect to dashboard after 1 second
            setTimeout(() => {
                window.location.href = 'dashboard.php';
            }, 1000);
        } else {
            messageDiv.textContent = result.message;
            messageDiv.className = 'message error';
        }
    } catch (error) {
        messageDiv.textContent = 'An error occurred. Please try again.';
        messageDiv.className = 'message error';
    }
});

// Register form submission
registerForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const name = document.getElementById('register-name').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;
    const confirmPassword = document.getElementById('register-confirm').value;
    const messageDiv = document.getElementById('register-message');
    
    // Client-side validation
    if (password !== confirmPassword) {
        messageDiv.textContent = 'Passwords do not match!';
        messageDiv.className = 'message error';
        return;
    }
    
    if (password.length < 6) {
        messageDiv.textContent = 'Password must be at least 6 characters long!';
        messageDiv.className = 'message error';
        return;
    }
    
    try {
        const response = await fetch('register.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
        });
        
        const result = await response.json();
        
        if (result.success) {
            messageDiv.textContent = result.message;
            messageDiv.className = 'message success';
            
            // Switch to login form after 2 seconds
            setTimeout(() => {
                loginToggle.click();
                registerForm.reset();
                messageDiv.style.display = 'none';
            }, 2000);
        } else {
            messageDiv.textContent = result.message;
            messageDiv.className = 'message error';
        }
    } catch (error) {
        messageDiv.textContent = 'An error occurred. Please try again.';
        messageDiv.className = 'message error';
    }
});
</script>


<!-- ===== FILE: style.css ===== -->
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.container {
    width: 100%;
    max-width: 450px;
}

.form-container {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    overflow: hidden;
}

.form-toggle {
    display: flex;
    background: #f5f5f5;
}

.form-toggle button {
    flex: 1;
    padding: 15px;
    border: none;
    background: transparent;
    font-size: 16px;
    font-weight: 600;
    color: #666;
    cursor: pointer;
    transition: all 0.3s;
}

.form-toggle button.active {
    background: #fff;
    color: #667eea;
}

.form {
    padding: 40px;
    display: none;
}

.form.active {
    display: block;
    animation: fadeIn 0.3s;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form h2 {
    margin-bottom: 30px;
    color: #333;
    font-size: 28px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-weight: 500;
    font-size: 14px;
}

.form-group input {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e1e1e1;
    border-radius: 8px;
    font-size: 14px;
    transition: border-color 0.3s;
}

.form-group input:focus {
    outline: none;
    border-color: #667eea;
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    font-size: 14px;
}

.checkbox {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.checkbox input {
    margin-right: 8px;
}

.forgot-password {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
}

.forgot-password:hover {
    text-decoration: underline;
}

.btn {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
}

.btn:active {
    transform: translateY(0);
}

.message {
    margin-top: 15px;
    padding: 12px;
    border-radius: 8px;
    font-size: 14px;
    text-align: center;
    display: none;
}

.message.success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    display: block;
}

.message.error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    display: block;
}

@media (max-width: 480px) {
    .form {
        padding: 30px 25px;
    }
    
    .form h2 {
        font-size: 24px;
    }
}
</style>