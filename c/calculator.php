<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <title>Electricity Calculator</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Electricity Calculator</h2>
        <form method="post">
            <div class="form-group">
                <label for="voltage">Voltage (V):</label>
                <input type="float" class="form-control" name="voltage" required>
            </div>
            <div class="form-group">
                <label for="current">Current (A):</label>
                <input type="float" class="form-control" name="current" required>
            </div>
            <div class="form-group">
                <label for="rate">Current Rate (sen/kWh):</label>
                <input type="float" class="form-control" name="rate" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $voltage = $_POST["voltage"];
            $current = $_POST["current"];
            $rate = $_POST["rate"];

            // Function to calculate electricity rates
            function calculateElectricityRates($voltage, $current, $rate) {
                $power = $voltage * $current / 1000;
                $energy = $power * 1 * 1000; // Assuming 1 hour for simplicity
                $totalChargePerHour = $energy * ($rate / 100);
                $totalChargePerDay = $totalChargePerHour * 24;
                return [
                    'power' => $power,
                    'energy' => $energy,
                    'totalChargePerHour' => $totalChargePerHour,
                    'totalChargePerDay' => $totalChargePerDay
                ];
            }
           
            }

            // Calculate and display results
            $result = calculateElectricityRates($voltage, $current, $rate);
            echo "<h4 class='mt-4'>Results:</h4>";
            echo "<p>Power: {$result['power']} kW</p>";
            echo "Total Charge Per Hour: RM {$result['totalChargePerHour']}<br>";
            echo "Total Charge Per Day: RM {$result['totalChargePerDay']}<br>";
    
        ?>

    </div>
</body>
</html>
