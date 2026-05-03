const router = require("express").Router();
const PacienteController = require("../../controllers/PacienteController.js");

router.get("/", PacienteController.index);
router.get("/:id", PacienteController.show);
router.post("/", PacienteController.create);
router.put("/:id", PacienteController.update);
router.delete("/:id", PacienteController.destroy);

module.exports = router;