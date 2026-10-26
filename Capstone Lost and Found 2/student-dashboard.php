<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Portal - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #080f1e;
            color: #ffffff;
            display: flex;
            overflow-x: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: #0d1b2a;
            border-right: 1px solid rgba(0, 198, 255, 0.15);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 25px 20px;
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-brand span {
            color: #00c6ff;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-grow: 1;
        }

        .sidebar-item {
            width: 100%;
        }

        .sidebar-btn {
            width: 100%;
            background: transparent;
            border: none;
            color: #8892b0;
            text-align: left;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
        }

        .sidebar-btn:hover, .sidebar-btn.active {
            background: linear-gradient(135deg, rgba(0, 198, 255, 0.2), rgba(0, 114, 255, 0.2));
            color: #00c6ff;
        }

        /* MAIN WRAPPER */
        .main-wrapper {
            margin-left: 260px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* TOPNAV */
        .topnav {
            height: 70px;
            background: rgba(13, 27, 42, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 35px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .topnav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-badge {
            font-size: 13px;
            color: #8892b0;
        }

        .logout-btn {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 198, 255, 0.3);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            box-shadow: 0 0 18px rgba(0, 198, 255, 0.6);
        }

        /* CONTENT AREA */
        .content-area {
            padding: 30px;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        .welcome-header {
            margin-bottom: 25px;
        }

        .welcome-title {
            font-size: 26px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 5px;
        }

        .welcome-subtitle {
            font-size: 14px;
            color: #8892b0;
        }

        /* METRIC CARDS GRID */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .metric-card {
            background: rgba(13, 27, 42, 0.85);
            border: 1px solid rgba(0, 198, 255, 0.2);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        .metric-card h4 {
            font-size: 12px;
            color: #8892b0;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .metric-card .value {
            font-size: 28px;
            font-weight: 700;
            color: #00c6ff;
        }

        /* ACTION BUTTONS BAR */
        .action-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 198, 255, 0.3);
            transition: all 0.2s ease;
        }

        .btn-secondary {
            background: rgba(13, 27, 42, 0.9);
            color: #ffffff;
            border: 1px solid rgba(0, 198, 255, 0.3);
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary:hover, .btn-secondary:hover {
            transform: translateY(-2px);
        }

        /* TABLE & ACCOUNT SECTION */
        .database-section {
            background: rgba(13, 27, 42, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 198, 255, 0.2);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .search-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        .items-table th {
            background: rgba(0, 198, 255, 0.1);
            color: #00c6ff;
            padding: 12px 15px;
            border-bottom: 2px solid rgba(0, 198, 255, 0.25);
            font-weight: 600;
            white-space: nowrap;
        }

        .items-table td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            color: #cbd5e1;
            vertical-align: middle;
            white-space: nowrap;
        }

        .items-table tbody tr:hover {
            background: rgba(0, 198, 255, 0.04);
        }

        .tag {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
        }
        .tag-lost { background: #e74c3c; }
        .tag-found { background: #2ecc71; }

        .view-btn {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #ffffff;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .view-btn:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        /* MODALS & ACCOUNT FORM */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(8px);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: rgba(13, 27, 42, 0.98);
            border: 1px solid rgba(0, 198, 255, 0.4);
            padding: 30px;
            border-radius: 16px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            color: #8892b0;
            cursor: pointer;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 6px;
            color: #e6f1ff;
            font-size: 13px;
            font-weight: 600;
        }

        .input-group input, .input-group select, .input-group textarea {
            width: 100%;
            padding: 10px;
            background: rgba(5, 11, 20, 0.9);
            border: 1px solid rgba(0, 198, 255, 0.3);
            border-radius: 8px;
            color: #ffffff;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            border: none;
            border-radius: 8px;
            color: #ffffff;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }

        .detail-row {
            margin-bottom: 10px;
            font-size: 14px;
            color: #cbd5e1;
        }
        .detail-row strong {
            color: #00c6ff;
        }

        .alert {
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            text-align: center;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .hidden {
            display: none !important;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <nav class="sidebar">
        <div class="sidebar-brand">
            <span>Lost &amp; Found</span> System
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <button class="sidebar-btn active" id="navHome" onclick="switchDashboardTab('home')">📊 Dashboard</button>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-btn" id="navLost" onclick="switchDashboardTab('lost')">🔍 Lost Items</button>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-btn" id="navFound" onclick="switchDashboardTab('found')">🛠️ Found Items</button>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-btn" id="navClaimed" onclick="switchDashboardTab('claimed')">✅ Claimed / Resolved</button>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-btn" id="navAccount" onclick="switchDashboardTab('account')">👤 Account Settings</button>
            </li>
        </ul>
    </nav>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <!-- TOPNAV -->
        <header class="topnav">
            <div class="topnav-actions">
                <span id="userBadge" class="user-badge">User: Guest</span>
                <button onclick="logout()" class="logout-btn">Log Out</button>
            </div>
        </header>

        <!-- CONTENT -->
        <div class="content-area">
            <div class="welcome-header">
                <h1 class="welcome-title" id="welcomeHeading">Dashboard Overview</h1>
                <p class="welcome-subtitle" id="welcomeSub">Manage and track lost or found items across campus.</p>
            </div>

            <!-- METRIC SUMMARY CARDS -->
            <div class="metrics-grid" id="metricsGrid">
                <div class="metric-card">
                    <h4>Total Reports</h4>
                    <div class="value" id="statTotal">0</div>
                </div>
                <div class="metric-card">
                    <h4>Lost Items</h4>
                    <div class="value" id="statLost" style="color: #e74c3c;">0</div>
                </div>
                <div class="metric-card">
                    <h4>Found Items</h4>
                    <div class="value" id="statFound" style="color: #2ecc71;">0</div>
                </div>
                <div class="metric-card">
                    <h4>Resolved / Claimed</h4>
                    <div class="value" id="statClaimed" style="color: #f1c40f;">0</div>
                </div>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="action-bar" id="actionBar">
                <button class="btn-primary" onclick="openModal('lost')">
                    Report a Lost Item ➕
                </button>
                <button class="btn-secondary" onclick="openModal('found')">
                    Report a Found Item 🛠️
                </button>
            </div>

            <!-- TABLE SECTION FOR ITEMS -->
            <div class="database-section" id="itemsSection">
                <h2 id="tableTitle" style="color: #ffffff; font-size: 18px; margin-bottom: 15px;">Recent Reported Items</h2>
                <div id="dashboardAlert" class="alert hidden"></div>
                
                <div class="search-grid">
                    <input type="text" id="searchKeyword" placeholder="Search item, location, phone, or poster name..." onkeyup="renderItems()" style="padding:10px; background:rgba(5,11,20,0.9); border:1px solid rgba(0,198,255,0.3); border-radius:8px; color:white;">
                    <select id="filterCategory" onchange="renderItems()" style="padding:10px; background:rgba(5,11,20,0.9); border:1px solid rgba(0,198,255,0.3); border-radius:8px; color:white;">
                        <option value="ALL">All Categories</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Keys/Wallets">Keys / Wallets</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Documents/IDs">Documents / IDs</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="items-table">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Posted By</th>
                                <th>Phone No.</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Date (MM/DD)</th>
                                <th>Time</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Dynamic Rows -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ACCOUNT SETTINGS SECTION -->
            <div class="database-section hidden" id="accountSection">
                <h2 style="color: #ffffff; font-size: 18px; margin-bottom: 15px;">Change Account Password</h2>
                <div id="passAlert" class="alert hidden"></div>

                <div style="max-width: 500px; margin: 0 auto;">
                    <div class="detail-row" style="margin-bottom:15px; background:rgba(0,198,255,0.08); padding:12px; border-radius:8px; border:1px solid rgba(0,198,255,0.2);">
                        <p style="margin-bottom:4px;"><strong>Full Name:</strong> <span id="accFullName">-</span></p>
                        <p style="margin-bottom:4px;"><strong>ID Number:</strong> <span id="accIDNumber">-</span></p>
                        <p><strong>Account Type:</strong> <span id="accRole">-</span></p>
                    </div>

                    <form id="changePassForm" onsubmit="handleChangePassword(event)">
                        <div class="input-group">
                            <label for="newPass">Change Password</label>
                            <input type="password" id="newPass" placeholder="Enter new password" required>
                        </div>

                        <div class="input-group">
                            <label for="confirmPass">Re-enter New Password</label>
                            <input type="password" id="confirmPass" placeholder="Re-enter new password" required>
                        </div>

                        <button type="submit" class="submit-btn">Update Password</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- REPORT MODAL -->
    <div id="reportModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle" style="color:#00c6ff; margin-bottom:15px; font-size:20px;">Report Item</h2>
            
            <form id="modalForm" onsubmit="handleModalSubmit(event)">
                <input type="hidden" id="reportType" value="lost">

                <div class="input-group">
                    <label>Item Name</label>
                    <input type="text" id="modalItemName" placeholder="e.g. iPhone, Blue Wallet" required>
                </div>

                <div class="input-group">
                    <label>Phone Number</label>
                    <input 
                        type="text" 
                        id="modalPhone" 
                        placeholder="e.g. 09123456789" 
                        maxlength="11" 
                        pattern="[0-9]{11}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                        title="Please enter exactly 11 digits (e.g. 09123456789)"
                        required>
                </div>

                <div class="input-group">
                    <label>Category</label>
                    <select id="modalCategory" required>
                        <option value="Electronics">Electronics</option>
                        <option value="Keys/Wallets">Keys / Wallets</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Documents/IDs">Documents / IDs</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="input-group">
                    <label>Date Incident Occurred</label>
                    <input type="date" id="modalDate" required>
                </div>

                <div class="input-group">
                    <label>Time Incident Occurred</label>
                    <input type="time" id="modalTime" required>
                </div>

                <div class="input-group">
                    <label>Location</label>
                    <input type="text" id="modalLocation" placeholder="e.g. Library 2nd Floor" required>
                </div>

                <div class="input-group">
                    <label>Description</label>
                    <textarea id="modalDesc" placeholder="Color, brand, unique markings..." rows="3" required></textarea>
                </div>

                <div class="input-group">
                    <label>Upload Photo (Optional)</label>
                    <input type="file" id="modalPhoto" accept="image/*">
                </div>

                <button type="submit" class="submit-btn">Submit Post</button>
            </form>
        </div>
    </div>

    <!-- CLAIM VERIFICATION MODAL -->
    <div id="claimModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeClaimModal()">&times;</span>
            <h2 style="color:#00c6ff; margin-bottom:15px; font-size:20px;">Claim Verification Request</h2>
            
            <form id="claimForm" onsubmit="handleClaimSubmit(event)">
                <input type="hidden" id="claimItemId">

                <div class="input-group">
                    <label>Reason / Description (Proof of Ownership)</label>
                    <textarea id="claimReason" placeholder="Describe distinct features, contents, or circumstances proving you own this item..." rows="4" required></textarea>
                </div>

                <div class="input-group">
                    <label>Upload Photo Proof (Optional)</label>
                    <input type="file" id="claimPhoto" accept="image/*">
                </div>

                <button type="submit" class="submit-btn">Submit Claim Verification Request</button>
            </form>
        </div>
    </div>

    <!-- VIEW DETAILS MODAL -->
    <div id="viewModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeViewModal()">&times;</span>
            <h2 style="color:#00c6ff; margin-bottom:15px; font-size:20px;">Item Information</h2>
            
            <div id="viewModalBody">
                <!-- Injected details -->
            </div>
        </div>
    </div>

    <script>
        const currentUser = JSON.parse(localStorage.getItem('currentUser'));
        if (!currentUser) {
            window.location.href = "index.php";
        } else {
            const displayName = currentUser.fullName ? currentUser.fullName : currentUser.username;
            document.getElementById('userBadge').innerText = `Logged in: ${displayName} (${currentUser.userType.toUpperCase()})`;
        }

        let currentDashboardTab = 'home';

        function switchDashboardTab(tab) {
            currentDashboardTab = tab;
            
            document.querySelectorAll('.sidebar-btn').forEach(btn => btn.classList.remove('active'));
            document.getElementById(`nav${tab.charAt(0).toUpperCase() + tab.slice(1)}`).classList.add('active');

            const welcomeHeading = document.getElementById('welcomeHeading');
            const welcomeSub = document.getElementById('welcomeSub');
            const tableTitle = document.getElementById('tableTitle');

            const itemsSection = document.getElementById('itemsSection');
            const accountSection = document.getElementById('accountSection');
            const actionBar = document.getElementById('actionBar');
            const metricsGrid = document.getElementById('metricsGrid');

            if (tab === 'account') {
                itemsSection.classList.add('hidden');
                actionBar.classList.add('hidden');
                metricsGrid.classList.add('hidden');
                accountSection.classList.remove('hidden');

                welcomeHeading.innerText = `Account Settings`;
                welcomeSub.innerText = `Update your password and account credentials.`;

                document.getElementById('accFullName').innerText = currentUser.fullName || 'N/A';
                document.getElementById('accIDNumber').innerText = currentUser.username || 'N/A';
                document.getElementById('accRole').innerText = (currentUser.userType || 'Student').toUpperCase();
            } else {
                accountSection.classList.add('hidden');
                itemsSection.classList.remove('hidden');
                actionBar.classList.remove('hidden');
                metricsGrid.classList.remove('hidden');

                if (tab === 'home') {
                    welcomeHeading.innerText = `Dashboard Overview`;
                    welcomeSub.innerText = `Manage and track lost or found items across campus.`;
                    tableTitle.innerText = `Recent Reported Items`;
                } else if (tab === 'lost') {
                    welcomeHeading.innerText = `Lost Items Directory`;
                    welcomeSub.innerText = `View all active lost item reports submitted by users.`;
                    tableTitle.innerText = `All Lost Items`;
                } else if (tab === 'found') {
                    welcomeHeading.innerText = `Found Items Directory`;
                    welcomeSub.innerText = `View found items awaiting claims or verification.`;
                    tableTitle.innerText = `All Found Items`;
                } else if (tab === 'claimed') {
                    welcomeHeading.innerText = `Claimed & Resolved Items`;
                    welcomeSub.innerText = `Review successfully claimed, returned, or resolved reports.`;
                    tableTitle.innerText = `All Claimed / Resolved Items`;
                }

                renderItems();
            }
        }

        // Lock date field to current date cap
        const todayStr = new Date().toISOString().split('T')[0];
        document.getElementById('modalDate').setAttribute('max', todayStr);

        function logout() {
            localStorage.removeItem('currentUser');
            window.location.href = "index.php";
        }

        function showAlert(msg, isError = false, elementId = 'dashboardAlert') {
            const box = document.getElementById(elementId);
            box.innerText = msg;
            box.style.background = isError ? 'rgba(231,76,60,0.2)' : 'rgba(46,204,113,0.2)';
            box.style.color = isError ? '#ff6b6b' : '#2ecc71';
            box.style.border = isError ? '1px solid #e74c3c' : '1px solid #2ecc71';
            box.classList.remove('hidden');
            
            setTimeout(() => {
                box.classList.add('hidden');
            }, 2000);
        }

        function handleChangePassword(event) {
            event.preventDefault();
            const newPass = document.getElementById('newPass').value;
            const confirmPass = document.getElementById('confirmPass').value;

            if (newPass !== confirmPass) {
                showAlert("New password and confirmation do not match!", true, 'passAlert');
                return;
            }

            if (newPass.length < 4) {
                showAlert("Password must be at least 4 characters long.", true, 'passAlert');
                return;
            }

            // Update current user
            currentUser.password = newPass;
            localStorage.setItem('currentUser', JSON.stringify(currentUser));

            // Update user in registered users array
            let users = JSON.parse(localStorage.getItem('registeredUsers')) || [];
            users = users.map(u => {
                if (u.username === currentUser.username && u.userType === currentUser.userType) {
                    u.password = newPass;
                }
                return u;
            });
            localStorage.setItem('registeredUsers', JSON.stringify(users));

            document.getElementById('changePassForm').reset();
            showAlert("Password updated successfully!", false, 'passAlert');
        }

        function openModal(type) {
            document.getElementById('reportType').value = type;
            document.getElementById('modalTitle').innerText = type === 'lost' ? "Report a Lost Item" : "Report a Found Item";
            document.getElementById('reportModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('reportModal').style.display = 'none';
            document.getElementById('modalForm').reset();
        }

        function closeViewModal() {
            document.getElementById('viewModal').style.display = 'none';
        }

        function openClaimModal(itemId) {
            document.getElementById('claimItemId').value = itemId;
            closeViewModal();
            document.getElementById('claimModal').style.display = 'flex';
        }

        function closeClaimModal() {
            document.getElementById('claimModal').style.display = 'none';
            document.getElementById('claimForm').reset();
        }

        function getStoredItems() {
            return JSON.parse(localStorage.getItem('systemItems')) || [];
        }

        function isItemClaimedOrResolved(item) {
            const statusLower = (item.status || '').toLowerCase();
            return statusLower.includes('approved') || 
                   statusLower === 'claimed' || 
                   statusLower.includes('resolved') || 
                   statusLower.includes('returned');
        }

        function updateMetrics(items) {
            document.getElementById('statTotal').innerText = items.length;
            document.getElementById('statLost').innerText = items.filter(i => i.type === 'lost').length;
            document.getElementById('statFound').innerText = items.filter(i => i.type === 'found').length;
            document.getElementById('statClaimed').innerText = items.filter(i => isItemClaimedOrResolved(i)).length;
        }

        function handleModalSubmit(event) {
            event.preventDefault();
            const type = document.getElementById('reportType').value;
            const photoInput = document.getElementById('modalPhoto');
            const phoneInput = document.getElementById('modalPhone').value.trim();

            if (phoneInput.length !== 11) {
                alert("Please enter a valid 11-digit phone number (e.g., 09123456789).");
                return;
            }

            const rawDate = document.getElementById('modalDate').value;
            const rawTime = document.getElementById('modalTime').value;

            const dateParts = rawDate.split('-');
            const yearNum = parseInt(dateParts[0], 10);
            const currentYear = new Date().getFullYear();

            if (yearNum > currentYear || yearNum < 2000 || isNaN(yearNum)) {
                alert(`Invalid year! Year cannot be in the future (max: ${currentYear}).`);
                return;
            }

            const yearStr = dateParts[0];
            const dateStr = `${dateParts[1]}/${dateParts[2]}`;

            let timeStr = rawTime;
            if (rawTime) {
                const timeParts = rawTime.split(':');
                let hours = parseInt(timeParts[0], 10);
                const minutes = timeParts[1];
                const ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12 || 12;
                timeStr = `${hours}:${minutes} ${ampm}`;
            }

            const processFormWithImage = (imageData = '') => {
                const items = getStoredItems();
                const newItem = {
                    id: Date.now(),
                    type: type,
                    postedByRealName: currentUser.fullName || currentUser.username,
                    phone: phoneInput,
                    name: document.getElementById('modalItemName').value,
                    category: document.getElementById('modalCategory').value,
                    date: dateStr,
                    time: timeStr,
                    year: yearStr,
                    location: document.getElementById('modalLocation').value,
                    desc: document.getElementById('modalDesc').value,
                    photo: imageData,
                    status: type === 'lost' ? 'Seeking Match' : 'Awaiting Claim'
                };

                items.push(newItem);
                localStorage.setItem('systemItems', JSON.stringify(items));

                closeModal();
                showAlert(`${type.toUpperCase()} post added successfully!`);
                renderItems();
            };

            if (photoInput.files && photoInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    processFormWithImage(e.target.result);
                };
                reader.readAsDataURL(photoInput.files[0]);
            } else {
                processFormWithImage('');
            }
        }

        function handleClaimSubmit(event) {
            event.preventDefault();
            const itemId = parseInt(document.getElementById('claimItemId').value, 10);
            const reason = document.getElementById('claimReason').value.trim();
            const photoInput = document.getElementById('claimPhoto');

            const saveClaim = (proofPhotoData = '') => {
                const items = getStoredItems();
                const item = items.find(i => i.id === itemId);
                if (item) {
                    item.status = "Pending Claim Verification";
                    item.claimProof = reason;
                    if (proofPhotoData) {
                        item.claimProofPhoto = proofPhotoData;
                    }
                    localStorage.setItem('systemItems', JSON.stringify(items));
                    closeClaimModal();
                    showAlert("Claim verification request submitted! Admin will verify your claim.");
                    renderItems();
                }
            };

            if (photoInput.files && photoInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    saveClaim(e.target.result);
                };
                reader.readAsDataURL(photoInput.files[0]);
            } else {
                saveClaim('');
            }
        }

        function viewItemDetails(itemId) {
            const items = getStoredItems();
            const item = items.find(i => i.id === itemId);
            if (!item) return;

            const viewBody = document.getElementById('viewModalBody');
            viewBody.innerHTML = `
                <div class="detail-row"><strong>Type:</strong> <span class="tag ${item.type === 'lost' ? 'tag-lost' : 'tag-found'}">${item.type}</span></div>
                <div class="detail-row"><strong>Posted By:</strong> ${item.postedByRealName || item.reportedBy || 'Unknown User'}</div>
                <div class="detail-row"><strong>Phone Number:</strong> ${item.phone || 'N/A'}</div>
                <div class="detail-row"><strong>Item Name:</strong> ${item.name}</div>
                <div class="detail-row"><strong>Category:</strong> ${item.category}</div>
                <div class="detail-row"><strong>Location:</strong> ${item.location}</div>
                <div class="detail-row"><strong>Date:</strong> ${item.date || 'N/A'} / <strong>Year:</strong> ${item.year || 'N/A'}</div>
                <div class="detail-row"><strong>Time:</strong> ${item.time || 'N/A'}</div>
                <div class="detail-row"><strong>Status:</strong> ${item.status}</div>
                <div class="detail-row"><strong>Description:</strong> ${item.desc}</div>
                <div class="detail-row" style="margin-top:15px;">
                    <strong>Photo Attachment:</strong><br>
                    ${item.photo ? `<img src="${item.photo}" style="max-width:100%; max-height:220px; border-radius:8px; margin-top:8px; border:1px solid rgba(0,198,255,0.3);" alt="Item Photo">` : '<span style="color:#8892b0; font-style:italic;">No photo attached</span>'}
                </div>
                ${item.type === 'found' && item.status === 'Awaiting Claim' ? 
                    `<button class="submit-btn" style="margin-top:15px;" onclick="openClaimModal(${item.id})">Initiate Claim Verification</button>` : ''}
            `;

            document.getElementById('viewModal').style.display = 'flex';
        }

        function renderItems() {
            const items = getStoredItems();
            updateMetrics(items);

            const tbody = document.getElementById('tableBody');
            const keyword = document.getElementById('searchKeyword').value.toLowerCase();
            const category = document.getElementById('filterCategory').value;

            tbody.innerHTML = '';

            const filtered = items.filter(item => {
                if (currentDashboardTab === 'lost' && item.type !== 'lost') return false;
                if (currentDashboardTab === 'found' && item.type !== 'found') return false;
                if (currentDashboardTab === 'claimed' && !isItemClaimedOrResolved(item)) return false;

                const poster = item.postedByRealName || item.reportedBy || 'Unknown User';
                const phoneNum = item.phone || '';
                const matchesKey = item.name.toLowerCase().includes(keyword) || 
                                   item.desc.toLowerCase().includes(keyword) || 
                                   item.location.toLowerCase().includes(keyword) ||
                                   poster.toLowerCase().includes(keyword) ||
                                   phoneNum.toLowerCase().includes(keyword);
                const matchesCat = category === 'ALL' || item.category === category;
                return matchesKey && matchesCat;
            });

            if (filtered.length === 0) {
                tbody.innerHTML = `<tr><td colspan="11" style="text-align:center; padding:20px; color:#8892b0;">No records found matching your filters.</td></tr>`;
                return;
            }

            filtered.forEach(item => {
                const posterName = item.postedByRealName || item.reportedBy || 'Unknown User';
                const phoneVal = item.phone || 'N/A';
                const displayDate = item.date || 'N/A';
                const displayTime = item.time || 'N/A';
                const displayYear = item.year || new Date().getFullYear();

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><span class="tag ${item.type === 'lost' ? 'tag-lost' : 'tag-found'}">${item.type}</span></td>
                    <td><strong style="color: #ffffff;">${posterName}</strong></td>
                    <td>${phoneVal}</td>
                    <td><strong style="color:#00c6ff;">${item.name}</strong></td>
                    <td>${item.category}</td>
                    <td>${item.location}</td>
                    <td>${displayDate}</td>
                    <td>${displayTime}</td>
                    <td>${displayYear}</td>
                    <td><span style="color: #00c6ff; font-size: 12px;">${item.status}</span></td>
                    <td>
                        <button class="view-btn" onclick="viewItemDetails(${item.id})">View</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        renderItems();
    </script>
</body>
</html>