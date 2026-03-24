<?php include 'header.php'; ?>

<section class="contact">
    <h2>Contacto</h2>
    
    <?php
    $mensaje = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $asunto = htmlspecialchars($_POST['asunto']);
        $mensaje_texto = htmlspecialchars($_POST['mensaje']);
        
        // Aquí puedes agregar la lógica para enviar email
        // Por ahora solo mostraremos un mensaje de éxito
        $mensaje = "<div class='success-message'>¡Gracias $nombre! Tu mensaje ha sido enviado. Te contactaré pronto.</div>";
    }
    ?>
    
    <?php echo $mensaje; ?>
    
    <div class="contact-container">
        <div class="contact-info">
            <h3>Información de Contacto</h3>
            <p><strong>Email:</strong> baldeon.david@example.com</p>
            <p><strong>Teléfono:</strong> +51 987 654 321</p>
            <p><strong>Ubicación:</strong> Lima, Perú</p>
        </div>
        
        <div class="contact-form">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="asunto">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" required>
                </div>
                
                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn-submit">Enviar Mensaje</button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>