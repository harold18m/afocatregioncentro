<!--header.blade.php-->
<header>
    <?php
    // Leer el contenido del archivo SVG
    $svgContent1 = file_get_contents(public_path('img/logo-afocat-001.svg'));

    // Codificar el contenido del archivo SVG en base64
    $svgBase65 = base64_encode($svgContent1);
    ?>
    <div class="header">
        <a href="https://www.afocatregioncentro.pe/">
        <img src="data:image/svg+xml;base64,{{ $svgBase65 }}" alt="Logo" class="mx-auto mb-2" />
        </a>
    </div>
</header>
