const express = require("express");

const apiRoutes = require("./routes");

const app = express();
require("dotenv").config();

app.use("/api", apiRoutes);

const port = process.env.PORT
app.listen(port || 5000, ()=>{
  console.log("Server is running!");
})