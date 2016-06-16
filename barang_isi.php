<h2>.:: ISI BARANG ::.<h2>
<form action='barang_simpan.php' method='post' enctype='multipart/form-data'>
<table border='1'>
<tr>
	<td>Nama Barang</td>
	<td><input type='text' name='nama' maxlength='40' size='31'></td>
</tr>
<tr>
	<td>Harga Jual</td>
	<td><input type='text' name='harga' maxlength='9' size='10'></td>
</tr>
	<td>Gambar [max=500kb]</td>
	<td><input type="file" name="foto" size="50"></td>
<tr>
	<td colspan='2' align='center'>
	<input type='submit' value='Simpan' name='proses'>
	<input type='reset' value='Reset' name='reset'>
	</td>
</tr>
</table>
</form>