<!-- Dashboard Section (Admin/Student) -->
<div id="dashboard" class="section">
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 2rem; color: #1f2937;">Bảng Điều Khiển</h1>
        
        <!-- Admin Dashboard -->
        <div id="adminDashboard" style="display: none;">
            <div class="stats-grid" id="adminStats"></div>

            <div style="display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap;">
                <button class="btn btn-primary" onclick="showAdminSection('users')">Quản lý Người dùng</button>
                <button class="btn btn-primary" onclick="showAdminSection('clubs')">Quản lý CLB</button>
                <button class="btn btn-primary" onclick="showAdminSection('events')">Quản lý Sự kiện</button>
                <button class="btn btn-primary" onclick="showAdminSection('requests')">Yêu cầu Tham gia</button>
            </div>

            <!-- Admin Users Management -->
            <div id="adminUsers" class="admin-section" style="display: none;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2>Quản lý Người dùng</h2>
                    <button class="btn btn-success" onclick="showAddUserModal()">Thêm Người dùng</button>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Mã SV</th>
                                <th>Vai trò</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- Admin Clubs Management -->
            <div id="adminClubs" class="admin-section" style="display: none;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2>Quản lý Câu Lạc Bộ</h2>
                    <button class="btn btn-success" onclick="showAddClubModal()">Thêm CLB mới</button>
                </div>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Tên CLB</th>
                                <th>Trưởng CLB</th>
                                <th>Số thành viên</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="clubsTableBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- Admin Events Management -->
            <div id="adminEvents" class="admin-section" style="display: none;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2>Quản lý Sự kiện</h2>
                    <button class="btn btn-success" onclick="showAddEventModal()">Thêm Sự kiện mới</button>
                </div>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Tên Sự kiện</th>
                                <th>CLB</th>
                                <th>Ngày</th>
                                <th>Địa điểm</th>
                                <th>Lượt đăng ký</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="eventsTableBody"></tbody>
                    </table>
                </div>
            </div>



            <!-- Admin Join Requests -->
            <div id="adminRequests" class="admin-section" style="display: none;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2>Yêu cầu Tham gia Câu Lạc Bộ</h2>
                </div>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Tên sinh viên</th>
                                <th>CLB</th>
                                <th>Ngày yêu cầu</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="requestsTableBody"></tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>