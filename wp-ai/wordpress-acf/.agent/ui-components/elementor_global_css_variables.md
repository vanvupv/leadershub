# Danh sách Design Tokens (CSS Variables)

Tài liệu này lưu trữ các biến CSS toàn cục (Global CSS Variables) được kế thừa và cấu hình từ hệ thống Elementor/Theme gốc để đảm bảo tính đồng bộ về mặt màu sắc, khoảng cách và font chữ của toàn bộ giao diện.

---

## 1. Bảng màu sắc chủ đạo (Brand Colors)

Các biến màu sắc được định nghĩa để duy trì tính nhất quán trên mọi trang:

```css
:root {
  --wp--preset--color--primary: #6eb92b;      /* Màu xanh lục đặc trưng (Primary) */
  --wp--preset--color--secondary: #282828;    /* Màu xám đen (Dark/Secondary) */
  --wp--preset--color--body-bg: #ffffff;      /* Màu nền trang (White) */
  --wp--preset--color--light-bg: #f8f8f8;     /* Màu nền phụ sáng (Light Gray) */
  --wp--preset--color--dark-text: #000000;    /* Màu chữ chính (Black) */
  --wp--preset--color--muted-text: #666666;   /* Màu chữ chú thích (Muted Gray) */
}
```

---

## 2. Font chữ & Typography

Hệ thống font sử dụng các font tiêu chuẩn của thương hiệu và hỗ trợ hiển thị tốt tiếng Việt:

```css
:root {
  --wp--preset--font-family--title: "Montserrat", sans-serif;
  --wp--preset--font-family--body: "Microsoft YaHei", "微软雅黑", sans-serif;
  
  --wp--preset--font-weight--bold: bold;
  --wp--preset--font-weight--normal: normal;
  --wp--preset--font-weight--light: 300;
}
```

---

## 3. Hiệu ứng Chuyển tiếp & Bóng đổ (Transitions & Shadows)

Dành cho các nút bấm, ảnh hover và hiệu ứng mở của các panel/lightbox:

```css
:root {
  --wp--preset--transition--smooth: all 0.3s ease-out;
  --wp--preset--transition--fast: all 0.2s ease-in-out;
  
  --wp--preset--shadow--sm: 0 2px 4px rgba(0, 0, 0, 0.05);
  --wp--preset--shadow--md: 0 5px 16px rgba(0, 0, 0, 0.06);
  --wp--preset--shadow--lg: 0 10px 30px rgba(0, 0, 0, 0.1);
}
```

---

## Hướng dẫn sử dụng
Khi viết mã CSS tùy biến mới cho bất kỳ thành phần nào, **bắt buộc** phải ưu tiên sử dụng các biến CSS trên thay vì viết cứng mã màu/font chữ (hardcode) để đảm bảo trang có thể thay đổi giao diện (themeable) dễ dàng trong tương lai.
