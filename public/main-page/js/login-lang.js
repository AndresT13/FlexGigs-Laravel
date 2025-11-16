document.addEventListener("DOMContentLoaded", () => {
    const selector = document.getElementById("lang-selector");
    const savedLang = localStorage.getItem("lang");
    const defaultBrowser = navigator.language.slice(0, 2);

    const lang =
        savedLang ||
        (["en", "es", "pt"].includes(defaultBrowser) ? defaultBrowser : "en");
    selector.value = lang;

    loadNews(lang);

    selector.addEventListener("change", (e) => {
        const newLang = e.target.value;
        localStorage.setItem("lang", newLang);
        loadNews(newLang);
    });
});

async function loadNews(lang) {
    const container = document.getElementById("news-container");
    if (!container) return;

    container.innerHTML =
        lang === "es"
            ? "Cargando noticias..."
            : lang === "pt"
            ? "Carregando notícias..."
            : "Loading news...";

    const newsURL = `/main-page/news/news-${lang}.json`;

    try {
        const response = await fetch(newsURL);
        if (!response.ok) {
            container.innerHTML = "⚠️ No se pudieron cargar las noticias.";
            console.error("JSON no encontrado:", newsURL);
            return;
        }

        const data = await response.json();
        renderNews(data, lang);
    } catch (err) {
        console.error(err);
        container.innerHTML = "⚠️ No se pudieron cargar las noticias.";
    }
}

function renderNews(data, lang) {
    const container = document.getElementById("news-container");
    container.innerHTML = "";

    if (!data || !data.news) {
        container.innerHTML = "<p>No hay noticias disponibles.</p>";
        return;
    }

    data.news.forEach((item) => {
        const card = document.createElement("div");

        card.style.background = "#1a1347";
        card.style.padding = "15px";
        card.style.borderRadius = "12px";
        card.style.marginBottom = "15px";

        const readText =
            lang === "es"
                ? "Leer noticia"
                : lang === "pt"
                ? "Ler notícia"
                : "Read more";

        card.innerHTML = `
            <h4 style="color:#7fb3ff;">${item.title}</h4>
            <p style="color:#d9e4ff;">${item.description}</p>
            <a href="${item.url}" target="_blank" style="color:#9ad0ff;">
                ${readText}
            </a>
        `;

        container.appendChild(card);
    });
}
