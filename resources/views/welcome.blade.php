<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            button{
                color:white;
            }
            a{
                text-decoration:none;
                color:white;
            }
            a:hover{
                color :white;
            }
        </style>
        
    </head>
    <body>
    <div id="content">
    <div class="container">
        <section>
            <div class="row">
                <div class="col-md-12 exam-confirm">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-12" id="1">
                                <h4 class="text-center">Please read the instructions carefully</h4>
                                <h4><strong><u>General Instructions:</u></strong></h4>
                                <ol>
                                    <li>
                                            Total duration of EXAM is 60 min.
                                    </li>
                                    <li>The clock will be set at the server. The countdown timer in the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches zero, the examination will end by itself. You will not be required to end or submit your examination.</li>
                                    <li>
                                        The Questions Palette displayed on the right side of screen will show the status of each question using one of the following symbols:
                                        <ol>
                                            <li><img src="/images/Logo1.png" /> You have not visited the question yet.<br /><br /></li>
                                            <li><img src="/images/Logo2.png" /> You have not answered the question.<br /><br /></li>
                                            <li><img src="/images/Logo3.png" /> You have answered the question.<br /><br /></li>
                                            <li><img src="/images/Logo4.png" /> You have NOT answered the question, but have marked the question for review.<br /><br /></li>
                                            <li><img src="/images/Logo5.png" /> The question(s) "Answered and Marked for Review" will be considered for evalution.<br /><br /></li>
                                        </ol>
                                    </li>
                                </ol>
                                <h4><strong><u>Navigating to a Question:</u></strong></h4>
                                <ol start="6">
                                    <li>
                                        To answer a question, do the following:
                                        <ol type="a">
                                            <li>Click on the question number in the Question Palette at the right of your screen to go to that numbered question directly. Note that using this option does NOT save your answer to the current question.</li>
                                            <li>Click on <strong>Save & Next</strong> to save your answer for the current question and then go to the next question.</li>
                                            <li>Click on <strong>Mark for Review & Next</strong> to save your answer for the current question, mark it for review, and then go to the next question.</li>
                                        </ol>
                                    </li>
                                </ol>
                                <h4><strong><u>Answering a Question:</u></strong></h4>
                                <ol start="7">
                                    <li>
                                        Procedure for answering a multiple choice type question:
                                        <ol type="a">
                                            <li>To select you answer, click on the button of one of the options.</li>
                                            <li>To deselect your chosen answer, click on the button of the chosen option again or click on the <strong>Clear Response</strong> button</li>
                                            <li>To change your chosen answer, click on the button of another option</li>
                                            <li>To save your answer, you MUST click on the Save & Next button.</li>
                                            <li>To mark the question for review, click on the Mark for Review & Next button.</li>
                                        </ol>
                                    </li>
                                    <li>To change your answer to a question that has already been answered, first select that question for answering and then follow the procedure for answering that type of question.</li>
                                </ol>
                                <h4><strong><u>Navigating through sections:</u></strong></h4>
                                <ol start="9">
                                    <li>Sections in this question paper are displayed on the top bar of the screen. Questions in a section can be viewed by click on the section name. The section you are currently viewing is highlighted.</li>
                                    <li>After click the Save & Next button on the last question for a section, you will automatically be taken to the first question of the next section.</li>
                                    <li>You can shuffle between sections and questions anything during the examination as per your convenience only during the time stipulated.</li>
                                    <li>Candidate can view the corresponding section summery as part of the legend that appears in every section above the question palette.</li>
                                </ol>
                                <label>
                                    <input type="checkbox" id="readCheckbox">&nbsp;&nbsp;I have read and understood the instructions. All computer hardware allotted to me are in proper working condition. I declare  that I am not in possession of / not wearing / not  carrying any prohibited gadget like mobile phone, bluetooth  devices  etc. /any prohibited material with me into the Examination Hall.I agree that in case of not adhering to the instructions, I shall be liable to be debarred from this Test and/or to disciplinary action, which may include ban from future Tests / Examinations
                                </label>
                                <hr>
                                <div class="col-md-12 col-md-offset-4 text-center mb-5">
                                    <button type="button" class="btn btn-success btn-lg" id="proceedButton">
                                        <a href="{{ url('/extract-questions') }}">Proceed</a>
                                    </button>
                                    <!-- <button type="button" class="btn btn-primary btn-lg">
                                        <a href="{{ url('/upload') }}">Upload Questions</a>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const checkbox = document.getElementById("readCheckbox");
    const proceedButton = document.getElementById("proceedButton");
    proceedButton.disabled = true;
    checkbox.addEventListener("change", function () {
    proceedButton.disabled = !checkbox.checked;
        });
    });
</script>
    </body>
</html>
