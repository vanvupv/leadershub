# Quy tắc JavaScript & Tương tác (Interactions)

Tài liệu này định nghĩa các nguyên tắc phát triển JavaScript tương tác, đảm bảo hiệu năng tối ưu bằng cách sử dụng JS thuần (Vanilla JS) thay vì các thư viện React/Next.js cồng kềnh.

---

## 1. Sử dụng JavaScript thuần (Vanilla JS)
* **Nguyên tắc**: Không bê nguyên các file JS bundle khổng lồ của Next.js hay React từ bản HTML gốc sang theme WordPress.
* **Yêu cầu**: Chỉ trích xuất và triển khai lại các hiệu ứng tương tác cần thiết (như menu đóng mở, tabs, slides, hoặc hoạt họa scroll reveal) bằng mã nguồn JavaScript thuần viết trong thẻ đóng tự chạy (IIFE) để tránh xung đột biến toàn cục:
  ```javascript
  (function() {
      // Code tương tác JS thuần ở đây
  })();
  ```

---

## 2. Quy tắc Menu di động (Mobile Menu)
* **Vị trí và Bố cục**:
  * Khi mở rộng, menu di động phải hiển thị thả xuống ngay sát dưới mép Header (`position: absolute; top: 100%; left: 0; width: 100%;`).
  * Sử dụng một lớp màn phủ nền mờ (Backdrop Overlay - ví dụ: `fixed inset-0 bg-black/40 z-30`) phía dưới Header (`z-50`) để che phủ nội dung trang và làm nổi bật menu.
* **Tương tác**:
  * Tự động thay đổi biểu tượng (icon) của nút hamburger từ menu (ba gạch) sang đóng (`X`) khi menu đang mở và ngược lại.
  * Tự động đóng menu khi nhấp vào màn phủ nền (overlay), nhấp ra ngoài khu vực menu hoặc nhấp vào bất kỳ liên kết neo (`#`) nào trên menu.

---

## 3. Hoạt họa cuộn trang (Scroll Reveal Animations)
* **IntersectionObserver**: Sử dụng API IntersectionObserver tích hợp sẵn trong trình duyệt để phát hiện khi các phần tử đi vào khung nhìn (viewport) của người dùng:
  ```javascript
  const revealElements = document.querySelectorAll('.reveal-fade, .reveal-slide-up');
  if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
                  entry.target.classList.add('reveal-active');
                  observer.unobserve(entry.target); // Ngừng quan sát sau khi đã hiển thị
              }
          });
      }, { threshold: 0.1 });
      revealElements.forEach(el => observer.observe(el));
  }
  ```
* **Fallback**: Nếu trình duyệt không hỗ trợ IntersectionObserver, tự động gán thêm class `reveal-active` cho tất cả các phần tử để đảm bảo nội dung luôn hiển thị đầy đủ cho người dùng.
