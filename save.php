<?php
// A real application should use them according to needs such as to check image type
$filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);

// Need to decode before saving since the data we received is already base64 encoded
$unencodedData=base64_decode($filteredData);

//Save the image
file_put_contents('img.png', $unencodedData);
?>
<h2>Save the image and show to user</h2>
<table>
    <tr>
        <td>
            <a href="img.png" target="blank">
            	Click Here to See The Image Saved to Server</a>
        </td>
        <td align="right">
            <a href="index.php">
            	Click Here to Go Back</a>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <br />
            <br />
			<span>
				Here is Client-sided image:
			</span>
            <br />
<?php
echo '<img src="'.$_POST['img_val'].'" />';
?>
        </td>
    </tr>
</table>
<style type="text/css">
body, a, span {
	font-family: Tahoma; font-size: 10pt; font-weight: bold;
}
</style>