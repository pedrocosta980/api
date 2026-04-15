class PacienteController{
  async index(req, res){
    const limit = parseInt(req.query.limit);
    const cursor = Date(query.cursor);

    const pagination = paginationCursor(limit, cursor);
  }
}