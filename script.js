const form = document.querySelector(".wrapper form");
const fullURL = form.querySelector("input");
const shortenBtn = form.querySelector("form button");
const blurEffect = document.querySelector(".blur-effect");
const popupBox = document.querySelector(".popup-box");
const infoBox = popupBox.querySelector(".info-box");
const form2 = popupBox.querySelector("form");
const shortenURL = popupBox.querySelector("form .shorten-url");
const copyIcon = popupBox.querySelector("form .copy-icon");
const saveBtn = popupBox.querySelector("button");

form.addEventListener("submit", e => {
    e.preventDefault();
});

shortenBtn.addEventListener("click", () => {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/url-controll.php", true);
    xhr.addEventListener("load", () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = xhr.response;
            if (data.length <= 5) {
                blurEffect.style.display = "block";
                popupBox.classList.add("show");

                // Pega aquí tu dominio: entreunosyceros.net/
                const domain = "acortador.entreunosyceros.net/";
                shortenURL.value = domain + data;

                copyIcon.addEventListener("click", () => {
                    shortenURL.select();
                    document.execCommand("copy");
                });

                saveBtn.addEventListener("click", () => {
                    form2.addEventListener("submit", e => {
                        e.preventDefault();
                    });

                    const xhr2 = new XMLHttpRequest();
                    xhr2.open("POST", "php/save-url.php", true);
                    xhr2.addEventListener("load", () => {
                        if (xhr2.readyState === 4 && xhr2.status === 200) {
                            const data = xhr2.response;
                            if (data === "success") {
                                location.reload();
                            } else {
                                infoBox.classList.add("error");
                                infoBox.innerText = data;
                            }
                        }
                    });

                    const shorten_url1 = shortenURL.value;
                    const hidden_url = data;
                    xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr2.send(`shorten_url=${shorten_url1}&hidden_url=${hidden_url}`);
                });
            } else {
                alert(data);
            }
        }
    });

    const formData = new FormData(form);
    xhr.send(formData);
});

  //copiar URL al portapapeles
  const clipboardBtns = document.querySelectorAll('.copy-button');
clipboardBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const urlShort = btn.getAttribute('data-clipboard-text');
    navigator.clipboard.writeText(urlShort);

    // Cambiar el texto del botón a "Copiado" y añadir la clase "copied"
    btn.textContent = 'Copiado';
    btn.classList.add('copied');

    // Después de 3 segundos, cambiar el texto del botón a "Copiar" de nuevo y quitar la clase "copied"
    setTimeout(() => {
      btn.textContent = 'Copiar';
      btn.classList.remove('copied');
    }, 3000);
  });
});

// Borrar enlace
// Asocia el evento click al elemento padre
document.addEventListener('click', function(event) {
  // Comprueba si el elemento que se ha hecho clic tiene el ID 'borrar-enlace'
  if (event.target.id === 'borrar-enlace') {
    event.preventDefault(); // Evita que se ejecute el enlace

    var request = new XMLHttpRequest();
    request.open('GET', event.target.href, true);

    request.onload = function() {
      if (request.status >= 200 && request.status < 400) {
        location.reload(); // Actualiza la página
      }
    };

    request.send();
  }
});

// Abrir en nueva pestaña y actualizar

const shortenUrls = document.querySelectorAll('.shorten-url');
    shortenUrls.forEach(url => {
        url.addEventListener('click', e => {
            // Prevenir el comportamiento por defecto del enlace
            e.preventDefault();

            // Abrir el enlace en una nueva pestaña
            window.open(url.href, '_blank');

            // Esperar 1 segundo antes de recargar la página
            setTimeout(() => {
                location.reload();
            }, 1000);
        });
    });