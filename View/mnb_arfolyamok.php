<?php
function selection($currencies)
{
    if (isset($currencies) && is_array($currencies)) {
        foreach ($currencies as $option) {
            if ($option->name === 'HUF') {
                continue;
            }
            if ($option->name === 'EUR') {
                echo "<option value='$option->name' selected>$option->name</option>";
            } else {
                echo "<option value='$option->name'>$option->name</option>";
            }
        }
    }
}

?>
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
        <?php include_once './View/common/menu.php'; ?>

        <div class="card" style="border: 0;">
            <div class="card-body">
                <h3 class="card-text text-center">MNB árfolyam megjelenítő</h3>
            </div>

        </div>

        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Adott napi árfolyam</h4>

                    <label for="nap">Nap</label>
                    <div id="nap" class="input-group mb-3">
                        <input type="date" class="form-control" id="napi-arfolyam-date" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <label for="napi-arfolyam-select">Deviza</label>
                    <select id="napi-arfolyam-selector" multiple>
                        <?php selection($viewData["currencies"]); ?>
                    </select>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="nap-arfolyam-btn">Keresés</button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Adott havi árfolyam</h4>

                    <label for="honap">Hónap</label>
                    <div id="honap" class="input-group mb-3">
                        <input type="month" class="form-control" id="havi-arfolyam-date" value="<?php echo date('Y-m'); ?>">
                    </div>

                    <label for="havi-arfolyam-select">Deviza</label>
                    <select id="havi-arfolyam-selector" multiple>
                        <?php selection($viewData["currencies"]); ?>
                    </select>

                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="havi-arfolyam-btn">Keresés</button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Megjelenítése grafikonon</h4>

                    <label for="date-interval">Intervallum</label>
                    <div id="date-interval" class="input-group mb-3">
                        <input type="date" class="form-control" id="start_date" value="<?php echo date('Y-m-d', strtotime('-1 month')); ?>">
                        <div class="input-group-append">
                            <span class="input-group-text">-</span>
                        </div>
                        <input type="date" class="form-control" id="end_date" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <label for="multiple-select">Deviza</label>
                    <select id="multiple-select" multiple>
                        <?php selection($viewData["currencies"]); ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="button" name="submit_data" class="btn btn-primary" id="submit_data">Keresés</button>
                </div>
            </div>

        </div>

        <div id="exchangeRateTableContainer" class="container">
            <h2></h2>
            <table id="exchangeRateTable" class="table">
            </table>
        </div>
    </div>

    <div class="container">
        <div class="card" id="chartContainer" style="display:none;">
            <canvas id="exchangeRateChart" width="600" height="400"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        var multiSelect = new MultiSelectTag('multiple-select');
        new MultiSelectTag('napi-arfolyam-selector');
        new MultiSelectTag('havi-arfolyam-selector');


        $(document).ready(function() {
            var myChart;
            var modelsString;

            <?php echo "modelsString = '{$viewData["models"]}';"; ?>

            $('#submit_data').click(function() {
                $('#chartContainer').show();
                clearTable();
                clearNoData();

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

            $('#nap-arfolyam-btn').click(function() {
                $('#chartContainer').hide();
                clearTable();
                clearNoData();

                var day = $('#napi-arfolyam-date').val();
                var selectedCurrencies = $('#napi-arfolyam-selector').val();

                var requestData = {
                    day: day,
                    selectedCurrencies: selectedCurrencies
                };

                $.ajax({
                    type: 'POST',
                    url: 'index.php?page=mnb&action=getDailyExchangeData',
                    data: requestData,
                    success: function(response) {
                        printTableForDailyExchange(JSON.parse(response));
                    }
                });
            });

            $('#havi-arfolyam-btn').click(function() {
                $('#chartContainer').hide();
                clearTable();
                clearNoData();

                var month = $('#havi-arfolyam-date').val();
                var selectedCurrencies = $('#havi-arfolyam-selector').val();

                $.ajax({
                    type: 'POST',
                    url: 'index.php?page=mnb&action=getMonthlyExchangeData',
                    data: {
                        month: month,
                        selectedCurrencies: selectedCurrencies
                    },
                    success: function(response) {
                        printTableForMonthlyExchange(JSON.parse(response));
                    }
                });
            });

            function clearTable() {
                document.getElementById('exchangeRateTable').innerHTML = '';
            }

            function clearNoData() {
                var div = document.getElementById("exchangeRateTableContainer");
                var elementToRemove = document.getElementById('nincs_adat');
                if (elementToRemove) {
                    div.removeChild(elementToRemove);
                }

            }

            function printTableForMonthlyExchange(data) {
                var table = document.getElementById("exchangeRateTable");

                var headerRow = table.insertRow();
                var emptyHeaderCell = headerRow.insertCell();
                emptyHeaderCell.innerHTML = "";

                let currencies = [];
                for (let date in data) {
                    let row = table.insertRow();
                    let dateCell = row.insertCell();
                    dateCell.textContent = date;

                    let currenciesData = data[date];

                    for (let currency in currenciesData) {
                        if (!currencies.includes(currency)) {
                            currencies.push(currency);
                            let headerCell = document.createElement('th');
                            headerCell.textContent = currency;
                            headerRow.appendChild(headerCell);
                        }

                        let values = currenciesData[currency];
                        let valueCell = row.insertCell();
                        valueCell.textContent = values.join(', ');
                    }
                }
            }

            function printTableForDailyExchange(data) {
                const noData = 'nincs_adat';
                var div = document.getElementById("exchangeRateTableContainer");
                if (data.length === 0) {
                    var pElement = document.createElement('p');
                    pElement.id = noData;
                    pElement.textContent = 'Az adott napon nincs megjelenítendő adat';
                    div.appendChild(pElement);
                    return;
                }
                var table = document.getElementById("exchangeRateTable");
                var noDataElement = document.getElementById(noData);
                if (div && noDataElement) {
                    div.removeChild(noDataElement);
                }
                // Fejléc sor létrehozása
                var headerRow = table.insertRow();
                var emptyHeaderCell = headerRow.insertCell();
                emptyHeaderCell.innerHTML = "";

                // Devizák címeinek hozzáadása a fejléc sorhoz
                for (var i = 0; i < data.length; i++) {
                    var currencyHeaderCell = headerRow.insertCell();
                    currencyHeaderCell.innerHTML = data[i].currency;
                }

                var dataRow = table.insertRow();
                var dateCell = dataRow.insertCell();
                dateCell.innerHTML = data[0].date;
                // Adatsorok létrehozása
                for (var i = 0; i < data.length; i++) {
                    for (var j = 0; j < data.length; j++) {
                        if (data[j].currency === data[i].currency) {
                            var valueCell = dataRow.insertCell();

                            valueCell.innerHTML = data[j].currency === data[i].currency ? data[j].value : "-";
                        }
                    }
                }
            }


            function makechart(modelsString) {
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