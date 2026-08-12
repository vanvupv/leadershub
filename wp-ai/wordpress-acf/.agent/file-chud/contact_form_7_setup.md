# Cấu hình biểu mẫu "Tin nhắn trực tuyến" trong Contact Form 7

Tài liệu này lưu trữ mã nguồn HTML biểu mẫu (Form) và cấu hình gửi Email (Mail) chuẩn cho trang **Liên hệ** theo đúng giao diện mẫu.

---

## 1. Mã nguồn Form trong Contact Form 7 (Form Template)

Sao chép toàn bộ đoạn mã bên dưới và dán vào ô nhập liệu **Nội dung Form** của Contact Form 7:

```html
<div class="commen">
	<div class="bt bta aos-init aos-animate" data-aos="fade-up">
		<p>TIN NHẮN TRỰC TUYẾN</p>
		<span></span>
	</div>
	<div class="lxyea">
		<div class="lxyea_left fl">
			[text* message-name class:input1 placeholder "Tên của bạn*"]
			[text message-phone class:input1 placeholder "Điện thoại"]
			[select* message-subject class:input1 first_as_label "Chủ đề*" "Thông tin yêu cầu|Inquiries" "Hỗ trợ kỹ thuật|Technical Support"]
		</div>
		<div class="lxyea_right fr">
			[text message-company class:input1 placeholder "Tên công ty"]
			[email* message-email class:input1 placeholder "E-mail*"]
			[select message-country class:input1 first_as_label "Vui lòng chọn khu vực" "Vietnam" "China" "Pakistan" "Mexico"]
		</div>
		
		<div class="clearfix"></div>
		
		<div class="lxyea_a">
			<p>Chú ý*</p>
			[textarea* message-remarks id:message_remarks]
		</div>
		
		<!-- Khối chân trang bằng Flexbox chứa Captcha và Nút bấm -->
		<div class="lxyea_bottom">
			<div class="lxyea_b">
				<div class="lxyea_captcha_row">
					<p>*Nhập mã xác thực:</p>
					[captchar captcha-msg class:lxyea_ba placeholder "Mã xác thực*"]
					[captchac captcha-msg size:l class:msg_captcha]
				</div>
				[acceptance acceptance-policy default:on class:lxyea_bb] I accept the Growatt <a href="/privacy-policy">Privacy Policy</a> and I accept the terms [/acceptance]
			</div>
			
			<div class="lxyea_c">
				<input type="reset" value="Đặt lại" id="message_reset">
				<div class="lxyea_submit_wrapper">
					[submit class:lxyea_ca "Đệ trình"]
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
```

*Lưu ý về mã xác thực*: 
- Phần mã xác thực sử dụng thẻ `[captchac]` và `[captchar]` của plugin **Really Simple CAPTCHA** (plugin đồng hành chính thức của Contact Form 7). Hãy cài đặt plugin này để hiển thị mã hình ảnh captcha.
- Nếu không muốn dùng captcha hình ảnh, bạn có thể thay thế dòng mã xác thực bằng thẻ Quiz tích hợp sẵn của CF7:
  `[quiz quiz-msg class:lxyea_ba placeholder "Mã xác thực*" "1 + 1 bằng mấy?|2" "5 - 2 bằng mấy?|3"]`

---

## 2. Thiết lập cấu hình Mail gửi đi (Mail Settings)

Điền các thông tin sau vào tab **Cấu hình Mail** trong trang quản trị của Contact Form 7:

* **To (Nhận thư tới)**:
  `[_site_admin_email]` *(Mặc định gửi về email quản trị viên của website)*

* **From (Người gửi)**:
  `Growatt Contact Form <wordpress@demo500.demoweb360.top>`
  *(Để tránh lỗi spam mail, địa chỉ này phải sử dụng đuôi tên miền của bạn)*

* **Subject (Tiêu đề)**:
  `Growatt Contact: [message-subject] - từ [message-name]`

* **Additional Headers (Thông tin bổ sung)**:
  `Reply-To: [message-email]`

* **Message Body (Nội dung thư)**:
  ```text
  Có tin nhắn trực tuyến mới gửi từ trang Liên hệ của Website Growatt:

  - Họ và tên: [message-name]
  - Tên công ty: [message-company]
  - Số điện thoại: [message-phone]
  - Email liên hệ: [message-email]
  - Chủ đề yêu cầu: [message-subject]
  - Quốc gia/Khu vực: [message-country]

  Nội dung thông điệp chi tiết:
  --------------------------------------------------
  [message-remarks]
  --------------------------------------------------

  --
  Thư này được gửi tự động từ biểu mẫu Liên hệ trên trang web Growatt Việt Nam.
  ```
