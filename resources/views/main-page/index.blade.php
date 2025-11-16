@extends('layouts.app')
@section('content')

<!--  Hero Carousel -->
<section id="hero" class="mt-5">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('main-page/img/city.jpg')}}" class="d-block w-100" alt="City" />
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h1 class="fw-bold text-light" data-lang="hero_title">
                        Welcome to Your Professional Services
                    </h1>
                    <p class="text-light" data-lang="hero_sub">
                        Explore, connect, and collaborate — all in one place.
                    </p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{asset('main-page/img/digital.jpg')}}" class="d-block w-100" alt="Digital" />
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h1 class="fw-bold text-light" data-lang="hero_slide2_title">
                        Empower Your Digital Presence
                    </h1>
                    <p class="text-light" data-lang="hero_slide2_sub">
                        Development, branding and more.
                    </p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{asset('main-page/img/business.jpg')}}" class="d-block w-100" alt="Business" />
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h1 class="fw-bold text-light" data-lang="hero_slide3_title">
                        Smart Solutions
                    </h1>
                    <p class="text-light" data-lang="hero_slide3_sub">
                        Innovation, design and strategy combined.
                    </p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden" data-lang="btn_prev">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden" data-lang="btn_next">Next</span>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                aria-current="true"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
    </div>
</section>

<br /><br /><br />

<!--  Services -->
<section id="services" class="services">
    <h2 data-lang="services_title">Our Services</h2>

    <div class="service">
        <img src="{{asset('main-page/img/programming.jpg')}}" alt="Programming" />
        <h3 data-lang="srv_programming">Programming</h3>
        <p data-lang="srv_programming_desc">
            Explore top-notch programming solutions tailored to your needs.
        </p>
    </div>

    <div class="service">
        <img src="{{asset('main-page/img/graphic.jpg')}}" alt="Graphic" />
        <h3 data-lang="srv_design">Graphic Design</h3>
        <p data-lang="srv_design_desc">
            Discover creative design solutions that bring your visions to life.
        </p>
    </div>

    <div class="service">
        <img src="{{asset('main-page/img/digital.jpg')}}" alt="Digital" />
        <h3 data-lang="srv_digital">Digital Marketing</h3>
        <p data-lang="srv_digital_desc">
            Enhance your brand's online presence with expert marketing.
        </p>
    </div>

    <div class="service">
        <img src="{{asset('main-page/img/business.jpg')}}" alt="Business" />
        <h3 data-lang="srv_business">Business</h3>
        <p data-lang="srv_business_desc">
            Get professional advice to drive your business forward.
        </p>
    </div>
</section>



<!-- About -->
<section id="about" class="about">
    <h2 data-lang="about_title">About Us</h2>
    <p data-lang="about_text_one">
        FlexGigs is a global web platform designed to revolutionize the way
        professionals and clients connect in the digital ecosystem...
    </p>

    <br /><br />
    <p data-lang="about_text_two">
        The project is based on the belief that technology should serve...
    </p>

    <br /><br />
    <p data-lang="about_text_three">
        Through modern tools developed with HTML5, CSS3, and Bootstrap...
    </p>

    <br /><br />
    <p data-lang="about_text_four">
        Every professional can build their profile, showcase their experience...
    </p>
</section>

<section id="news">
    <h2 data-lang="news_title"> Noticias Tecnológicas</h2>
    <div id="news-container">Cargando noticias...</div>
</section>



<script>
document.addEventListener("DOMContentLoaded", () => {
    const selector = document.getElementById("lang-selector");

    // Idioma inicial
    const lang = localStorage.getItem("lang") || "es";
    loadNewsLanguage(lang);

    // Cambio de idioma manual
    selector?.addEventListener("change", (e) => {
        const newLang = e.target.value;
        localStorage.setItem("lang", newLang);
        loadNewsLanguage(newLang);
        loadNews(); // volver a renderizar noticias con texto traducido
    });

    // Cargar noticias al inicio
    loadNews();
});

// ---------------------------
// 🔵 1. Diccionario y cambio de idioma
// ---------------------------
function loadNewsLanguage(lang) {
    const messages = {
        es: {
            news_title: " Noticias Tecnológicas",
            loading: "Cargando noticias...",
            read_more: "Leer noticia",
            error: "No se pudieron cargar las noticias."
        },
        en: {
            news_title: " Tech News",
            loading: "Loading news...",
            read_more: "Read article",
            error: "Failed to load news."
        },
        pt: {
            news_title: " Notícias de Tecnologia",
            loading: "Carregando notícias...",
            read_more: "Ler notícia",
            error: "Não foi possível carregar as notícias."
        }
    };

    const dict = messages[lang];

    // Actualizar título
    const title = document.querySelector("[data-lang='news_title']");
    if (title) title.innerHTML = dict.news_title;

    // Actualizar mensaje de carga si corresponde
    const container = document.getElementById("news-container");
    if (container && container.innerHTML.trim().length < 40) { 
        container.innerHTML = dict.loading;
    }

    // Guardar para el script principal
    window.newsLang = dict;
}

// ---------------------------
// 🔵 2. Cargar y mostrar noticias
// ---------------------------
function loadNews() {
    const container = document.getElementById("news-container");

    container.innerHTML = window.newsLang?.loading || "Cargando noticias...";

    fetch("https://hacker-news.firebaseio.com/v0/topstories.json")
        .then(res => res.json())
        .then(async ids => {
            const selected = ids.slice(0, 5);
            let html = "";

            for (let id of selected) {
                const res = await fetch(`https://hacker-news.firebaseio.com/v0/item/${id}.json`);
                const data = await res.json();

                if (!data) continue;

                const link = data.url ?? `https://news.ycombinator.com/item?id=${id}`;

                html += `
                    <div style="background:#1a1347;padding:15px;border-radius:12px;margin-bottom:15px;">
                        <h4 style="color:#7fb3ff;">${data.title}</h4>
                        <a href="${link}" target="_blank" style="color:#9ad0ff;">
                            ${window.newsLang?.read_more}
                        </a>
                    </div>
                `;
            }

            container.innerHTML = html;
        })
        .catch(err => {
            console.error("Error cargando noticias:", err);
            container.innerHTML =
                `<p>${window.newsLang?.error || "Error al cargar noticias."}</p>`;
        });
}
</script>



<!-- Clients -->
<section id="clients" class="clients">
    <h2 data-lang="clients_title">What Our Clients Say</h2>
    <div class="testimonials">
        <div class="testimonial">
            <p data-lang="client_1">"FlexGigs transformed our digital presence..."</p>
            <h4>— Laura G., CEO at Innovatech</h4>
        </div>
        <div class="testimonial">
            <p data-lang="client_2">"The graphic design service was incredible..."</p>
            <h4>— Daniel R., Creative Director</h4>
        </div>
        <div class="testimonial">
            <p data-lang="client_3">"Professional, reliable, and efficient..."</p>
            <h4>— Maria S., Entrepreneur</h4>
        </div>
    </div>
</section>



<section id="currency" class="mt-5 text-center" style="color:white;">
    <h3 data-lang="currency_title"> Conversión COP a USD y EUR</h3>

    <input id="copInput" 
           type="number" 
           class="form-control w-50 mx-auto" 
           data-lang-placeholder="currency_placeholder"
           placeholder="Ingresa valor en COP" />

    <p id="currency-result" class="mt-3" data-lang="currency_wait">
        Ingresa un valor para convertir...
    </p>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const lang = localStorage.getItem("lang") || "es";
    prepareCurrencyMessages(lang);

    document.getElementById("lang-selector")?.addEventListener("change", e => {
        const newLang = e.target.value;
        localStorage.setItem("lang", newLang);
        prepareCurrencyMessages(newLang);
    });
});

function prepareCurrencyMessages(lang) {
    const messages = {
        es: {
            title: " Conversión COP a USD y EUR",
            placeholder: "Ingresa valor en COP",
            wait: "Ingresa un valor para convertir...",
            usd: "USD",
            eur: "EUR"
        },
        en: {
            title: " COP to USD and EUR Conversion",
            placeholder: "Enter amount in COP",
            wait: "Enter a value to convert...",
            usd: "USD",
            eur: "EUR"
        },
        pt: {
            title: " Conversão de COP para USD e EUR",
            placeholder: "Digite o valor em COP",
            wait: "Digite um valor para converter...",
            usd: "USD",
            eur: "EUR"
        }
    };

    const dict = messages[lang];

    document.querySelector("[data-lang='currency_title']").innerHTML = dict.title;
    document.querySelector("[data-lang-placeholder='currency_placeholder']").placeholder = dict.placeholder;
    document.querySelector("[data-lang='currency_wait']").innerHTML = dict.wait;

    window.currencyLang = dict; // guardamos para el convertidor
}

document.getElementById("copInput").addEventListener("input", function () {
    let cop = this.value;
    if (!cop) return;

    fetch("https://api.exchangerate.host/latest?base=COP&symbols=USD,EUR")
        .then(res => res.json())
        .then(data => {
            let usd = (cop * data.rates.USD).toFixed(2);
            let eur = (cop * data.rates.EUR).toFixed(2);

            const dict = window.currencyLang;

            document.getElementById("currency-result").innerHTML =
                `${dict.usd}: $${usd} — ${dict.eur}: €${eur}`;
        });
});
</script>



<!-- Contact -->
<section id="contact" class="contact">
    <h2 data-lang="contact_title">Get in Touch</h2>
    <p data-lang="contact_sub">
        Have questions or need assistance? We're here to help!
    </p>

    <form id="pqrsForm" action="{{ url('/contacto') }}" method="POST">
        @csrf

        <input type="text" id="name" name="nombre" placeholder="Your Name"
            required />

        <input type="email" id="email" name="email" placeholder="Your Email"
            required />

        <select id="type" name="tipo" required>
            <option value="">Choose...</option>
            <option value="Programming">Programming</option>
            <option value="Design">Design</option>
            <option value="Marketing">Marketing</option>
            <option value="Business">Business</option>
        </select>

        <textarea id="message" name="mensaje" placeholder="Your Message" required></textarea>

        <button type="submit" id="btnSend">Send Message</button>
    </form>

    <div id="msg"></div>
</section>

<section id="weather" class="mt-5 text-center" style="color:white;">
    <h3 data-lang="weather_title"> Clima Actual</h3>

    <input id="cityInput"
           type="text"
           class="form-control w-50 mx-auto"
           data-lang-placeholder="weather_placeholder"
           placeholder="Ingresa una ciudad" />

    <button id="checkWeather" class="btn btn-primary mt-3" data-lang="weather_button">
        Consultar Clima
    </button>

    <p id="weather-result" class="mt-3" data-lang="weather_wait">
        Ingresa una ciudad para ver el clima...
    </p>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const lang = localStorage.getItem("lang") || "es";
    prepareWeatherMessages(lang);

    document.getElementById("lang-selector")?.addEventListener("change", e => {
        const newLang = e.target.value;
        localStorage.setItem("lang", newLang);
        prepareWeatherMessages(newLang);
    });

    document.getElementById("checkWeather").addEventListener("click", loadWeather);
});

/* -----------------------------
   📌 Diccionario Multi-Idioma
----------------------------- */
function prepareWeatherMessages(lang) {
    const messages = {
        es: {
            title: " Clima Actual",
            placeholder: "Ingresa una ciudad",
            button: "Consultar Clima",
            wait: "Ingresa una ciudad para ver el clima...",
            error: "No se pudo obtener el clima."
        },
        en: {
            title: "Current Weather",
            placeholder: "Enter a city",
            button: "Check Weather",
            wait: "Enter a city to check the weather...",
            error: "Could not retrieve weather data."
        },
        pt: {
            title: "Clima Atual",
            placeholder: "Digite uma cidade",
            button: "Consultar Clima",
            wait: "Digite uma cidade para ver o clima...",
            error: "Não foi possível obter o clima."
        }
    };

    const dict = messages[lang];

    // Cambiar textos del DOM
    document.querySelector("[data-lang='weather_title']").innerHTML = dict.title;
    document.querySelector("[data-lang-placeholder='weather_placeholder']").placeholder = dict.placeholder;
    document.querySelector("[data-lang='weather_button']").innerHTML = dict.button;
    document.querySelector("[data-lang='weather_wait']").innerHTML = dict.wait;

    // Guardar diccionario activo
    window.weatherLang = dict;
}

/* -----------------------------
   🌦️ Consulta del Clima
----------------------------- */
function loadWeather() {
    const city = document.getElementById("cityInput").value.trim();
    const result = document.getElementById("weather-result");
    const dict = window.weatherLang;

    if (!city) {
        result.innerHTML = dict.wait;
        return;
    }

    result.innerHTML = "⏳ ...";

    // 1. Buscar coordenadas de la ciudad
    fetch(`https://geocoding-api.open-meteo.com/v1/search?name=${city}`)
        .then(res => res.json())
        .then(data => {
            if (!data.results || data.results.length === 0) {
                result.innerHTML = dict.error;
                return;
            }

            const lat = data.results[0].latitude;
            const lon = data.results[0].longitude;

            // 2. Obtener el clima usando las coordenadas
            return fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,weather_code`);
        })
        .then(res => res.json())
        .then(weather => {
            if (!weather || !weather.current) {
                result.innerHTML = dict.error;
                return;
            }

            const temp = weather.current.temperature_2m;

            result.innerHTML = `
                🌡️ <strong>${temp}°C</strong><br>
                📍 ${city}
            `;
        })
        .catch(() => {
            result.innerHTML = dict.error;
        });
}
</script>


<script>
function loadWeather(lat, lon) {
    fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true`)
        .then(res => res.json())
        .then(data => {
            document.getElementById("weather-result").innerHTML =
                `🌡️ ${data.current_weather.temperature}°C — ${data.current_weather.windspeed} km/h viento`;
        })
        .catch(() => {
            document.getElementById("weather-result").innerHTML = " No se pudo cargar el clima.";
        });
}

// Por defecto carga clima de Bogotá
loadWeather(4.7110, -74.0721);
</script>


<!-- Location / Google Maps Mashup -->
<!-- ======================== -->
<!-- 🌍 NUESTRA UBICACIÓN -->
<!-- ======================== -->

<section id="map-section" class="mt-5 text-center" style="color:white;">
    <h3 data-lang="map_title"> Nuestra Ubicación</h3>
    <p data-lang="map_subtitle">Encuéntranos fácilmente en el mapa</p>

    <div class="my-3">
        <button id="btnBogota" class="btn btn-primary mx-2" data-lang="btn_bogota">Bogotá</button>
        <button id="btnMiami" class="btn btn-secondary mx-2" data-lang="btn_miami">Miami</button>
    </div>

    <div id="map" style="height: 350px; width: 90%; margin: 20px auto; border-radius: 10px;"></div>
</section>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">


<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">


<!-- CSS Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- JS Leaflet -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    initMap();
    setupButtons();

    const lang = localStorage.getItem("lang") || "es";
    prepareMapMessages(lang);

    document.getElementById("lang-selector")?.addEventListener("change", (e) => {
        const newLang = e.target.value;
        localStorage.setItem("lang", newLang);
        prepareMapMessages(newLang);
        updatePopupText();
    });
});

/* -----------------------------------------
   🌍 Textos multi-idioma del mapa
-----------------------------------------*/
function prepareMapMessages(lang) {
    const messages = {
        es: {
            title: "📍 Nuestra Ubicación",
            subtitle: "Encuéntranos fácilmente en el mapa",
            popup_bogota: " FlexGigs — Sede Bogotá",
            popup_miami: " FlexGigs — Oficina Miami",
            bogota_btn: "Bogotá",
            miami_btn: "Miami"
        },
        en: {
            title: "📍 Our Location",
            subtitle: "Find us easily on the map",
            popup_bogota: " FlexGigs — Bogotá Office",
            popup_miami: "FlexGigs — Miami Office",
            bogota_btn: "Bogotá",
            miami_btn: "Miami"
        },
        pt: {
            title: "📍 Nossa Localização",
            subtitle: "Encontre-nos no mapa",
            popup_bogota: " FlexGigs — Escritório Bogotá",
            popup_miami: "FlexGigs — Escritório Miami",
            bogota_btn: "Bogotá",
            miami_btn: "Miami"
        }
    };

    const dict = messages[lang];

    document.querySelector("[data-lang='map_title']").innerHTML = dict.title;
    document.querySelector("[data-lang='map_subtitle']").innerHTML = dict.subtitle;
    document.querySelector("[data-lang='btn_bogota']").innerHTML = dict.bogota_btn;
    document.querySelector("[data-lang='btn_miami']").innerHTML = dict.miami_btn;

    window.mapMessages = dict;
}

/* -----------------------------------------
   🗺️ INICIALIZAR MAPA
-----------------------------------------*/
let map;
let currentMarker;

function initMap() {
    const bogota = [4.7110, -74.0721];

    map = L.map("map").setView(bogota, 13);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 19,
        attribution: "© OpenStreetMap"
    }).addTo(map);

    currentMarker = L.marker(bogota)
        .addTo(map)
        .bindPopup(window.mapMessages?.popup_bogota || "Bogotá")
        .openPopup();
}

/* -----------------------------------------
   🔘 BOTONES: Bogotá y Miami
-----------------------------------------*/
function setupButtons() {
    document.getElementById("btnBogota")?.addEventListener("click", () => {
        moveTo([4.7110, -74.0721], window.mapMessages.popup_bogota);
    });

    document.getElementById("btnMiami")?.addEventListener("click", () => {
        moveTo([25.7617, -80.1918], window.mapMessages.popup_miami);
    });
}

/* -----------------------------------------
   📍 Cambiar ubicación en el mapa
-----------------------------------------*/
function moveTo(coords, popupText) {
    map.setView(coords, 13);

    // Si existe marcador previo → elimínalo
    if (currentMarker) {
        map.removeLayer(currentMarker);
    }

    currentMarker = L.marker(coords)
        .addTo(map)
        .bindPopup(popupText)
        .openPopup();
}

/* -----------------------------------------
   🔄 Actualizar popup cuando cambia idioma
-----------------------------------------*/
function updatePopupText() {
    if (!currentMarker) return;

    const { lat } = currentMarker.getLatLng();

    if (Math.abs(lat - 4.7110) < 0.01) {
        currentMarker.bindPopup(window.mapMessages.popup_bogota);
    } else {
        currentMarker.bindPopup(window.mapMessages.popup_miami);
    }

    currentMarker.openPopup();
}
</script>


@endsection

@section('scripts')
@endsection


