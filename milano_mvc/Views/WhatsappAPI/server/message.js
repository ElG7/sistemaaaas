const accountSid = "AC37838e73090b8f931ef994af464844b2";
const authToken = "e68e1bd1a8f74e6943b3aba3274cd80b";
const client = require("twilio")(accountSid, authToken);

const sendMessage = async (req, res) => {
  try {
    const { number, message } = req.body;

    const response = await client.messages.create({
      body: message,
      from: "whatsapp:+14155238886", // El número que te proporcionen
      to: `whatsapp:${number}`,
    });

    console.log(response);

    res.json({
      msg: "Mensaje enviado correctamente",
    });
  } catch (error) {
    console.log(error);
    res.status(500).json({
      msg: "Error al enviar mensaje",
    });
  }
};

module.exports = sendMessage;