const prisma = require("../lib/prisma")
const pagination = require("../utils/pagination");

class PacienteRepository {
  async pagination(limit, cursor) {
    return await pagination(
      prisma.pacientes,
      limit,
      cursor
    )
  }

  async show(id){
    return await prisma.pacientes.findUnique({ where: { id } })
  }

  async create(nome, dataNascimento, carteirinha, cpf){
    return await prisma.pacientes.create({
      data: {
        nome,
        dataNascimento,
        carteirinha,
        cpf
      }
    })
  }

  async update(id, {nome, dataNascimento, carteirinha, cpf}){
    return await prisma.pacientes.update({
      where: { id },
      data: {
        nome,
        dataNascimento,
        carteirinha,
        cpf
      }
    })
  }

  async destroy(id){
    return await prisma.pacientes.delete({
      where: { id }
    })
  }
}

module.exports = new PacienteRepository();