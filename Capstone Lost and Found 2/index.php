<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found System - Access</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .role-selection-container {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 600px;
            width: 100%;
            padding: 20px;
        }

        .role-title {
            color: #ffffff;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .role-subtitle {
            color: #8892b0;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .role-cards {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .role-card {
            background: rgba(10, 25, 47, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 198, 255, 0.3);
            border-radius: 12px;
            padding: 25px 20px;
            width: 170px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }

        .role-card:hover {
            transform: translateY(-5px);
            border-color: #00c6ff;
            box-shadow: 0 10px 25px rgba(0, 198, 255, 0.3);
        }

        .role-icon {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .role-name {
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
        }

        .back-btn {
            background: transparent;
            color: #8892b0;
            border: none;
            cursor: pointer;
            font-size: 13px;
            margin-bottom: 15px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .back-btn:hover {
            color: #00c6ff;
        }

        .selected-role-badge {
            display: inline-block;
            background: rgba(0, 198, 255, 0.15);
            color: #00c6ff;
            border: 1px solid rgba(0, 198, 255, 0.3);
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <!-- ROLE SELECTION SCREEN -->
    <div id="roleSelectionScreen" class="role-selection-container">
        <h1 class="role-title">Lost & Found Portal</h1>
        <p class="role-subtitle">Please select your account type to continue</p>

        <div class="role-cards">
            <div class="role-card" onclick="selectRole('student')">
                <div class="role-icon">🎓</div>
                <div class="role-name">Student</div>
            </div>

            <div class="role-card" onclick="selectRole('staff')">
                <div class="role-icon">💼</div>
                <div class="role-name">Staff</div>
            </div>

            <div class="role-card" onclick="selectRole('admin')">
                <div class="role-icon">🛡️</div>
                <div class="role-name">Administrator</div>
            </div>
        </div>
    </div>

    <!-- AUTHENTICATION CARD -->
    <div id="authCard" class="card-container hidden">
        <button class="back-btn" onclick="goBackToRoles()">← Change Account Type</button>
        
        <div style="text-align: center;">
            <span id="roleBadge" class="selected-role-badge">Student Access</span>
        </div>

        <div class="tabs">
            <button id="loginTabBtn" class="tab-btn active" onclick="switchTab('login')">Log In</button>
            <button id="signupTabBtn" class="tab-btn" onclick="switchTab('signup')">Sign Up</button>
        </div>

        <div id="alertBox" class="alert hidden"></div>

        <!-- LOGIN FORM -->
        <form id="loginForm" class="form-content" onsubmit="handleLogin(event)">
            <h2>Welcome Back</h2>

            <div class="input-group">
                <label for="loginUsername">ID Number</label>
                <input 
                    type="text" 
                    id="loginUsername" 
                    placeholder="Enter your 10-digit ID" 
                    maxlength="10" 
                    pattern="[0-9]{10}"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    title="Please enter a 10-digit numeric ID"
                    required>
            </div>

            <div class="input-group">
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="submit-btn">Log In</button>
        </form>

        <!-- SIGN UP FORM -->
        <form id="signupForm" class="form-content hidden" onsubmit="handleSignup(event)">
            <h2>Create Account</h2>

            <div class="input-group">
                <label for="signupFullName">Full Name</label>
                <input type="text" id="signupFullName" placeholder="e.g. John Doe" required>
            </div>

            <div class="input-group">
                <label for="signupUsername">ID Number</label>
                <input 
                    type="text" 
                    id="signupUsername" 
                    placeholder="Create a 10-digit ID" 
                    maxlength="10" 
                    pattern="[0-9]{10}"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    title="Please enter a 10-digit numeric ID"
                    required>
            </div>

            <div class="input-group">
                <label for="signupPassword">Password</label>
                <input type="password" id="signupPassword" placeholder="Choose a password" required>
            </div>

            <button type="submit" class="submit-btn">Sign Up</button>
        </form>
    </div>

    <script>
        let currentSelectedRole = '';

        function selectRole(role) {
            currentSelectedRole = role;
            document.getElementById('roleBadge').innerText = `${role.toUpperCase()} ACCESS`;
            document.getElementById('roleSelectionScreen').classList.add('hidden');
            document.getElementById('authCard').classList.remove('hidden');
            switchTab('login');
        }

        function goBackToRoles() {
            currentSelectedRole = '';
            hideAlert();
            resetForms();
            document.getElementById('authCard').classList.add('hidden');
            document.getElementById('roleSelectionScreen').classList.remove('hidden');
        }

        function resetForms() {
            document.getElementById('loginForm').reset();
            document.getElementById('signupForm').reset();
        }

        function switchTab(tab) {
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');
            const loginTabBtn = document.getElementById('loginTabBtn');
            const signupTabBtn = document.getElementById('signupTabBtn');
            
            hideAlert();

            if (tab === 'login') {
                loginForm.classList.remove('hidden');
                signupForm.classList.add('hidden');
                loginTabBtn.classList.add('active');
                signupTabBtn.classList.remove('active');
            } else {
                signupForm.classList.remove('hidden');
                loginForm.classList.add('hidden');
                signupTabBtn.classList.add('active');
                loginTabBtn.classList.remove('active');
            }
        }

        function showAlert(message, isError = true) {
            const alertBox = document.getElementById('alertBox');
            alertBox.innerText = message;
            alertBox.className = `alert ${isError ? 'error' : 'success'}`;
            alertBox.classList.remove('hidden');
            
            setTimeout(() => {
                alertBox.classList.add('hidden');
            }, 2000);
        }

        function hideAlert() {
            document.getElementById('alertBox').className = 'alert hidden';
        }

        function getUsers() {
            return JSON.parse(localStorage.getItem('registeredUsers')) || [];
        }

        function handleSignup(event) {
            event.preventDefault();
            const fullName = document.getElementById('signupFullName').value.trim();
            const username = document.getElementById('signupUsername').value.trim();
            const password = document.getElementById('signupPassword').value;

            if (username.length !== 10) {
                showAlert('ID Number must be exactly 10 digits.');
                return;
            }

            const users = getUsers();

            if (currentSelectedRole === 'admin') {
                const existingAdmin = users.find(u => u.userType === 'admin');
                if (existingAdmin) {
                    showAlert('An Administrator account already exists! Only one admin is allowed.');
                    return;
                }
            }

            if (users.find(u => u.username === username)) {
                showAlert('ID Number already registered!');
                return;
            }

            users.push({ 
                userType: currentSelectedRole, 
                fullName: fullName,
                username: username, 
                password: password 
            });

            localStorage.setItem('registeredUsers', JSON.stringify(users));
            showAlert(`Account created successfully! Please log in.`, false);
            resetForms();
            setTimeout(() => switchTab('login'), 1200);
        }

        function handleLogin(event) {
            event.preventDefault();
            const username = document.getElementById('loginUsername').value.trim();
            const password = document.getElementById('loginPassword').value;

            if (username.length !== 10) {
                showAlert('ID Number must be exactly 10 digits.');
                return;
            }

            const users = getUsers();
            const matchedUser = users.find(u => 
                u.username === username && 
                u.password === password && 
                u.userType === currentSelectedRole
            );

            if (matchedUser) {
                localStorage.setItem('currentUser', JSON.stringify(matchedUser));
                showAlert('Login Successful! Redirecting...', false);

                setTimeout(() => {
                    if (currentSelectedRole === 'admin') {
                        window.location.href = "admin-dashboard.php";
                    } else {
                        window.location.href = "student-dashboard.php";
                    }
                }, 1000);
            } else {
                showAlert(`Incorrect credentials for ${currentSelectedRole.toUpperCase()} login.`);
            }
        }
    </script>
</body>
</html>