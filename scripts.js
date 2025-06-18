/*!
* Start Bootstrap - Agency v7.0.12 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    //  Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

const productos = [
  {
    nombre: "Viaje a Bariloche",
    tipo: "viaje",
    imagen: "assets/img/bariloche.jpg"
  },
  {
    nombre: "Hotel 5 estrellas en Mendoza",
    tipo: "hotel",
    imagen: "assets/img/mendoza-hotel.jpg"
  },
  {
    nombre: "Alquiler de auto en Córdoba",
    tipo: "auto",
    imagen: "assets/img/cordoba-auto.jpg"
  }
];

const contenedor = document.getElementById("productos");
let carrito = [];

productos.forEach((prod, index) => {
  const card = document.createElement("div");
  card.className = "producto";
  card.innerHTML = `
    <img src="${prod.imagen}" alt="${prod.nombre}">
    <h3>${prod.nombre}</h3>
    <p>Tipo: ${prod.tipo}</p>
    <button onclick="agregarAlCarrito(${index})">Agregar al carrito</button>
  `;
  contenedor.appendChild(card);
});

function agregarAlCarrito(index) {
  carrito.push(productos[index]);
  document.getElementById("cart-count").textContent = carrito.length;
  alert("Producto agregado al carrito.");
}

  function abrirLogin() {
      document.getElementById('loginOverlay').style.display = 'flex';
      setTimeout(() => {
        document.getElementById('loginOverlay').classList.add('show');
      }, 10);
    }

    function cerrarLogin() {
      const overlay = document.getElementById('loginOverlay');
      overlay.classList.remove('show');
      setTimeout(() => {
        overlay.style.display = 'none';
      }, 300);
    }

      function login() {
    const user = document.getElementById('username').value;
    const pass = document.getElementById('password').value;
    if (user === 'usuario' && pass === '1234') {
      document.getElementById('login-container').style.display = 'none';
    } else {
      document.getElementById('login-error').style.display = 'block';
    }
  }

      // // carrito
    // Event listener para agregar hotel al carrito
    hotelContainer.addEventListener('click', (event) => {
        if (event.target.classList.contains('add-to-cart-btn')) {
            const hotelCard = event.target.closest('.hotel-card');
            const hotelId = hotelCard.dataset.id;
            const hotelName = hotelCard.dataset.name;
            const hotelPrice = parseFloat(hotelCard.dataset.price);

            const hotel = {
                id: hotelId,
                name: hotelName,
                price: hotelPrice
            };

            // Verificar si el hotel ya está en el carrito (para evitar duplicados por ID)
            const existsInCart = cart.some(item => item.id === hotelId);

            if (!existsInCart) {
                cart.push(hotel);
                renderCart();
                alert(`${hotelName} ha sido agregado al carrito.`);
            } else {
                alert(`${hotelName} ya está en tu carrito.`);
            }
        }
    });