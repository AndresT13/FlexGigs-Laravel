document.addEventListener("DOMContentLoaded", () => {
    fetch("https://dev.to/api/articles?per_page=5")
        .then((res) => res.json())
        .then((articles) => {
            let html = "";

            articles.forEach((article) => {
                html += `
                    <div style="background:#1a1347;padding:15px;border-radius:12px;margin-bottom:15px;">
                        <h4 style="color:#7fb3ff;">${article.title}</h4>
                        <p style="color:#cfdafe;">${
                            article.description ?? ""
                        }</p>
                        <a href="${
                            article.url
                        }" target="_blank" style="color:#9ad0ff;">
                            Leer noticia
                        </a>
                    </div>
                `;
            });

            document.getElementById("news-container").innerHTML = html;
        })
        .catch((err) => {
            console.error("Error cargando noticias:", err);
            document.getElementById("news-container").innerHTML =
                "<p>No se pudieron cargar las noticias.</p>";
        });
});
