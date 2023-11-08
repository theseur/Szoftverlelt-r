<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Currency Exchange Rate Chart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

</head>

<body>
<?php include "nameinheader.php"?>
    <div class="container">
        <h2 class="text-center mt-4 mb-3">How to Create Dynamic Chart in PHP using Chart.js</a></h2>

        <div class="card">
            <div class="card-header">válassz</div>
            <div class="card-body">
                <div class="form-group">
                    <h2 class="mb-4">éé</h2>

                    <select id="multiple-select" multiple>
                        <?php

                        print_r($viewData["currencies"]);
                        foreach ($viewData["currencies"] as $option) {
                            echo "<option value='$option->name'>$option->name</option>";
                        }
                        ?>
                    </select>


                </div>
                <div class="form-group">
                    <button type="button" name="submit_data" class="btn btn-primary" id="submit_data">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <canvas id="exchangeRateChart" width="600" height="400"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('multiple-select');

        $(document).ready(function() {

            makechart();

            function makechart() {
                var modelsString;
                <?php
                echo "modelsString = '{$viewData["models"]}';";
                ?>
                var models = JSON.parse(modelsString);
                var dataByCurrency = {};

                models.forEach(function(model) {
                    if (!dataByCurrency[model.currency]) {
                        dataByCurrency[model.currency] = {
                            dates: [],
                            values: []
                        };
                    }
                    dataByCurrency[model.currency].dates.push(model.date);
                    dataByCurrency[model.currency].values.push(model.value);
                });

                const ctx = document.getElementById('exchangeRateChart').getContext('2d');

                const currencies = Object.keys(dataByCurrency);
                const datasets = currencies.map((currency) => {
                    return {
                        label: currency,
                        data: dataByCurrency[currency].values,
                        borderColor: `rgba(${Math.random() * 255},${Math.random() * 255},${Math.random() * 255},1)`,
                        fill: false
                    }
                });

                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dataByCurrency[currencies[0]].dates,
                        datasets: datasets
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

        });
    </script>

</body>

</html>