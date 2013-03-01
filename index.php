<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/html2canvas.js"></script>
<script type="text/javascript" src="js/jquery.plugin.html2canvas.js"></script>

<h2>Simple Implementation of html2canvas With JavaScript and PHP</h2>

<form method="POST" enctype="multipart/form-data" action="save.php" id="myForm">
	<input type="hidden" name="img_val" id="img_val" value="" />
</form>
<table>
	<tr>
		<td colspan="2">
			<table width="100%">
				<tr>
					<td>
						<input type="submit" value="Take Screenshot Of Div Below" onclick="capture();" />
					</td>
					<td align="right">
						<a href="http://www.kubilayerdogan.net?p=304" style="font-family: Tahoma; font-size: 10pt; font-weight: bold;">
                            Documentation (Back to Site)</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" style="padding: 10px;">
            <b>Div:</b>
		</td>
		<td>
			<div id="target">
				<table cellpadding="10">
					<tr>
						<td colspan="2">
                            This is sample implementation
                        </td>
					</tr>
					<tr>
						<td>
                            It can hold form values:
                        </td>
						<td>
							<input type="text" name="form_value" value="" placeholder="Try me" />
						</td>
					</tr>
					<tr>
						<td>
                            Simple Button Element:
                        </td>
						<td>
							<button name="my_button">
                                Clicking Me Useless</button>
						</td>
					</tr>
					<tr>
						<td valign="top">
                            Let's go with CSS:
                        </td>
						<td>
							<div id="aside">
                                <h3>Aside heading</h3>
								<p>Duis autem vel eum iriure dolor in hendrerit!</p>
							</div>
							<div id="more">
                                <h2>My first styled page</h2>
								<p>Welcome to my styled page!</p>
								<p>It lacks images, but at least it has style.</p>
								<p>There should be more here, but I don't know what yet.</p>
                                <address>
                                    Made 5 April 2004
                                    <br />
                                    by myself.
                                </address>
							</div>
						</td>
					</tr>
					<tr>
						<td>
                            Try Image:
                        </td>
						<td>
							<img src="soc.jpeg" alt="SOC" />
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
<script type="text/javascript">
	function capture() {
		$('#target').html2canvas({
			onrendered: function (canvas) {
                //Set hidden field's value to image data (base-64 string)
				$('#img_val').val(canvas.toDataURL("image/png"));
                //Submit the form manually
				document.getElementById("myForm").submit();
			}
		});
	}
</script>
<style type="text/css">
	#target {
		border: 1px solid #CCC;
		padding: 5px;
		margin: 5px;
	}
	h2, h3 {
		color: #003d5d;
	}
	p {
		color:#AA00BB;
	}
	#more {
		font-family: Verdana;
		color: purple;
		background-color: #d8da3d;
	}
</style>