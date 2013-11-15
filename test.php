<?php
include ('functions/bootstrap.php');
bootstrap('functions');
connectdb();
checklogin();
?>
<html>
	<head>

	</head>

	<body>
		<?php
        echo test();
		?>
	</body>
</html>
<?php
function test() {
    $form = new formbuilder();
    $output = '
    <form method="post" action="test.php">
        <table>
            <tr>
                <td>';
    $output .= $form -> pregmatch("adres", "/^[A-Z]{1}[a-z]{4,500}$/");
    $output .= '  </td>
                </tr>
                <tr>
                <td>';
    $output .= $form -> pregmatch("telefoon", "/^[0-9]{4,12}$/");
    $output .=' </td>
                </tr>
                <tr>
                <td>
                <input type="submit" name="submit" class="button" value="Wijzig gegevens">
                </td>
                </tr>
                </table>
                </form>
    ';
    return $output;
}
