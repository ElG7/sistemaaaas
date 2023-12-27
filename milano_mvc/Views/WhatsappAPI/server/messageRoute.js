const router = require('express').Router();
const sendMessage = require('https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Views/WhatsappAPI/server/message');

router.post(
    'https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Views/WhatsappAPI/public/node_modules/send',
    [],
    sendMessage
);


module.exports = router;