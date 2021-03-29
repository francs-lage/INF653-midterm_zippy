<?php include('header.php');?>

<!-- THIS FORM DISPLAYS DROP MENUS, RADIO BUTTONS PRICE/YEAR AND SUBMIT BUTTON -->
<form action="." method="GET">

    <!-- DROP MENU TO SELECT AN SPECIFIC MAKER -->
    <select name="selectMake">
        <option value="0">View All Makes</option>
        <?php foreach ($makes as $make){ ?>
            <option value="<?=$make['make_id'] ?>"> <?php echo $make['make']; ?> </option> <?php 
            # Obs: Value carries the parameter forward and echo prints on the menu 
        } ?>
    </select>

    <!-- DROP MENU TO SELECT AN SPECIFIC TYPE -->
    <select id="selectTypes" name="selectType">
        <option value="0">View All Types</option>
        <?php foreach ($types as $type){ ?>
            <option value="<?=$type['type_id'] ?>"> <?php echo $type['type']; ?> </option> <?php
        } ?>
    </select>

    <!-- DROP MENU TO SELECT AN SPECIFIC CLASS -->
    <select id="selectClasses" name="selectClass">
        <option value="0">View All Classes</option>
        <?php foreach ($classes as $class){ ?>
            <option value="<?=$class['class_id'] ?>"> <?php echo $class['class']; ?> </option> <?php 
        } ?>
    </select>
    <br>
    <br>
    <!-- RADIO BUTTONS FOR PRICE OR YEAR -->
    <label>Sort By:</label>
    <input type="radio" id="price" name="sortby" value="price">
    <label for="price">Price</label>
    <input type="radio" id="year" name="sortby" value="year">
    <label for="year">Year</label>

    <button id="submitButton">Submit</button>
</form>

<!-- THIS DISPLAYS THE LIST  -->
<section id="VehiclesListTable">
    <table style="width:100%">
        <tr>
            <th>Year   </th>
            <th>Make   </th>
            <th>Model  </th>
            <th>Type   </th>
            <th>Class  </th>
            <th>Price  </th>
        </tr>
        <?php if ($vehicles){
            foreach ($vehicles as $vehicle){ ?>
                <tr>
                    <td> <?=$vehicle['year']; ?> </td>
                    <td> <?=$vehicle['make'];  ?> </td>
                    <td> <?=$vehicle['model']; ?> </td>
                    <td> <?=$vehicle['type'];  ?> </td>
                    <td> <?=$vehicle['class']; ?> </td>
                    <td> <?=$vehicle['price']; ?> </td> 
                </tr> <?php
            }
        } ?>
    </table>
</section>

<?php include('footer.php'); ?>