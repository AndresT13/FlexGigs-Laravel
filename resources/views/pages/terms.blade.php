@extends('layouts.app')

@section('content')

<section class="container py-5">
<br>
<br>    
<br>
  <body class="bg-gradient">

    <main class="terms-box">
      <h1 data-lang="terms_title">Términos y Condiciones del Servicio</h1>
      <p data-lang="terms_intro">
        Bienvenido a FlexGigs. Al acceder o utilizar nuestros servicios, aceptas
        los siguientes términos.
      </p>

      <section>
        <h2 data-lang="terms_section1_title">1. Aceptación de los términos</h2>
        <p data-lang="terms_section1_text">
          Al utilizar FlexGigs, confirmas que has leído, comprendido y aceptas
          estar sujeto a estos Términos y Condiciones.
        </p>

        <h2 data-lang="terms_section2_title">2. Uso permitido</h2>
        <p data-lang="terms_section2_text">
          Solo puedes usar nuestros servicios para fines legales y de acuerdo
          con las políticas establecidas por FlexGigs.
        </p>

        <h2 data-lang="terms_section3_title">3. Responsabilidad del usuario</h2>
        <p data-lang="terms_section3_text">
          Eres responsable de la información que compartes y del cumplimiento de
          las leyes aplicables durante el uso del sitio.
        </p>

        <h2 data-lang="terms_section4_title">4. Modificaciones</h2>
        <p data-lang="terms_section4_text">
          FlexGigs puede actualizar estos términos en cualquier momento. Te
          notificaremos los cambios relevantes.
        </p>

        <h2 data-lang="terms_section5_title">5. Contacto</h2>
        <p data-lang="terms_section5_text">
          Si tienes dudas sobre estos términos, contáctanos en
          soporte@flexgigs.com.
        </p>
      </section>

      <a href="{{route('index')}}" class="btn btn-primary" data-lang="terms_back"
        >Volver al inicio</a
      >
    </main>


    <script src="../js/terms-lang.js"></script>
  </body>
<section
@endsection
