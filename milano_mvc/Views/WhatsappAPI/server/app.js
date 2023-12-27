const express = require('express');
const app = express();
const path = require('path');

const pathHTML = path.resolve(__dirname, 'https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Views/WhatsappAPI/public/node_modules/public/');

app.use(express.static(pathHTML));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));

app.use('/', require('https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Views/WhatsappAPI/server/messageRoute'));

const PORT = 8080;

app.listen(PORT, () => {
    console.log(`Escuchando el puerto ${PORT}`);
});