<?php include 'header.php'; ?>

<section class="calculator">
    <h2>Calculadora de Factorial</h2>
    <p>Calcula el factorial de un número (n!)</p>
    
    <?php
    $resultado = '';
    $numero = '';
    
    // Función para calcular factorial recursivamente
    function calcularFactorial($n) {
        if ($n <= 1) {
            return 1;
        }
        return $n * calcularFactorial($n - 1);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['numero'];
        
        // Validar que sea un número entero no negativo
        if (is_numeric($numero) && $numero >= 0 && $numero == floor($numero)) {
            $factorial = calcularFactorial($numero);
            $resultado = "<div class='result-box'>
                            <h3>Resultado:</h3>
                            <p>$numero! = <strong>" . number_format($factorial, 0, ',', '.') . "</strong></p>";
            
            // Mostrar el proceso de cálculo para números pequeños
            if ($numero <= 10) {
                $proceso = '';
                for ($i = $numero; $i >= 1; $i--) {
                    $proceso .= $i;
                    if ($i > 1) $proceso .= ' × ';
                }
                $resultado .= "<p class='process'>Proceso: $proceso = " . number_format($factorial, 0, ',', '.') . "</p>";
            }
            
            $resultado .= "</div>";
        } else {
            $resultado = "<div class='error-message'>Por favor, ingresa un número entero positivo (0, 1, 2, 3...).</div>";
        }
    }
    ?>
    
    <div class="calculator-container">
        <div class="calculator-form">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="numero">Número (entero ≥ 0):</label>
                    <input type="number" id="numero" name="numero" min="0" step="1" 
                           value="<?php echo $numero; ?>" required>
                </div>
                
                <button type="submit" class="btn-submit">Calcular Factorial</button>
            </form>
        </div>
        
        <?php echo $resultado; ?>
    </div>
    
    <div class="info-box">
        <h3>¿Qué es el factorial?</h3>
        <p>El factorial de un número entero positivo n, se define como el producto de todos los números enteros desde 1 hasta n.</p>
        <p><strong>Fórmula:</strong> n! = n × (n-1) × (n-2) × ... × 1</p>
        <p><strong>Ejemplos:</strong></p>
        <ul>
            <li>5! = 5 × 4 × 3 × 2 × 1 = 120</li>
            <li>3! = 3 × 2 × 1 = 6</li>
            <li>0! = 1 (por definición)</li>
        </ul>
    </div>
</section>

<?php include 'footer.php'; ?>