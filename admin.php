 <div id="login">
    <form action="" method="post" id="flogin">
      <table width="433" border="0" align="right">
        <tr>
          <td width="165">User name </td>
          <td width="166">Password</td>
          <td width="88">&nbsp;</td>
        </tr>
        <tr>
          <td><input type="text" name="uname1" > </td>
          <td><input type="password" name="pass1"> </td>
          <td><input type="submit" name="login" value="Login" class="btn"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><a href="resetpass.php" target="_self"> Forgot your password? </a></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23" colspan="3">
          <div align="left" style="color:#CCCC33;font-weight:bold;">					      					        <?php 
		  if(isset($m))
        echo $m;
      ?>			
      </div></td>
          </tr>
      </table>
      </form>
    </div>
