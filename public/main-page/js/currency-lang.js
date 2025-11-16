document.addEventListener("DOMContentLoaded", () => {
    const lang = localStorage.getItem("lang") || "es";
    prepareCurrencyMessages(lang);

    document
        .getElementById("lang-selector")
        ?.addEventListener("change", (e) => {
            const newLang = e.target.value;
            localStorage.setItem("lang", newLang);
            prepareCurrencyMessages(newLang);
        });
});

function prepareCurrencyMessages(lang) {
    const messages = {
        es: {
            title: "💱 Conversión COP a USD y EUR",
            placeholder: "Ingresa valor en COP",
            wait: "Ingresa un valor para convertir...",
            usd: "USD",
            eur: "EUR",
        },
        en: {
            title: "💱 COP to USD and EUR Conversion",
            placeholder: "Enter amount in COP",
            wait: "Enter a value to convert...",
            usd: "USD",
            eur: "EUR",
        },
        pt: {
            title: "💱 Conversão de COP para USD e EUR",
            placeholder: "Digite o valor em COP",
            wait: "Digite um valor para converter...",
            usd: "USD",
            eur: "EUR",
        },
    };

    const dict = messages[lang];

    document.querySelector("[data-lang='currency_title']").innerHTML =
        dict.title;
    document.querySelector(
        "[data-lang-placeholder='currency_placeholder']"
    ).placeholder = dict.placeholder;
    document.querySelector("[data-lang='currency_wait']").innerHTML = dict.wait;

    window.currencyLang = dict; // guardamos para el convertidor
}

document.getElementById("copInput").addEventListener("input", function () {
    let cop = this.value;
    if (!cop) return;

    fetch("https://api.exchangerate.host/latest?base=COP&symbols=USD,EUR")
        .then((res) => res.json())
        .then((data) => {
            let usd = (cop * data.rates.USD).toFixed(2);
            let eur = (cop * data.rates.EUR).toFixed(2);

            const dict = window.currencyLang;

            document.getElementById(
                "currency-result"
            ).innerHTML = `${dict.usd}: $${usd} — ${dict.eur}: €${eur}`;
        });
});
