document.addEventListener("DOMContentLoaded", () => {
  const selector = document.getElementById("lang-selector");
  const defaultLang = localStorage.getItem("lang") || "es";
  loadLanguage(defaultLang);
  selector.value = defaultLang;

  selector.addEventListener("change", (e) => {
    const lang = e.target.value;
    localStorage.setItem("lang", lang);
    loadLanguage(lang);
  });
});

function loadLanguage(lang) {
  const langPath = `../lang/privacy/privacy-${lang}.json`;
  console.log(`🌐 Cargando idioma desde: ${langPath}`);

  fetch(langPath)
    .then((res) => {
      if (!res.ok) throw new Error(`Archivo de idioma no encontrado: ${lang}`);
      return res.json();
    })
    .then((data) => {
      document.querySelectorAll("[data-lang]").forEach((el) => {
        const key = el.getAttribute("data-lang");
        if (data[key]) el.textContent = data[key];
      });
      console.log(`✅ Idioma cargado correctamente: ${lang}`);
    })
    .catch((err) => console.error(" Error cargando idioma:", err));
}
