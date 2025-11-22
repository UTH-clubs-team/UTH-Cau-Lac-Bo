    </main>

    <!-- Notification -->
    <div id="notification" class="notification"></div>

    <style>
        /* Footer Styles */
        .site-footer {
            background: linear-gradient(135deg, #008B8B 0%, #006B6B 100%);
            color: #ffffff;
            padding: 40px 0 0;
            margin-top: 60px;
            box-shadow: 0 -4px 15px rgba(0,0,0,0.1);
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .footer-col {
            flex: 1;
        }

        .footer-contact-left {
            flex: 2;
        }

        .footer-univ {
            color: #FF8C00;
            font-size: 1.3em;
            font-weight: bold;
            margin: 0 0 20px 0;
            line-height: 1.4;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-list li {
            margin-bottom: 10px;
            font-size: 0.95em;
            line-height: 1.6;
        }

        .contact-list a {
            color: #FFD700;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .contact-list a:hover {
            color: #FFA500;
            text-decoration: underline;
        }

        .footer-empty {
            min-height: 100px;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            font-size: 0.9em;
        }

        .footer-bottom-left {
            color: rgba(255,255,255,0.9);
        }

        .footer-bottom-right a {
            color: #FFD700;
            text-decoration: none;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        .footer-bottom-right a:hover {
            color: #FFA500;
        }

        /* Notification Styles */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            display: none;
            min-width: 250px;
            animation: slideIn 0.3s ease-out;
        }

        .notification.show {
            display: block;
        }

        .notification.success {
            border-left: 4px solid #28a745;
            color: #155724;
        }

        .notification.error {
            border-left: 4px solid #dc3545;
            color: #721c24;
        }

        .notification.info {
            border-left: 4px solid #17a2b8;
            color: #0c5460;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-inner {
                flex-direction: column;
            }

            .footer-univ {
                font-size: 1.1em;
            }

            .contact-list li {
                font-size: 0.9em;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .notification {
                right: 10px;
                left: 10px;
                min-width: auto;
            }
        }
    </style>

    <footer class="site-footer footer-teal">
        <div class="footer-inner container">
            <div class="footer-col footer-contact-left">
                <h3 class="footer-univ">TRƯỜNG ĐẠI HỌC GIAO THÔNG VẬN TẢI<br>THÀNH PHỐ HỒ CHÍ MINH</h3>
                <ul class="contact-list">
                    <li>📍 Cơ sở 1: số 2, đường Võ Oanh, P. Thạnh Mỹ Tây, TP. HCM</li>
                    <li>📍 Cơ sở 2: số 10 đường số 12, P. An Khánh, TP. HCM</li>
                    <li>📍 Cơ sở 3: số 70 đường Tô Ký, P. Trung Mỹ Tây, TP. HCM</li>
                    <li>📍 Cơ sở 4: số 17 đường 3 tháng 2, P. Phước Thắng, TP. HCM</li>
                    <li>📍 Cơ sở 5: xã Bình An, Đồng Nai</li>
                    <li>📞 Tuyển sinh: <a href="tel:+842835128986">028 3512 8986</a></li>
                    <li>📞 Phòng Đào tạo: <a href="tel:+842838992862">0283 8992862</a></li>
                    <li>📠 Văn thư: <a href="tel:+842838991373">028 3899 1373</a></li>
                    <li>✉️ Email: <a href="mailto:ut-hcmc@ut.edu.vn">ut-hcmc@ut.edu.vn</a></li>
                </ul>
            </div>
            <div class="footer-col footer-empty">
                <!-- Intentionally minimal to match the example image; add logo or quick links here if needed -->
            </div>
        </div>

        <div class="footer-bottom container">
            <div class="footer-bottom-left">&copy; <?php echo date('Y'); ?> UTH Clubs - Đại học Giao thông Vận tải TP. HCM</div>
            <div class="footer-bottom-right"><a href="#">Chính sách bảo mật</a> · <a href="#">Điều khoản</a></div>
        </div>
    </footer>

    <script src="assets/js/auth.js"></script>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>