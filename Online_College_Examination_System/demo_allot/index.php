<?php include('header.php'); ?> 


<div class="box1">
<h2>Exam Scheduling</h2>
</div>
<br>
<br>
<table class="table table-hover tablefa-bordered table-striped" >
        <thead>
            <tr>
                <th>Department</th>
                <th>Total Students</th>
            </tr>
        </thead>
        <form action="dem_insert.php" method="post">
        <!-- <tr>
        <td><label for="compd">Block NO:</label></td>
        <td><input type="number" name="b1" id="b1" required></td>
        <td><label for="compd">Capacity :</label></td>
        <td><input type="number" name="b1cap" id="b1cap" required></td>
       </tr>
       <tr>
        <td><label for="compd">Block NO:</label></td>
        <td><input type="number" name="b2" id="b2" required></td>
        <td><label for="compd">Capacity :</label></td>
        <td><input type="number" name="b2cap" id="b2cap" required></td>
       </tr>
       <tr>
        <td><label for="compd">Block NO:</label></td>
        <td><input type="number" name="b3" id="b3" required></td>
        <td><label for="compd">Capacity :</label></td>
        <td><input type="number" name="b3cap" id="b3cap" required></td>
       </tr>
       <tr>
        <td><label for="compd">Block NO:</label></td>
        <td><input type="number" name="b4" id="b4" required></td>
        <td><label for="compd">Capacity :</label></td>
        <td><input type="number" name="b4cap" id="b4cap" required></td>
       </tr> -->
        <tr>
        <td><label for="compd">Computer Department:</label></td>
        <td><input type="number" name="comp" id="comp" required></td>
       </tr>
        <tr>
        <td><label for="civild">Civil Department:</label></td>
        <td><input type="number" name="civil" id="civil" required></td>
        
        </tr>
        <tr>
        <td><label for="entcd">ENTC Department:</label></td>
        <td><input type="number" name="entc" id="entc" required></td>
        
</tr>
        <tr>
        <td><label for="electd">Electrical Department:</label></td>
        <td><input type="number" name="elect" id="elect" required></td>
        
</tr>
        <tr>
        <td><label for="mechd">Mechanical Department:</label></td>
        <td><input type="number" name="mech" id="mech" required></td>
        </tr>
        <tr>
        <td><label for="bcap">block capacity</label></td>
        <td><input type="number" name="bcap" id="bcap" required></td>
        </tr>
        <input button class="btn btn-primary" type="submit" value="Allocate Blocks" >
    </form>
</td>
</table>  <!-- tables's body -->
</div>
<?php include('footer.php'); ?> 

    