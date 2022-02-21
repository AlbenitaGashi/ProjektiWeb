var index = 0;
var t;
var shporta = null;
console.log("Nr:" + index);
var images = document.getElementsByClassName("slideContent");
var startSlider = 0;
function slidechange(nr) {
    if (nr == 0 && startSlider == 0) {
        images[index].style.display = "block";
        startSlider++;
    }
    if (nr > 0) {
        images[index].style.display = "none";
        if (index >= images.length - 1) {
            index = -1;
        }
        images[++index].style.display = "block";

    }
    if (nr < 0) {
        images[index].style.display = "none";
        if (index <= 0) {
            index = 3;
        }
        index -= 1;
        images[index].style.display = "block";
    }
    clearTimeout(t);
    t = setTimeout(function () { slidechange(1); }, 4000);
}
document.body.addEventListener('load', slidechange(0));

const products = [
    { id: 0, imagePath: "product1.jpg", discount: 40, name: "Laptop Hp", cmimi: 1299.00, kategoria: "Laptop", descript: "HP 17-inch Laptop, 11th Generation Intel Core i5-1135G7, Intel Iris Xe Graphics, 8 GB RAM, 256 GB SSD, Windows 11 Home (17-cn0025nr,Natural Silver)" },
    { id: 1, imagePath: "product2.jpg", discount: 0, name: "Laptop  Bitecool", cmimi: 350.00, kategoria: "Laptop", descript: "Windows 10 Pro Laptop, BiTECOOL 2022 New 15.6 inches FHD(1920x1080) Display Pc Laptops, with Intel Celeron J4005 Dual Core, 6GB LPDDR4 and 120GB SSD, 2.4G WiFi, BT4.0 and Long Lasting Battery, Mic" },
    { id: 2, imagePath: "product3.png", discount: 20, name: "Asus Vivobook", cmimi: 1800.00, kategoria: "Laptop", descript: "Windows 10 Home - ASUS recommends Windows 10 Pro for business Up to 11th gen Intel® Core™ i7 processor Up to NVIDIA® GeForce® MX350 Up to 16 GB memory Up to 1 TB SSD Up to 15.6'' FHD NanoEdge display Multiple color option Optional 5.65'' ScreenPad™ with ScreenXpert 2.0" },
    { id: 3, imagePath: "product4.jpg", discount: 30, name: "Gaming mouse rgb", cmimi: 30.99, kategoria: "Aksesorë", descript: "MANIC G40 Gaming Mouse USB Wired RGB Gaming Mice - PMW 3360 Optical Sensor, 12K DPI Control Optical Control, Huano Switches, 6 Programmable Buttons for PC Windows 7810XPVista Linux [Black]" },
    { id: 4, imagePath: "product5.jpg", discount: 0, name: "Apple EarPods", cmimi: 20.99, kategoria: "Aksesorë", descript: "Apple EarPods with 3.5mm Headphone Plug - White" },
    { id: 5, imagePath: "product6.jpg", discount: 20, name: "USB Juanwe", cmimi: 19.50, kategoria: "Aksesorë", descript: "JUANWE 128GB USB 3.0 Flash Drive, Thumb Drive Speed up to 100MB/s, Swivel and LED Indicator Design Memory Stick for PC/Laptop/External Storage Data" },
    { id: 6, imagePath: "product11.jpeg", discount: 0, name: "Tablet Tab E", cmimi: 290.00, kategoria: "Phone/Tablet", descript: "Samsung Galaxy Tab E 9.6, Dimensionet:241.9 x 149.5 x 8.5 mm, Android 4.4 (KitKat) - EU model, Quad-core 1.3 GHz, 16GB 1.5GB RAM" },
    { id: 7, imagePath: "product8.jfif", discount: 20, name: "Cyberpower PC", cmimi: 2199.00, kategoria: "Pc", descript: "CyberpowerPC Gamer Xtreme VR Gaming PC, Intel Core i5-9400F 2.9GHz, NVIDIA GeForce GTX 1660 6GB, 8GB DDR4, 120GB SSD, 1TB HDD, WiFi Ready & Win 10 Home" },
    { id: 8, imagePath: "product9.jpg", discount: 0, name: "Iphone X", cmimi: 600.00, kategoria: "Phone/Tablet", descript: "5.8 OLED display, Faster A11 Bionic processor, Glass body, Edge-to-edge display, Facial Recognition, No Home button, Wireless inductive charging, Animoji" },
    { id: 9, imagePath: "product10.jpg", discount: 20, name: "Custom Gaming PC", cmimi: 999.99, kategoria: "Pc", descript: "Windows 10 Home, AMD Ryzen 5 3600, 6x 3.60 GHz, Gigabyte B550M S2H, S. AM4 v2, NVIDIA GeForce GTX 1660 SUPER 6GB, Cooler Master MasterBox MB520, RGB, 16GB DDR4-3200, AMD Standard Kühler, 500 GB | Crucial MX500" },
    { id: 10, imagePath: "product7.png", discount: 0, name: "Ndegjuse Raycon", cmimi: 82.00, kategoria: "Aksesorë", descript: "Raycon - H20 Wireless Noise-Cancelling Over-the-Ear Headphones" },
    { id: 11, imagePath: "product12.png", discount: 10, name: "Ndegjuse 1more", cmimi: 99.00, kategoria: "Aksesorë", descript: "Black 1More Comfobuds True Wireless In-Ear Headphones" },
]
window.onload = function () {
    let count = 0;
    var showElement = document.getElementById("products");
    var prodDisc;
    var countShowProduct = 0;
    products.forEach(product => { //function(product) 
        var discount = product.discount;
        if (discount != 0) {
            prodDisc = product.cmimi - (product.cmimi * product.discount / 100);
            showElement.innerHTML += `
        <div class="product" id="${product.id}"">
            <h2>${product.name}</h2>
            <div onclick="singleProd(${product.id})">
                <img src="Images/ProductImg/${product.imagePath}"  alt="" >
            </div>
            <h3 >Çmimi: <label style = "text-decoration :line-through">${product.cmimi}€</label>  ${prodDisc.toFixed(2)}€<label></label></h3>
            <div class="flex-Button-Heart">
                <button class = "addToCartIndex">Shto ne shporte</button>
                <img id="heartIconStyle" src="Images/Icons/heartIcon.png" alt="">
            </div>
        </div>`
        }
        else {
            showElement.innerHTML += `
        <div class="product" id="${product.id}"">
            <h2>${product.name}</h2>
            <div onclick="singleProd(${product.id})">
                <img src="Images/ProductImg/${product.imagePath}"  alt="" >
            </div>
            <h3>Çmimi: ${product.cmimi}€</h3>
            <div class="flex-Button-Heart">
            <button class = "addToCartIndex">Shto ne shporte</button>
            <img id="heartIconStyle" src="Images/Icons/heartIcon.png" alt="">
        </div>
        </div>`
        }
        countShowProduct++;
    });
};

function goBack() {
    document.getElementById("wrapper").style.display = "none";
    document.getElementById("hide-main-content").style.display = "flex";
    document.getElementById("hideProducts").style.display = "block";
    document.getElementById("category").style.display = "none";
}

function goBackCategory() {
    document.getElementById("hide-main-content").style.display = "flex";
    document.getElementById("hideProducts").style.display = "block";
    document.getElementById("category").style.display = "none";
}
function goBackDiscount() {
    document.getElementById("hide-main-content").style.display = "flex";
    document.getElementById("hideProducts").style.display = "block";
    document.getElementById("discount").style.display = "none";

}

function singleProd(id, inCategory, inDiscount) {
    document.getElementById("singleProd").style.display = "flex";
    document.getElementById("hide-main-content").style.display = "none";
    document.getElementById("hideProducts").style.display = "none";
    document.getElementById("category").style.display = "none";
    document.getElementById("discount").style.display = "none";
    var specificProduct = products[id];
    var discount = products[id].discount;
    var button;
    if (inCategory) {
        button = `<img id="arrowGoBack" src="Images/Icons/Arrow.png" onclick='category("${specificProduct.kategoria}")' alt="">`
    }
    else if (inDiscount) {
        document.getElementById("discount").style.display = "none";
        button = `<img id="arrowGoBack" src="Images/Icons/Arrow.png" onclick='discount("${20}")' alt="">`
    }
    else {
        button = `<img id="arrowGoBack" src="Images/Icons/Arrow.png" onclick='goBack()' alt=""></img>`
    }
    document.getElementById("singleProd").innerHTML = `
    <div id="wrapper">
    ${button}
        <div class="singleProd" id="${specificProduct.id}">
            <img src="Images/ProductImg/${specificProduct.imagePath}" alt="" >
            <div>
                <h1>Emri:</h1>
                <p>${specificProduct.name}</p>
                <h1>Çmimi:</h1>
                <p id ="cmimiSingleProd"></p>
                <h1>Pershkrimi:</h1>
                <p>${specificProduct.descript}</p>
                    <div class= "singlePButton">
                        <div class="heartButtonCart">
                            <button>Shto ne shporte</button>
                             <img id="heartIconStyle" src="Images/Icons/heartIcon.png" alt="">
                        </div>
                        <button class = "addToCart" onclick="orderNow('${id}')">Porosit tani!</button>
                    </div>
                </div>
        </div>
    </div>`;
    if (discount != 0) {
        prodDisc = products[id].cmimi - (products[id].cmimi * products[id].discount / 100);
        document.getElementById("cmimiSingleProd").innerHTML = `<label style = 'text-decoration :line-through'>${products[id].cmimi}€</label>  ${prodDisc.toFixed(2)}€<label></label>`;
    }
    else {
        document.getElementById("cmimiSingleProd").innerHTML = `${products[id].cmimi}€`;
    }
}
function category(kategori) {
    var nameCategory = document.getElementById("nameCategory");
    var productsCategory = document.getElementById("productsCategory");
    productsCategory.innerHTML = "";
    nameCategory.innerHTML = `
    <div class="headerCategory">
        <img id="arrowGoBack" src="Images/Icons/Arrow.png" onclick='goBackCategory()' alt="">
        <h1>Kategoria: ${kategori}</h1>
    </div>`;
    document.getElementById("hide-main-content").style.display = "none";
    document.getElementById("hideProducts").style.display = "none";
    document.getElementById("singleProd").style.display = "none";
    document.getElementById("category").style.display = "flex";
    for (let i in products) {
        console.log(products[i].kategoria);
        if (products[i].kategoria == kategori) {
            productsCategory.innerHTML += `
        <div class="product" id="${products[i].id}">
            <h2>${products[i].name}</h2>
            <div onclick="singleProd(${products[i].id}, true)">
            <img src="Images/ProductImg/${products[i].imagePath}" alt="" >
            </div>
            <h3>Çmimi: ${products[i].cmimi}€</h3>
            <div class="flex-Button-Heart">
                <button class = "addToCartIndex">Shto ne shporte</button>
                <img id="heartIconStyle" src="Images/Icons/heartIcon.png" alt="">
            </div>
        </div>`
        }
    }
}
function discount(disc) {
    document.getElementById("hide-main-content").style.display = "none";
    document.getElementById("hideProducts").style.display = "none";
    document.getElementById("discount").style.display = "flex";
    document.getElementById("singleProd").style.display = "none";
    var discount = document.getElementById("discount");
    discount.innerHTML = `<div><img id="arrowGoBack" src="Images/Icons/Arrow.png" onclick='goBackDiscount()' alt=""><h1>Top zbritjet e dites!</h1></div><div id="discountedProd"></div>`;
    var discProd = document.getElementById("discountedProd");
    discProd.style.display = "flex";
    discProd.style.flexWrap = "wrap";
    discProd.innerHTML = "";
    for (let i in products) {
        if (products[i].discount == disc) {
            var discountCmimi = products[i].cmimi - (products[i].cmimi * products[i].discount / 100);
            console.log(discountCmimi);
            discProd.innerHTML += `
        <div class="product" id="${products[i].id}">
            <h2>${products[i].name}</h2>
            <div onclick="singleProd(${products[i].id},${false},${true})">
            <img src="Images/ProductImg/${products[i].imagePath}" alt="" >
            </div>
            <h3>Çmimi: <label style = "text-decoration :line-through">${products[i].cmimi}€</label>  ${discountCmimi.toFixed(2)}€<label></label></h3>
            <div class="flex-Button-Heart">
                <button class = "addToCartIndex">Shto ne shporte</button>
                <img id="heartIconStyle" src="Images/Icons/heartIcon.png" alt="">
            </div>
        </div>`
        }
    }
}