document.addEventListener('DOMContentLoaded', function () {
    const categories = {
        "smartphones": [
            { name: "iPhone 16", image: "apple.png", description: "Latest Apple smartphone with A18 chip.", price: 1299 },
            { name: "Samsung Galaxy S22", image: "samsungs22.png", description: "High-resolution camera and sleek design.", price: 899 },
            { name: "Google Pixel 6", image: "pixel6.png", description: "Pure Android experience with AI capabilities.", price: 799 },
            { name: "OnePlus 9", image: "oneplus9.png", description: "Fast charging and smooth display.", price: 729 },
            { name: "Xiaomi Mi 11", image: "xiaomi11.png", description: "Excellent performance at a budget price.", price: 599 },
            { name: "Sony Xperia 1", image: "xperia1.png", description: "CinemaWide display for movie enthusiasts.", price: 950 },
            { name: "Motorola Edge", image: "motorolaedge.png", description: "Edge screen and great battery life.", price: 650 },
            { name: "Nokia 8.3", image: "nokia83.png", description: "Reliable and durable with 5G support.", price: 690 }
        ],
        "headphones": [
            { name: "Sony WH-1000XM4", image: "sonywh1000xm4.png", description: "Industry-leading noise cancellation.", price: 350 },
            { name: "Bose 700", image: "bose700.png", description: "Crisp sound and comfort for long use.", price: 379 },
            { name: "Apple AirPods Pro", image: "airpodspro.png", description: "In-ear wireless buds with spatial audio.", price: 249 },
            { name: "Beats Studio 3", image: "beats3.png", description: "High performance wireless noise cancelling.", price: 299 },
            { name: "JBL Tune 750BTNC", image: "jbltune750.png", description: "Powerful bass in an affordable package.", price: 130 },
            { name: "Sennheiser HD 450BT", image: "sennheiserhd450.png", description: "Great sound and effective noise cancelling.", price: 199 },
            { name: "Logitech G Pro X", image: "logitechgprox.png", description: "Designed for gaming with surround sound.", price: 129 },
            { name: "HyperX Cloud II", image: "hyperxcloud2.png", description: "Comfortable with immersive audio.", price: 99 }
        ],
		"televisions": [
            { name: "Samsung LED", image: "samsungqled.png", description: "Samsung QLED 4K TV.", price: 1299 },
            { name: "LG 4K", image: "lg.png", description: "LG 85 inches 4K resolution.", price: 1099 },
            { name: "Sony BRAVIA", image: "sonytv.png", description: "Sony Bravia 4K TV.", price: 1329 },
            { name: "Vizilo TV", image: "vizio.png", description: "Vizilo P Series.", price: 429 },
            { name: "TCL Television", image: "tcl.png", description: "Tcl 5 Series 4k TV.", price: 299 },
            { name: "Westinghouse TV ", image: "Westinghouse.png", description: "Westinghouse 4K TV.", price: 350 },
            { name: "Sharp Tv", image: "Sharp.png", description: "Sharp resolution TV.", price: 250 },
            { name: "Hisene TV", image: "hisene.png", description: "Hisene Reliable 4k Tv.", price: 390 }
        ],
        "smartwatches": [
            { name: "Apple Watch series 6", image: "applewatch.png", description: "Appple Watch Series 7.", price: 390 },
            { name: "Samsung Watch", image: "samsungwatch.png", description: "Samsung Galaxy Watch Active 2.", price: 299 },
            { name: "Motorola Watch", image: "motorolawatch.png", description: "Motorola Moto 360.", price: 270 },
            { name: "Fitbit Watch", image: "fitbit.png", description: "Fitbit Versa 3 .", price: 199 },
            { name: "Garmin Watch", image: "garmin.png", description: "Garmin Forerunner.", price: 599 },
            { name: "Fossil Watch", image: "fossil.png", description: "Fossil Gen 5.", price: 295 },
            { name: "Skagen Watch", image: "skagen.png", description: "Skagen Falster 3.", price: 129 },
            { name: "Huawei Watch", image: "Huawei.png", description: "Huawei Watch GT 2.", price: 199 }
        ],"laptops": [
            { name: "MacBook ", image: "macbook.png", description: "Latest Apple MacBook Air", price: 2999 },
            { name: "Dell Laptop", image: "dell.png", description: "Dell XPS 13.", price: 999 },
            { name: "HP Laptop", image: "hp.png", description: "HP Envy 13.", price: 1299 },
            { name: "LENEVO", image: "lenevo.png", description: "Lenevo ThinkPad.", price: 969 },
            { name: "ASUS", image: "asus.png", description: "Asus ZenBook 13.", price: 799 },
            { name: "Acer", image: "acer.png", description: "Acer Aspire 3.", price: 650 },
            { name: "MSI Laptop", image: "msi.png", description: "MSI PS65.", price: 650 },
            { name: "RAZER Laptop", image: "razer.png", description: "Razer Blade 15.", price: 700 }
        ],
        "computers": [
            { name: "Apple IMAc", image: "imac.png", description: "the best computer.", price: 3600 },
            { name: "Pavillion Gaming Desktop", image: "pavilion.png", description: "16 HOURS battery life.", price: 3400 },
            { name: "Acer", image: "accer.png", description: "Acer Desktop.", price: 2000 },
            { name: "Asus", image: "asusrog.png", description: "ASUS ROG Zephyrus Desktop.", price: 1700 },
            { name: "MSI", image: "msi.png", description: "MSI Desktop.", price: 1500 },
            { name: "Cyberpower", image: "cyberpower.png", description: "Cyberpower Desktop.", price: 1299 },
            { name: "Dell Desktop", image: "dellinspiron.png", description: "upto 12 hours of battery life.", price: 2000.99 },
            { name: "Lenevo Idea", image: "lenevoidea.png", description: "Lenevo Ideacnter 310s.", price: 1799 }
        ],
		
        // More categories can be added similarly...
    };

    const categoryElements = document.querySelectorAll('.category');
    const productList = document.getElementById('productList');
    let shuffleTimer = null;

    categoryElements.forEach(cat => {
        cat.addEventListener('click', function () {
            clearInterval(shuffleTimer);
            displayProducts(categories[this.dataset.category]);
        });
    });

    function displayProducts(products) {
        productList.innerHTML = '';
        products.forEach(product => {
            const productCard = `<div class="product-card">
                <img src="${product.image}" alt="${product.name}" class="product-image">
                <div class="product-description">${product.description}</div>
                <div class="product-price">$${product.price}</div>
                <button class="buy-now">Buy Now</button>
            </div>`;
            productList.innerHTML += productCard;
        });
    }

    function shuffleProducts() {
        const allProducts = [].concat(...Object.values(categories));
        let shuffled = allProducts.sort(() => 0.5 - Math.random());
        displayProducts(shuffled.slice(0, 8));
    }

    shuffleTimer = setInterval(shuffleProducts, 3000);
    shuffleProducts();  // Initial shuffle display

    // Implement the search functionality
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', function () {
        clearInterval(shuffleTimer);
        const searchTerm = this.value.toLowerCase();
        let filteredProducts = [];
        Object.values(categories).forEach(cat => {
            filteredProducts = filteredProducts.concat(cat.filter(prod => prod.name.toLowerCase().includes(searchTerm)));
        });
        displayProducts(filteredProducts);
    });
});
