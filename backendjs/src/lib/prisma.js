const { PrismaClient } = require('../prisma/generated/prisma/client')
const { PrismaMariaDb } = require("@prisma/adapter-mariadb");

const adapter = new PrismaMariaDb({
  host: "localhost",
  user: "root",
  database: "hospital",
});

const prisma = new PrismaClient({ adapter });

module.exports = prisma