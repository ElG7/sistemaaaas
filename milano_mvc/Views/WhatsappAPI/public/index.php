<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Views/WhatsappAPI/public/estilo.css" />
    <title>Whatsapp | Gelateria Milano</title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>

  <div class="container-hero">
    <div class="container hero">
      <div class="customer-support">
        <img src="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Views/WhatsappAPI/public/logomilano.png" alt="milano" />
      </div>

      <div class="container-logo">
        <i class="fa-solid fa-ice-cream"></i>
        <h1 class="logo"><a>GELATERIA MILANO</a></h1>
      </div>

      <div class="container-user">
        <div class="customer-support">
          <img src="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Views/WhatsappAPI/public/logomilano.png" alt="milano" />
        </div>
      </div>
    </div>
  </div>

  <div class="container-navbar">
    <nav class="navbar container">
      <i class="fa-solid fa-bars"></i>
    </nav>
  </div>

  <body class="bg-orange">
    <div class="container">
      <h1 class="text-center text-black p-5">Envío de ofertas por Whatsapp</h1>

      <form id="myform" class="col-md-8 m-auto">
        <div class="form-group">
          <label class="text-black label-wsp">Para</label>

          <input
            type="text"
            placeholder="Ingresa el número de destino"
            class="form-control"
            name="number"
          />
        </div>

        <div class="form-group">
          <label class="text-black label-wsp">Mensaje</label>

          <textarea
            name="message"
            class="form-control"
            rows="4"
            placeholder="Ingresa el mensaje"
          ></textarea>
        </div>

        <div class="text-center">
          <button class="btn-orange">ENVIAR</button>
        </div>
      </form>

      <p id="status-send-1" class="alert alert-success text-center mt-4">
        Mensaje enviado correctamente
      </p>
      <p id="status-send-2" class="alert alert-danger text-center mt-4">
        Error al enviar mensaje
      </p>
    </div>

    <script>
      // Muestra u oculta resultado del envío
      const showStatus = (element, status) => {
        status === true
          ? (element.style.display = "initial")
          : (element.style.display = "none");
      };

      // Elementos para los avisos de envío
      const statusOne = document.getElementById("status-send-1");
      const statusTwo = document.getElementById("status-send-2");

      // Ocultamos ambos por defecto
      showStatus(statusOne, false);
      showStatus(statusTwo, false);

      const sendMessage = async (e) => {
        e.preventDefault();

        // Elemento del formulario
        const form = document.getElementById("myform");

        // Obtengo los valores: N° destinatario y Mensaje
        const number = form.querySelector('input[name="number"]').value;
        const message = form.querySelector('textarea[name="message"]').value;

        // Convertimos JSON a String
        const data = JSON.stringify({ number, message });

        // Definimos parámetros opcionales
        const options = {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: data, // Insertamos la data que queremos enviar
        };

        // Hacemos el envío del mensaje a la siguiente ruta
        const response = await fetch("https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Views/WhatsappAPI/public/node_modules/send", options);

        if (response.status === 200) {
          // Mostramos aviso "Mensaje enviado correctamente"
          showStatus(statusOne, true);

          setTimeout(() => {
            // Ocultamos aviso
            showStatus(statusOne, false);
          }, 3500);

          form.querySelector('textarea[name="message"]').value = "";
        } else {
          // Mostramos aviso "Error al enviar mensaje"
          showStatus(statusTwo, true);

          setTimeout(() => {
            // Ocultamos aviso
            showStatus(statusTwo, false);
          }, 3500);
        }
      };

      window.addEventListener("submit", sendMessage);
    </script>
  </body>
</html>
