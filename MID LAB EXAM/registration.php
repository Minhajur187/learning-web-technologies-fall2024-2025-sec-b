<center>
    <form action="registrationCheck.php" method="POST" enctype="">
        <table border="0">
            <tr>
                <td>
                    <fieldset>
                        <legend>
                            <h3>REGISTRATION</h3>
                        </legend>
                        Id<br /><input type="text" name="id" value="" /><br />
                        Password<br /><input type="password" name="password" value="" /><br />
                        Confirm Password<br /><input type="password" name="confirmPassword" value="" /><br />
                        Name<br /><input type="text" name="name" value="" /><br />
                        User Type
                        <hr />
                        <select id="type" name="type" required>
                            <option value="User">USER</option>
                            <option value="Admin">ADMIN</option>
                        </select>
                        <hr />
                        <input type="submit" value="Sign Up" name="submit" />
                        <a href=" login.php">Sign In</a>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</center>
