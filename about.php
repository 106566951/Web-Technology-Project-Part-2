<?php include 'header.inc'; ?>
<?php include 'about_table.php'; ?>
<?php require_once 'settings.php'; 
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch member contributions from the database
$query = "SELECT * FROM `member_contributions` ORDER BY `id` Desc";
$result = mysqli_query($conn, $query);
?>
	<!--Embedded css styling for the articles  -->
    <style>
      caption{
        font-size: 1.5em;
        font-weight: bold;
        padding-bottom:  10px;
        color: rgb(196, 95, 119);
      }

      /* Added by leo last minute since background graphic clashes with text since there is no colour behind text already */
      body {
        background-color: #c4ffc4;
      }
    </style>
    <main>
        <section>
            <h2>Welcome to our about page!!</h2>
            <p><span class="red_highlight">Green Grid </span>is a renewable energy company strengthening its technology team to support websites promoting clean energy solutions, project information, and public engagement initiatives.</p>
            <p>We are a team of experts on Sustainable Energy Solutions at Green Grid dedicated to creating <span class="red_highlight">sustainable solutions, development and employment.</span></p>
		</section>
         <section>
             <h2>Group Information</h2>
            <ul>
                 <li>Group Name: The Coders
            <ul>
                 <li>Class: Web Development COS100026</li>
                 <li>Meeting Time: Thursdays, 4:00 PM - 6:00 PM ; Discord meetings</li>
            </ul>
                 </li>
            </ul>
</section>
<!-- All devs who collaborated and about them -->
		
<section id="member-quotes">
<h2> Member Contributions and Quotes</h2>
<?php

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $firstname = htmlspecialchars($row['firstname']);
        $lastname = htmlspecialchars($row['lastname']);
        $shared = htmlspecialchars($row['shared_responsibility']);
        $ind1 = htmlspecialchars($row['individual1']);
        $ind2 = htmlspecialchars($row['individual2']);
        $quote = htmlspecialchars($row['quote']);
        $translation = htmlspecialchars($row['translation']);
        $ind3 = htmlspecialchars($row['individual3']);
        $ind4 = htmlspecialchars($row['individual4']);
        $ind5 = htmlspecialchars($row['individual5']);
     {
            echo "<dl>\n";
            echo "    <dt><span class='sample'>$id $firstname $lastname</span></dt>\n";
            echo "    <dd>Contribution:<ul>\n";
            echo "        <li>Shared Responsibility: $shared</li>\n";
            echo "        <li>Individual Responsibility: $ind1</li>\n";
            echo "        <li>Individual Responsibility: $ind2</li>\n";
            echo "    </ul></dd>\n";
            echo "    <dd lang=\"fr\">$quote</dd>\n";   
            echo "    <dd>Translation: $translation</dd>\n";
            echo "    <dd>Individual Responsibility: $ind3</dd>\n";
            echo "    <dd>Individual Responsibility: $ind4</dd>\n"; 
            echo "    <dd>Individual Responsibility: $ind5</dd>\n";
            echo "</dl>\n<br>\n";
        } 

    }
} else {
    echo "<p>No contributions found in the database.</p>";
}
?>
<br>
<figure>
  <img src="images/The_Coders.jpg" alt="Group photo of the Coders working together" width="400" height="300" loading="lazy">
  <br>
  <figcaption>"The Coders" collaborating on "Green Grid" Website project.</figcaption>
</figure><br><br><br>
<div>
  <table>
    <caption>Meet the Devs</caption>
    <thead>
      <tr>
        <th>Name</th>
        <th>Dream Job</th>
        <th>Coding Snack</th>
        <th>Hometown</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Andy</td>
        <td>UX Design Lead at Google</td>
        <td>Potato Chips</td>
        <td>Melbourne</td>
      </tr>
      <tr>
        <td>Joshua</td>
        <td>Game Developer at Nintendo</td>
        <td>Pizza slices</td>
        <td>Angamaly</td>
      </tr>
      <tr>
        <td>Leo</td>
        <td>AI Researcher at Amazon</td>
        <td>Turtle Chips</td>
        <td>Hillside</td>
      </tr>
       <tr>
        <td>Kaleb</td>
        <td>Software tester at Linux</td>
        <td>White monster with fruity chews</td>
        <td>Boronia</td>
      </tr>
    </tbody>
  </table>
</div> 
</main>
<article>
<div id = "format">
  <div><h3>Acknowledgement of Country</h3></div>
  <img src="images/acknowledgement_of_country.jpeg" alt="Description" width="350" height="350" loading="lazy">
  <div id ="textformat">
We respectfully acknowledge the Wurundjeri People of the Kulin Nation, who are the Traditional Owners of the land
on which Swinburne's Australian campuses are located in Melbourne's east and outer-east, and pay our respect to
their Elders past, present and emerging. We are honoured to recognise our connection to Wurundjeri Country, history,
culture and spirituality through these locations, and strive to ensure that we operate in a manner that respects and
honours the Elders and Ancestors of these lands. We also respectfully acknowledge Swinburne's Aboriginal and Torres
Strait Islander staff, students, alumni, partners and visitors. We also acknowledge and respect the Traditional Owners
of lands across Australia, their Elders, Ancestors, cultures and heritage, and recognise the continuing sovereignties of
all Aboriginal and Torres Strait Islander Nations.
  </div>
</div>   
</article>
<?php include 'footer.inc'; ?>