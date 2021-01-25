<?php
session_start();
require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include("../includes/head.inc.html")?>
  <title>Blog | Jasmin's Travel Blog</title>

</head>

<body>

  <!-- Navigation -->
  <?php include("../includes/nav_pages.inc.php")?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/logo_without_title_favicon.svg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Love at first sight</h1>
            <span class="subheading">Länder, welche mich gleich gepackt haben und ich immer wieder besuchen
              könnte!</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->

  <!-- VORBEREITUNG SQL DATENBANK STRUKTUR IN HTML -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <!-- ***COUNTRY*** aus home möglich im Kommentarfeld?*** Anonsten nur "Country Article" anstatt z.B. Japan Article -->
          <h2 id="***C O U N T R Y aus home***">***TITLE aus home***</h2>
          <span class="meta"><em>Gepostet am ***POST_DATE aus home***</em></span>
          <p>***CONTENT***</p>
          <p>***CONTENT***</p>
          <p>***CONTENT***</p>

          <!-- Gallery ***COUNTRY*** aus home möglich im Kommentarfeld?*** Anonsten nur "Gallery Country" anstatt z.B. Gallery Japan -->
          <section id="gallery-***C O U N T R Y aus home***" class="d-flex justify-content-center flex-wrap">
            <a href="../img/***I M G _ F I L E N A M E***" data-lightbox="***C O U N T R Y aus home***"
              data-title="***IMG_CAPTION***"><img src="../img/***I M G _ F I L E N A M E***"
                alt="***IMG_DESCRIPTION***" height="200"
                class="border border-white"></a>
          </section>
          
          <br>
          <hr>
          <br>

          <div id="olderposts"></div>
        </div>
      </div>
    </div>
  </article>
  <br>
  <hr>

  <!-- ENDE // VORBEREITUNG SQL DATENBANK STRUKTUR IN HTML -->



  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <!-- Japan Article -->
          <h2 id="japan">JAPAN&nbsp;&ndash; Das Land der aufgehenden Sonne.</h2>
          <span class="meta"><em>Gepostet von
              <a href="about">Jasmin</a>
              am 8. November 2020</em></span>
          <p>Kaum in einem anderen Land habe ich als ich das erste Mal dort war (soweit ich mich als kleines Kind
            erinnern mag) einen solchen Kulturschock&nbsp;&ndash; im positiven Sinn!&nbsp;&ndash; erlebt.
            Angefangen mit den wilden aber auch zuckersüssen Prinzessin-Verkleidungen, den beheizten Toiletten
            oder den lustig verzierten Getränkeautomaten&nbsp;&ndash; einfach alles ein bisschen übertrieben
            halt. <i class="far fa-laugh-squint"></i></p>

          <p>Andererseits wofür Japan bekannt ist, sind die atemberaubenden Landschaften, Tempel, die
            Kirschblütenzeit sowie das traditionelle Kleidungsstück Kimono, welche auch unter den Touristen sehr
            beliebt ist. Auch kann man es das Land der Gegensätze nennen: Während es Roboterhotel gibt, wird an
            vielen Orten immer noch «cash only» akzeptiert.</p>

          <p>In den letzten 2 Wochen haben wir nebst der immer wieder gern besuchten Stadt Kyoto auch einige
            Stationen wieder durchgemacht, welche ich nur noch sehr vage in Erinnerung hatte. Insbesondere auf
            den goldenen Tempel Kinkaku-ji sowie auf die Insel Miyajima, wo die Rehe frei herumlaufen, habe ich
            mich sehr gefreut.</p>

          <p>Japan ist ein Land, deren Schönheit mir immer wieder imponiert und ich mich nie satt sehen kann.
            Zudem fühle ich mich durch die sehr zuvorkommenden und freundlichen Japaner supergut aufgehoben. Ein
            must-seen Land, definitiv!</p>

          <!-- Gallery Japan -->
          <section id="gallery-japan" class="d-flex justify-content-center flex-wrap">
            <a href="../img/japan_coverpic.jpg" data-lightbox="gallery-japan"
              data-title="Kinkaku-ji (Goldener Tempel), Kyoto"><img src="../img/japan_coverpic.jpg"
                alt="a golden Buddhist temple in Kyoto called Kinkaku-ji (Golden Pavilion)" height="200"
                class="border border-white"></a>
            <a href="../img/me_with_deers.jpg" data-lightbox="gallery-japan"
              data-title="Freilaufende Rehe auf der Insel Miyajima"><img src="../img/me_with_deers.jpg"
                alt="me with free running deers on the island Miyajima" height="200" class="border border-white"></a>
            <a href="../img/vending_machine_japan.jpg" data-lightbox="gallery-japan"
              data-title="Pikachu-Getränkeautomat, Kyoto"><img src="../img/vending_machine_japan.jpg"
                alt="beverage vending machine covered with the yellow cartoon character Pikachu, Kyoto" height="200"
                class="border border-white"></a>
            <a href="../img/torii_japan.jpg" data-lightbox="gallery-japan" data-title="Fushimi Inari-Taisha, Kyoto"><img
                src="../img/torii_japan.jpg" alt="rows of red Torii gates at Fushumi Inari-Taisha, Kyoto" height="200"
                class="border border-white"></a>
            <a href="../img/nijo-castle_japan.jpg" data-lightbox="gallery-japan"
              data-title="Karamon Tor (Nijo Burg), Kyoto"><img src="../img/nijo-castle_japan.jpg"
                alt="the gold-decorated karamon main gate to Ninomaru Palace (Nijo Castle), Kyoto" height="200"
                class="border border-white"></a>
          </section>
          <br>
          <hr>
          <br>

          <!-- Iceland Article -->
          <h2 id="iceland">ISLAND&nbsp;&ndash; Kaltes Land, warmes Herz.</h2>
          <span class="meta"><em>Gepostet von
              <a href="about">Jasmin</a>
              am 12. Oktober 2020</em></span>
          <p>Island war schon lange auf meiner unbedingt-wieder-zu-besuchen-Liste. Ich mag mich nur noch an die
            sehr eisigen Winde und an eine der besten Champignoncremesuppen erinnern! <i class="far fa-laugh-beam"></i>
          </p>

          <p>Vom Flughafen Keflavik in die Hauptstadt Reykjavik sind wir etwa 45 Minuten mit dem Bus gefahren. Ich
            war erstaunt, dass es keine Züge in diesem Land gibt. Als Fortbewegungsmittel werden Autos, Busse
            oder Schiffe verwendet.</p>

          <p>Die langen Busfahren von 1 bis 2 Stunden bei den Tagesausflügen machten mir nicht viel aus, da man
            die meilenweiten menschenleeren Landschaften vollumfänglich geniessen konnte und es für mich gepaart
            mit Musik in meinem Ohr so beruhigend war.</p>

          <p>Reykjavik ist nicht sehr gross, sodass man überall ziemlich gut zu Fuss hinkommt und hat doch einiges
            zu bieten: Tolle Cafés, Restaurants mit sehr herzlichem Personal und ästhetische Wandbemalungen,
            Läden und Gebäude.</p>

          <p>Eine der Höhepunkte waren die Polarlichter, welche wir am zweitletzten Tag vor Abreise
            glücklicherweise noch zu Gesicht bekommen haben. Da ich diese zum ersten Mal gesehen habe, habe ich
            bewusst auf Fotoaufnahmen verzichtet und das total «Magische» auf mich wirken lassen/genossen.</p>

          <p>Nächstes Wunsch-Reiseziel: Der schwarze Sandstrand Reynisfjara, welchen wir während dem einwöchigen
            Aufenthalt leider nicht mehr geschafft haben. Ich komme wieder, Island! <i class="far fa-laugh-beam"></i>
          </p>

          <!-- Gallery Iceland -->
          <section id="gallery-iceland" class="d-flex justify-content-center flex-wrap">
            <a href="../img/streetart_iceland.jpg" data-lightbox="gallery-iceland"
              data-title="Pommesbude, Reykjavik"><img src="../img/streetart_iceland.jpg"
                alt="a green house with a symbol of french fries and the Hallgrims Church in yellow, Reykjavik"
                height="200" class="border border-white"></a>
            <a href="../img/cozy_cafe_iceland.jpg" data-lightbox="gallery-iceland"
              data-title="Gemütliches Café, Reykjavik"><img src="../img/cozy_cafe_iceland.jpg"
                alt="a café with brown vintage chairs, table and a turntable, Reykjavik" height="200"
                class="border border-white"></a>
            <a href="../img/iceland_coverpic.jpg" data-lightbox="gallery-iceland"
              data-title="Heisse Quelle, Grindavik"><img src="../img/iceland_coverpic.jpg"
                alt="snowy landscape with hot spring, Grindavik" height="200" class="border border-white"></a>
            <a href="../img/harpa_iceland.jpg" data-lightbox="gallery-iceland"
              data-title="Konzerthaus Harpa, Reykjavik"><img src="../img/harpa_iceland.jpg"
                alt="Harpa, a glass concert hall and conference centre in Reykjavik" height="200"
                class="border border-white"></a>
            <a href="../img/bus-view_iceland.jpg" data-lightbox="gallery-iceland"
              data-title="Aussicht auf die Schneelandschaft"><img src="../img/bus-view_iceland.jpg"
                alt="view from the bus to a deserted snowy landscape, somewhere out of Reykjavik" height="200"
                class="border border-white"></a>
          </section>
          <br>
          <hr>
          <br>

          <!-- Mexico Article -->
          <h2 id="mexico">MEXIKO&nbsp;&ndash; Fiestas, Farben und vieles mehr.</h2>
          <span class="meta"><em>Gepostet von
              <a href="about">Jasmin</a>
              am 1. September 2020</em></span>
          <p>Dieses Land hat definitiv mehr zu bieten als nur Fiestas, Burritos, Tequila und die schöne Sprache
            Spanisch. Es gibt auch ruhige und kulturelle Ecken, weshalb wir uns für folgenden
            2-Wochen-Ferienplan entschieden haben:</p>

          <p>Zuerst ging’s gemütlich für 3 Tage auf die Insel Isla Mujeres, danach für die Kombination Sonne,
            Strand <strong>und</strong> Fiesta 1 Woche nach Playa del Carmen und zu guter Letzt für 4 Tage nach
            Tulum um wieder runterzukommen.</p>

          <p>Letzteres war jedoch nicht ganz so erholsam wie erhofft, wir hatten in der Hälfte unseres
            Aufenthaltes eine Schlange im Bungalow! Zum Glück ist uns aber nichts passiert, denn wir waren noch
            nie so schnell (weg)gerannt als wir sie gesehen haben. Das Hotelpersonal hat danach nach der
            Schlange gesucht, aber die war schon längstens wieder verschwunden. Im Nachhinein habe ich gelesen,
            dass Schlangen im Haus sogar Glück bringen sollen! <i class="far fa-laugh-beam"></i></p>

          <p>Nebst dieser kleinen Nervenstrapaze haben wir das unglaublich leckere Essen, die eindrücklichen
            Maya-Stätten Chichen Itza und Tulum sowie das Schwimmen in einem der Cenotes (mit Wasser gefüllte
            Grotte) sehr genossen&nbsp;&ndash; te extraño México!</p>

          <!-- Gallery Mexico -->
          <section id="gallery-mexico" class="d-flex justify-content-center flex-wrap">
            <a href="../img/mexico_coverpic.jpg" data-lightbox="gallery-mexico" data-title="Chichén Itzá, Yucatán"><img
                src="../img/mexico_coverpic.jpg" alt="me jumping in front of the mayan temple Chichen Itza in Yucatan"
                height="200" class="border border-white"></a>
            <a href="../img/tulum_mexico.jpg" data-lightbox="gallery-mexico" data-title="Maya-Stätte Tulum"><img
                src="../img/tulum_mexico.jpg" alt="mayan temple surrounded by bushes next to the sea, tulum"
                height="200" class="border border-white"></a>
            <a href="../img/bungalow_mexico.jpg" data-lightbox="gallery-mexico"
              data-title="Unser Bungalow in Tulum"><img src="../img/bungalow_mexico.jpg"
                alt="bungalow surrounded by palms, tulum" height="200" class="border border-white"></a>
            <a href="../img/valladolid_mexico.jpg" data-lightbox="gallery-mexico" data-title="Valladolid, Yucatán"><img
                src="../img/valladolid_mexico.jpg" alt="colorful city Valladolid, Yucatán" height="200"
                class="border border-white"></a>
            <a href="../img/port_mexico.jpg" data-lightbox="gallery-mexico" data-title="Hafen in Cancun"><img
                src="../img/port_mexico.jpg" alt="port with turquoise blue sea, cancun" height="200"
                class="border border-white"></a>
          </section>
          <div id="olderposts"></div>
        </div>
      </div>
    </div>
  </article>
  <br>
  <hr>

  <!-- Footer -->
  <?php include("../includes/footer.inc.php")?>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

  <!-- Link to Lightbox JavaScript and call the option method for Lightbox -->
  <script src="../js/lightbox.js"></script>

  <script>
    lightbox.option({
      'albumLabel': "Bild %1 of %2",
      'alwaysShowNavOnTouchDevices': true,
      'wrapAround': true
    })
  </script>

</body>

</html>