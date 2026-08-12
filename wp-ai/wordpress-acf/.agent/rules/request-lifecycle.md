---
trigger: always_on
---

# Vòng đời Xử lý Request trong WordPress (Request Lifecycle)

Tài liệu này mô tả chi tiết luồng xử lý kỹ thuật của WordPress khi tiếp nhận một request từ Client, phối hợp với ACF và render template an toàn ra màn hình.

---

## Sơ đồ tuần tự Request Lifecycle & ACF

```mermaid
sequenceDiagram
    autonumber
    actor Client as Client (Trình duyệt)
    participant WP as WordPress Core
    participant DB as Database
    participant Template as single-portfolio.php / template.php
    participant ACF as ACF Plugin API
    participant Assets as functions.php (Enqueue)

    Client->>WP: 1. Gửi Request (Ví dụ: /portfolio/seo-overhaul)
    WP->>WP: 2. Phân tích URL & Routing (Template Hierarchy)
    WP->>DB: 3. Thực hiện Main Query lấy thông tin bài viết
    DB-->>WP: 4. Trả về Post Object & Post Meta gốc
    WP->>Template: 5. Nạp file template phù hợp (e.g., single-portfolio.php)
    
    rect rgb(240, 240, 240)
        note over Template, ACF: Giai đoạn nạp dữ liệu động (ACF)
        Template->>ACF: 6. Gọi get_field('portfolio_sections')
        ACF->>DB: 7. Truy vấn dữ liệu ACF meta fields của bài viết
        DB-->>ACF: 8. Trả về giá trị meta fields
        ACF-->>Template: 9. Trả về mảng dữ liệu (hoặc null nếu trống)
        Template->>Template: 10. Áp dụng mảng Fallback mặc định nếu dữ liệu null
    end

    rect rgb(230, 245, 230)
        note over Template, Assets: Giai đoạn nạp Stylesheet & Script
        Template->>Assets: 11. Thực thi hook wp_enqueue_scripts
        Assets->>Assets: 12. Kiểm tra is_singular('portfolio') hoặc is_page_template()
        Assets-->>Template: 13. Nạp stylesheet riêng chi-tiet-portfolio.css & script JS thuần
    end

    Template->>Template: 14. Render HTML và áp dụng các hàm Escaping (esc_html, wp_kses_post...)
    Template-->>Client: 15. Trả về HTML hoàn chỉnh cho Trình duyệt
```

---

## Chi tiết các bước xử lý
1. **Routing**: WordPress Router phân tích request dựa trên quy tắc cấu hình permalink và xác định loại trang (Single Post, Page, Archive, v.v.).
2. **Main Query**: WordPress tự động chạy truy vấn mặc định để lấy dữ liệu bài viết tương ứng với URL trước khi gọi tệp template.
3. **Template Loading**: WordPress nạp file template PHP theo mức độ ưu tiên của Template Hierarchy (ví dụ: `single-portfolio.php` sẽ được chọn trước `single.php` đối với bài viết thuộc post type `portfolio`).
4. **ACF Integration**: Ở đầu template PHP, ACF API truy vấn các meta field riêng lẻ và trả về dữ liệu. Nếu admin chưa nhập dữ liệu, logic PHP sử dụng toán tử null coalescing (`?:`) để gán dữ liệu demo fallback.
5. **Enqueue assets**: Theme đăng ký tải CSS/JS riêng của trang bằng hook `wp_enqueue_scripts` trong file `functions.php` dựa trên template đang hoạt động để tối ưu hiệu năng tải trang.
6. **Escaped Rendering & Response**: Dữ liệu PHP được lọc qua các hàm escape trước khi in ra HTML và gửi về cho browser để đảm bảo tính an toàn chống lỗi XSS.