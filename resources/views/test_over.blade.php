<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE END</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .question-container {
            border: 1px solid black;
            margin: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="text-center">
        <h1>TEST OVER</h1>   
    </div>
    <div class="">
        @foreach ($results as $index => $result)
        <div class="question-container 
                @if ($result['user_answer'] === $result['correct_answer'] && $result['user_answer'] !== 'Not attempted') 
                    bg-success text-white 
                @elseif ($result['user_answer'] === 'Not attempted') 
                    
                @else 
                    bg-danger text-white 
                @endif">
                <div class=" d-flex flex-row justify-content-center">
                    <p class=""><strong>Question Number:</strong> {{ $index + 1 }}</p>
                    <p class="">&nbsp; {{ $result['question'] }}</p>
                </div>
                <div class="d-flex flex-row justify-content-center">
                    <p><strong>Options:</strong></p>
                    <ol type="a">
                        @foreach ($result['options'] as $option)
                            <li>{{ $option }}</li>
                        @endforeach
                    </ol>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <p class=""><strong>Your Answer:</strong> {{ $result['user_answer'] }}</p>
                        <p class=""><strong>Correct Answer:</strong> {{ $result['correct_answer'] }}</p>
                </div>
                
            </div>
        @endforeach
    </div>
</body>
</html>

