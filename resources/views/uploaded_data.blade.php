<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Uploaded Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uploadedData as $data)
                <tr>
                    <td>{{ $data->question }}</td>
                    <td>{{ $data->option_1 }}</td>
                    <td>{{ $data->option_2 }}</td>
                    <td>{{ $data->option_3 }}</td>
                    <td>{{ $data->option_4 }}</td>
                    <td>{{ $data->correct_answer }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
