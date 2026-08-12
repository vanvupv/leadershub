# Nhật ký Gỡ lỗi & Kinh nghiệm: Phát triển Elementor Custom Widget

Tài liệu này ghi nhận các vấn đề kỹ thuật phát sinh và giải pháp xử lý thực tế trong quá trình phát triển Custom Widget **"Accordion Ngang"** cho Elementor. Đây là những kinh nghiệm rất hay về tối ưu hóa CSS Layout và tích hợp WordPress Theme Child.

---

## 1. Lỗi Đường dẫn khi sử dụng Theme Child (Child Theme Path Resolution)
* **Triệu chứng**: Gặp lỗi `Fatal error: failed to open stream: No such file or directory...` và đường dẫn bị dính liền ký tự khi `require_once` file class widget.
* **Nguyên nhân**:
  * Hàm `get_template_directory()` luôn trả về đường dẫn thư mục của **Theme cha** (ví dụ: `/themes/blocksy`), không trỏ được về thư mục theme con (`blocksy-child`).
* **Giải pháp**:
  * Chuyển sang sử dụng hàm **`get_stylesheet_directory()`** của WordPress. Hàm này luôn trả về chính xác đường dẫn thư mục theme đang hoạt động (ở đây là theme con `blocksy-child`).
  * Đảm bảo luôn có dấu gạch chéo `/` ở đầu đường dẫn tương đối để không bị dính liền tên thư mục:
    ```php
    require_once get_stylesheet_directory() . '/inc/elementor-widgets/class-elementor-horizontal-accordion-widget.php';
    ```

---

## 2. Hiệu ứng Icon bị giật khi click chuyển đổi (Display vs Transition)
* **Triệu chứng**: Khi click active, Icon Normal biến mất và Icon Active hiện ra lập tức mà không có hiệu ứng chuyển động, gây cảm giác giật mắt.
* **Nguyên nhân**:
  * Sử dụng thuộc tính `display: none !important;` và `display: block !important;` để ẩn hiện ảnh. Thuộc tính `display` không hỗ trợ chuyển tiếp động (`transition`) trong CSS.
* **Giải pháp (Fade & Zoom)**:
  * Xếp chồng tuyệt đối (`position: absolute`) 2 ảnh Normal và Active đè khít lên nhau bên trong container `.gy1b_at`.
  * Chỉ định thuộc tính **`transform-origin: center center !important;`** để đảm bảo ảnh zoom từ chính giữa tâm, không bị nảy lệch góc.
  * Sử dụng thuộc tính `opacity` (ẩn/hiện mượt) và `transform: scale()` (phóng to/thu nhỏ) kết hợp transition:
    * Trạng thái thu nhỏ: Normal Icon (`scale(1); opacity: 1;`), Active Icon (`scale(0); opacity: 0;`).
    * Trạng thái active: Normal Icon (`scale(0); opacity: 0;`), Active Icon (`scale(1); opacity: 1;`).

---

## 3. Lỗi Icon bị nhảy/giật từ dưới lên khi active (Layout Reflow & Alignment)
* **Triệu chứng**: Khi click phóng to một khối, hình ảnh bỗng dưng bị nhảy hoặc trượt xiên từ dưới lên vị trí hiện tại một cách rất nhanh và mất tự nhiên.
* **Nguyên nhân 1 (Reflow Transition)**:
  * Khối bọc `.gy1b_wrapper` được đặt `transition: all 0.4s ease;`. Khi click active, layout đổi hướng flex từ `column` sang `row` làm tọa độ Icon thay đổi, trình duyệt tự động di chuyển vị trí Icon mượt mà tạo thành cảm giác bay chéo/bay từ dưới lên.
* **Nguyên nhân 2 (Vertical Alignment)**:
  * Layout khi active (xếp ngang) sử dụng `align-items: center;` (căn giữa dọc). Khi click active, đoạn mô tả dài xuất hiện đột ngột làm chiều cao khối phình ra, khiến Icon phải nhảy tọa độ dịch xuống để nằm chính giữa chiều cao mới của khối.
* **Giải pháp triệt để**:
  * Vô hiệu hóa transition của wrapper bằng cách đặt: `transition: none !important;`.
  * Thay thế căn giữa dọc bằng **`align-items: flex-start !important;`** (căn sát đỉnh) khi active xếp ngang. (Sau đó nâng cấp thành sử dụng trị số `vertical_alignment` động cấu hình từ admin).
  * **Kết quả**: Do ở cả 2 trạng thái Icon đều nằm cố định sát đỉnh trên cùng của khối, tọa độ trục dọc của Icon không bao giờ bị biến động khi chiều cao khối thay đổi. Icon chỉ dịch chuyển êm ái theo phương ngang khi khối phình to.

---

## 4. Hiện tượng giật/khựng khung hình do thay đổi chiều cao (Layout Shift / Jank)
* **Triệu chứng**: Khi click chuyển đổi, chiều cao của khối phình to ra theo phương dọc để chứa phần mô tả dài, làm toàn bộ các khối bên cạnh co giãn theo và đẩy toàn bộ các Section bên dưới trang web nhảy giật lên xuống rất khó chịu (gây điểm số CLS xấu).
* **Nguyên nhân**:
  * Chiều cao khối không cố định (để `auto`), phụ thuộc trực tiếp vào độ dài ngắn của văn bản mô tả. Khi mô tả ẩn/hiện, trình duyệt phải tính toán lại kích thước toàn trang (Layout Shift).
* **Giải pháp (Fixed Height Control)**:
  * Bổ sung control **`container_height`** (Slider) trong phần tùy chỉnh Kiểu dáng. Thiết lập chiều cao cố định cho hàng `.gy1b` (mặc định `350px`) và cho các khối con chiếm `height: 100%`.
  * **Quản lý tràn chữ (Overflow)**: Giới hạn chiều cao tối đa của mô tả `max-height: 200px` và cho phép xuất hiện thanh cuộn dọc tự động `overflow-y: auto`.
  * **Kết quả**: Chiều cao của hàng luôn đứng im khít khịt khi chuyển đổi, loại bỏ hoàn toàn 100% hiện tượng khựng giật khung hình toàn trang.

---

## 5. Căn chỉnh lề dọc nội dung trên chiều cao cố định (Dynamic Vertical Alignment)
* **Triệu chứng**: Khi đặt chiều cao khối cố định (ví dụ `350px`), nội dung (Icon + Chữ) của các khối chưa active bị dồn hết lên trên cùng (Top), tạo khoảng trống xám rất lớn bên dưới gây mất cân đối giao diện.
* **Giải pháp (Dynamic CSS Flexbox Alignment)**:
  * Bổ sung control **`vertical_alignment`** (CHOOSE) cung cấp 3 lựa chọn căn chỉnh dọc: **Căn trên** (`flex-start`), **Căn giữa** (`center`), **Căn dưới** (`flex-end`).
  * Áp dụng liên kết động trong CSS Flexbox:
    * Khi chưa active (khối xếp dọc - `flex-direction: column`): Áp dụng giá trị căn chỉnh dọc vào thuộc tính **`justify-content`** của `.gy1b_wrapper`.
    * Khi active (khối xếp ngang - `flex-direction: row` hoặc `row-reverse`): Áp dụng giá trị căn chỉnh dọc vào thuộc tính **`align-items`** của `.gy1b_wrapper`.
  * **Kết quả**: Nội dung tự động trôi nổi cân đối ở chính giữa (hoặc trên/dưới) chiều cao của khối Accordion một cách mượt mà và linh hoạt.

---

## 6. Căn chỉnh lề ngang nội dung khi Active (Dynamic Horizontal Alignment)
* **Triệu chứng**: Khi cấu hình khối active, nhu cầu trình bày văn bản (Tiêu đề + Mô tả) và Icon thay đổi theo chiều ngang (Trái, Giữa, Phải) để phù hợp với ngôn ngữ hoặc ngữ cảnh trang web.
* **Giải pháp (Dynamic Active Horizontal Alignment)**:
  * Bổ sung control **`horizontal_alignment_active`** (CHOOSE) với 3 tùy chọn: **Căn trái** (`left`), **Căn giữa** (`center`), **Căn phải** (`right`).
  * Tự động điều hướng flexbox và text alignment:
    * Nếu vị trí ảnh là `top` (khối xếp dọc): Áp dụng giá trị căn lề ngang động lên thuộc tính `align-items` của `.gy1b_wrapper` (Ví dụ: `left` -> `flex-start`, `center` -> `center`, `right` -> `flex-end`), đồng thời thiết lập `text-align` tương ứng.
    * Nếu vị trí ảnh là `left` hoặc `right` (khối xếp ngang): Áp dụng `text-align` cho `.gy1b_wrapper` và `.gy1b_content_text`, đồng thời tự động tính toán thuộc tính `justify-content` của flexbox để đẩy cụm Icon và Chữ dồn về hướng căn chỉnh mong muốn.
  * **Kết quả**: Admin tự do điều khiển vị trí căn lề ngang của toàn bộ nội dung trong khối active vô cùng linh hoạt và chính xác.

---

## 7. Căn lề dọc riêng cho Icon khi Active (Align Self Icon)
* **Triệu chứng**: Khi cấu hình căn lề dọc của toàn khối là "Căn giữa" (`center`), wrapper có `align-items: center` khiến Icon bị kéo tuột xuống giữa khoảng trống của cụm chữ bên cạnh. Gây mất cân đối và không thẳng hàng với dòng Tiêu đề đầu tiên.
* **Giải pháp (Align Self Control)**:
  * Thiết lập card chứa `.gy1b_a` làm flexbox hướng dọc (`flex-direction: column; justify-content: center;`) để căn dọc toàn bộ wrapper ở chính giữa chiều cao của card mà không phụ thuộc vào `height: 100%` của wrapper.
  * Thiết lập wrapper `.gy1b_wrapper` có chiều cao tự nhiên (`height: auto`).
  * Bổ sung control **`icon_vertical_alignment_active`** (CHOOSE) trong phần tùy chỉnh Hình ảnh / Icon (chỉ xuất hiện khi ảnh nằm ở Trái/Phải). Áp dụng thuộc tính **`align-self`** riêng cho Icon `.gy1b_at`.
  * **Kết quả**: Cả cụm nội dung vẫn nằm chính giữa card, nhưng Icon có thể tự do căn sát lên đỉnh (`align-self: flex-start`), thẳng hàng dòng Tiêu đề của cụm chữ bên cạnh một cách cực kỳ ngay ngắn và đẹp mắt.
