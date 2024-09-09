<?php
// Product details
$product = [
    'name' => 'Apple iPhone 15 128GB (Blue)',
    'category' => ['Smart Phones', 'Brands'],
    'price' => '$1287.00',
    'description' => 'The iPhone 15 features a 6.1-inch (155 mm) display with Super Retina XDR OLED technology at a resolution of 2556×1179 pixels and a pixel density of about 460 PPI with a refresh rate of 60 Hz.<br> ',
    'images' => [
        'https://assets.kogan.com/files/external/2024/Apple/iPhone_15/updated/KHIP15128BLU_1N.jpg?auto=webp&bg-color=fff&canvas=753%2C502&fit=bounds&height=502&quality=90&width=753', // Main image URL
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjHawohNyatKeVLTc5oypo50nOcIEejF0vzvVu8oiWoagcIf23RUqarXS_UF4d8eAv2W8&usqp=CAU',
        'https://media.binglee.com.au/cdn-cgi/image/fit=scale-down,f=auto,w=1079/e/9/3/4/e93413f8bd8f659c275bba4e876ee377540e6b7f_Apple_MTPG3ZPA_Mobile_Phone_Hero_3.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG-7ioMIcixxK1kpKMUPKaWTGim04SujLjKg&s',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNLEy18wAImIfYWcVMh23zJAQrvxr-PU5u-A&s'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Product Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS -->
</head>
<body id="product">
    <div class="product-page">
        <div class="product-container">
            <div class="product-image-gallery">
                <img src="<?php echo $product['images'][0]; ?>" alt="<?php echo $product['name']; ?>" class="product-main-image">
                <div class="product-thumbnails">
                    <?php foreach ($product['images'] as $index => $image) {
                        if ($index === 0) continue; // Skip the main image
                    ?>
                        <img src="<?php echo $image; ?>" alt="Thumbnail <?php echo $index; ?>" class="product-thumbnail">
                    <?php } ?>
                </div>
            </div>

            <div class="product-details">
                <h1 class="product-name"><?php echo $product['name']; ?></h1>
                <p class="product-category">Categories: <?php echo implode(', ', $product['category']); ?></p>
                <p class="product-price"><?php echo $product['price']; ?></p>
                <p class="product-description"><?php echo $product['description']; ?></p>
                
                <div class="product-quantity">
                    <input type="number" value="1" min="1" class="quantity-input">
                </div>
                
                <button class="add-to-cart-button">ADD TO CART</button>
                
                <div class="secure-checkout">
                    <p>Guaranteed Safe Checkout with</p>
                    <img src="https://www.ozquilts.com.au/images/companies/1/untitled%20folder/paypal-logo.png?1652491832766" alt="Payment options">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
