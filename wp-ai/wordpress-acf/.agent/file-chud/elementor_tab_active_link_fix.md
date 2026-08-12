# Hướng dẫn Kỹ thuật: Tự động kích hoạt Active và Vẽ hiệu ứng Tab cho Elementor Icon List

Tài liệu này ghi nhận giải pháp xây dựng dải Tab chuyển trang bằng **Widget Icon List của Elementor** (giải quyết giới hạn của widget Tab mặc định không cho nhập link) và cách xử lý lỗi khoảng hở lơ lửng bằng CSS.

---

## 🔍 Vấn đề 1: Widget Tab mặc định không hỗ trợ đường dẫn (URL)
* **Hiện tượng**: Widget Tab mặc định của Elementor chỉ cho phép hiển thị nội dung tại chỗ trên cùng một trang, không hỗ trợ gán link chuyển hướng để đi qua các trang giới thiệu khác nhau.
* **Giải pháp**: Thay thế bằng **Widget Icon List** xếp nằm ngang (Inline), đặt CSS Class là **`tab-nav-link`** cho widget, điền tiêu đề và link chuyển trang đầy đủ.

---

## 🔍 Vấn đề 2: Tự động active Tab theo URL hiện tại
* **Giải pháp**: Sử dụng đoạn mã Javascript dưới đây để so sánh URL trình duyệt với thuộc tính `href` của thẻ `<a>` và gán class `active` vào thẻ `<li>` bọc ngoài:

```html
<script>
document.addEventListener("DOMContentLoaded", function () {
    // 1. Lấy URL hiện tại của trình duyệt
    var currentUrl = window.location.href;
    
    // 2. Tìm tất cả các thẻ <a> bên trong widget Tab Icon List (.tab-nav-link)
    var tabLinks = document.querySelectorAll('.tab-nav-link a');
    
    tabLinks.forEach(function (link) {
        var linkHref = link.getAttribute('href');
        
        // 3. Nếu URL hiện tại khớp với href của link, kích hoạt class active
        if (linkHref && currentUrl.indexOf(linkHref) !== -1) {
            link.classList.add('active'); // Gán active vào thẻ <a>
            
            // Tìm thẻ <li> cha gần nhất để gán active phục vụ vẽ hiệu ứng gạch chân
            var parentLi = link.closest('.elementor-icon-list-item');
            if (parentLi) {
                parentLi.classList.add('active');
            }
        }
    });
});
</script>
```

---

## 🔍 Vấn đề 3: Lỗi gạch chân và mũi tên bị lơ lửng (Lệch chiều cao)
* **Nguyên nhân**: Dải nền màu xám nhạt có chiều cao lớn (khoảng `100px`), trong khi các thẻ `<li>` mặc định chỉ cao theo chữ. Do đó thẻ `<li>` bị lùn và lơ lửng ở giữa, kéo theo đường gạch chân `::after` (ở `bottom: 0` của `li`) bị lơ lửng tạo khoảng hở ở dưới.
* **Giải pháp**:
  1. Đặt Padding dưới của Container cha chứa dải xám về **`0`**.
  2. Dùng CSS ép chiều cao thẻ `<li>` cao đầy đúng **`100px`** bằng **`line-height: 100px`** và bật **`overflow: hidden`** để giấu mũi tên khi ẩn.

---

## 🛠️ Code CSS chuẩn hóa hoàn chỉnh

Dưới đây là đoạn CSS tối ưu hóa chiều cao và vẽ hiệu ứng Hover/Active sát khít chằn chặn:

```css
/* Triệt tiêu margin/padding của thẻ ul bọc ngoài */
.tab-nav-link ul.elementor-icon-list-items {
    margin: 0 !important;
    padding: 0 !important;
    display: flex;
    justify-content: center;
}

/* ==========================================================================
   THIẾT LẬP CÁC TAB TRẠNG THÁI MẶC ĐỊNH (Ép cao đầy 100px bằng dải xám)
   ========================================================================== */
.tab-nav-link .elementor-icon-list-item {
    transition: all ease 0.3s;
    position: relative;
    
    /* Giữ đầu mũi tên ẩn dưới đáy khi chưa active */
    overflow: hidden !important; 
    cursor: pointer;
    
    /* Ép chiều cao cao đầy 100px và triệt tiêu padding */
    height: 100px !important;
    line-height: 100px !important;
    padding: 0 30px !important; /* Khoảng cách chữ trái phải giữa các tab */
    
    display: inline-block;
}

/* Thẻ <a> chứa chữ tiêu đề mặc định */
.tab-nav-link .elementor-icon-list-item a {
    text-decoration: none;
    font-size: 20px;
    color: #000000 !important;
    font-family: ml, sans-serif;
    text-transform: capitalize;
    transition: all ease 0.3s;
    display: inline-block;
    height: 100%;
}

/* Vẽ đầu mũi tên nằm ẩn thụt dưới đáy 100px (bottom: -10px) */
.tab-nav-link .elementor-icon-list-item::before {
    position: absolute;
    content: "";
    width: 25px;
    height: 10px;
    background-size: 100% 100%;
    left: 50%;
    margin-left: -12.5px;
    bottom: -10px; /* Nằm ngoài biên 100px nên bị overflow:hidden giấu đi */
    opacity: 0;
    transition: all ease 0.3s;
    background-image: url(../img/g57.png); /* Đường dẫn ảnh mũi tên của bạn */
    z-index: 2;
}

/* Vẽ đường gạch chân nằm sát khít đáy 100px (bottom: 0) */
.tab-nav-link .elementor-icon-list-item::after {
    position: absolute;
    content: "";
    width: 100%;
    height: 5px;
    background-color: #6eb92b;
    left: 0;
    bottom: 0; /* Khít sát mép đáy dải xám */
    border-radius: 2.5px;
    opacity: 0;
    transition: all ease 0.3s;
    z-index: 1;
}

/* ==========================================================================
   HIỆU ỨNG HOVER & ACTIVE (HOẠT ĐỘNG ĐỒNG BỘ)
   ========================================================================== */
   
/* Đổi màu chữ xanh lá khi Hover hoặc Active */
.tab-nav-link .elementor-icon-list-item:hover a,
.tab-nav-link .elementor-icon-list-item.active a {
    color: #6eb92b !important;
    font-family: mb, sans-serif;
}

/* Trồi đầu mũi tên lên sát đáy (bottom: 0) khi Hover hoặc Active */
.tab-nav-link .elementor-icon-list-item:hover::before,
.tab-nav-link .elementor-icon-list-item.active::before {
    opacity: 1 !important;
    bottom: 0px !important;
}

/* Hiện đường gạch chân sát đáy khi Hover hoặc Active */
.tab-nav-link .elementor-icon-list-item:hover::after,
.tab-nav-link .elementor-icon-list-item.active::after {
    opacity: 1 !important;
}
```
