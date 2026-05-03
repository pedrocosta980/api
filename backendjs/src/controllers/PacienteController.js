const PacienteService = require("../services/PacienteService");
const { z, string } = require("zod");

class PacienteController{
  async index(req, res){
    try{
      const querySchema = z.object({
        limit: z.string().optional(),
        page: z.string().optional().default(1)
      });
      const { limit, page } = querySchema.parse(req.query);
      const pacientes = await PacienteService.all(limit, page);

      if(!pacientes) throw new Error("Sem pacientes cadastrados");
      return res.json(pacientes);
    }catch(err){
      console.log(err)
      return res.json({ message: err.message });
    }
  }

  async show(req, res){
    try{
      const querySchema = z.object({
        id: z.string()
      });
      const { id } = querySchema.parse(req.params); 
      const paciente = await PacienteService.show(id);
      
      if(!paciente) throw new Error("Paciente não cadastrado");
      
      return res.json(paciente);
    }catch(err){
      console.log(err)
      return res.json({ message: err.message });
    }
  }

  async create(req, res){
    try{
      const bodySchema = z.object({
        nome: z.string(),
        dataNascimento: z.string(),
        carteirinha: z.string(),
        cpf: z.string(),
      });

      const {
        nome, 
        dataNascimento, 
        carteirinha, 
        cpf
      } = bodySchema.parse(req.body);
      
      const paciente = await PacienteService.create(
        nome,
        dataNascimento,
        carteirinha,
        cpf
      )

      if(!paciente) throw new Error("Erro ao tentar cadastrar o paciente");

      return res.json({message: "Paciente cadastrado com sucesso!", paciente})
    }catch(err){
      console.log(err);
      return res.json({message: err.message});
    }
  }

  async update(req, res){
    try{
      const querySchema = z.object({
        id: z.string()
      });
        
      const bodySchema = z.object({
        nome: z.string(),
        dataNascimento: z.iso.date(),
        carteirinha: z.string(),
        cpf: z.string(),
      });

      const { id } = querySchema.parse(req.params);
      const { 
        nome, 
        dataNascimento, 
        carteirinha, 
        cpf 
      } = bodySchema.parse(req.body);

      const paciente = await PacienteService.update(id, {
        nome, 
        dataNascimento,
        carteirinha,
        cpf
      });

      if(!paciente) throw new Error("Erro ao tentar atualizar o paciente");

      return res.json({
        message: "Paciente atualizado com sucesso!",
        paciente
      });
    }catch(err){
      console.log(err);
      return res.json({
        message: err.message
      })
    }
  }
  
  async destroy(req, res){
    try{
      const querySchema = z.object({
        id: z.string()
      });

      const { id } = querySchema.parse(req.params);

      const paciente = await PacienteService.destroy(id);
      
      if(!paciente) throw new Error("Erro ao tentar deletar o paciente");

      return res.json({
        message: "Paciente deletado com sucesso!",
        paciente
      })
    }catch(err){
      console.log(err);
      return res.json({
        message: err.message
      })
    }
  }
}

module.exports = new PacienteController();