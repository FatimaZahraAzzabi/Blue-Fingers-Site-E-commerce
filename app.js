let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'The str Jean',
        image: '1.jpg',
        price: 1000
    },
    {
        id: 2,
        name: 'Jean Blue',
        image: '2.jpg',
        price: 1000
    },
    {
        id: 3,
        name: 'Jean Blue B',
        image: '3.jpg',
        price: 2000
    },
    {
        id: 4,
        name: 'Chemise jean A',
        image: '4.jpg',
        price: 1200
    },
    {
        id: 5,
        name: 'Chemise jean B',
        image: '5.jpg',
        price: 1200
    },
    {
        id:6,
        name: 'Chemise jean C',
        image: '6.jpg',
        price: 1200
    },
    {
        id:7,
        name: 'PRODUCT NAME 7',
        image: '7.jpg',
        price: 1000
    },
    {
        id:8,
        name: 'PRODUCT NAME 8',
        image: '8.jpg',
        price: 1000
    },
    {
        id:9,
        name: 'PRODUCT NAME 9',
        image: '9.jpg',
        price: 1000
    },
    {
        id:10,
        name: 'PRODUCT NAME 10',
        image: '10.jpg',
        price: 1500
    },
    {
        id:11,
        name: 'PRODUCT NAME 11',
        image: '11.jpg',
        price: 1340
    },
    {
        id:12,
        name: 'PRODUCT NAME 12',
        image: '12.jpg',
        price: 1600
    },
    {
        id:13,
        name: 'PRODUCT NAME 12',
        image: '13.jpg',
        price: 1600
    },
    {
        id:14,
        name: 'PRODUCT NAME 12',
        image: '14.jpg',
        price: 1650
    },
    {
        id:15,
        name: 'PRODUCT NAME 12',
        image: '15.jpg',
        price: 1700
    },
    {
        id:16,
        name: 'PRODUCT NAME 16',
        image: '17.jpg',
        price: 1700
    },
    {
        id:17,
        name: 'PRODUCT NAME 17',
        image: '19.jpg',
        price: 1700
    },
    {
        id:18,
        name: 'PRODUCT NAME 118',
        image: '20.jpg',
        price: 1700
    }

];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="images/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}

function reloadCard() {
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key) => {
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if (value != null) {
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="images/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
            listCard.appendChild(newDiv);
        }
    });
    quantity.innerText = count;
    document.getElementById("totalPrice").textContent = totalPrice.toLocaleString();
    const payerLink = document.getElementById("payerLink");
    payerLink.href = `payer.php?total=${totalPrice}`;

    
}


function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
   
}
  

function redirectToPayment(totalPrice) {
    sessionStorage.setItem("prixTotal", totalPrice);
    const url = "payer.php";
    window.location.href = url;
}
 reloadCard();