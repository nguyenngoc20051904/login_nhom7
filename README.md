
# 📘 HƯỚNG DẪN SỬ DỤNG GIT CƠ BẢN

## 🔧 Yêu cầu trước khi bắt đầu

- Cài đặt [Git](https://git-scm.com/)
- Có tài khoản GitHub: https://github.com/
- VS Code hoặc terminal đều dùng được

---

## 🧲 PHẦN 1: LẤY FILE TỪ GITHUB VỀ MÁY (CLONE HOẶC PULL)

### ✅ Cách 1: Clone repo (dùng khi lấy lần đầu)

```bash
git clone https://github.com/username/tên-repo.git
```

Ví dụ:

```bash
git clone https://github.com/nguyenngoc20051904/login_nhom7.git
```

> Lệnh này sẽ tạo folder `login_nhom7` chứa toàn bộ mã nguồn.

---

### ✅ Cách 2: Pull (cập nhật bản mới nhất nếu đã clone)

Di chuyển vào folder project:

```bash
cd login_nhom7
```

Kéo các thay đổi mới nhất từ GitHub:

```bash
git pull origin main
```

> Dùng `main` hoặc `master` tùy repo của bạn

---

## 🚀 PHẦN 2: ĐẨY FILE TỪ MÁY LÊN GITHUB (PUSH)

### 🔁 Bước 1: Kiểm tra trạng thái

```bash
git status
```

- Đỏ: file mới chưa theo dõi  
- Xanh: đã chuẩn bị commit  
- Không gì: working tree clean

---

### ➕ Bước 2: Thêm file vào Git

```bash
git add .
```

> Dấu `.` có nghĩa là thêm tất cả thay đổi

---

### 📝 Bước 3: Tạo commit với nội dung

```bash
git commit -m "Mô tả thay đổi"
```

Ví dụ:

```bash
git commit -m "Thêm trang đăng nhập"
```

---

### ⬆️ Bước 4: Đẩy lên GitHub

```bash
git push origin main
```

> Nếu repo dùng nhánh `master` thì đổi `main` thành `master`

---

## 🧹 PHẦN 3: XỬ LÝ CÁC VẤN ĐỀ THƯỜNG GẶP

### ❓ Lỗi: `failed to push some refs`

➡ Nguyên nhân: repo trên GitHub đã có file (README.md, v.v.)

➡ Cách xử lý:

```bash
git pull origin main --allow-unrelated-histories
git push origin main
```

---

### ❓ Đổi remote nếu gõ sai

```bash
git remote remove origin
git remote add origin https://github.com/username/new-repo.git
```

---

## 🗑️ XÓA FILE HOẶC FOLDER

### Xóa file:

```bash
rm ten_file.txt
git add .
git commit -m "Xoá file"
git push origin main
```

### Xóa folder:

```bash
rm -r ten_folder
git add .
git commit -m "Xoá folder"
git push origin main
```

---

## 🔍 KIỂM TRA NHÁNH ĐANG DÙNG

```bash
git branch
```

Nếu thấy:
```
* main
```
→ Bạn đang ở nhánh `main`

---

## 📝 GHI NHỚ LỆNH CƠ BẢN

| Hành động | Lệnh |
|-----------|------|
| Clone repo | `git clone <url>` |
| Kiểm tra trạng thái | `git status` |
| Thêm file vào git | `git add .` |
| Commit thay đổi | `git commit -m "Ghi chú"` |
| Đẩy lên GitHub | `git push origin main` |
| Kéo về từ GitHub | `git pull origin main` |

---

> 📌 **Tips:** Bạn nên commit thường xuyên với ghi chú rõ ràng để dễ theo dõi quá trình làm việc.

---

## ✅ Ví dụ hoàn chỉnh đẩy code lần đầu

```bash
cd myproject
git init
git remote add origin https://github.com/nguyenngoc20051904/login_nhom7.git
git add .
git commit -m "Khởi tạo dự án"
git branch -M main
git push -u origin main
```
