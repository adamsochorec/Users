<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>
    <style>
      :root {
        --primary-color: 0, 126, 227;
        --secondary-color: 128, 0, 128;
      }
      body {
        display: flex;
        align-items: center;
        flex-direction: column;
        -webkit-animation: gradient 7s ease infinite;
        animation: gradient 7s ease infinite;
        background: linear-gradient(
          -45deg,
          rgb(var(--primary-color)),
          rgb(var(--secondary-color))
        );
        background-size: 400% 400%;
        transition: all 0.5s ease;
        font-family: "Courier New", Courier, monospace;
        font-weight: 300;
      }
      input,
      textarea {
        width: 100%;
        padding: 10px;
        outline: none;
        border-radius: 5px;
        border: none;
      }

      @-webkit-keyframes gradient {
        0% {
          background-position: 0 50%;
        }
        50% {
          background-position: 100% 50%;
        }
        100% {
          background-position: 0 50%;
        }
      }
      @keyframes gradient {
        0% {
          background-position: 0 50%;
        }
        50% {
          background-position: 100% 50%;
        }
        100% {
          background-position: 0 50%;
        }
      }
      section {
        height: 200px;
        overflow-x: scroll;
        background-color: aqua;
        border-radius: 10px;
        padding: 20px;
        width: 60%;
      }
    </style>
  </head>
  <body>
    <h1>Users</h1>
    <section><?php
      require("connection.php");
      
      $query = "SELECT * FROM Users";
      $result = mysqli_query($connection, $query);
      echo "<table border='1'>
      <tr>
      <th>ID</th>
      <th>Username</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Email</th>
      <th>Rank</th>
      <th>Description</th>
      </tr>";

   // $result = mysqli_query($connection, "SELECT * FROM Users WHERE email='adam.sochorec@icloud.com'"); // DISPLAY RESULT IN QUERY where we get results with mail
   $result = mysqli_query($connection, "SELECT * FROM Users ORDER BY rank DESC"); // DISPLAY RESULT IN QUERY where we get results in an descending order by rank
   // $result=mysqli_query($connection, "UPDATE Users SET fname = 'ALOIS' WHERE rank = '10'"); // modifies all rows where a certain condition


      while($row = mysqli_fetch_array($result)){
      echo "<tr>";
       echo "<td>" . $row['ID'] . "</td>";
       echo "<td>" . $row['username'] . "</td>" ;
       echo "<td>" . $row['fname'] . "</td>";
       echo "<td>" . $row['lname'] . "</td>";
       echo "<td>" . $row['email'] . "</td>"; 
       echo "<td>" . $row['rank'] . "</td>";
       echo "<td>" . $row['description'] . "</td>";
       echo "<td><a href='delete.php?lname=" . $row['lname']."'>DELETE</a></td>";
      echo "<td><a href='editui.php?lname=" . $row['lname']."'>EDIT</a></td>";
      echo "</tr>";
      }
    echo "</table>";
      mysqli_close($connection);
      ?></section>
  </body>
</html>
<br /><br />
<form action="insert.php" method="post">
  Username: <input type="text" name="username" /><br /><br />
  First name: <input type="text" name="fname" /><br /><br />
  Last name: <input type="text" name="lname" /><br /><br />
  Email: <input type="text" name="email" /><br /><br />
  Rank: <input type="number" name="rank" /><br /><br />
  Description: <input type="text" name="description" /><br /><br />
  <input type="submit" name="submit" />
</form>
<br /><br />
