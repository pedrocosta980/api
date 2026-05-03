async function pagination(model, limit=10, page=1){
  page = Number(page);
  const returnedData = await model.findMany({
    skip: (page - 1) * limit,
    orderBy: {
      id: 'asc',
    },
    take: Number(limit + 1),
  });
  
  const total = await model.count();

  const totalPages = Math.ceil(total / limit);

  const hasNextPage = returnedData.length > limit

  const data = hasNextPage ? returnedData.slice(0, -1) : returnedData;

  const nextPage = hasNextPage
    ? page + 1
    : null;

  return {
    data: data,
    nextPage,
    hasNextPage,
    totalPages,
    page
  };
}

module.exports = pagination