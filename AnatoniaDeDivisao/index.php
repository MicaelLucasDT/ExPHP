<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anatomia de disisão</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $dividendo = $_GET['dividendo'];
        $divisor = $_GET['divisor'];
        $quociente = (int) ($dividendo / $divisor);
        $resto = $dividendo % $divisor;
    ?>
    <section>
        <h1>Anatonia de Divisão</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
        <label for="dividendo">Dividendo</label>
        <input type="number" name="dividendo" id="dividendo" value="<?=$dividendo?>"> 
        <label for="divisor">Divisor</label>
        <input type="number" name="divisor" id="divisor" value="<?=$divisor?>">
        <input type="submit" value="Dividir">
        </form>
    </section>
    <section>
        <h2>Estrutura da Divisão:</h2>
        <?php 
            
            echo "<ul>";
            echo "<li>Dividendo: $dividendo</li>";
            echo "<li>Divisor: $divisor</li>";
            echo "<li>Quociente: $quociente</li>";
            echo "<li>Resto: $resto</li>";  
            echo "</ul>";
        ?>
    </section>
   
</body>
</html>
