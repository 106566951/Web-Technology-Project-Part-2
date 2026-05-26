<?php include 'header.inc'; ?>
    
<style>
    .text_with_image_container article {
        width: 40%;
        margin: auto;
    }
    section {
        padding: 16px;
        margin: 16px;
    }
</style>

<!-- Main Content -->
<main>

    <!-- Slogan with Image and a Description Container --> 
    <div class="text_with_image_container border_with_shadow">
        <article>
            <h2 id="slogan"><strong>Making the Future <span class="highlight">Sustainable!</span></strong></h2>
            <p class="description">
                Green Grid is a start-up company supporting the promotion and deployment of 
                <strong>renewable energy</strong> focused solutions within the digital space,
                and the wider community through public engagement, all to build a <strong>greener</strong> future.
            </p>
        </article>

        <!-- Image of Logo --> 
        <aside>
            <img class="border_with_shadow" src="images/greengrid_logo.png" alt="greengrid_logo" width="500">
        </aside>
    </div>

    <!-- Search Bar Container --> 
    <div id="searchbar_container" class="border_with_shadow">
        <!-- Search Bar consisting of Input and Button with a Label-->
        <label for="search">Search our <span class="highlight">Projects:</span></label>
        <div id="searchbar">
            <input type="text" id="search" name="search" placeholder="E.g. Solar Panel Farms, Renewables Parade...">
            <button type="submit">Search</button>
        </div>
    </div>

    <!-- Table Container -->
    <div id="table_container" class="border_with_shadow">
        <!-- Table Heading with an Image -->
        <div id="header_with_image">
            <h2>What <span style="font-size: 1.3em; color: #2c6e2c; text-decoration: underline;">We</span> Offer</h2>
            <img src="images/leafs.png" alt="leafs" width="50">
        </div>
        <!-- Table with 4 rows and 3 columns-->
        <table class="border_with_shadow">
            <thead>
                <tr>
                    <th>Solution Type</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="2">Solar</td>
                    <td>Rooftop solar installation and monitoring</td>
                    <td rowspan="2">Active</td>
                </tr>
                <tr>
                    <td>Commercial solar farm development and maintenance</td>
                </tr>
                <tr>
                    <td rowspan="2">Wind</td>
                    <td>Wind turbine deployment for rural communities</td>
                    <td rowspan="2">Active</td>
                </tr>
                <tr>
                    <td>Wind infrastructure planning and construction</td>
                </tr>
                <tr>
                    <td rowspan="2">Hydro</td>
                    <td>Hydro power generation and storage</td>
                    <td rowspan="2">Coming Soon</td>
                </tr>
                <tr>
                    <td>Grid-scale hydro energy supply for peak demand</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php include 'footer.inc'; ?>