<?php include 'header.php'; ?>

<section class="calculator">
    <h2>Serie de Fibonacci</h2>
    <p>Calcula los primeros N números de la serie de Fibonacci</p>
    
    <?php
    $resultado = '';
    $numero = '';
    
    // Función para generar serie Fibonacci
    function generarFibonacci($n) {
        $serie = [];
        
        if ($n >= 1) {
            $serie[] = 0;
        }
        if ($n >= 2) {
            $serie[] = 1;
        }
        
        for ($i = 2; $i < $n; $i++) {
            $serie[] = $serie[$i - 1] + $serie[$i - 2];
        }
        
        return $serie;
    }
    
    // Función recursiva para obtener el enésimo número de Fibonacci
    function fibonacciRecursivo($n) {
        if ($n <= 0) return 0;
        if ($n == 1) return 1;
        return fibonacciRecursivo($n - 1) + fibonacciRecursivo($n - 2);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['numero'];
        
        // Validar que sea un número entero positivo
        if (is_numeric($numero) && $numero >= 1 && $numero == floor($numero)) {
            $serie = generarFibonacci($numero);
            $enesimo = fibonacciRecursivo($numero - 1);
            
            $resultado = "<div class='result-box'>
                            <h3>Resultado:</h3>
                            <p><strong>Serie de Fibonacci (primeros $numero términos):</strong></p>
                            <div class='fibonacci-serie'>";
            
            // Mostrar la serie con formato
            foreach ($serie as $index => $valor) {
                $resultado .= "<span class='fibonacci-number'>";
                $resultado .= "F<sub>" . ($index + 1) . "</sub> = " . number_format($valor, 0, ',', '.');
                $resultado .= "</span>";
                
                if ($index < count($serie) - 1) {
                    $resultado .= "<span class='fibonacci-separator'> → </span>";
                }
            }
            
            $resultado .= "</div>";
            $resultado .= "<p class='enesimo'><strong>Número en posición $numero:</strong> " . number_format($enesimo, 0, ',', '.') . "</p>";
            
            // Mostrar propiedades de Fibonacci
            $resultado .= "<div class='fibonacci-properties'>
                            <h4>Propiedades:</h4>
                            <ul>
                                <li>Relación áurea (φ): " . round($serie[count($serie)-1] / $serie[count($serie)-2], 6) . "</li>
                                <li>Suma de la serie: " . number_format(array_sum($serie), 0, ',', '.') . "</li>";
            
            if ($numero >= 5) {
                $resultado .= "<li>Proporción: " . round($serie[count($serie)-1] / $serie[count($serie)-2], 6) . " ≈ φ (1.618034)</li>";
            }
            
            $resultado .= "</ul></div>";
            $resultado .= "</div>";
            
        } else {
            $resultado = "<div class='error-message'>Por favor, ingresa un número entero positivo (1, 2, 3...).</div>";
        }
    }
    ?>
    
    <div class="calculator-container">
        <div class="calculator-form">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="numero">Número de términos a generar:</label>
                    <input type="number" id="numero" name="numero" min="1" max="50" step="1" 
                           value="<?php echo $numero; ?>" required>
                    <small class="form-hint">Máximo 50 términos para mejor rendimiento</small>
                </div>
                
                <button type="submit" class="btn-submit">Generar Fibonacci</button>
            </form>
        </div>
        
        <?php echo $resultado; ?>
    </div>
    
    <div class="info-box">
        <h3>¿Qué es la serie de Fibonacci?</h3>
        <p>La serie de Fibonacci es una secuencia infinita de números naturales donde cada número es la suma de los dos anteriores.</p>
        
        <h4>Fórmula:</h4>
        <p><strong>F(n) = F(n-1) + F(n-2)</strong></p>
        <p>con condiciones iniciales: <strong>F(0) = 0, F(1) = 1</strong></p>
        
        <h4>Ejemplos:</h4>
        <ul>
            <li><strong>F(1)</strong> = 0</li>
            <li><strong>F(2)</strong> = 1</li>
            <li><strong>F(3)</strong> = 0 + 1 = 1</li>
            <li><strong>F(4)</strong> = 1 + 1 = 2</li>
            <li><strong>F(5)</strong> = 1 + 2 = 3</li>
            <li><strong>F(6)</strong> = 2 + 3 = 5</li>
            <li><strong>F(7)</strong> = 3 + 5 = 8</li>
            <li><strong>F(8)</strong> = 5 + 8 = 13</li>
        </ul>
        
        <h4>Aplicaciones en la naturaleza:</h4>
        <ul>
            <li>🌻 Disposición de semillas en girasoles</li>
            <li>🐚 Espiral de conchas marinas (Nautilus)</li>
            <li>🌿 Patrones de ramificación en plantas</li>
            <li>🍍 Distribución de escamas en piñas</li>
            <li>📈 Análisis financiero y mercados</li>
        </ul>
        
        <h4>Curiosidad:</h4>
        <p>La proporción entre números consecutivos de Fibonacci se aproxima al <strong>número áureo (φ ≈ 1.618034)</strong>, considerado la proporción más estética en arte y arquitectura.</p>
    </div>
</section>

<?php include 'footer.php'; ?>