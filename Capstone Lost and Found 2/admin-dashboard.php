<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Portal - Administrator Panel</title>
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
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(231, 76, 60, 0.3);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            box-shadow: 0 0 18px rgba(231, 76, 60, 0.6);
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

        /* TABLE SECTION */
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
        .tag-role { background: rgba(0, 198, 255, 0.2); border: 1px solid #00c6ff; color: #00c6ff; }

        .view-btn {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: #ffffff;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            margin-right: 4px;
            transition: all 0.2s ease;
        }
        .view-btn:hover { opacity: 0.9; transform: scale(1.05); }

        .approve-btn {
            background: #2ecc71;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            margin-right: 4px;
        }
        .approve-btn:hover { opacity: 0.9; }

        .resolve-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            margin-right: 4px;
        }
        .resolve-btn:hover { opacity: 0.9; }

        .delete-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
        }
        .delete-btn:hover { opacity: 0.9; }

        /* MODALS */
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
                <button class="sidebar-btn active" id="navHome" onclick="switchAdminTab('home')">📊 Dashboard</button>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-btn" id="navLost" onclick="switchAdminTab('lost')">🔍 Lost Items</button>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-btn" id="navFound" onclick="switchAdminTab('found')">🛠️ Found Items</button>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-btn" id="navClaimed" onclick="switchAdminTab('claimed')">✅ Claimed / Resolved</button>
            </li>
            <li class="sidebar-item">
                <button class="sidebar-btn" id="navAccounts" onclick="switchAdminTab('accounts')">👥 Account Management</button>
            </li>
        </ul>
    </nav>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <!-- TOPNAV -->
        <header class="topnav">
            <div class="topnav-actions">
                <span id="userBadge" class="user-badge">User: Admin</span>
                <button onclick="logout()" class="logout-btn">Log Out</button>
            </div>
        </header>

        <!-- CONTENT -->
        <div class="content-area">
            <div class="welcome-header">
                <h1 class="welcome-title" id="welcomeHeading">Admin Dashboard Overview</h1>
                <p class="welcome-subtitle" id="welcomeSub">Manage campus records, verify user claims, and manage system accounts.</p>
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

            <!-- TABLE SECTION FOR ITEMS -->
            <div id="itemsSection" class="database-section">
                <h2 id="tableTitle" style="color: #ffffff; font-size: 18px; margin-bottom: 15px;">Recent Reported Items</h2>
                <div id="adminAlert" class="alert hidden"></div>
                
                <div class="search-grid">
                    <input type="text" id="searchKeyword" placeholder="Search item, location, phone, or poster name..." onkeyup="renderAdminTable()" style="padding:10px; background:rgba(5,11,20,0.9); border:1px solid rgba(0,198,255,0.3); border-radius:8px; color:white;">
                    <select id="filterCategory" onchange="renderAdminTable()" style="padding:10px; background:rgba(5,11,20,0.9); border:1px solid rgba(0,198,255,0.3); border-radius:8px; color:white;">
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
                                <th>Claim Proof</th>
                                <th>Admin Actions</th>
                            </tr>
                        </thead>
                        <tbody id="adminTableBody">
                            <!-- Dynamic Item Rows -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TABLE SECTION FOR ACCOUNTS -->
            <div id="accountsSection" class="database-section hidden">
                <h2 style="color: #ffffff; font-size: 18px; margin-bottom: 15px;">Registered Accounts</h2>
                <div id="accountAlert" class="alert hidden"></div>

                <div class="search-grid" style="grid-template-columns: 1fr;">
                    <input type="text" id="searchAccountKeyword" placeholder="Search user full name or ID number..." onkeyup="renderAccountsTable()" style="padding:10px; background:rgba(5,11,20,0.9); border:1px solid rgba(0,198,255,0.3); border-radius:8px; color:white;">
                </div>

                <div class="table-responsive">
                    <table class="items-table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>ID Number</th>
                                <th>Account Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="accountsTableBody">
                            <!-- Dynamic Account Rows -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- VIEW DETAILS MODAL -->
    <div id="viewModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeViewModal()">&times;</span>
            <h2 style="color:#00c6ff; margin-bottom:15px; font-size:20px;">Item Information & Proof</h2>
            
            <div id="viewModalBody">
                <!-- Injected details -->
            </div>
        </div>
    </div>

    <script>
        const currentUser = JSON.parse(localStorage.getItem('currentUser'));
        if (!currentUser || currentUser.userType !== 'admin') {
            window.location.href = "index.php";
        } else {
            const displayName = currentUser.fullName ? currentUser.fullName : currentUser.username;
            document.getElementById('userBadge').innerText = `Logged in: ${displayName} (ADMIN)`;
        }

        let currentAdminTab = 'home';

        function switchAdminTab(tab) {
            currentAdminTab = tab;
            
            document.querySelectorAll('.sidebar-btn').forEach(btn => btn.classList.remove('active'));
            document.getElementById(`nav${tab.charAt(0).toUpperCase() + tab.slice(1)}`).classList.add('active');

            const welcomeHeading = document.getElementById('welcomeHeading');
            const welcomeSub = document.getElementById('welcomeSub');
            const tableTitle = document.getElementById('tableTitle');

            const itemsSection = document.getElementById('itemsSection');
            const accountsSection = document.getElementById('accountsSection');
            const metricsGrid = document.getElementById('metricsGrid');

            if (tab === 'accounts') {
                itemsSection.classList.add('hidden');
                metricsGrid.classList.add('hidden');
                accountsSection.classList.remove('hidden');

                welcomeHeading.innerText = `Account Management`;
                welcomeSub.innerText = `View and manage registered student and staff accounts.`;
                renderAccountsTable();
            } else {
                accountsSection.classList.add('hidden');
                itemsSection.classList.remove('hidden');
                metricsGrid.classList.remove('hidden');

                if (tab === 'home') {
                    welcomeHeading.innerText = `Admin Dashboard Overview`;
                    welcomeSub.innerText = `Manage campus records and verify user claims.`;
                    tableTitle.innerText = `Recent Reported Items`;
                } else if (tab === 'lost') {
                    welcomeHeading.innerText = `Lost Items Directory`;
                    welcomeSub.innerText = `Review all active lost item reports submitted by users.`;
                    tableTitle.innerText = `All Lost Items`;
                } else if (tab === 'found') {
                    welcomeHeading.innerText = `Found Items Directory`;
                    welcomeSub.innerText = `Review found items awaiting claims or verification.`;
                    tableTitle.innerText = `All Found Items`;
                } else if (tab === 'claimed') {
                    welcomeHeading.innerText = `Claimed & Resolved Items`;
                    welcomeSub.innerText = `Review successfully claimed, returned, or resolved reports.`;
                    tableTitle.innerText = `All Claimed / Resolved Items`;
                }

                renderAdminTable();
            }
        }

        function logout() {
            localStorage.removeItem('currentUser');
            window.location.href = "index.php";
        }

        function showAlert(msg, isError = false, elementId = 'adminAlert') {
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

        function getStoredItems() {
            return JSON.parse(localStorage.getItem('systemItems')) || [];
        }

        function getRegisteredUsers() {
            return JSON.parse(localStorage.getItem('registeredUsers')) || [];
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
                <div class="detail-row"><strong>Category:</strong> ${item.category || 'N/A'}</div>
                <div class="detail-row"><strong>Location:</strong> ${item.location}</div>
                <div class="detail-row"><strong>Date:</strong> ${item.date || 'N/A'} / <strong>Year:</strong> ${item.year || 'N/A'}</div>
                <div class="detail-row"><strong>Time:</strong> ${item.time || 'N/A'}</div>
                <div class="detail-row"><strong>Status:</strong> ${item.status}</div>
                <div class="detail-row"><strong>Claim Proof:</strong> <span style="font-style:italic; color:#f1c40f;">${item.claimProof || 'None provided'}</span></div>
                <div class="detail-row"><strong>Description:</strong> ${item.desc || 'No description provided.'}</div>
                <div class="detail-row" style="margin-top:15px;">
                    <strong>Photo Attachment:</strong><br>
                    ${item.photo ? `<img src="${item.photo}" style="max-width:100%; max-height:220px; border-radius:8px; margin-top:8px; border:1px solid rgba(0,198,255,0.3);" alt="Item Photo">` : '<span style="color:#8892b0; font-style:italic;">No photo attached</span>'}
                </div>
            `;

            document.getElementById('viewModal').style.display = 'flex';
        }

        function closeViewModal() {
            document.getElementById('viewModal').style.display = 'none';
        }

        function approveClaim(itemId) {
            const items = getStoredItems();
            const item = items.find(i => i.id === itemId);
            if (item) {
                item.status = "Claim Approved / Resolved";
                localStorage.setItem('systemItems', JSON.stringify(items));
                showAlert("Claim successfully approved!");
                renderAdminTable();
            }
        }

        function markResolved(itemId) {
            const items = getStoredItems();
            const item = items.find(i => i.id === itemId);
            if (item) {
                item.status = "Resolved";
                localStorage.setItem('systemItems', JSON.stringify(items));
                showAlert("Item marked as resolved.");
                renderAdminTable();
            }
        }

        function deleteItem(itemId) {
            if (confirm("Are you sure you want to delete this report?")) {
                let items = getStoredItems();
                items = items.filter(i => i.id !== itemId);
                localStorage.setItem('systemItems', JSON.stringify(items));
                showAlert("Item report deleted successfully.");
                renderAdminTable();
            }
        }

        function deleteUser(username) {
            if (confirm(`Are you sure you want to delete the user account: ${username}?`)) {
                let users = getRegisteredUsers();
                users = users.filter(u => u.username !== username);
                localStorage.setItem('registeredUsers', JSON.stringify(users));
                showAlert("User account removed successfully.", false, 'accountAlert');
                renderAccountsTable();
            }
        }

        function renderAdminTable() {
            const items = getStoredItems();
            updateMetrics(items);

            const tbody = document.getElementById('adminTableBody');
            const keyword = document.getElementById('searchKeyword').value.toLowerCase();
            const category = document.getElementById('filterCategory').value;

            tbody.innerHTML = '';

            const filtered = items.filter(item => {
                if (currentAdminTab === 'lost' && item.type !== 'lost') return false;
                if (currentAdminTab === 'found' && item.type !== 'found') return false;
                if (currentAdminTab === 'claimed' && !isItemClaimedOrResolved(item)) return false;

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
                tbody.innerHTML = `<tr><td colspan="12" style="text-align:center; padding:20px; color:#8892b0;">No records found matching your filters.</td></tr>`;
                return;
            }

            filtered.forEach(item => {
                const posterName = item.postedByRealName || item.reportedBy || 'Unknown User';
                const phoneVal = item.phone || 'N/A';
                const displayDate = item.date || 'N/A';
                const displayTime = item.time || 'N/A';
                const displayYear = item.year || new Date().getFullYear();
                const proofText = item.claimProof ? item.claimProof : '-';

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><span class="tag ${item.type === 'lost' ? 'tag-lost' : 'tag-found'}">${item.type}</span></td>
                    <td><strong style="color: #ffffff;">${posterName}</strong></td>
                    <td>${phoneVal}</td>
                    <td><strong style="color:#00c6ff;">${item.name}</strong></td>
                    <td>${item.category || 'N/A'}</td>
                    <td>${item.location}</td>
                    <td>${displayDate}</td>
                    <td>${displayTime}</td>
                    <td>${displayYear}</td>
                    <td><span style="color: #00c6ff; font-size: 12px;">${item.status}</span></td>
                    <td style="font-style: italic; color: #a0aec0;">${proofText}</td>
                    <td>
                        <button class="view-btn" onclick="viewItemDetails(${item.id})">View</button>
                        ${item.status === 'Pending Claim Verification' ? 
                            `<button class="approve-btn" onclick="approveClaim(${item.id})">Approve</button>` : ''}
                        <button class="resolve-btn" onclick="markResolved(${item.id})">Resolve</button>
                        <button class="delete-btn" onclick="deleteItem(${item.id})">Delete</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        function renderAccountsTable() {
            const users = getRegisteredUsers();
            const tbody = document.getElementById('accountsTableBody');
            const keyword = document.getElementById('searchAccountKeyword').value.toLowerCase();

            tbody.innerHTML = '';

            const filtered = users.filter(user => {
                if (user.userType === 'admin') return false;
                const fullName = user.fullName || '';
                const username = user.username || '';
                return fullName.toLowerCase().includes(keyword) || username.toLowerCase().includes(keyword);
            });

            if (filtered.length === 0) {
                tbody.innerHTML = `<tr><td colspan="4" style="text-align:center; padding:20px; color:#8892b0;">No registered student or staff accounts found.</td></tr>`;
                return;
            }

            filtered.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><strong style="color: #ffffff;">${user.fullName || 'N/A'}</strong></td>
                    <td><strong style="color: #00c6ff;">${user.username}</strong></td>
                    <td><span class="tag tag-role">${(user.userType || 'student').toUpperCase()}</span></td>
                    <td>
                        <button class="delete-btn" onclick="deleteUser('${user.username}')">Delete User</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        renderAdminTable();
    </script>
</body>
</html>