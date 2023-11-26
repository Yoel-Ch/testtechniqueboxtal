<div id="content" class="content-style">
    <h1 id="main-title">Visualisez la qualité de l'air de votre ville !</h1>

    <div id="selector-container">
        <label for="citySelector">Sélectionnez une ville :</label>
        <select name="citySelector" id="citySelector">
            <option value="48-8588897.2-320041">Paris</option>
            <option value="39-9057136.116-3912972">Pékin</option>
        </select>
    </div>

    <div id="chart-container">
        <canvas id="monGraphique"></canvas>
    </div>
<?php echo '<script>let donneesGraphique = ' . json_encode($processedAirQualityData) . ';</script>'; ?>

</div>

<script src="../../../js/citySelector.js"></script>
<script src="../../../js/chartSetup.js"></script>