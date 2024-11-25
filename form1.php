<!DOCTYPE html>
<html>
<head>
    <title>Detalles de la Compra</title>
</head>
<body bgcolor='aqua'>
    <table border="1">
        <tr>
            <th>Producto</th>
            <th>Precio c/u</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["x"])) {
            // Recibe el valor de 'x' que contiene los pedidos en forma de cadena
            $pedidos = explode(";", $_POST["x"]);

            // Array con los nombres y precios de los productos
            $productos = ["cajonero1","cajonero2","escritorio","gcopa1",
			  "gcopa2","librero1","librero2","librero3",
			  "modular1","ropero1","ropero2","ropero3",
			  "cama1","cama2","cama3"];
            $precios = [500,400,300,600,800,400,400,500,250,1800,1200,1800,2000,2200,2600];
            

            $totalPagar = 0;

            // Muestra los detalles de los productos y calcula el costo total
            for ($i = 0; $i < count($pedidos); $i++) {
                $cantidad = intval($pedidos[$i]);
                if ($cantidad > 0 && isset($productos[$i])) {
                    $subtotal = $cantidad * $precios[$i];
                    echo "<tr>
                            <td>" . $productos[$i] . "</td>
                            <td>" . $precios[$i] . "</td>
                            <td>" . $cantidad . "</td>
                            <td>" . $subtotal . " Bs.</td>
                        </tr>";
                    $totalPagar += $subtotal;
                }
            }

            echo "<tr>
                    <th colspan='2'>Total a Pagar:</th><th></th>
                    <th>" . $totalPagar . " Bs.</th>
                </tr>";
        }
        ?>
    </table>
    <hr>

    <form>
        <input type="button" value="NUEVA VENTA" onclick="window.location.href='index.html'" />
    </form>
</body>
</html>