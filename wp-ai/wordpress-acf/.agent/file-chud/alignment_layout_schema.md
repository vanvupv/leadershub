# Sơ đồ Cấu trúc Căn chỉnh Vị trí (Alignment Layout Schema)

Tài liệu này tổng hợp cấu trúc phân cấp Flexbox và mối liên hệ giữa các Control trong Elementor Editor với các thuộc tính CSS, giúp dễ dàng hình dung cơ chế căn chỉnh dọc/ngang của widget Accordion Ngang.

---

## 1. Sơ đồ Phân cấp & Cơ chế Căn chỉnh Flexbox

```mermaid
graph TD
    %% Định nghĩa các lớp và phần tử
    A[Widget Wrapper: .gy1b] -->|Chiều cao: container_height| B[Card Item: .gy1b_a]
    B -->|height: 100%| C{Trạng thái của Khối?}
    
    %% Trạng thái Bình thường
    C -->|Bình thường / Thu nhỏ| D[Wrapper Nội dung: .gy1b_wrapper]
    D -->|flex-direction: column| D1[Căn dọc Khối: justify-content = vertical_alignment]
    D -->|Căn ngang Khối: align-items| D2[horizontal_alignment_normal]
    D -->|Căn lề chữ: text-align| D2
    
    %% Trạng thái Active
    C -->|Được chọn / Active| E[Wrapper Nội dung Active: .gy1b_wrapper]
    E -->|flex-direction theo image_position_active| F{Vị trí Icon active?}
    
    %% Active Bên trái / Bên phải
    F -->|Bên trái / Bên phải row | G[Căn dọc Cụm: align-items = vertical_alignment]
    F -->|Bên trái / Bên phải row| H[Căn ngang Cụm: justify-content = horizontal_alignment_active]
    F -->|Bên trái / Bên phải row| I[Căn lề chữ: text-align = horizontal_alignment_active]
    F -->|Bên trái / Bên phải row| K[Căn dọc RIÊNG Icon: align-self = icon_vertical_alignment_active]
    
    %% Active Ở trên
    F -->|Ở trên column| L[Căn dọc Cụm: justify-content = vertical_alignment]
    F -->|Ở trên column| M[Căn ngang Cụm: align-items = horizontal_alignment_active]
    F -->|Ở trên column| N[Căn lề chữ: text-align = horizontal_alignment_active]

    %% Style áp dụng cho các phần tử con cụ thể
    K --> Icon[.gy1b_at]
    I --> Text[.gy1b_content_text]
    N --> Text
    
    %% Màu sắc phân biệt các luồng
    style A fill:#f9f,stroke:#333,stroke-width:2px
    style B fill:#bbf,stroke:#333,stroke-width:2px
    style C fill:#fdd,stroke:#333,stroke-width:2px
    style D fill:#dfd,stroke:#333,stroke-width:1px
    style E fill:#ffd,stroke:#333,stroke-width:1px
```

---

## 2. Chi tiết Ánh xạ Thuộc tính CSS (Properties Mapping)

### A. Trạng thái Card Item tổng quát
| Phần tử HTML | CSS Layout | Thuộc tính điều khiển | Tác dụng |
| :--- | :--- | :--- | :--- |
| `.gy1b` | `display: flex;` | **`container_height`** (Slider) | Quyết định chiều cao cố định của hàng để chống giật màn hình (`CLS`). |
| `.gy1b_a` | `display: flex; flex-direction: column;` | **`vertical_alignment`** (`justify-content`) | Căn chỉnh dọc toàn bộ cụm wrapper bên trong card (Căn trên/giữa/dưới). |

---

### B. Trạng thái Bình thường (Thu nhỏ)
* Hướng Flex: `flex-direction: column;` (Icon nằm trên, Tiêu đề nằm dưới).

| Phần tử HTML | Thuộc tính CSS | Control Elementor | Giá trị & Tác động |
| :--- | :--- | :--- | :--- |
| `.gy1b_wrapper` | `align-items` | **`horizontal_alignment_normal`** | `flex-start` (Trái), `center` (Giữa), `flex-end` (Phải). |
| `.gy1b_wrapper` | `text-align` | **`horizontal_alignment_normal`** | `left` (Trái), `center` (Giữa), `right` (Phải). |

---

### C. Trạng thái Active (Phóng to)
* Hướng Flex: Phụ thuộc vào **`image_position_active`** (`row`, `row-reverse`, hoặc `column`).

#### 1. Khi Vị trí Icon được chọn là `Bên trái` hoặc `Bên phải` (`row` / `row-reverse`)
| Phần tử HTML | Thuộc tính CSS | Control Elementor | Giá trị & Tác động |
| :--- | :--- | :--- | :--- |
| `.gy1b_wrapper` | `align-items` | **`vertical_alignment`** | Căn dọc khối chữ và Icon song song với nhau (`flex-start` / `center` / `flex-end`). |
| `.gy1b_wrapper` | `justify-content` | **`horizontal_alignment_active`** | Căn ngang cụm nội dung (đẩy sát lề hoặc dồn giữa). |
| `.gy1b_content_text` | `text-align` | **`horizontal_alignment_active`** | Căn lề chữ của Tiêu đề và Mô tả (`left` / `center` / `right`). |
| **`.gy1b_at` (Icon)** | **`align-self`** | **`icon_vertical_alignment_active`** | **Căn dọc RIÊNG của Icon** (`flex-start` / `center` / `flex-end`). Giúp Icon ghim đỉnh thẳng hàng dòng Tiêu đề đầu tiên, trong khi khối chữ vẫn trôi ở giữa card. |

#### 2. Khi Vị trí Icon được chọn là `Ở trên` (`column`)
| Phần tử HTML | Thuộc tính CSS | Control Elementor | Giá trị & Tác động |
| :--- | :--- | :--- | :--- |
| `.gy1b_wrapper` | `justify-content` | **`vertical_alignment`** | Căn dọc cụm nội dung so với card. |
| `.gy1b_wrapper` | `align-items` | **`horizontal_alignment_active`** | Căn lề ngang cho cả Icon và Khối chữ (`flex-start` / `center` / `flex-end`). |
| `.gy1b_content_text` | `text-align` | **`horizontal_alignment_active`** | Căn lề text của Tiêu đề và Mô tả (`left` / `center` / `right`). |
