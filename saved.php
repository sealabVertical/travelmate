<?php
include("db/db_connect.php");

$sql = "SELECT * FROM travels ORDER BY date_saved DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Saved Travels</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light-blue">
    <div class="container d-flex flex-column align-items-center justify-content-center min-vh-100 text-center">
        <div class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 900px;">
            <h1 class="mb-4 text-primary">📌 Saved Travels</h1>
            <button class="btn btn-secondary mb-4" onclick="location.href='index.html'">🏠 Back to Home</button>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Country</th>
                            <th>Capital</th>
                            <th>Weather</th>
                            <th>Visit Date</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['country_name']) ?></td>
                            <td><?= htmlspecialchars($row['capital']) ?></td>
                            <td><?= htmlspecialchars($row['weather']) ?></td>
                            <td><?= htmlspecialchars($row['visit_time']) ?></td>
                            <td>
                                <textarea class="form-control"
                                    id="note_<?= $row['id'] ?>"><?= htmlspecialchars($row['note']) ?></textarea>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success me-1"
                                    onclick="updateTravel(<?= $row['id'] ?>)">Update</button>
                                <button class="btn btn-sm btn-danger"
                                    onclick="deleteTravel(<?= $row['id'] ?>)">Delete</button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/script/saved.js"></script>
</body>

</html>