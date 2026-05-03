const router = require("express").Router();
const PacienteRouter = require("./PacientesRoutes");

router.use("/pacientes", PacienteRouter);

module.exports = router;