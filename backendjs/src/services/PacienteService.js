const PacienteRepository = require("../repository/PacienteRepository")

class PacienteService {
  async all(limit, cursor) {
    return await PacienteRepository.pagination(limit, cursor);
  }

  async show(id){
    return await PacienteRepository.show(id);
  }
  
  async create(nome, dataNascimento, carteirinha, cpf){
    return await PacienteRepository.create(
      nome,
      dataNascimento=new Date(dataNascimento),
      carteirinha,
      cpf
    )
  }
  async update(id, {nome, dataNascimento, carteirinha, cpf}){
    return await PacienteRepository.update(id, {
      nome,
      dataNascimento: new Date(dataNascimento),
      carteirinha,
      cpf
    });
  }

  async destroy(id){
    return await PacienteRepository.destroy(id);
  }
}

module.exports = new PacienteService();