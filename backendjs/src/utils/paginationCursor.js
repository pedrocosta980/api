async function paginationCursor(limit=10, cursor=null){
  const query = cursor
    ? { createdAt: { cursor } }
    : {};

  const users = await User.find(query)
    .sort({ createdAt: 1 })
    .limit(limit);

  const nextCursor = users.length
    ? users[users.length - 1].createdAt
    : null;

  return {
    data: users,
    nextCursor
  };
}
module.exports = paginationCursor