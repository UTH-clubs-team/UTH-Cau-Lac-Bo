<?php
// Mock data for frontend development
$upcoming = [
    [
        'id' => 1,
        'name' => 'Workshop Lập Trình Web',
        'date' => '2025-11-01',
        'location' => 'Phòng 301, Tòa nhà A',
        'max_participants' => 30,
        'seats_left' => 15,
        'is_registered' => 0,
        'event_image' => 'uploads/events/coding-workshop.jpg',
        'club_name' => 'CLB Lập Trình'
    ],
    [
        'id' => 2,
        'name' => 'Cuộc Thi Âm Nhạc',
        'date' => '2025-11-15',
        'location' => 'Hội Trường',
        'max_participants' => 50,
        'seats_left' => 20,
        'is_registered' => 0,
        'event_image' => '',
        'club_name' => 'CLB Âm Nhạc'
    ]
];

$featuredClubs = [
    [
        'id' => 1,
        'name' => 'CLB Lập Trình',
        'description' => 'Câu lạc bộ dành cho những sinh viên đam mê lập trình và công nghệ.',
    'category' => 'Công nghệ',
        'schedule_meeting' => 'Thứ 7 hàng tuần',
        'member_count' => 45,
        'leader_name' => 'Nguyễn Văn A'
    ],
    [
        'id' => 2,
        'name' => 'CLB Âm Nhạc',
        'description' => 'Nơi giao lưu và phát triển tài năng âm nhạc.',
    'category' => 'Nghệ thuật',
        'schedule_meeting' => 'Chủ nhật hàng tuần',
        'member_count' => 30,
        'leader_name' => 'Trần Thị B'
    ]
];

// Mock session data
$_SESSION['user_id'] = 1;
$_SESSION['user_name'] = 'Test User';
?>