# Hợp phần: Biểu mẫu Đăng ký Bản tin (Newsletter Subscription Form)

Biểu mẫu thu thập thông tin email đăng ký tin tức, phân loại đối tượng khách hàng sử dụng hệ thống lưới Grid Bootstrap 5, tích hợp mã xác thực Captcha và gửi AJAX bằng `fetch` API.

---

## 1. Cấu trúc HTML & Lớp Bootstrap 5

```html
<div class="sytkc bg-dark text-white p-4 rounded shadow">
  <h6 class="fw-bold mb-2">Đăng ký thư điện tử bản tin</h6>
  <p class="text-white-50 small mb-4">Nhập thông tin chi tiết của bạn dưới đây để nhận thông tin mới nhất</p>
  
  <div class="sytkc_a row g-3 mb-3">
    <!-- Họ tên -->
    <div class="col-md-6">
      <input type="text" class="form-control" id="name" placeholder="Nhập tên của bạn">
    </div>
    
    <!-- Email -->
    <div class="col-md-6">
      <input type="email" class="form-control" id="email" placeholder="*Nhập email của bạn">
    </div>
    
    <!-- Tên công ty -->
    <div class="col-md-6">
      <input type="text" class="form-control" id="company" placeholder="Nhập tên công ty của bạn">
    </div>
    
    <!-- Quốc gia -->
    <div class="col-md-6">
      <select class="form-select" id="country">
        <option value="0" disabled selected>*Nhập tên quốc gia của bạn</option>
        <option value="Vietnam">Vietnam</option>
        <!-- Thêm các quốc gia khác -->
      </select>
    </div>
    
    <!-- Phân loại khách hàng -->
    <div class="col-md-6">
      <select class="form-select" id="type">
        <option value="0" disabled selected>*Nhập loại khách hàng của bạn</option>
        <option value="1">Trình lắp đặt</option>
        <option value="2">Nhà phân phối</option>
        <option value="3">Người dùng cuối</option>
      </select>
    </div>
    
    <!-- Mã Captcha -->
    <div class="col-md-6 lxyea_wrap">
      <div class="lxyea_b d-flex gap-2">
        <input class="lxyea_ba form-control" placeholder="*Captcha">
        <img src="captcha-img.png" id="rss_captcha" alt="captcha" class="lxyea_bb rounded cursor-pointer">
      </div>
    </div>
  </div>
  
  <!-- Đồng ý điều khoản -->
  <div class="sytkc_b form-check mb-3 ms-1 text-white-50 small">
    <input type="checkbox" name="pp" id="rss_pp" class="form-check-input" checked>
    <label class="form-check-label" for="rss_pp">
      Bằng cách nhấp vào gửi, bạn đồng ý với <a href="#" target="_blank" class="text-success text-decoration-none">Chính sách bảo mật</a>.
    </label>
  </div>
  
  <!-- Nút Gửi đăng ký -->
  <div class="sytkc_c col-12" id="rss_smt">
    <button class="btn btn-success w-100 py-3 fw-bold">Gửi</button>
  </div>
</div>
```

---

## 2. Hướng dẫn Gửi AJAX qua Fetch API (Vanilla JS)

Thực hiện gửi dữ liệu theo định dạng `application/x-www-form-urlencoded` sử dụng `URLSearchParams` để đồng bộ với bộ lọc backend PHP:

```javascript
var subscribeSubmit = document.getElementById("rss_smt");
if (subscribeSubmit) {
  subscribeSubmit.addEventListener("click", function (e) {
    e.preventDefault();
    
    // Kiểm tra điều khoản
    var ppCheckbox = document.getElementById("rss_pp");
    if (ppCheckbox && !ppCheckbox.checked) {
      alert("Vui lòng đồng ý với chính sách bảo mật!");
      return;
    }
    
    // Thu thập dữ liệu
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var company = document.getElementById("company").value.trim();
    var country = document.getElementById("country").value;
    var type = document.getElementById("type").value;
    var captchaInput = document.querySelector(".lxyea_ba").value.trim();

    if (!name || !email) {
      alert("Họ tên và Email là bắt buộc!");
      return;
    }

    var params = new URLSearchParams();
    params.append("name", name);
    params.append("email", email);
    params.append("company", company);
    params.append("country", country);
    params.append("type", type);
    params.append("code", captchaInput);

    fetch("/subscribe/save", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: params
    })
    .then(res => res.json())
    .then(result => {
      alert(result.msg);
    })
    .catch(err => {
      console.error(err);
    });
  });
}
```
