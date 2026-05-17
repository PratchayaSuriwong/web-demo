<?php
$routes = [
    'home' => [
        'title' => 'หน้าแรก',
        'description' => SITE_DESCRIPTION,
        'file' => __DIR__ . '/../pages/home/index.php',
    ],
    'about' => [
        'title' => 'เกี่ยวกับเรา',
        'description' => 'รู้จัก GreenLoop และระบบรับซื้อขวดพลาสติกที่ช่วยให้ผู้ขายจัดการข้อมูลได้ง่ายขึ้น',
        'file' => __DIR__ . '/../pages/about/index.php',
    ],
    'contact' => [
        'title' => 'ติดต่อ',
        'description' => 'ติดต่อ GreenLoop เพื่อขอราคา นัดรับซื้อ หรือทดลองใช้แพลตฟอร์มบันทึกจำนวนขวด',
        'file' => __DIR__ . '/../pages/contact/index.php',
    ],
    'products' => [
        'title' => 'ราคารับซื้อ',
        'description' => 'ดูประเภทราคาขวดพลาสติกและตัวอย่างการคำนวณมูลค่าสำหรับผู้ขาย',
        'file' => __DIR__ . '/../pages/products/index.php',
    ],
    '404' => [
        'title' => 'ไม่พบหน้า',
        'description' => 'ไม่พบหน้าที่คุณต้องการ',
        'file' => __DIR__ . '/../pages/404/index.php',
    ],
];

function resolve_route(string $page): string
{
    global $routes;

    $page = trim($page, "/ \t\n\r\0\x0B");
    $page = $page === '' ? 'home' : $page;
    $page = explode('/', $page)[0];

    return array_key_exists($page, $routes) ? $page : '404';
}
