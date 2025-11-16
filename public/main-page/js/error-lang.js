// 🌐 FlexGigs Error Page - Language System
document.addEventListener("DOMContentLoaded", () => {
  const selector = document.getElementById("lang-selector");

  // Verifica si existe el selector
  if (!selector) {
    console.error("No se encontró el selector de idioma (#lang-selector)");
    return;
  }

  // Cargar idioma guardado o español por defecto
  const defaultLang = localStorage.getItem("errorLang") || "es";
  loadLanguage(defaultLang);
  selector.value = defaultLang;

  // Detectar cambio de idioma
  selector.addEventListener("change", (e) => {
    const lang = e.target.value;
    loadLanguage(lang);
    localStorage.setItem("errorLang", lang);
  });
});

// 🔄 Carga los textos del idioma seleccionado
function loadLanguage(lang) {
  const langPath = `../lang/error/error-${lang}.json`; //
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
      console.log(`Idioma cargado correctamente: ${lang}`);
    })
    .catch((err) => console.error(" Error cargando idioma:", err));
}
