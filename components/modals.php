<!-- Login Modal -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('loginModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Đăng nhập</h2>
        <form onsubmit="handleLogin(event)">
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" id="loginEmail" placeholder="example@ut.edu.vn" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mật khẩu</label>
                <input type="password" class="form-input" id="loginPassword" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Đăng nhập</button>
        </form>
    </div>
</div>

<!-- Register Modal -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('registerModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Đăng ký</h2>
        <form onsubmit="handleRegister(event)">
            <div class="form-group">
                <label class="form-label">Họ và tên</label>
                <input type="text" class="form-input" id="registerName" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" id="registerEmail" placeholder="example@ut.edu.vn" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mã sinh viên</label>
                <input type="text" class="form-input" id="registerStudentId" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mật khẩu</label>
                <input type="password" class="form-input" id="registerPassword" required>
            </div>
            <div class="form-group">
                <label class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-input" id="registerConfirmPassword" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Đăng ký</button>
        </form>
    </div>
</div>

<!-- Event Registration Modal -->
<div id="eventRegisterModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('eventRegisterModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Đăng ký sự kiện</h2>
        <div id="eventRegisterContent">
            <p>Vui lòng đăng nhập để đăng ký sự kiện.</p>
            <button class="btn btn-primary" onclick="showLoginModal()">Đăng nhập</button>
        </div>
    </div>
</div>

<!-- Add Club Modal -->
<div id="addClubModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('addClubModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Thêm câu lạc bộ mới</h2>
        <form onsubmit="handleAddClub(event)">
            <div class="form-group">
                <label class="form-label">Tên câu lạc bộ</label>
                <input type="text" class="form-input" id="clubName" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mô tả</label>
                <textarea class="form-input" id="clubDescription" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Thể loại</label>
                <input type="text" class="form-input" id="clubCategoryInput" placeholder="Nhập thể loại" required>
            </div>
            <div class="form-group">
                <label class="form-label">Trưởng nhóm</label>
                <select class="form-input" id="clubLeader">
                    <option value="">Chọn trưởng nhóm (Tùy chọn)</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Lịch họp</label>
                <input type="text" class="form-input" id="clubSchedule" placeholder="ví dụ: Mỗi thứ Hai lúc 6 giờ tối">
            </div>
            <div class="form-group">
                <label class="form-label">Hoạt động (phân tách bằng dấu phẩy)</label>
                <input type="text" class="form-input" id="clubActivitiesInput" placeholder="ví dụ: Hội thảo, Hướng dẫn, Cuộc thi">
            </div>
            <div class="form-group">
                <label class="form-label">Hình ảnh câu lạc bộ</label>
                <input type="file" class="form-input" id="clubImageInput" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Thêm câu lạc bộ</button>
        </form>
    </div>
</div>

<!-- Add Member Modal -->

<!-- Image Modal -->
<div id="imageModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('imageModal')">&times;</button>
        <div style="text-align:center;">
            <img id="modalImage" src="" alt="" style="max-width:100%; max-height:80vh; border-radius:6px;">
            <div id="modalImageCaption" style="margin-top:0.5rem; color:#6b7280;"></div>
        </div>
    </div>
</div>
<div id="addMemberModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('addMemberModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Thêm thành viên mới</h2>
        <form onsubmit="handleAddMember(event)">
            <div class="form-group">
                <label class="form-label">Họ và tên</label>
                <input type="text" class="form-input" id="memberName" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mã sinh viên</label>
                <input type="text" class="form-input" id="memberStudentId" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" id="memberEmail" required>
            </div>
            <div class="form-group">
                <label class="form-label">Khoa</label>
                <select class="form-input" id="memberDepartment" required>
                    <option value="">Chọn khoa</option>
                    <option value="Computer Science">Khoa học máy tính</option>
                    <option value="Software Engineering">Kỹ thuật phần mềm</option>
                    <option value="Information Technology">Công nghệ thông tin</option>
                    <option value="Data Science">Khoa học dữ liệu</option>
                    <option value="Cybersecurity">An ninh mạng</option>
                    <option value="Business Administration">Quản trị kinh doanh</option>
                    <option value="Mechanical Engineering">Kỹ thuật cơ khí</option>
                    <option value="Civil Engineering">Kỹ thuật xây dựng</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Năm học</label>
                <select class="form-input" id="memberYear" required>
                    <option value="">Chọn năm học</option>
                    <option value="1st Year">Năm nhất</option>
                    <option value="2nd Year">Năm hai</option>
                    <option value="3rd Year">Năm ba</option>
                    <option value="4th Year">Năm tư</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Số điện thoại</label>
                <input type="tel" class="form-input" id="memberPhone">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Thêm thành viên</button>
        </form>
    </div>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('addUserModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Thêm người dùng</h2>
        <form id="addUserForm" onsubmit="handleAddUser(event)">
            <div class="form-group">
                <label class="form-label">Tên</label>
                <input type="text" class="form-input" id="userName" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" id="userEmail" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mã sinh viên</label>
                <input type="text" class="form-input" id="userStudentId">
            </div>
            <div class="form-group">
                <label class="form-label">Vai trò</label>
                <select class="form-input" id="userRole">
                    <option value="student">Sinh viên</option>
                    <option value="admin">Quản trị viên</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Mật khẩu</label>
                <input type="password" class="form-input" id="userPassword" placeholder="Mặc định 123456 nếu để trống">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Thêm</button>
        </form>
    </div>
</div>

<!-- Add Event Modal -->
<div id="addEventModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('addEventModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Thêm sự kiện mới</h2>
        <form onsubmit="handleAddEvent(event)">
            <div class="form-group">
                <label class="form-label">Tên sự kiện</label>
                <input type="text" class="form-input" id="eventName" required>
            </div>
            <div class="form-group">
                <label class="form-label">Câu lạc bộ</label>
                <select class="form-input" id="addEventClub" required>
                    <option value="">Chọn câu lạc bộ</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Ngày & Giờ</label>
                <input type="datetime-local" class="form-input" id="eventDate" required>
            </div>
            <div class="form-group">
                <label class="form-label">Địa điểm</label>
                <input type="text" class="form-input" id="eventLocation" required>
            </div>
            <div class="form-group">
                <label class="form-label">Số lượng tối đa</label>
                <input type="number" class="form-input" id="eventMaxParticipants" min="1" value="50">
            </div>
            <div class="form-group">
                <label class="form-label">Mô tả</label>
                <textarea class="form-input" id="eventDescription" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Ảnh sự kiện</label>
                <input type="file" class="form-input" id="eventImageInput" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Thêm sự kiện</button>
        </form>
    </div>
</div>

<!-- Edit User Modal -->
<div id="editUserModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('editUserModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Chỉnh sửa người dùng</h2>
        <form onsubmit="handleEditUser(event)">
            <input type="hidden" id="editUserId">
            <div class="form-group">
                <label class="form-label">Tên</label>
                <input type="text" class="form-input" id="editUserName" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" id="editUserEmail" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mã sinh viên</label>
                <input type="text" class="form-input" id="editUserStudentId">
            </div>
            <div class="form-group">
                <label class="form-label">Vai trò</label>
                <select class="form-input" id="editUserRole">
                    <option value="student">Sinh viên</option>
                    <option value="admin">Quản trị viên</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Cập nhật người dùng</button>
        </form>
    </div>
</div>

<!-- Edit Club Modal -->
<div id="editClubModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('editClubModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Chỉnh sửa câu lạc bộ</h2>
        <form onsubmit="handleEditClub(event)">
            <input type="hidden" id="editClubId">
            <div class="form-group">
                <label class="form-label">Tên câu lạc bộ</label>
                <input type="text" class="form-input" id="editClubName" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mô tả</label>
                <textarea class="form-input" id="editClubDescription" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Danh mục</label>
                <input type="text" class="form-input" id="editClubCategoryInput" placeholder="Nhập danh mục" required>
            </div>
            <div class="form-group">
                <label class="form-label">Trưởng câu lạc bộ</label>
                <select class="form-input" id="editClubLeader">
                    <option value="">Chọn trưởng câu lạc bộ (Tùy chọn)</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Lịch họp</label>
                <input type="text" class="form-input" id="editClubSchedule" placeholder="Ví dụ: Mỗi thứ Hai lúc 6 giờ tối">
            </div>
            <div class="form-group">
                <label class="form-label">Hoạt động (phân tách bằng dấu phẩy)</label>
                <input type="text" class="form-input" id="editClubActivitiesInput" placeholder="Ví dụ: Hội thảo, Hướng dẫn, Cuộc thi">
            </div>
            <div class="form-group">
                <label class="form-label">Ảnh câu lạc bộ</label>
                <input type="file" class="form-input" id="editClubImageInput" accept="image/*">
                <div id="editClubImagePreview" style="margin-top: .5rem;"></div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Cập nhật câu lạc bộ</button>
        </form>
    </div>
</div>

<!-- Edit Event Modal -->
<div id="editEventModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('editEventModal')">&times;</button>
        <h2 style="margin-bottom: 1.5rem;">Chỉnh sửa sự kiện</h2>
        <form onsubmit="handleEditEvent(event)">
            <input type="hidden" id="editEventId">
            <div class="form-group">
                <label class="form-label">Tên sự kiện</label>
                <input type="text" class="form-input" id="editEventName" required>
            </div>
            <div class="form-group">
                <label class="form-label">Câu lạc bộ</label>
                <select class="form-input" id="editEventClub" required>
                    <option value="">Chọn câu lạc bộ</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Ngày & Giờ</label>
                <input type="datetime-local" class="form-input" id="editEventDate" required>
            </div>
            <div class="form-group">
                <label class="form-label">Địa điểm</label>
                <input type="text" class="form-input" id="editEventLocation" required>
            </div>
            <div class="form-group">
                <label class="form-label">Số lượng tối đa người tham gia</label>
                <input type="number" class="form-input" id="editEventMaxParticipants" min="1">
            </div>
            <div class="form-group">
                <label class="form-label">Mô tả</label>
                <textarea class="form-input" id="editEventDescription" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Ảnh sự kiện</label>
                <input type="file" class="form-input" id="editEventImageInput" accept="image/*">
                <div id="editEventImagePreview" style="margin-top: .5rem;"></div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Cập nhật sự kiện</button>
        </form>
    </div>
</div>

