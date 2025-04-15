# :warning: Lập Trình Mã Nguồn Mở (Open Source Code Programming) :100:

Website [laptrinhmanguonmo.great-site.net](http://laptrinhmanguonmo.great-site.net/) 

- :warning: Hiện tại giao diện website **tương thích với màn hình như laptop, PC, ...** Giao diện trên điện thoại hiện vẫn **chưa tối ưu hóa.**

---
:bookmark: >>>>>>>>>>>>>> **MỤC LỤC** <<<<<<<<<<<<<<< :bookmark:

:point_right: **Tổng quan** ([Overview](#overview)) :fire:

:point_right: **Công cụ hỗ trợ** ([Tools - Framework - Library](#tools-framework-library)) :fire:

:point_right: **Hướng dẫn cài đặt** ([Installation](#installation)) :fire:

:point_right: **Hướng dẫn sử dụng** ([Tutorial](#tutorial)) :fire:

---
<a name="overview"></a>
### :loudspeaker: **Tổng Quan - Overview**  :triangular_flag_on_post:

1. :wave: **Đề tài:** Xây dựng website quản lý điểm danh sinh viên  :gift:

2. :wave: Các website dành cho **giảng viên, sinh viên** và **phòng đào tạo** :gift:

- :rotating_light: Tính năng ***website giảng viên*** :rotating_light:
  - :palm_tree: **Cung cấp mã QR buổi học đó** cho sinh viên quét mã (Scan QR Code) :partly_sunny:
  - :palm_tree: **Điểm danh trực tiếp** sử dụng checkbox để đánh dấu điểm danh, ghi chú nếu cần :partly_sunny:
  - :palm_tree: Sử dụng **File Excel .csv** để cập nhật điểm danh sinh viên ***(chưa hoàn thành)*** :partly_sunny:

- :rotating_light: Tính năng ***website sinh viên*** :rotating_light:
  - :palm_tree: **Sử dụng camera thiết bị để quét mã QR (Scan QR Code)** mã giảng viên cấp :partly_sunny:

- :rotating_light: Tính năng ***website phòng đào tạo*** :rotating_light:
  - :palm_tree: **Thêm, xóa, sửa** môn học :partly_sunny:
  - :palm_tree: **Thêm, xóa, sửa** lớp của môn học nào đó :partly_sunny:
  - :palm_tree: **Thêm, xóa, sửa** (phân bổ) lịch dạy học cho giảng viên ***(chưa hoàn thành)*** :partly_sunny:
  - :palm_tree: **Thêm, xóa, sửa** buổi học của lịch dạy nào đó ***(chưa hoàn thành)*** :partly_sunny:
  - :palm_tree: **Thêm, xóa, sửa** tài khoản người dùng (giảng viên & sinh viên) ***(chưa hoàn thành)*** :partly_sunny:

- :rotating_light: Tính năng **chung**
  - :palm_tree: Đăng nhập/ đăng xuất :partly_sunny:
  - :palm_tree: Hiển thị danh sách các lịch (dạy) học và số buổi (dạy) học của lịch học đó :partly_sunny:

---
<a name="tools-framework-library"></a>
## :pushpin: **Công cụ, framework sử dụng phát triển website** :sparkles: 

1. :triangular_flag_on_post: Framework - **Laravel** - PHP :heavy_check_mark:

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

2. :triangular_flag_on_post: Database **MySQL - XAMPP** (localmyadmin) :heavy_check_mark:

3. :triangular_flag_on_post: Visual Studio Code, Git (GitHub) :heavy_check_mark:

4. :triangular_flag_on_post: QR Code Scanner or Reader ([Open Source](https://www.geeksforgeeks.org/create-a-qr-code-scanner-or-reader-in-html-css-javascript/)) :heavy_check_mark:

---
<a name="installation"></a>
## :pushpin: **Hướng dẫn cài đặt** :sparkles:

1. :triangular_flag_on_post: Tải source code :heavy_check_mark:

2. :triangular_flag_on_post: Tải và cài đặt Xampp - [link tải](https://www.apachefriends.org/download.html) :heavy_check_mark:

3. :triangular_flag_on_post: Tải và cài đặt [Composer](https://getcomposer.org/) và có thể cài đặt thêm [Node và NPM](https://nodejs.org/en) :heavy_check_mark:

  - Mở ***Command Prompt/Terminal*** để kiểm tra ***PHP, Composer, Node đã được cài đặt*** hay chưa

```
php -v
composer -v
node -v
```

4. :triangular_flag_on_post: Cài đặt và khởi chạy [Visual Studio Code](https://code.visualstudio.com/) :heavy_check_mark:

5. :triangular_flag_on_post: Khởi chạy Xampp - Apache và MySQL :heavy_check_mark:

6. :triangular_flag_on_post: Mở [PHP My Admin](http://localhost/phpmyadmin/) trên XAMPP :heavy_check_mark:

7. :triangular_flag_on_post: Tạo database và sao chép tên database để cấu hình database ở file .env :heavy_check_mark: 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

8. :triangular_flag_on_post: Khởi tạo các bảng cho database sử dụng migrations :heavy_check_mark:

```
php artisan migrate
```

9. :triangular_flag_on_post: Bắt đầu chạy server :heavy_check_mark:

```
php artisan serve
```

---
<a name="tutorial"></a>
## :pushpin: **Hướng dẫn sử dụng** :sparkles:

:rotating_light: Website [laptrinhmanguonmo.great-site.net](http://laptrinhmanguonmo.great-site.net/) 

- :warning: Hiện tại giao diện website **tương thích với màn hình như laptop, PC, ...** Giao diện trên điện thoại hiện vẫn **chưa tối ưu hóa.**

:rotating_light: Tài khoản người dùng :rotating_light:
- Cấu trúc: **username:password**

**Giảng viên:** 

```
gv001:gv001
gv002:gv002
```

**Sinh viên:** 

```
a:a
b:b
```

**Phòng đào tạo:** 

```
admin:admin
```

<br>

:rotating_light: Các bước thao tác với **vai trò Giảng Viên** :rotating_light:

1. :point_right: **Đăng nhập** tài khoản

2. :point_right: Bấm **"Quản Lý"** trên ***bảng thông tin lịch dạy học*** do phòng đào tạo phân bổ

3. :point_right: Bấm **"Quản Lý"** trên ***bảng thông tin buổi học*** của lịch dạy đó.
   - :palm_tree: **Chú ý** buổi dạy học, ngày dạy học

4. :point_right: Chọn **"Show QR Code"** để hiện mã QR Code cho sinh viên quét mã

5. :point_right: Trường hợp **sử dụng checkbox khi không dùng QR Code** thì giảng viên phải ***thao tác thủ công*** để điểm danh, ghi chú nếu cần

6. :point_right: **Đăng xuất** tài khoản

<br>

:rotating_light: Các bước thao tác với **vai trò Sinh Viên** :rotating_light:

1. :point_right: **Đăng nhập** tài khoản

2. :point_right: Bấm **"Tham Gia"** trên ***bảng thông tin lịch học*** mà học phần đó sinh viên đã đăng ký

3. :point_right: Bấm **"Điểm Danh QR Code"** trên ***bảng thông tin buổi học*** của lịch học đó.
   - :palm_tree: **Chú ý** quét mã QR trực tiếp do giảng viên cung cấp. Quét mã QR xong sẽ ***hiện thông báo điểm danh thành công***

6. :point_right: **Đăng xuất** tài khoản

<br>

:rotating_light: Các bước thao tác với **vai trò Phòng Đào Tạo** :rotating_light:

1. :point_right: **Đăng nhập** tài khoản

2. :point_right: **Lựa chọn danh mục** cần quản lý

3. :point_right: Thực hiện chức năng **thêm - sửa - xóa**

4. :point_right: **Đăng xuất** tài khoản sau khi quản lý xong