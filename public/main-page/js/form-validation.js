//  FlexGigs - Form Validation y Envío AJAX (multi-idioma)
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("pqrsForm");

    //  Verificación de existencia del formulario
    if (!form) {
        console.warn("No se encontró el formulario PQRS (#pqrsForm).");
        return;
    }

    //  Evento de envío
    form.addEventListener("submit", (event) => {
        event.preventDefault();

        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const type = document.getElementById("type");
        const message = document.getElementById("message");

        let errors = [];

        //  Validaciones básicas
        if (!name?.value.trim()) errors.push(getLangText("form_error_name"));
        if (!email?.value.trim()) {
            errors.push(getLangText("form_error_email_required"));
        } else if (!validateEmail(email.value)) {
            errors.push(getLangText("form_error_email_invalid"));
        }
        if (!type?.value || type.value === "Choose...") {
            errors.push(getLangText("form_error_type"));
        }
        if (!message?.value.trim())
            errors.push(getLangText("form_error_message"));

        //  Mostrar errores
        if (errors.length > 0) {
            alert(errors.join("\n"));
            return;
        }

        //  Si pasa las validaciones → Enviar datos por AJAX
        sendContactAjax(form);
    });
});

// ----------------------------
//  ENVÍO AJAX A LARAVEL
// ----------------------------
function sendContactAjax(form) {
    let formData = new FormData(form);

    fetch(form.getAttribute("action"), {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: formData,
    })
        .then(async (res) => {
            if (!res.ok) {
                let data = await res.json();
                if (data.errors) {
                    let msg = Object.values(data.errors)
                        .map((e) => "- " + e[0])
                        .join("\n");
                    alert(msg);
                }
                throw new Error("Error en envío");
            }
            return res.json();
        })
        .then((data) => {
            alert(data.message);
            form.reset();
        })
        .catch((err) => {
            console.error("Error:", err);
            alert("Hubo un error al enviar. Intenta nuevamente.");
        });
}

// ----------------------------
//  Validar email
// ----------------------------
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// ----------------------------
//  Multi-idioma
// ----------------------------
function getLangText(key) {
    const lang = localStorage.getItem("lang") || "en";

    const messages = {
        en: {
            form_error_name: "Name is required.",
            form_error_email_required: "Email is required.",
            form_error_email_invalid: "Email format is invalid.",
            form_error_type: "Please select a type of request.",
            form_error_message: "Message cannot be empty.",
            form_success: "Form submitted successfully!",
        },
        es: {
            form_error_name: "El nombre es obligatorio.",
            form_error_email_required: "El correo electrónico es obligatorio.",
            form_error_email_invalid: "El formato del correo no es válido.",
            form_error_type: "Selecciona un tipo de solicitud.",
            form_error_message: "El mensaje no puede estar vacío.",
            form_success: "¡Formulario enviado correctamente!",
        },
        pt: {
            form_error_name: "O nome é obrigatório.",
            form_error_email_required: "O e-mail é obrigatório.",
            form_error_email_invalid: "Formato de e-mail inválido.",
            form_error_type: "Selecione um tipo de solicitação.",
            form_error_message: "A mensagem não pode estar vazia.",
            form_success: "Formulário enviado com sucesso!",
        },
    };

    return messages[lang][key] || messages["en"][key] || key;
}

let map;
let marker;

// Coordenadas Bogotá y Miami
const locations = {
    bogota: { lat: 4.656071, lng: -74.059591 }, // Calle 26 / Salitre empresarial
    miami: { lat: 25.761681, lng: -80.191788 }, // Downtown Miami
};

function initMap() {
    const initial = locations.bogota;

    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: initial,
        styles: [
            { elementType: "geometry", stylers: [{ color: "#1d1b33" }] },
            {
                elementType: "labels.text.fill",
                stylers: [{ color: "#ffffff" }],
            },
            {
                elementType: "labels.text.stroke",
                stylers: [{ color: "#000000" }],
            },
        ],
    });

    marker = new google.maps.Marker({
        position: initial,
        map: map,
        title: "FlexGigs HQ Bogotá",
    });
}

// Cambiar entre Bogotá y Miami
function setLocation(city) {
    const target = locations[city];

    map.setCenter(target);
    marker.setPosition(target);

    marker.setTitle(
        city === "bogota" ? "FlexGigs HQ Bogotá" : "FlexGigs HQ Miami"
    );
}
