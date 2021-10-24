SELECT
  users.first_name,
  users.last_name
FROM relationships
  INNER JOIN businesses
    ON relationships.business_id = businesses.id
  INNER JOIN users
    ON relationships.user_id = users.id