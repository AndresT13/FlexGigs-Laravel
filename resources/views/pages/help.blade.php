@extends('layouts.app')

@section('content')

<section class="container py-5">

 <main class="help-box">

      <h1 data-lang="help_title">Centro de Ayuda</h1>
      <p data-lang="help_intro">
        Encuentra respuestas a las preguntas más comunes o contacta con nuestro
        equipo de soporte.
      </p>

      <section class="faq">
        <h2 data-lang="help_faq_title">Preguntas Frecuentes</h2>

        <h3 data-lang="help_q1">¿Cómo creo una cuenta en FlexGigs?</h3>
        <p data-lang="help_a1">
          Puedes registrarte fácilmente desde la página de inicio haciendo clic
          en “Crear Cuenta” y completando el formulario.
        </p>

        <h3 data-lang="help_q2">¿Puedo cambiar el idioma de la plataforma?</h3>
        <p data-lang="help_a2">
          Sí, puedes seleccionar tu idioma preferido en el menú desplegable en
          la esquina superior derecha.
        </p>

        <h3 data-lang="help_q3">¿Dónde puedo contactar soporte técnico?</h3>
        <p data-lang="help_a3">
          Si tienes algún problema, envíanos un mensaje a soporte@flexgigs.com y
          responderemos lo antes posible.
        </p>
      </section>


      <a href="{{route('index')}}" class="btn btn-primary" data-lang="help_back"
        >Volver al inicio</a
      >
    </main>
    </section>

@endsection
