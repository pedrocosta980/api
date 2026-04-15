const app = require("express").Router();
const PacienteController = require("../../controllers/PacienteController.js");

app.get("/pacientes", PacienteController.index);

module.exports = app;