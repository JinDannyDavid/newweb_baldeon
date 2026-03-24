<?php include 'header.php'; ?>

<section class="calculator">
    <h2>Calculadora de Suma</h2>
    <p>Ingresa dos números para calcular su suma</p>
    
    <?php
    $resultado = '';
    $numero1 = '';
    $numero2 = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        
        // Validar que sean números
        if (is_numeric($numero1) && is_numeric($numero2)) {
            $suma = $numero1 + $numero2;
            $resultado = "<div class='result-box'>
                            <h3>Resultado:</h3>
                            <p>$numero1 + $numero2 = <strong>$suma</strong></p>
                          </div>";
        } else {
            $resultado = "<div class='error-message'>Por favor, ingresa números válidos.</div>";
        }
    }
    ?>
    
    <div class="calculator-container">
        <div class="calculator-form">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="numero1">Número 1:</label>
                    <input type="number" id="numero1" name="numero1" step="any" 
                           value="<?php echo $numero1; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="numero2">Número 2:</label>
                    <input type="number" id="numero2" name="numero2" step="any" 
                           value="<?php echo $numero2; ?>" required>
                </div>
                
                <button type="submit" class="btn-submit">Calcular Suma</button>
            </form>
        </div>
        
        <?php echo $resultado; ?>
    </div>
    
    <div class="info-box">
        <h3>¿Cómo funciona?</h3>
        <p>Esta calculadora suma dos números. Puedes ingresar números enteros o decimales.</p>
        <p><strong>Ejemplo:</strong> 5 + 3 = 8</p>
    </div>
</section>

<?php include 'footer.php'; ?>