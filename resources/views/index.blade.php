<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loomi - Join Our Community</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .container {
            width: 90%;
            max-width: 420px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 1rem;
            opacity: 0.8;
        }

        .form-container {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 0 2px rgba(79, 172, 254, 0.5);
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            color: white;
            margin-bottom: 15px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 242, 254, 0.4);
        }

        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .divider span {
            padding: 0 15px;
            font-size: 0.9rem;
            opacity: 0.7;
        }

        .social-login {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .social-btn i {
            font-size: 1.2rem;
        }

        .form-toggle {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .form-toggle a {
            color: #4facfe;
            text-decoration: none;
            font-weight: 600;
        }

        .form-toggle a:hover {
            text-decoration: underline;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
            
            .logo h1 {
                font-size: 2rem;
            }
            
            .social-login {
                flex-direction: column;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>Loomi</h1>
            <p>Connect with friends and the world around you</p>
        </div>

        <div class="form-container">
            <!-- Login Form -->
            <form id="loginForm" class="form">
                <div class="form-group">
                    <label for="loginEmail">Email or Username</label>
                    <input type="text" id="loginEmail" placeholder="Enter your email or username" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
                
                <div class="divider">
                    <span>or</span>
                </div>
                
                <div class="social-login">
                    <button type="button" class="social-btn">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button type="button" class="social-btn">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </button>
                </div>
                
                <div class="form-toggle">
                    Don't have an account? <a href="#" id="showSignup">Sign Up</a>
                </div>
            </form>

            <!-- Signup Form -->
            <form id="signupForm" class="form hidden">
                <div class="form-group">
                    <label for="signupName">Full Name</label>
                    <input type="text" id="signupName" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="signupEmail">Email</label>
                    <input type="email" id="signupEmail" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="signupUsername">Username</label>
                    <input type="text" id="signupUsername" placeholder="Choose a username" required>
                </div>
                <div class="form-group">
                    <label for="signupPassword">Password</label>
                    <input type="password" id="signupPassword" placeholder="Create a password" required>
                </div>
                <div class="form-group">
                    <label for="signupConfirmPassword">Confirm Password</label>
                    <input type="password" id="signupConfirmPassword" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Account</button>
                
                <div class="divider">
                    <span>or</span>
                </div>
                
                <div class="social-login">
                    <button type="button" class="social-btn">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button type="button" class="social-btn">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </button>
                </div>
                
                <div class="form-toggle">
                    Already have an account? <a href="#" id="showLogin">Log In</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle between login and signup forms
        document.getElementById('showSignup').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('signupForm').classList.remove('hidden');
        });

        document.getElementById('showLogin').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('signupForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
        });

        // Form submission handlers
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            // In a real application, you would send this data to your backend
            console.log('Login attempt with:', { email, password });
            alert('Login functionality would connect to your backend API');
        });

        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('signupName').value;
            const email = document.getElementById('signupEmail').value;
            const username = document.getElementById('signupUsername').value;
            const password = document.getElementById('signupPassword').value;
            const confirmPassword = document.getElementById('signupConfirmPassword').value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
            // In a real application, you would send this data to your backend
            console.log('Signup attempt with:', { name, email, username, password });
            alert('Account creation would connect to your backend API');
        });
    </script>
</body>
</html>