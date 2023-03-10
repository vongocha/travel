Hướng dẫn cài đặt: 

Bước 1: Download code giải nén sẽ thấy một thư mục và một file sql.

Bước 2: Tạo một database mới trong phpmyadmin, Mở file sql sửa tất cả url của web thành url của web mình. Sau đó import file sql vào database vừa tạo

Bước 3: Upload thư mục code vào host, sửa file wp-config.php như sau:

/** Tên database nhe!*/
define('DB_NAME', 'databse');
 
/** Tài khoản phpmyadmin */
define('DB_USER', 'root');
 
/** Mật khẩu phpmyadmin nếu không có thì để trống nhé */
define('DB_PASSWORD', '');
 
/** Cái này chế nào dùng host free thì sửa còn không thì để im nhé! */
define('DB_HOST', 'localhost');

Bước 4: Đăng nhập với đường dẫn là domain.com/wp-admin, với tên đăng nhập là : admin/123456

Bước 5: Vào admin -> cài đặt -> Đường dẫn tỉnh, bấm lưu 1 cái.