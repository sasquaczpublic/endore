<table width="194px" style="text-align:center">
<tr style="text-align:right">
  <td colspan="8">Cechy pierwszorzędne</td></tr>
<tr>
  <td>Ww</td>
  <td>Us</td>
  <td>K</td>
  <td>Odp</td>
  <td>Zr</td>
  <td>Int</td>
  <td>Sw</td>
  <td>Ogd</td>
</tr>
<tr>
  <td><? echo $user['ww']; ?></td>
  <td><? echo $user['us']; ?></td>
  <td><? echo $user['k']; ?></td>
  <td><? echo $user['odp']; ?></td>
  <td><? echo $user['zr']; ?></td>
  <td><? echo $user['int']; ?></td>
  <td><? echo $user['sw']; ?></td>
  <td><? echo $user['ogd']; ?></td>
</tr>
</table>
<table style="text-align:center" width="194px">
<tr width="180px" style="text-align:right">
  <td colspan="6">Cechy drugorzędne</td>
</tr>
<tr>
  <td>A</td>
  <td>Żyw</td>
  <td>S</td>
  <td>Wt</td>
  <td>Sz</td>
  <td>Mag</td>
  </tr>
<tr>
  <td><? echo $user['a']; ?></td>
  <td><? echo $user['zyw']."/".$user['max_zyw']; ?></td>
  <td><? echo $user['s']; ?></td>
  <td><? echo $user['wt']; ?></td>
  <td><? echo $user['sz']; ?></td>
  <td><? echo $user['mag']; ?></td>
  </tr>
</table>