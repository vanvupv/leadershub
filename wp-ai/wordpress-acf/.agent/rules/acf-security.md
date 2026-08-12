---
trigger: always_on
---

# Quy tắc PHP Template & Bảo mật

Tài liệu này định nghĩa các quy tắc lập trình PHP trong file template WordPress, cơ chế nhận dữ liệu ACF và tiêu chuẩn bảo mật dữ liệu đầu ra để phòng chống các lỗ hổng bảo mật như Cross-Site Scripting (XSS).

---

## 1. Cơ chế Nhận dữ liệu ACF (Data Fetching)
* **Khai báo đầu tệp**: Toàn bộ biến nhận dữ liệu động từ hàm `get_field()` hoặc `get_sub_field()` của ACF phải được gom khai báo ở phần đầu của file template PHP. Điều này giúp mã nguồn rõ ràng, dễ bảo trì và tách biệt giữa logic nhận dữ liệu và logic hiển thị HTML.
* **Cơ chế Fallback (Dự phòng)**: Bắt buộc phải thiết lập giá trị dự phòng rỗng an toàn (chuỗi rỗng `?: ''` hoặc mảng rỗng `?: array()`) thay vì dữ liệu tĩnh demo để tránh các cảnh báo lỗi trên PHP 8.1+ khi truyền giá trị `null` vào các hàm xử lý chuỗi hệ thống:
  ```php
  $portfolio_back_url = get_field( 'portfolio_back_url' ) ?: '';
  ```

---

## 2. Bảo mật Dữ liệu đầu ra (Output Escaping)
* **Bắt buộc**: Toàn bộ các giá trị PHP khi kết xuất ra màn hình (trong thẻ HTML, thuộc tính HTML, đường dẫn...) bắt buộc phải được xử lý qua các hàm escaping chuẩn của WordPress để đảm bảo an toàn thông tin:
  * **`esc_html()`**: Dùng cho chuỗi văn bản thuần túy không chứa thẻ HTML (ví dụ: chữ tiêu đề thông thường, nhãn số liệu).
  * **`esc_url()`**: Dùng cho các đường dẫn liên kết (ví dụ: thuộc tính `href` của thẻ `a`, thuộc tính `src` của thẻ `img` hoặc thẻ `script`).
  * **`wp_kses_post()`**: Dùng cho các chuỗi văn bản được phép chứa mã HTML cơ bản (ví dụ: mô tả giàu văn bản, tiêu đề chứa thẻ `<br>` hoặc thẻ `span`).
  * **`esc_attr()`**: Dùng cho các thuộc tính HTML (ví dụ: thuộc tính `alt` của ảnh, thuộc tính `class`, thuộc tính `id`).
* **Ví dụ áp dụng**:
  ```php
  <a href="<?php echo esc_url( $back_url ); ?>" alt="<?php echo esc_attr( $link_alt ); ?>">
      <?php echo esc_html( $back_text ); ?>
  </a>
  ```

---

## 3. Quy tắc Navigation Menu & Dynamic Header (Sử dụng WordPress Menu Mặc định - Rule 1)
* **Nguyên tắc**: Tuyệt đối **không** viết cứng (hardcode) các liên kết điều hướng trực tiếp trong tệp `header.php`. Đồng thời, **bắt buộc sử dụng hệ thống Menu mặc định của WordPress** (thông qua vị trí menu `Primary` - `menu-1` và các hàm native như `wp_get_nav_menu_items()` hoặc `wp_nav_menu()`) để quản lý danh sách menu điều hướng, thay vì tự xây dựng các trường ACF Repeater để quản trị Header.
* **Triển khai**:
  * Đăng ký vị trí menu chính (`Primary`) bằng hàm `register_nav_menus()` trong tệp `functions.php`.
  * Trong tệp `header.php`, truy xuất danh sách các mục menu thuộc vị trí `menu-1` thông qua hàm `get_nav_menu_locations()` và `wp_get_nav_menu_items()`.
  * Viết mã dự phòng (fallback) để trả về mảng danh mục mặc định ban đầu bằng code PHP nếu quản trị viên chưa cấu hình hoặc chưa gán menu trong WP Admin.
* **Lý do**:
  1. **Tuân thủ Chuẩn WordPress (WordPress Core Standard)**: Cho phép quản trị viên sử dụng đúng công cụ quản lý menu mặc định của WordPress (Appearance > Menus) để quản lý cấu trúc, phân cấp (cha-con), và kéo thả menu. Hỗ trợ tốt hơn cho các plugin đa ngôn ngữ (WPML, Polylang) và các tính năng mặc định khác của WordPress Core.
  2. **Trải nghiệm nhất quán**: Giúp tách biệt rõ ràng: Header dùng Menu WordPress chuẩn, còn các cấu hình tĩnh/danh sách dùng chung toàn trang (như Footer) mới sử dụng ACF Options Page.
* **Nút bấm hành động (Dynamic Header CTA Button - Rule 1)**: Nút bấm hành động (CTA Button) trong Header tuyệt đối **không** viết cứng trực tiếp tiêu đề và đường dẫn trong tệp `header.php`. Bắt buộc phải sử dụng trường loại **Link** (`'type' => 'link'`, trả về dạng `array`) trong ACF (ví dụ: `header_cta_link`).
  * **Kiểm tra rỗng**: Bọc nút bấm bằng khối điều kiện kiểm tra rỗng `if ( ! empty($header_cta_url) && ! empty($header_cta_title) )` trước khi kết xuất, tuân thủ tuyệt đối Rule 1 (No Mock Data).
  * **Lưu ý loại bỏ mã tự động sửa đổi link neo (No Auto-Anchor Prepending)**: Tuyệt đối không viết thêm mã PHP để tự động ghép `home_url('/')` trước các link bắt đầu bằng dấu `#` (như `#booking`).
    * *Tác dụng của đoạn mã cũ*: Đoạn mã cũ tự động nối domain trang chủ trước dấu `#` nhằm giữ cho link neo luôn hoạt động đúng ngay cả khi truy cập từ các trang con (ví dụ: từ `/portfolio/` sẽ nhảy về `/homepage/#booking` thay vì `/portfolio/#booking`).
    * *Lý do loại bỏ*: Việc tự động can thiệp này làm phức tạp hóa code một cách không cần thiết và hạn chế tính linh hoạt. Khi cấu hình link, quản trị viên đã mặc định biết cách nhập đường dẫn mong muốn (họ có thể tự nhập `/` hoặc đường dẫn đầy đủ trước `#` trực tiếp trong ô nhập liệu của ACF Link). Việc giữ nguyên giá trị nhập giúp code PHP tối giản, minh bạch và hoàn toàn tôn trọng dữ liệu nhập từ Admin.

---

## 4. Quy tắc Dynamic Footer & ACF Global Options (Sử dụng ACF Options & Repeater cho Social Links)
* **Nguyên tắc**: Các thông tin dùng chung toàn trang nằm ở Footer (như văn bản giới thiệu ngắn, danh sách liên kết dịch vụ, danh sách liên kết công ty, mạng xã hội, link điều khoản...) tuyệt đối **không** viết cứng trực tiếp trong `footer.php`.
* **Ưu tiên sử dụng Tab (Prioritize Tabs - Rule 1)**: Để quản lý các trường cấu hình Footer hiệu quả, bắt buộc phải sử dụng trường loại **Tab** (`'type' => 'tab'`) để chia các trường thành 3 Tab chính:
  1. **Thông tin chung**: Chứa trường Mô tả Footer, Link Chính sách bảo mật, Link Điều khoản dịch vụ.
  2. **Cột Liên kết**: Chứa Repeater Liên kết Dịch vụ, Repeater Liên kết Công ty.
  3. **Mạng xã hội**: Chứa Repeater Mạng xã hội.
  Điều này giúp giao diện quản trị Option Page trực quan, gọn gàng và khoa học.
* **Triển khai**:
  * Đăng ký một trang cấu hình chung (ACF Options Page) thông qua hàm `acf_add_options_page()`.
  * Khai báo nhóm trường cấu hình Footer trong file `inc/acf-fields.php` với vị trí hiển thị trên trang cấu hình chung đó.
  * Trong tệp `footer.php`, kéo dữ liệu ra bằng tham số `'option'` (ví dụ: `get_field('footer_desc', 'option')`).
* **Tuyệt đối không dùng dữ liệu mẫu tĩnh (No Mock Data)**: Cấm sử dụng mảng/chuỗi dữ liệu mẫu tĩnh (mock/fallback data) trong mã PHP của tệp `footer.php` (như mảng mạng xã hội mặc định, danh sách dịch vụ mặc định, mô tả mặc định). Nếu quản trị viên chưa cấu hình hoặc muốn để trống, tệp template PHP bắt buộc phải kiểm tra rỗng thông qua cấu trúc `if ( ! empty(...) )` và không render các block HTML đó ra màn hình để tránh làm sai lệch mong muốn hiển thị của quản trị viên và tuân thủ tuyệt đối Rule 1.
* **Tổ chức Liên kết cột Dịch vụ và Công ty (Repeater Links - Rule 1)**: Đối với các danh sách liên kết trong các cột của Footer như cột Dịch vụ (gồm SEO, Quảng cáo PPC, Marketing Mạng xã hội, Marketing Nội dung, Tự động hóa Email Marketing) và cột Công ty (gồm Về chúng tôi, Danh mục, Đánh giá), bắt buộc phải sử dụng trường **Repeater** trong Options Page chứa các trường con `'label'` (Tên liên kết) và `'url'` (Đường dẫn), tuyệt đối không viết cứng. Điều này cho phép quản trị viên tự do thêm mới, sửa đổi hoặc xóa bớt liên kết trực tiếp trên giao diện WP Admin bất cứ lúc nào.
* **Cấu hình Tiêu đề Cột (Dynamic Column Titles - Rule 1)**: Tiêu đề của các cột danh sách trong Footer (như "Dịch vụ", "Công ty", "Theo dõi") tuyệt đối **không** viết cứng trực tiếp trong `footer.php`. Bắt buộc phải được khai báo dạng trường Text trong ACF (ví dụ: `footer_services_title`, `footer_company_title`, `footer_social_title`) để quản trị viên có thể dịch thuật, thay đổi tiêu đề theo nhu cầu. Áp dụng cơ chế kiểm tra rỗng `if ( ! empty($title) )` trước khi render thẻ tiêu đề nhằm tuân thủ tuyệt đối Rule 1 (No Mock Data).
* **Văn bản Bản quyền (Dynamic Copyright - Rule 1)**: Dòng chữ bản quyền ở chân trang tuyệt đối **không** viết cứng trực tiếp trong `footer.php`. Bắt buộc phải khai báo trường Text trong ACF (ví dụ: `footer_copyright`) để quản trị viên tự cấu hình. Để linh hoạt tối đa, lập trình PHP sẽ hỗ trợ các thẻ đại diện (placeholders) như `[year]`, `{year}` để tự động thay thế bằng năm hiện tại, và `[site_title]`, `{site_title}` để thay thế bằng tên của website. Bọc thẻ `<p>` bằng khối điều kiện kiểm tra rỗng `if ( ! empty($footer_copyright) )` trước khi kết xuất để tuân thủ Rule 1 (No Mock Data).
* **Tổ chức Mạng xã hội trong Footer (Social Links Repeater)**: Đối với các liên kết mạng xã hội, bắt buộc sử dụng trường **Repeater** chứa một trường **Select** (để chọn kênh: Instagram, LinkedIn, Twitter, Facebook...) và trường **URL**, thay vì khai báo các trường đơn lẻ cố định.
  * **Xử lý cấu tạo khác nhau (Dynamic SVG Rendering)**: Vì mỗi mạng xã hội có cấu trúc icon SVG và nhãn tiếp cận (`aria-label`) khác nhau, mã PHP trong `footer.php` sẽ sử dụng cấu trúc rẽ nhánh `if/elseif` hoặc `switch` dựa trên giá trị của trường Select (`$network`) để kết xuất mã nhúng SVG chuẩn xác cho từng kênh.
  * **Lý do & Tối ưu hiệu suất**:
    1. **Tối ưu truy vấn Cơ sở dữ liệu (Database Optimization)**: Thay vì truy xuất nhiều trường đơn lẻ cho từng mạng xã hội (tạo ra nhiều truy vấn database riêng biệt), việc gom tất cả vào một trường Repeater giúp ACF lấy toàn bộ dữ liệu mạng xã hội qua duy nhất 1 truy vấn Database/Object Cache.
    2. **Linh hoạt tối đa**: Admin có thể tự do thêm mới, ẩn đi hoặc sắp xếp lại thứ tự hiển thị của các mạng xã hội mà không cần can thiệp vào code. Có bao nhiêu mạng xã hội được thêm thì hiển thị đúng bằng đấy mạng xã hội.
    3. **Kiểm soát mỹ thuật**: Đảm bảo mỗi mạng xã hội đều hiển thị đúng icon SVG inline sắc nét, đồng bộ với hệ thống thiết kế và tối ưu SEO (nhãn `aria-label` tự động theo kênh), thay vì dùng font icon ngoài cồng kềnh.
