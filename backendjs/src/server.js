const express = require("express");

const apiRoutes = require("./routes");
const morgan = require("morgan");
const cors = require("cors");

const app = express();

require("dotenv").config();
app.use(express.json());
app.use(cors({
  origin: "http://localhost:5173"
}));
app.use(morgan("dev"));

app.use("/api", apiRoutes);

const port = process.env.PORT
app.listen(port || 5000, ()=>{
  console.log("Server is running!");
  console.log("🎈http://localhost:5000");
})
