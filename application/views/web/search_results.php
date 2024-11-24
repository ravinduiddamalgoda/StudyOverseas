<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php if (!empty($results)): ?>
        <ul>
            <?php foreach ($results as $result): ?>
                <li><?php echo $result['first_name']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No results found for your query.</p>
    <?php endif; ?>
</body>
</html>
