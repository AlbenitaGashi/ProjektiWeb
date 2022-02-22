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
/* 
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
}*/

function burgerKategoria(){
    document.querySelector(".asideBurger").style.display = "block";
    document.querySelector(".asideCover").style.display = "block";
    document.querySelector('.asideBurgerChildren').style.display = "none";
    setTimeout(() => {
        document.querySelector('.asideBurgerChildren').style.display = "block";
    }, 1000);
}
function removeAside(){
    /* document.getElementById("asideBurger").style.display = "none"; */
    document.querySelector('.asideBurger').classList.add("asideCoverRemove");
    //document.querySelector('.asideBurger').classList.remove("asideCover");
    document.querySelector('.asideBurgerChildren').style.display = "none";
    setTimeout(() => {
        document.querySelector('.asideCover').style.display = "none";
        document.querySelector('.asideBurger').style.display = "none";
        document.querySelector('.asideBurger').classList.remove("asideCoverRemove");
    }, 1000);
}