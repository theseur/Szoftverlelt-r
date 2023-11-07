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
    <div class="container">
        <h2 class="text-center mt-4 mb-3">Valuták összehasonlítása grafikonon</a></h2>

        <div class="card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h2 class="mb-4">Dátum választó</h2>

                        <div class="input-group mb-3">
                            <input type="date" class="form-control" id="start_date">
                        </div>

                        <div class="input-group mb-3">
                            <input type="date" class="form-control" id="end_date">
                        </div>

                        <h2 class="mb-4">Deviza választó</h2>
                        <select id="multiple-select" multiple>
                            <?php
                            foreach ($viewData["currencies"] as $option) {
                                echo "<option value='$option->name'>$option->name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" name="submit_data" class="btn btn-primary" id="submit_data">Keresés</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
            <canvas id="exchangeRateChart" width="600" height="400"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('multiple-select');

        $(document).ready(function() {
            var myChart;
            var modelsString;

            <?php
            echo "modelsString = '{$viewData["models"]}';";
            ?>

            $('#submit_data').click(function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var selectedCurrencies = $('#multiple-select').val();

                var requestData = {
                    startDate: startDate,
                    endDate: endDate,
                    selectedCurrencies: selectedCurrencies
                };

                $.ajax({
                    type: 'POST',
                    url: 'index.php?page=mnb&action=getExchangeData',
                    data: requestData,
                    success: function(response) {
                        if (myChart) {
                            myChart.destroy();
                        }

                        modelsString = response;
                        makechart(modelsString);
                    }
                });
            });

            makechart(modelsString);

            function makechart(modelsString) {

                console.log("modelString:"+modelsString);
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

                myChart = new Chart(ctx, {
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
    <?php include_once './View/common/footer.php';   ?>
</body>

</html>