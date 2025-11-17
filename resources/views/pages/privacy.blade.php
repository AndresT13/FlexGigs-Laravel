@extends('layouts.app')

@section('content')
<section class="container py-4">
  <main class="privacy-box">
      <h1 data-lang="privacy_title">Política de Privacidad</h1>
      <p data-lang="privacy_intro">
        En FlexGigs, valoramos tu privacidad y nos comprometemos a proteger tus
        datos personales.
      </p>

      <section>
        <h2 data-lang="privacy_section1_title">
          1. Información que recopilamos
        </h2>
        <p data-lang="privacy_section1_text">
          Recopilamos información personal que nos proporcionas directamente,
          como tu nombre, correo electrónico y preferencias de uso.
        </p>

        <h2 data-lang="privacy_section2_title">2. Uso de la información</h2>
        <p data-lang="privacy_section2_text">
          Utilizamos tus datos para ofrecer, mejorar y personalizar nuestros
          servicios, garantizando la mejor experiencia posible.
        </p>

        <h2 data-lang="privacy_section3_title">3. Seguridad de tus datos</h2>
        <p data-lang="privacy_section3_text">
          Implementamos medidas de seguridad técnicas y organizativas para
          proteger tu información contra el acceso no autorizado.
        </p>
      </section>

      <a href="{{route('index')}}" class="btn btn-primary" data-lang="privacy_back"
        >Volver al inicio</a
      >
    </main>
</section>
@endsection
