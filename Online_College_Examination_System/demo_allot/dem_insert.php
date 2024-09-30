<?php include('header.php'); ?> 
<?php 
$blocks = array(
    // array("Block No:".$_POST['b1'], $_POST['b1cap']),
    // array("Block No:".$_POST['b2'], $_POST['b2cap']),
    // array("Block No:".$_POST['b3'], $_POST['b3cap']),
    // array("Block No:".$_POST['b4'], $_POST['b4cap'])
    array("Block a", $_POST['bcap']),
    array("Block b", $_POST['bcap']),
    array("Block c", $_POST['bcap']),
    array("Block d", $_POST['bcap']),
    array("Block e", $_POST['bcap']),
    array("Block f", $_POST['bcap']),
    array("Block g", $_POST['bcap']),
    array("Block h", $_POST['bcap']),
    array("Block i", $_POST['bcap']),
    array("Block j", $_POST['bcap']),
    array("Block k", $_POST['bcap']),
    array("Block l", $_POST['bcap']),
    array("Block m", $_POST['bcap']),
    array("Block n", $_POST['bcap']),
    array("Block o", $_POST['bcap']),
    array("Block p", $_POST['bcap']),
    array("Block q", $_POST['bcap']),
    array("Block r", $_POST['bcap'])
);

?>
<?php

$departments = array(
    array("Computer Department:", $_POST['comp']),
    array("Civil Department:", $_POST['civil']),
    array("ENTC Department:", $_POST['entc']),
    array("Electrical Department:", $_POST['elect']),
    array("Mechanical Department:", $_POST['mech'])
);

// Calculate the total number of students


// Allocate blocks to departments
$allocatedBlocks = array();
$blockIndex = 0;

foreach ($departments as $department) {
    $departmentName = $department[0];
    $totalStudents = $department[1];

    $allocatedBlocks[$departmentName] = array();

    while ($totalStudents > 0 && $blockIndex < count($blocks)) {
        $blockName = $blocks[$blockIndex][0];
        $blockCapacity = $blocks[$blockIndex][1];

        if ($totalStudents >= $blockCapacity) {
            $allocatedBlocks[$departmentName][$blockName] = $blockCapacity;
            $totalStudents -= $blockCapacity;
        } else {
            $allocatedBlocks[$departmentName][$blockName] = $totalStudents;
            $totalStudents = 0;
        }

        $blockIndex++;
    }
}

// Display allocated blocks for each department
foreach ($allocatedBlocks as $departmentName => $departmentBlocks) {
    echo "<h2>$departmentName</h2>";
    echo "<ul>";
    foreach ($departmentBlocks as $blockName => $blockCapacity) {
        echo "<li>$blockName - Capacity: $blockCapacity</li>";
    }
    echo "</ul>";
}
?>
<?php include('footer.php'); ?> 

