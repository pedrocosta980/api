const app = require("express").Router();

app.use("/v1", require("./v1"));

module.exports = app;