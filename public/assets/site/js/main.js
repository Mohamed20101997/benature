var swiper = new Swiper('.new-slider', {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    //autoplay:true,
    // init: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    }
});

function sortPrice() {
    var priceinp = document.getElementById("priceinp").value;
    var prodprice = Array.from(document.querySelectorAll(".product .price"));
    var product = Array.from(document.querySelectorAll(".product"));
    var y = [];
    for (var i = 0; i < prodprice.length; i++) {
        var numprice = [prodprice[i].innerText.substr(1, prodprice[i].length)];
        y.push(numprice);
        for (var x = 0; x < product.length; x++) {
            if (priceinp >= y[x]) {
                product[x].style.display = "block";
            } else { product[x].style.display = "none"; }
        }

    }

}
var up_dowm_btn = document.querySelector('.up-down-btn');
window.onscroll = function() {
    var top = window.scrollY;
    if (top >= 200) {
        up_dowm_btn.classList.add("d-flex");
        up_dowm_btn.addEventListener("click", function() {
            window.scrollTo(0, 0);
        })
    } else {
        up_dowm_btn.classList.remove("d-flex");
    }
}
var dowmbtn = document.getElementsByClassName('down');
var upbtn = document.getElementsByClassName('up');
for (var i = 0; i < upbtn.length; i++) {
    var button = upbtn[i];
    button.addEventListener('click', function(event) {
        var btnClicked = event.target;

        var input = btnClicked.parentElement.children[1];
        console.log(input);
        var inputValue = input.value;
        var newValue = parseInt(inputValue) + 1;
        if (newValue <= 20) {
            input.value = newValue;
        }
    })


}
for (var i = 0; i < dowmbtn.length; i++) {
    var button = dowmbtn[i];
    button.addEventListener('click', function(event) {
        var btnClicked = event.target;

        var input = btnClicked.parentElement.children[1];
        console.log(input);
        var inputValue = input.value;
        var newValue = parseInt(inputValue) - 1;
        if (newValue >= 0) {
            input.value = newValue;
        }
    })
}